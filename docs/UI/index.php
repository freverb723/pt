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
		<?php 
		require 'sidebar.php'; ?>
		<div class="main">
        <?php require 'header.php'; ?>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12">
						<div class="card p-3 p-lg-4">
                            <div class="card-header pb-0">
						    	<h1 class="h3 mb-3">Recent Requests</h1>
                            </div><!--card header-->
					        <div class="card-body pt-0">
                                <table id="datatables-dashboard-traffic1" class="table table-sm table-bordered table-striped my-0">
									<thead>
										<tr>
											<th class="text-right">Sent Date</th>
											<th class="d-none d-xl-table-cell text-right">Target Date</th>
											<th class="d-none d-xl-table-cell text-right">Subject</th>						
                                            <th class="d-none d-xl-table-cell text-right">Status</th>
										</tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     require_once '../class/Emp.php';
                                     $emp = new Emp;
									 $rows = $emp->RecentRecord($id);
									 $orows = $emp->Opinions();
									 foreach ($rows as $row) {
										if(isset($row["sub"])){
										$sub = $row["sub"];
										}
										if(isset($row["status"])){
										$status = $row["status"];
										}
										if(isset($row["sentday"])){
										$sentday = $row["sentday"];
										}
										if(isset($row["date"])){
										$date = $row["date"];
										}

										if($status == 'W'){
											$status ='<button class="btn btn-info btn-sm">Waiting</button>';
										}else if($status == 'R' || $status == 'I'){
											$status ='<button class="btn btn-danger btn-sm">Rejected</button>';
										}else if($status == 'A' || $status == 'H'){
											$status ='<button class="btn btn-primary btn-sm">Approval</button>';	
										}

										if($sub == 'T'){
											$sub = 'Time modification';
										}else if($sub =='H'){
											$sub = 'Holiday request';
										}
										
                                        echo '<tr>';
                                        echo '<td class="d-none d-xl-table-cell text-right">'.$sentday.'</td>';  
                                        echo '<td class="d-none d-xl-table-cell text-right">'.$date.'</td>';  
                                        echo '<td class="d-none d-xl-table-cell text-right">'.$sub.'</td>';  
                                        echo '<td class="d-none d-xl-table-cell text-center">'.$status.'</td>';  
                                        echo '</tr>';      
                                     }
                                    ?>
									
									</tbody>
								</table>
							</div><!--card-body-->
                        </div><!--card p-3 p-lg-4-->
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card p-3 p-lg-4">
							<div class="card-header pb-0">
						    	<h1 class="h3 mb-3">Opinions</h1>
                            </div><!--card header-->
							<div class="card-body pt-0">
								<table id="datatables-dashboard-traffic2" class="table table-sm table-bordered table-striped my-0">
									<thead>
										<tr>
											<th>Subject</th>
											<th>Body</th>
											<th>Measures</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
                                    <?php
                                    foreach($orows as $row){
										if(isset($row["op_subject"])){
										$subject = $row["op_subject"];
										}
										if(isset($row["op_id"])){
											$opid = $row["op_id"];
										}
										if(isset($row["op_content"])){
										$body = $row["op_content"];
										}
										if(isset($row["comment"])){
										$comment = $row["comment"];
										}else{ $comment = '-';}
										echo '<tr>
										    <td>'.$subject.'</td>
											<td>'.$body.'</td>
											<td><form action="../action/empAction.php" method="post"><input type="text" class="w-100" name="comment" value="'.$comment.'"><input type="hidden" name="op_id" value="'.$opid.'"></td>
											<td class="text-center"><button type="submit" name="opcomment" class="btn btn-primary btn-sm">Send</button></form></td>
										</tr>';
									}	
						            ?>
									</tbody>
								</table>
								</div>
							</div>
						</div>

					</div>
				</div>
			</main>
			<?php require 'footer.php'; ?>
		</div>
	</div>

	<script src="../js/app.js"></script>
	<script>
		$(function() {
			$("#datatables-dashboard-traffic1").DataTable({
				pageLength: 15,
				lengthChange: false,
				bFilter: false,
				autoWidth: false,
				bPaginate: false,
				bInfo: false,
				ordering: false

			});
			$("#datatables-dashboard-traffic2").DataTable({
				pageLength: 15,
				lengthChange: false,
				bFilter: false,
				autoWidth: false,
				bPaginate: false,
				bInfo: false,
				ordering: false

			});
		});
	</script>

</body>

</html>