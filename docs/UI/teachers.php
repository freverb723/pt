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

					<h1 class="h3 mb-3">Staff
					</h1>

					<div class="row">
						<div class="col-12">
							<div class="card p-3 p-lg-4">
                            <div class="card-header pb-0">
                                <h3>Managers</h3>
                            </div><!--card header-->
								<div class="card-body pt-0">
                                <table id="datatables-dashboard-traffic1" class="table table-sm table-bordered table-striped my-0">
							    	<thead>
										<tr>
											<th class="text-center" width="8%">pic</th>
                                            <th class="d-none d-xl-table-cell text-right" width="17%">Name(ID)</th>
											<th class="d-none d-xl-table-cell text-right" width="20%">email</th>
                                            <th class="d-none d-xl-table-cell text-right" width="17%">phone</th>
                                            <th class="d-none d-xl-table-cell text-right" width="8%">birthday</th>
                                            <th class="d-none d-xl-table-cell text-right" width="10%">Details</th>
										</tr>
                                    </thead>
									<tbody>
									<?php 
									require_once '../class/Emp.php';
									$emp = new Emp;
				
									$emp->ManagersInfo();
									$rows = $emp->ManagersInfo();

									 foreach ($rows as $row) {
										 $eid = $row["eid"];
										 $empname = $row["emp_name"];
										 $empemail = $row["emp_email"];
                                         $empphone = $row["emp_phone"];
                                         if(is_null($empphone)){
                                            $empphone = '-';
                                        }
                                         $empbirth = $row["emp_birth"];
                                         if(is_null($empbirth)){
                                             $empbirth = '-';
                                         }else{
                                             $empbirth = date('m/d', strtotime($empbirth));
                                         }
										 $emppic = $row["emp_pic"];
                                         
                                         
                                        
                                         echo '<tr>
                                         <td class="text-center"><img src="../img/avatars/'.$emppic.'" class="avatar img-fluid rounded-circle mr-1" alt="'.$empname.'" /></td>                                  
                                         <td class="text-right">'.$empname.'( ID: '.sprintf('%03d', $eid).')<br>'.$status.'</td>
										 <td class="text-right">'.$empemail.'</td>
										 <td class="text-right">'.$empphone.'</td>
										 <td class="text-right">'.$empbirth.'</td>
                                         <td class="text-center"><form action="../Action/empAction.php" method="post"><a class="btn page-link text-dark d-inline-block btn-sm" href="./teacher_detail.php?id='.$eid.'"><i class="fas fa-angle-double-right"></i>Detail</a></form></td>
										 </tr>';
                                     }
                                     
                                    ?>
									</tbody>
                                    </table>
                                    </div>

                                    <div class="card-header pb-0">
                                        <h3>Teachers</h3>
                                    </div><!--card header-->
								    <div class="card-body pt-0">
								    <table id="datatables-dashboard-traffic2" class="table table-sm table-bordered table-striped my-0">
							    	<thead>
										<tr>
											<th class="text-center" width="8%">pic</th>
                                            <th class="d-none d-xl-table-cell text-right" width="17%">Name(ID)</th>
											<th class="d-none d-xl-table-cell text-right" width="20%">email</th>
                                            <th class="d-none d-xl-table-cell text-right" width="17%">phone</th>
                                            <th class="d-none d-xl-table-cell text-right" width="8%">birthday</th>
                                            <th class="d-none d-xl-table-cell text-right" width="10%">Demo</th>
                                            <th class="d-none d-xl-table-cell text-right" width="10%">Student</th>
                                            <th class="d-none d-xl-table-cell text-right" width="10%">Details</th>
										</tr>
                                    </thead>
									<tbody>
                                    <?php 			
                                     $emp->TeachersInfo();
                                     $rows = $emp->TeachersInfo();

									 foreach ($rows as $row) {
										 $eid = $row["eid"];
										 $empname = $row["emp_name"];
										 $empemail = $row["emp_email"];
                                         $empphone = $row["emp_phone"];
                                         if(is_null($empphone)){
                                            $empphone = '-';
                                        }
                                         $empbirth = $row["emp_birth"];
                                         if(is_null($empbirth)){
                                             $empbirth = '-';
                                         }else{
                                             $empbirth = date('m/d', strtotime($empbirth));
                                         }
										 $emppic = $row["emp_pic"];
										 $status = $row["emp_status"];
                                         $license = $row["license"];
                                         if($license == '0'){
                                             $license ='-';
                                         }else{
                                             $license = '○';
                                         }
                                         $demo1 = $row["demo_lesson1"];
                                         if(is_null($demo1)){
                                            $demo1 ='-';
                                        }else{
                                            $demo1 = number_format($demo1,1);
                                        }
                                         $demo2 = $row["demo_lesson2"];
                                         if(is_null($demo2)){
                                            $demo2 ='-';
                                        }else{
                                            $demo2 = number_format($demo2,1);
                                        }
                                         $demo3 = $row["demo_lesson3"];
                                         if(is_null($demo3)){
                                            $demo3 ='-';
                                        }else{
                                            $demo3 = number_format($demo3,1);
                                        }
                                         $stud = $row["stud_evaluation"];
                                         if(is_null($stud)){
                                            $stud ='-';
                                        }
                                        
                                         echo '<tr>
                                         <td class="text-center"><img src="../img/avatars/'.$emppic.'" class="avatar img-fluid rounded-circle mr-1" alt="'.$empname.'" /></td>                                  
                                         <td class="text-right">'.$empname.'( ID: '.sprintf('%03d', $eid).')<br>'.$status.'</td>
										 <td class="text-right">'.$empemail.'</td>
										 <td class="text-right">'.$empphone.'</td>
										 <td class="text-right">'.$empbirth.'</td>
                                         <td class="text-right">'.$demo1.', '.$demo2.', '.$demo3.'</td>
                                         <td class="text-right">'.$stud.'</td>
                                         <td class="text-center"><form action="../Action/empAction.php" method="post"><a class="btn page-link text-dark d-inline-block btn-sm" href="./teacher_detail.php?id='.$eid.'"><i class="fas fa-angle-double-right"></i>Detail</a></form></td>
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
    
</body>
<script>
		$(function() {
			$("#datatables-dashboard-traffic1").DataTable({
                pageLength: 5,
				lengthChange: false,
				bFilter: false,
				autoWidth: false,
                ordering: false,
                paging: false,
                searching: false,
                info: false
			});
            $("#datatables-dashboard-traffic2").DataTable({
				pageLength: 5,
				lengthChange: false,
				bFilter: false,
				autoWidth: false,
                ordering: true,
                searching: true
			});
		});
	</script>

</html>