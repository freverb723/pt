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

					<h1 class="h3 mb-3">Students
					</h1>

					<div class="row">
						<div class="col-12">
							<div class="card p-3 p-lg-4">
                                    <div class="card-header pb-0">
                                        <h3>Students</h3>
                                    </div><!--card header-->
								    <div class="card-body pt-0">
								    <table id="datatables-dashboard-traffic2" class="table table-sm table-bordered table-striped my-0">
							    	<thead>
										<tr>
											<th class="d-none d-xl-table-cell text-right" width="25%">Name(ID)</th>
											<th class="d-none d-xl-table-cell text-right" width="10%">first day</th>
											<th class="d-none d-xl-table-cell text-right" width="10%">last day</th>
                                            <th class="d-none d-xl-table-cell text-right" width="15%">B'day (age)</th>
                                            <th class="d-none d-xl-table-cell text-right" width="10%">Course</th>
											<th class="d-none d-xl-table-cell text-right" width="5%">v Lv.</th>
											<th class="d-none d-xl-table-cell text-right" width="5%">g Lv.</th>
                                            <th class="d-none d-xl-table-cell text-right" width="15%">Details</th>
										</tr>
                                    </thead>
									<tbody>
									<?php 
									 require '../Class/Stud.php';
									 $stud = new Stud;
									 $today = date('Y-m-d');
                                     $stud->StudentsInfo($today);
                                     $rows = $stud->StudentsInfo($today);

									 foreach ($rows as $row) {
										 $sid = $row["stud_id"];
										 $sname = $row["stud_name"];
										 $fday = $row["start_date"];
										 $lday = $row["end_date"];
										 switch($row["stud_gender"]){
											 case 'F':
											 $gender = 'Ms.';
											 break;
											 case 'M':
											 $gender = "Mr.";
											 break;
										 }
										 $stud_bday = date('Y/m/d', strtotime($row["stud_birth"]));
										 $birthday = date('Ymd', strtotime($row["stud_birth"]));
										 $age = floor((date('Ymd')-$birthday)/10000);

                                         echo '<tr>
                                         <td class="text-right">'.$gender.' '.$sname.'<br>( ID: '.sprintf('%03d', $sid).')</td>
										 <td class="text-right">'.date('Y/m/d', strtotime($fday)).'</td>
										 <td class="text-right">'.date('Y/m/d', strtotime($lday)).'</td>
										 <td class="text-right">'.$stud_bday.' ('.$age.')</td>
										 <td class="text-right">'.$row["stud_course"].'</td>
										 <td class="text-right">'.$row["stud_v"].'</td>
										 <td class="text-right">'.$row["stud_g"].'</td>
                                         <td class="text-center"><a class="btn page-link text-dark d-inline-block btn-sm" href="./student_detail.php?id='.$sid.'"><i class="fas fa-angle-double-right"></i>Detail</a></td>
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
		
            $("#datatables-dashboard-traffic2").DataTable({
				pageLength: 8,
				lengthChange: false,
				bFilter: false,
				autoWidth: false,
                ordering: false,
                searching: true
			});
		});
	</script>

</html>