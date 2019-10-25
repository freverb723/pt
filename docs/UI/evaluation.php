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
					<?php
					 require_once '../class/Eva.php';
					 $eva = new Eva;
 
					 $eva->DemoLessonP($id);
					 $prows = $eva->DemoLessonP($id);
					 $eva->DemoLessonI($id);
					 $irows = $eva->DemoLessonI($id);
					 $eva->DemoLessonA($id);
					 $arows = $eva->DemoLessonA($id);
					 $eva->StudentVoices($id);
					 $srows = $eva->StudentVoices($id);
					 $title = ['','Classroom Management','Fluency','Language Command','Presentation','Pronounciation','Relevance','Tequniques and Strategies','Vocabulary Usage'];
					 
					?>
					<div class="row">
						<div class="col-12 col-lg-7 col-xl-8 d-flex flex-column">
						    <div class="tab w-100">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" href="#primary" data-toggle="tab" role="tab">Primary</a></li>
									<li class="nav-item"><a class="nav-link" href="#intermediate" data-toggle="tab" role="tab">Intermediate</a></li>
									<li class="nav-item"><a class="nav-link" href="#advanced" data-toggle="tab" role="tab">Advanced</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane w-100 active" id="primary" role="tabpanel">
										<h4 class="tab-title">Demo Lesson</h4>
								        <table  id="datatables-basic1" class="table table-sm table-striped my-0 w-100">
									        <thead>
									    	<tr>
											<th class="w-50">items</th>
                                            <th class="w-50">points</th>
                                            <th class="none">pros</th>
                                            <th class="none">cons</th>
									    	</tr>
									        </thead>
									        <tbody>
									    	<?php
										    foreach($prows as $prow){
											$item = $prow["item"];
											$point = $prow["point"];
											$pro = $prow["pro"];
											$con = $prow["con"];
											$point_c = $point * 10;

											echo '<tr>
											<td>'.$title[$item].'</td>
											<td>
												<div class="progress">
													<div class="progress-bar bg-info" role="progressbar" style="width: '.$point_c.'%;" aria-valuenow="'.$point_c.'" aria-valuemin="0" aria-valuemax="100">'.$point.'</div>
												</div>
                                            </td>
                                            <td>'.$pro.'</td>
                                            <td>'.$con.'</td>
											</tr>';
											}
									     	?>
									        </tbody>
							        	</table>
							    	</div>
									
									<div class="tab-pane w-100" id="intermediate" role="tabpanel">
										<h4 class="tab-title">Demo Lesson</h4>
										<table id="datatables-basic2" class="table table-sm table-striped my-0 w-100">
								    	<thead>
										<tr>
											<th class="w-50">items</th>
                                            <th class="w-50">points</th>
                                            <th class="none">pros</th>
                                            <th class="none">cons</th>
										</tr>
								    	</thead>
							    		<tbody>	
                                        <?php
										foreach($irows as $irow){
											$item = $irow["item"];
											$point = $irow["point"];
											$pro = $irow["pro"];
											$con = $irow["con"];
											$point_c = $point * 10;

											echo '<tr>
											<td>'.$title[$item].'</td>
											<td>
												<div class="progress">
													<div class="progress-bar bg-info" role="progressbar" style="width: '.$point_c.'%;" aria-valuenow="'.$point_c.'" aria-valuemin="0" aria-valuemax="100">'.$point.'</div>
												</div>
                                            </td>
                                            <td>'.$pro.'</td>
                                            <td>'.$con.'</td>
											</tr>';
										}
										?>
										</tbody>
								        </table>

									</div>

									<div class="tab-pane w-100" id="advanced" role="tabpanel">
										
										<h4 class="tab-title">Demo Lesson</h4>
										<table  id="datatables-basic3" class="table table-sm table-striped my- w-100">
								    	<thead>
										<tr>
											<th class="w-50">items</th>
                                            <th class="w-50">points</th>
                                            <th class="none">pros</th>
                                            <th class="none">cons</th>
										</tr>
		    							</thead>
								    	<tbody>
                                        <?php
										foreach($arows as $arow){
											$item = $arow["item"];
											$point = $arow["point"];
											$pro = $arow["pro"];
											$con = $arow["con"];
											$point_c = $point * 10;

											echo '<tr>
											<td>'.$title[$item].'</td>
											<td>
												<div class="progress">
													<div class="progress-bar bg-info" role="progressbar" style="width: '.$point_c.'%;" aria-valuenow="'.$point_c.'" aria-valuemin="0" aria-valuemax="100">'.$point.'</div>
												</div>
                                            </td>
                                            <td>'.$pro.'</td>
                                            <td>'.$con.'</td>
											</tr>';
										}
										?>
                                     	</tbody>
								        </table>
									</div>

								</div>
						    </div>

						
						
							<div class="card flex-fill">
								<div class="card-header">
									<h5 class="card-title mb-0">Evaluation Score from Students</h5>
								</div>
								<div class="card-body">
									<div class="chart">
										<canvas id="chartjs-radar"></canvas>
									</div>
								</div><!--card-body-->
							</div><!--card flex-fill-->
					
							<div class="card flex-fill">
								<div class="card-header">
									<h5 class="card-title mb-0">TOEIC MOCK TEST</h5>
								</div><!--card-header-->
								<table id="toeic_table" class="table table-striped my-0">
									<thead>
										<tr>
                                            <th>Name</th>
											<th class="d-none d-xl-table-cell text-right">L Score</th>
											<th class="d-none d-xl-table-cell text-right">R Score</th>
											<th class="d-none d-xl-table-cell text-right">Total Score</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Area</td>
											<td class="text-right text-danger">425↓</td>
											<td class="d-none d-xl-table-cell text-right text-success">450↑</td>
											<td class="d-none d-xl-table-cell text-right text-success">875↑</td>
										</tr>
										<tr>
											<td>Any</td>
											<td class="text-right text-success">480↑</td>
											<td class="d-none d-xl-table-cell text-right">420→</td>
											<td class="d-none d-xl-table-cell text-right text-success">900↑</td>
										</tr>
										<tr>
											<td>Leo</td>
											<td class="text-right text-danger">455↓</td>
											<td class="d-none d-xl-table-cell text-right text-success">460↑</td>
											<td class="d-none d-xl-table-cell text-right text-success">915↑</td>
										</tr>
									</tbody>
								</table>
							</div><!--card flex-fill-->
						</div><!--col-12-->

						<div class="col-12 col-lg-5 col-xl-4 d-flex">
							<div class="card flex-fill p-3">
							<h5 class="card-title my-3">From Students</h5>
							<table class="table table-hover">
									<tbody>
                                    <?php
                                    foreach($srows as $row){
                                        $stud_name = $row["stud_name"];
                                        $stud_comm = $row["comment"];
										echo '<tr class="my-1">
											<td class="p-2">'.$stud_comm.'
											<p class="text-right">'.$stud_name.'</p></td></tr>';
									}	
						            ?>
									</tbody>
								</table>
							</div>
						</div>

					</div><!--row-->

				</div><!--container-fluid p-0-->
			</main>
			<?php require 'footer.php'; ?>
		</div>
	</div>

	<script src="../js/app.js"></script>

	<script>
		$(function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar-devices"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Mobile",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79]
					}, {
						label: "Desktop",
						backgroundColor: "#E8EAED",
						borderColor: "#E8EAED",
						hoverBackgroundColor: "#E8EAED",
						hoverBorderColor: "#E8EAED",
						data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							barPercentage: .75,
							categoryPercentage: .5,
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	
    <script>
		$(function() {
			// Radar chart
			new Chart(document.getElementById("chartjs-radar"), {
				type: "radar",
				data: {
                    labels: ["Punctuality", "S7:T3", "Attitude", "Preparation", "Teaching Skill"],
					datasets: [{
						label: "you",
						backgroundColor: "rgba(0, 123, 255, 0.2)",
						borderColor: window.theme.primary,
						pointBackgroundColor: window.theme.primary,
						pointBorderColor: "#fff",
						pointHoverBackgroundColor: "#fff",
						pointHoverBorderColor: window.theme.primary,
						data: [95, 92, 75, 89, 93]
					}, {
						label: "ave",
						backgroundColor: "rgba(200, 200, 200, 0.2)",
						borderColor: window.theme.muted,
						pointBackgroundColor: window.theme.muted,
						pointBorderColor: "#fff",
						pointHoverBackgroundColor: "#fff",
						pointHoverBorderColor: window.theme.muted,
						data: [79, 80, 95, 85, 84]
					}]
				},
				options: {
                    maintainAspectRatio: false,
                    scale:{
                        ticks: {
                            min: 50,
                            max: 100,
                            stepSize: 10
                        }
                    }
                }
			});
		});
	</script>
	
    <script>
		$(function() {
			// Datatables basic
			$("#datatables-basic1").DataTable({
                responsive: true,
                lengthChange: false,
                searching: false,
                info: false,
                paging: false
            });
			$("#datatables-basic2").DataTable({
                responsive: true,
                lengthChange: false,
                searching: false,
                info: false,
                paging: false
            });
			$("#datatables-basic3").DataTable({
                responsive: true,
                lengthChange: false,
                searching: false,
                info: false,
                paging: false
            });
            $("#toeic_table").DataTable({
                responsive: false,
                lengthChange: false,
                searching: false,
                info: false,
                paging: false
			});
		});
    </script>
    

</body>
</html>