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

                    <h1 class="h3 mb-3">Profile</h1>
                    <?php
                    require_once '../class/Emp.php';
                    $emp = new Emp;

                    $emp->PersonalInfo($id);
                    $myrow = $emp->PersonalInfo($id);
                    $email = $myrow["emp_email"];
                    $phone = $myrow["emp_phone"];
                    $birth = $myrow["emp_birth"];
                    $avatar = $myrow["emp_pic"];

                    $emp->StaffInfo();
                    $rows = $emp->StaffInfo();
                   
                    ?>
					<div class="row">
                    <div class="col-12 col-lg-6 d-flex flex-column">
							<div class="card">
										<div class="card-header">
											<h5 class="card-title mb-0">Personal info</h5>
										</div><!--card header-->
										<div class="card-body">
											<form action="../Action/empAction.php" method="post">
												<div class="row">
                                                    <div class="col-lg-6">
														<div class="form-group">
															<label for="emp_name">Name</label>
															<input type="text" name="name" class="form-control" value="<?php echo $username;?>">
                                                        </div>
                                                        <div class="form-group">
															<label for="emp_email">Email</label>
															<input type="email" name="email" class="form-control" value="<?php echo $email;?>">
                                                        </div>
													</div><!--col-lg-6-->
													<div class="col-lg-6">
                                                        <div class="form-group">
															<label for="emp_phone">Phone</label>
															<input type="tel" pattern="\d{3,4}-\d{3,4}-\d{3,4}" name="tel" maxlength="13" class="form-control" value="<?php echo $phone;?>">
                                                        </div>
                                                        <div class="form-group">
															<label for="emp_birth">Birthday</label>
															<input type="date" class="form-control" name="birth" value="<?php echo $birth;?>">
														</div>
													</div><!--col-lg-6-->
												</div><!--row-->
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
												<input type="submit" name="ChangeMyInfo" class="btn btn-primary" value="Save changes">
											</form>
                                    </div><!--card body-->
                                </div><!--card-->

                                <div class="card">
										<div class="card-body">
											<h5 class="card-title">Avatar</h5>

											<form action="../Action/empAction.php" method="post" enctype="multipart/form-data">
                                            <div class="text-center mb-2">
															<img alt="<?php echo $username; ?>" src="<?php echo '../img/avatars/'.$avatar; ?>" class="rounded-circle img-responsive mt-2" width="80" height="80" />
															<div class="mt-2">
																<input type="file" name="pic">
															</div>
															<small>For best results, use an image at least 80px by 80px in .jpg format</small>
                                                        </div><!--text-center-->
                                                    <input type="hidden" name="id" value="<?php echo $id; ?>">                                                     
												<button type="submit" name="ChangeMyAvatar" class="btn btn-primary">Save changes</button>
											</form>

										</div>
									</div>
								
                         
						    	<div class="card">
										<div class="card-body">
											<h5 class="card-title">Password</h5>

											<form action="../Action/empAction.php" method="post">
												<div class="form-group">
													<label for="inputPasswordCurrent">Current password</label>
													<input type="password" name="oldpass" class="form-control" id="inputPasswordCurrent">
													<small><a href="./reset.php">Forgot your password?</a></small>
												</div>
												<div class="form-group">
													<label for="inputPasswordNew">New password</label>
													<input type="password" name="newpass" class="form-control" id="inputPasswordNew">
                                                </div>
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
												<button type="submit" name="ChangeMyPass" class="btn btn-primary">Save changes</button>
											</form>

										</div>
									</div>
								</div>


                        <div class="col-12 col-lg-6 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h5 class="card-title">Staff profile</h5>
								</div>
								<table id="datatables-dashboard-markets" class="table table-striped table-hover">
									<thead>
										<tr>
											<th>Name</th>
											<th>Phone</th>
											<th>Birthday</th>
										</tr>
									</thead>
									<tbody>
                                    <?php
                                    foreach($rows as $row){
                                        $emp_names = $row["emp_name"];
                                        $emp_tels = $row["emp_phone"];
                                        $emp_pics = $row["emp_pic"];
                                        $emp_birthes = $row["emp_birth"];
										echo '<tr>
											<td>
												<img alt="'.$emp_names.'" src="../img/avatars/'.$emp_pics.'" width="48" height="48" class="rounded-circle mr-2">'.$emp_names.'
											</td>
											<td>'.$emp_tels.'</td>
											<td>'.date('m/d',strtotime($emp_birthes)).'</td>
										</tr>';
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
			$("#datatables-dashboard-markets").DataTable({
				pageLength: 15,
				lengthChange: false,
				bFilter: false,
				bPaginate: false,
				bInfo: false,
				autoWidth: false,
				order: [
					[2, "desc"]
				]
			});
		});
	</script>
</body>

</html>