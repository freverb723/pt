<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">
	<title>Timerecord &amp; Management</title>
	<link rel="preconnect" href="//fonts.gstatic.com/" crossorigin>
	<link href="../css/corporate.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<?php require 'sidebar.php'; ?>
		<div class="main">
        <?php require 'header.php'; ?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Holiday Request
					</h1>

					<div class="row">
						<div class="col-12">
							<div class="card p-3 p-lg-4">
                            <div class="card-header pb-0"><h3></h3>
                            <p class="text-right"><span class="mr-3">ID : <?php echo sprintf('%03d', $id); ?></span>
                                Name : <?php echo $username; ?></p>
                            </div><!--card header-->
								<div class="card-body pt-0">
                                <table id="datatables-dashboard-traffic" class="table table-sm table-bordered table-striped mt-0 mb-3">
									<thead>
										<tr>
											<th class="text-right" width="8%">Date</th>
											<th class="text-right" width="8%">Swap</th>
                                            <th class="text-right" width="24%">Reason</th>
                                            <th class="text-right" width="12%"></th>
										</tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     require_once '../class/Holiday.php';
									 $hld = new Holiday;
									 $hld->ShowHoliday($id);
									 $rows = $hld->ShowHoliday($id);
									 $deadline = new DateTime('+7days');
									 $deadline = $deadline->format('Y-m-d');

                                     $btn = '<button type="submit" class="btn page-link text-dark d-inline-block btn-sm" name="Request"><i class="fas fa-angle-double-right"></i>Request</button>';                                            
                                    
                                          echo '<form action="../Action/empAction.php" method="post"><tr>';
                                          if(isset($_GET["date"])){
											$date = $_GET["date"];
                                            echo '<td class="text-right"><input type="date" class="w-100 text-right" name="targetdate" value="'.$date.'" required></td>';  
                                          }else{ echo '<td class="d-none d-xl-table-cell text-right"><input type="date" class="w-100 text-right" name="targetdate" min ="'.$deadline.'" placeholder="YYYY-MM-DD" required></td>';}
											echo '<td class="d-none d-xl-table-cell text-right">
													  <select name="swap">';
													foreach ($rows as $row) {
														$h_date = $row["holiday_date"];
														$h_date = date('Y/m/d',strtotime($h_date));
														$swap = $row["date"];
														$h_id = $row["holiday_id"];
										                if(date('Y/m/d',strtotime($swap)) == '1970/01/01'){
															echo '<option value="'.$h_id.'">'.$h_date.'</option>';
									                 	}else{
														 }
													}
													  echo '<select></td>';
                                          
										  echo '<td><input type="hidden" name="emp_id" value="'.$id.'">
										  <input type="text" class="w-100 text-right" name="reason" placeholder="Reason" required></td>
                                          <td class="text-center">'.$btn.'</td>
                                          </tr></form>';
                                     
                                    ?>
									
									</tbody>
								</table>
								
								<table id="datatables-dashboard-traffic" class="table table-sm table-bordered table-striped my-0">
							    	<thead>
										<tr>
											<th class="text-right" width="8%">Date</th>
											<th class="text-right" width="8%">Day</th>
											<th class="text-right" width="24%">Holiday</th>
                                            <th class="text-right" width="8%">Type</th>
											<th class="text-right" width="8%">Swapped Date</th>
										</tr>
                                    </thead>
									<tbody>
									<?php 
									 foreach ($rows as $row) {
										 $h_date = $row["holiday_date"];
										 $day = date('D', strtotime($h_date));
										 $h_name = $row["holiday_name"];
										 $h_type = $row["holiday_type"];
										
                                         $swap = $row["date"];
										 if(date('Y/m/d', strtotime($swap)) == '1970/01/01'){
											 $swap ="";
										}else if($row["status"] =="W"){
											$swap = '<span class="text-muted">'.date('Y/m/d',strtotime($swap)).'</span>';
										}else{
											$swap = date('Y/m/d',strtotime($swap));
										}
										 echo '<tr>
										 <td class="text-right">'.date('Y/m/d', strtotime($h_date)).'</td>
										 <td class="text-right">'.$day.'</td>
										 <td class="text-right">'.$row["holiday_name"].'</td>
										 <td class="text-right">'.$row["holiday_type"].'</td>
										 <td class="text-right">'.$swap.'</td>
										 </tr>';
									 }
									?>
									</tbody>
								</table>
								</div><!--card-body-->
                            </div><!--card p-3 p-lg-4-->
                          </div><!--col-12-->
                        </div><!--row-->



				</div><!--container-fluid p-0-->
			</main>

			<?php require 'footer.php'; ?>
		</div>
	</div>

	<script src="../js/app.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
	<script>
		$(function() {
			$("pre code").each(function(i, block) {
				hljs.highlightBlock(block);
			});
		});
	</script>
</body>

</html>