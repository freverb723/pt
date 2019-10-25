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

					<h1 class="h3 mb-3">Time Record</h1>

					<div class="row">
						<div class="col-12">
							<div class="card p-3 p-lg-4">
                            <div class="card-header pb-0"><h3>October 2019</h3>
                            <p class="text-right"><span class="mr-3">ID : <?php echo sprintf('%03d', $id); ?></span>
                                Name : <?php echo $username; ?></p>
                            </div><!--card header-->
								<div class="card-body pt-0">
                                <table id="datatables-dashboard-traffic" class="table table-sm table-bordered table-striped my-0">
									<thead>
										<tr>
											<th class="text-right" width="8%">Date</th>
											<th class="text-right" width="14%">In</th>
											<th class="text-right" width="14%">Out</th>
											<th class="text-right" width="14%">In</th>
                                            <th class="text-right" width="14%">Out</th>
                                            <th class="text-right" width="24%">Reason</th>
                                            <th class="text-right" width="12%"></th>
										</tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     $date = $_GET["date"];
                                     require_once '../class/Emp.php';
                                     $emp = new Emp;
                                     $emp->ModifyTimeRecord($date, $id);
                                     $row = $emp->ModifyTimeRecord($date, $id);
                                     $date = date('m/d',  strtotime($date));
                                     $btn = '<button type="submit" class="btn page-link text-dark d-inline-block btn-sm" name="apply"><i class="fas fa-angle-double-right"></i>Apply</button>';                                            
                                
                                    
                                        
                                    
                                          echo '<form action="../Action/empAction.php" method="post"><tr>';
                                          //if(isset($row["date"])){
                                            echo '<td class="text-right">'.$date.'<input type="hidden" name="timeid" value="'.$row["timeid"].'"></td>';  
										  //}else{ echo '<td class="d-none d-xl-table-cell text-right"></td>';}
										  
										  echo '<td><input type="text" class="w-100 text-right" name="newswrk"';
                                          if(isset($row["swrk"])){
                                            echo 'value="'.$row["swrk"].'" required></td>';  
										  }else{ echo 'placeholder="hh:mm:ss"></td>';}
										  
										  echo '<td><input type="text" class="w-100 text-right" name="newsbrk"';
                                          if(isset($row["sbrk"])){
                                            echo 'value="'.$row["sbrk"].'" required></td>';  
										  }else{ echo 'placeholder="hh:mm:ss"></td>';}
										  
										  echo '<td><input type="text" class="w-100 text-right" name="newebrk"';
                                          if(isset($row["ebrk"])){
                                            echo 'value="'.$row["ebrk"].'" required></td>';  
										  }else{ echo 'placeholder="hh:mm:ss"></td>';}
										  
										  echo '<td><input type="text" class="w-100 text-right" name="newewrk"';
										if(isset($row["ewrk"])){
                                            echo 'value="'.$row["ewrk"].'" required></td>';  
							  			  }else{ echo 'placeholder="hh:mm:ss"></td>';}
										echo '<td><input type="text" class="w-100 text-right" name="reason" placeholder="Reason" required></td>
                                          <td class="text-center">'.$btn.'</td>
                                          </tr></form>';
                                     
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