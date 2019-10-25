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

					<h1 class="h3 mb-3">Student
					</h1>

					<div class="row">
						<div class="col-12">
							<div class="card p-3 p-lg-4">
                                    <div class="card-header pb-0">
                                        <h3>Student Data</h3>
                                    </div><!--card header-->
								    <div class="card-body pt-0">
                                    <form action="../action/studAction.php" method="post">
								    <table id="datatables-dashboard-traffic2" class="table table-sm table-bordered table-striped my-0">
							    	<thead>
										<tr>
											<th class="d-none d-xl-table-cell text-right">Name(ID)</th>
											<th class="d-none d-xl-table-cell text-right">first day</th>
                                            <th class="d-none d-xl-table-cell text-right">last day</th>
                                            <th class="d-none d-xl-table-cell text-right">B'day</th>
										</tr>
                                    </thead>
									<tbody>
                                    <?php 
                                     $row = array();
                                     $sid = $_GET["id"];
                                     require '../Class/Stud.php';
									 $stud = new Stud;
                                     $stud->StudentInfo($sid);
                                     $row = $stud->StudentInfo($sid);
                                     
									 $sname = $row["stud_name"];
									 $fday = $row["start_date"];
                                     $lday = $row["end_date"];
                                     $address = $row["address"];
                                     $email = $row["stud_email"];
                                     $course = $row["stud_course"];
                                     $birth = $row["stud_birth"];
                                     $v = $row["stud_v"];
                                     $g = $row["stud_g"];
                                     $note = $row["note"];
									 switch($row["stud_gender"]){
										case 'F':
                                        $gender = 'Ms.';
                                        $selectF = 'selected';
                                        $selectM = '';
										break;
										case 'M':
                                        $gender = "Mr.";
                                        $selectF = '';
                                        $selectM = 'selected';
									    break;
										}
										$stud_bday = date('Y/m/d', strtotime($row["stud_birth"]));

                                        if($status =='RT' || $status =='PB'){
                                         echo '<tr>
                                         <td class="text-right"><input type="hidden" name="sid" value="'.$sid.'">'.$gender.' '.$sname.'<br>( ID: '.sprintf('%03d', $sid).')</td>
										 <td class="text-right">'.$fday.'</td>
                                         <td class="text-right">'.$lday.'</td>
										 <td class="text-right">'.$birth.'</td>
                                         </tr></tbody></table><br>';

                                         echo '<table id="datatables-dashboard-traffic3" class="table table-sm table-bordered table-striped my-0">
                                         <thead><tr><th class="d-none d-xl-table-cell text-right" width="20%">Course</th><th class="d-none d-xl-table-cell text-right" width="50%">Address</th><th class="d-none d-xl-table-cell text-right" width="30%">Email</th></tr></thead>';
                                         echo '<tbody><tr><td class="text-right">'.$course.'</td><td class="text-right">'.$address.'</td><td class="text-right">'.$email.'</td></tr></tbody></table><br>';
                                         
                                         echo '<table id="datatables-dashboard-traffic4" class="table table-sm table-bordered table-striped my-0">
                                         <thead><tr>
                                         <th class="d-none d-xl-table-cell text-right" width="15%">v Lv.(1-6)</th>
                                         <th class="d-none d-xl-table-cell text-right" width="15%">g Lv.(1-6)</th>
                                         <th class="d-none d-xl-table-cell text-right" width="50%">note</th>
                                         <th class="d-none d-xl-table-cell text-right" width="20%"></th></tr></thead>';

                                         echo '<tbody><tr><td class="text-right"><input class="text-right" type="text" name="stud_v" value="'.$v.'"></td>
                                         <td class="text-right"><input class="text-right" type="text" name="stud_g" value="'.$g.'"></td>
                                         <td class="text-right"><input class="text-right w-100" type="text" name="note" value="'.$note.'"></td>
                                         <td class="text-center"><input type="submit" name="ChangeStud_t" class="btn btn-primary btn-sm" value="Change"></td></tr>';
                                        }else{
                                         echo '<tr>
                                         <td class="text-right"><input type="hidden" name="sid" value="'.$sid.'"><select name="gender"><option value="M" '.$selectF.$selectM.'>Mr. </option><option value="F" '.$selectF.$selectM.'>Ms. </option></select><input class="text-right" type="text" name="stud_name" value="'.$sname.'"><br>( ID: '.sprintf('%03d', $sid).')</td>
										 <td class="text-right"><input class="text-right" type="date" name="start_day" value="'.$fday.'"></td>
                                         <td class="text-right"><input class="text-right" type="date" name="end_day" value="'.$lday.'"></td>
										 <td class="text-right"><input class="text-right" type="date" name="stud_bday" value="'.$birth.'"></td>
                                         </tr></tbody></table><br>';

                                         echo '<table id="datatables-dashboard-traffic3" class="table table-sm table-bordered table-striped my-0">
                                         <thead><tr><th class="d-none d-xl-table-cell text-right" width="20%">Course</th><th class="d-none d-xl-table-cell text-right" width="50%">Address</th><th class="d-none d-xl-table-cell text-right" width="30%">Email</th></tr></thead>';
                                         echo '<tbody><tr><td class="text-right"><input class="text-right" type="text" name="course" value="'.$course.'"></td><td class="text-right"><input class="text-right w-100" type="text" name="address" value="'.$address.'"></td><td class="text-right"><input class="text-right w-100" type="text" name="email" value="'.$row["stud_email"].'"></td></tr></tbody></table><br>';
                                         
                                         echo '<table id="datatables-dashboard-traffic4" class="table table-sm table-bordered table-striped my-0">
                                         <thead><tr>
                                         <th class="d-none d-xl-table-cell text-right" width="15%">v Lv.(1-6)</th>
                                         <th class="d-none d-xl-table-cell text-right" width="15%">g Lv.(1-6)</th>
                                         <th class="d-none d-xl-table-cell text-right" width="50%">note</th>
                                         <th class="d-none d-xl-table-cell text-right" width="20%"></th></tr></thead>';

                                         echo '<tbody><tr><td class="text-right"><input class="text-right" type="number" name="stud_v" value="'.$v.'"></td>
                                         <td class="text-right"><input class="text-right" type="number" name="stud_g" value="'.$g.'"></td>
                                         <td class="text-right"><input class="text-right w-100" type="text" name="note" value="'.$note.'"></td>
                                         <td class="text-center"><input type="submit" name="ChangeStud_m" class="btn btn-primary btn-sm" value="Change"></td></tr>';
                                        }

                                    ?>
									</tbody>
                                    </table>
                                    </form>
                                </div><!--card-body-->
                            </div><!--card p-3 p-lg-4-->
                          </div><!--col-12-->
                        </div><!--row-->



				</div><!--container-fluid p-0-->
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-right">
							<p class="mb-0">
								&copy; 2019 - <a href="index.html" class="text-muted">AppStack</a>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="../js/app.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    
</body>
<script>
		$(function() {
            $("#datatables-dashboard-traffic2").DataTable({
				lengthChange: false,
				bFilter: false,
				autoWidth: false,
                ordering: false,
                searching: false,
                paging: false,
                info: false
			});
            $("#datatables-dashboard-traffic3").DataTable({
				lengthChange: false,
				bFilter: false,
				autoWidth: false,
                ordering: false,
                searching: false,
                paging: false,
                info: false
			});
            $("#datatables-dashboard-traffic4").DataTable({
				lengthChange: false,
				bFilter: false,
				autoWidth: false,
                ordering: false,
                searching: false,
                paging: false,
                info: false
			});
		});
	</script>

</html>