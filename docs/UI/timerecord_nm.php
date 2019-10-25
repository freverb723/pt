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
          <?php
          $period = new DatePeriod(
            new DateTime('first day of next month'),
              new DateInterval('P1D'),
              new DateTime('last day of next month +1 second')
         );
         $deadline = new DateTime('+7days');
         $today = new DateTime('today');
         $next_m = new DateTime('next month');
         $deadline_strt = strtotime($deadline->format('Y-m-d'));
         $today_strt =  strtotime($today->format('Y-m-d'));
          ?>
					<div class="row">
						<div class="col-12">
							<div class="card p-3 p-lg-4">
                            <div class="card-header pb-0"><h3 class="text-center"><a href="./timerecord.php"><i class="fas fa-angle-double-left pr-3"></i></a>
                            <?php echo $next_m->format('F Y');?>
                            <span class="text-white"><i class="fas fa-angle-double-right pl-3"></i></span></h3>
                            <p class="text-right"><span class="mr-3">ID : <?php echo sprintf('%03d', $id); ?></span>
                                Name : <?php echo $username; ?></p>
                            </div><!--card header-->
								<div class="card-body pt-0">
                                <table id="datatables-dashboard-traffic" class="table table-sm table-bordered table-striped my-0">
									<thead>
										<tr>
											<th class="text-right">Date</th>
											<th class="d-none d-xl-table-cell text-right">In</th>
											<th class="d-none d-xl-table-cell text-right">Out</th>
											<th class="d-none d-xl-table-cell text-right">In</th>
                      <th class="d-none d-xl-table-cell text-right">Out</th>
                      <th class="d-none d-xl-table-cell text-right">Work Time</th>
                      <th class="d-none d-xl-table-cell text-right">Break Time</th>
                      <th class="d-none d-xl-table-cell text-right"></th>
										</tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     require_once '../class/Emp.php';
                                     $emp = new Emp;
                                     
                                     foreach ($period as $day) {
                                        $date = $day->format('Y-m-d');
                                        $date_strt = strtotime($date);
                                        $emp->TimeRecord($id, $date);
                                        $row = $emp->TimeRecord($id, $date);
                                    
                                        if(isset($row["status"])){
                                            switch($row["status"]){//button setting until today
                                                case 'W':
                                                $btn = '<button class="btn btn-info btn-sm">Applied</button>';
                                                break;
                                                case 'A':
                                                $btn = '<button class="btn btn-primary btn-sm">Approval</button>';
                                                break;
                                                case 'H':
                                                $btn = '<button class="btn btn-primary btn-sm">Approval</button>';
                                                break;
                                                case 'I':
                                                if($today_strt >= $date_strt){
                                                  $btn = '<a class="btn page-link text-dark d-inline-block btn-sm" href="./modify_tr.php?date='.$day->format('Y-m-d').'"><i class="fas fa-angle-double-right"></i>Modify</a>';
                                                }else{$btn = '<button class="btn btn-danger btn-sm" disable>Rejected</button>';}
                                                break;
                                                case 'R':
                                                $btn = '<button class="btn btn-danger btn-sm">Rejected</button>';
                                                break;
                                                case '-':
                                                $btn = '<a class="btn page-link text-dark d-inline-block btn-sm" href="./modify_tr.php?date='.$day->format('Y-m-d').'"><i class="fas fa-angle-double-right"></i>Modify</a>';
                                                break;
                                            }
                                            }else{
                                                if($deadline_strt <= $date_strt){//一週間より先ならホリデーボタン作動
                                                    $btn = '<a class="btn page-link text-dark d-inline-block btn-sm" href="./holiday.php?date='.$day->format('Y-m-d').'"><i class="fas fa-angle-double-right"></i>Holiday</a>';
                                                }else if($deadline_strt > $date_strt && $today_strt < $date_strt){//一週間以内なら作動しない}
                                                    $btn = '<button class="btn page-link text-dark d-inline-block btn-sm" name="holiday" disabled><i class="fas fa-angle-double-right"></i>Holiday</button>';                                            
                                                }else{//過去でタイムレコードにデータがない(休暇日or打点忘れ))
                                                  $btn = '<a class="btn page-link text-dark d-inline-block btn-sm" href="./modify_tr.php?date='.$day->format('Y-m-d').'"><i class="fas fa-angle-double-right"></i>Modify</a>';
                                                }
                                            }
                                            if(isset($row["status"]) && $row["status"] == "H"){
                                              echo '<tr>';
                                              if(date('w', strtotime($day->format('Ymd'))) == 0){
                                                echo '<td class="text-right"><span class="text-danger">'.$day->format('m/d').'</span></td>';  
                                              }else if(date('w', strtotime($day->format('Ymd'))) == 6){
                                                echo '<td class="text-right"><span class="text-primary">'.$day->format('m/d').'</span></td>';  
                                              }else{ echo '<td class="text-right">'.$day->format('m/d').'</td>';}
                                              echo '<td colspan="6" class="d-none d-xl-table-cell text-center table-danger">HOLIDAY</td>
                                                    <td class="d-none d-xl-table-cell text-center">'.$btn.'</td></tr>';  
                                            }else{
                                              echo '<tr>';
                                              if(date('w', strtotime($day->format('Ymd'))) == 0){
                                                echo '<td class="text-right"><span class="text-danger">'.$day->format('m/d').'</span></td>';  
                                              }else if(date('w', strtotime($day->format('Ymd'))) == 6){
                                                echo '<td class="text-right"><span class="text-primary">'.$day->format('m/d').'</span></td>';  
                                              }else{ echo '<td class="text-right">'.$day->format('m/d').'</td>';}
                                              if(isset($row["swrk"])){
                                                echo '<td class="d-none d-xl-table-cell text-right">'.$row["swrk"].'</td>';  
                                              }else{ echo '<td class="d-none d-xl-table-cell text-right"></td>';}
                                              if(isset($row["sbrk"])){
                                                echo '<td class="d-none d-xl-table-cell text-right">'.$row["sbrk"].'</td>';  
                                              }else{ echo '<td class="d-none d-xl-table-cell text-right"></td>';}
                                              if(isset($row["ebrk"])){
                                                echo '<td class="d-none d-xl-table-cell text-right">'.$row["ebrk"].'</td>';  
                                              }else{ echo '<td class="d-none d-xl-table-cell text-right"></td>';}
                                              if(isset($row["ewrk"])){
                                                echo '<td class="d-none d-xl-table-cell text-right">'.$row["ewrk"].'</td>';  
                                              }else{ echo '<td class="d-none d-xl-table-cell text-right"></td>';}
                                              echo '<td class="d-none d-xl-table-cell text-right">'.$row["worktime"].'</td>
                                              <td class="d-none d-xl-table-cell text-right">'.$row["breaktime"].'</td>
                                              <td class="d-none d-xl-table-cell text-center">'.$btn.'</td>
                                          </tr>';
                                            }
                                    
                                         
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

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms of Service</a>
								</li>
							</ul>
						</div>
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
	<script>
		$(function() {
			$("pre code").each(function(i, block) {
				hljs.highlightBlock(block);
			});
		});
	</script>
</body>

</html>