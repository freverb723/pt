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

					<h1 class="h3 mb-3">Application
					</h1>

					<div class="row">
						<div class="col-12">
							<div class="card p-3 p-lg-4">
                            <div class="card-header pb-0">
                                <h3>Timerecord Modification</h3>
                            </div><!--card header-->
								<div class="card-body pt-0">
								    <table id="datatables-dashboard-traffic1" class="table table-sm table-bordered table-striped my-0">
							    	<thead>
										<tr>
											<th class="text-right" width="10%">Date</th>
											<th class="d-none d-xl-table-cell text-right" width="12%">In</th>
											<th class="d-none d-xl-table-cell text-right" width="12%">Out</th>
											<th class="d-none d-xl-table-cell text-right" width="12%">In</th>
                                            <th class="d-none d-xl-table-cell text-right" width="12%">Out</th>
                                            <th class="d-none d-xl-table-cell text-right" width="20%">Reason</th>
                                            <th class="d-none d-xl-table-cell text-right" width="10%">Status</th>
                                            <th class="d-none d-xl-table-cell text-right" width="12%"></th>
										</tr>
                                    </thead>
									<tbody>
									<?php 
									require_once '../class/Emp.php';
									$emp = new Emp;
				
									$emp->Application();
									$rows = $emp->Application();
									 
									 foreach ($rows as $row) {
										 $sentday = $row["sentday"];
										 $emp_id = $row["emp_id"];
										 $date = $row["date"];
										 $swrk = $row["swrk"];
										 $nswrk = $row["nswrk"];
										 $sbrk = $row["sbrk"];
										 $nsbrk = $row["nsbrk"];
										 $ebrk = $row["ebrk"];
										 $nebrk = $row["nebrk"];
										 $ewrk = $row["ewrk"];
										 $newrk = $row["newrk"];
										 $reason = $row["reason"];
                                         $status = $row["status"];
                                        
										 
										 switch($status){
											case 'W':
                                            $btn = '<select name="status">
                                                    <option value="A">Approve</option>
                                                    <option value="R">Reject</option>
                                                    </select>';
											break;
											case 'A':
											$btn = '<button class="btn btn-primary btn-sm" disable>Approval</button>';
											break;
											case 'H':
											$btn = '<button class="btn btn-primary btn-sm" disable>Approval</button>';
											break;
											case 'I':
											$btn = '<button class="btn btn-danger btn-sm" disable>Rejected</button>';
											break;
											case 'R':
											$btn = '<button class="btn btn-danger btn-sm" disable>Rejected</button>';
											break;
                                         }
                                         
										
                                        
										 echo '<tr>
										 <td class="text-right"><form action="../Action/empAction.php" method="post">'.date('Y/m/d', strtotime($date)).'</td>
										 <td class="text-right">'.$swrk;
										 if($status =='W'){
											echo '<br><input class="text-right w-100" type="text" name="nswrk" value="'.$nswrk.'">';
										 }else{}
										 echo '</td><td class="text-right">'.$sbrk;
										 if($status =='W'){
                                             echo '<br><input class="text-right w-100" type="text" name="nsbrk" value="'.$nsbrk.'">';
										}else{}
										echo '</td><td class="text-right">'.$ebrk;
										if($status =='W'){
											echo '<br><input class="text-right w-100" type="text" name="nebrk" value="'.$nebrk.'">';
									    }else{}
										echo '</td><td class="text-right">'.$ewrk;
										if($status =='W'){
											echo '<br><input class="text-right w-100" type="text" name="newrk" value="'.$newrk.'">';
										}else{} 
										if(isset($row["signedby"])){
											$signedby = 'signed by<br>'.$row["signedby"];
											}else if($row["emp_id"] == $id){
												$signedby = "Can't set own request";
												$btn ='<button class="btn btn-info btn-sm" disable>Applied</button>';
											}else{
												$signedby = '<input type="submit" class="btn btn-primary btn-sm" name="appSend" value="Send">';
												} 
											echo '</td>
                                         <td class="text-right">'.$reason.'</td>
                                         <td class="text-center">'.$btn.'</td>
										 <td class="text-center">'.$signedby.'</td>
										 <input type="hidden" name="signedid" value="'.$id.'">
                                         <input type="hidden" name="appid" value="'.$row["app_ID"].'">
                                         <input type="hidden" name="timeid" value="'.$row["timeid"].'"></form></tr>';
                                     }
                                     
                                    ?>
									</tbody>
                                    </table>
                                </div><!--card-body-->
                                <div class="card-header pb-0">
                                    <h3>Holiday Requests</h3>
                                </div><!--card header2-->
                                <div class="card-body pt-0">
								
								    <table id="datatables-dashboard-traffic2" class="table table-sm table-bordered table-striped my-0">
							    	<thead>
										<tr>
                                            <th class="d-none d-xl-table-cell text-right" width="10%">Date</th>
											<th class="text-right" width="16%">Name</th>
											<th class="d-none d-xl-table-cell text-right" width="42%">Reason</th>
											<th class="d-none d-xl-table-cell text-right" width="10%">Swap</th>
                                            <th class="d-none d-xl-table-cell text-right" width="10%">Status</th>
                                            <th class="d-none d-xl-table-cell text-right" width="12%"></th>
										</tr>
                                    </thead>
									<tbody>
                                    
									<?php 
									require_once '../class/Emp.php';
									$emp = new Emp;
				
									$emp->ShowHolidayRequest();
									$rows = $emp->ShowHolidayRequest();
									 
									 foreach ($rows as $row) {
                                         $emp_id = $row["emp_id"];
										 $emp_name =  $row["emp_name"];
										 $date = $row["targetdate"];
										 $reason = $row["reason"];
										 $swapdate = $row["swapdate"];
										 $status = $row["status"];
										 $signedby = $row["signedby"];
										 
                                         switch($status){
											case 'W':
                                            $btn = '<select name="status">
                                                    <option value="A">Approve</option>
                                                    <option value="R">Reject</option>
                                                    </select>';
											break;
											case 'A':
											$btn = '<button class="btn btn-primary btn-sm" disable>Approval</button>';
											break;
											case 'H':
											$btn = '<button class="btn btn-primary btn-sm" disable>Approval</button>';
											break;
											case 'I':
											$btn = '<button class="btn btn-danger btn-sm" disable>Rejected</button>';
											break;
											case 'R':
											$btn = '<button class="btn btn-danger btn-sm" disable>Rejected</button>';
											break;
                                         }
                                         
                                         if(isset($row["signedby"])){
                                            $signedby = 'signed by<br>'.$row["signedby"];
                                            }else if($row["emp_id"] == $id){
                                                $signedby = "Can't set own request";
                                                $btn ='<button class="btn btn-info btn-sm" disable>Applied</button>';
                                            }else{
                                            $signedby = '<button type="submit" class="btn btn-primary btn-sm" name="hldSend">Send</button>';
                                            } 
										
                                        
										 echo '<tr>
                                         <td class="text-right"><form action="../Action/empAction.php" method="post">'.date('Y/m/d', strtotime($date)).'</td>
                                         <td class="text-right">'.$emp_name.'</td>
                                         <td class="text-right">'.$reason.'</td>
                                         <td class="text-right">'.date('Y/m/d', strtotime($swapdate)).'</td>
                                         <td class="text-center">'.$btn.'</td>
										 <td class="text-center">'.$signedby.'
										 <input type="hidden" name="signedid" value="'.$id.'">
                                         <input type="hidden" name="appid" value="'.$row["app_ID"].'">
                                         <input type="hidden" name="timeid" value="'.$row["timeid"].'"></form></td>
										 </tr>';
									
									 }
                                    ?>
                                    </form>
									</tbody>
                                    </table>
                                </div><!--card-body2-->
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
                ordering: false
			});
            $("#datatables-dashboard-traffic2").DataTable({
				pageLength: 5,
				lengthChange: false,
				bFilter: false,
				autoWidth: false,
                ordering: false
			});
		});
	</script>

</html>