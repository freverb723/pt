<?php session_start(); ?>
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

	<link href="css/classic.css" rel="stylesheet">

</head>
<body>
<style>
.bg-img {
background-position: right top;
background-repeat: no-repeat;
background-size: contain;
background-attachment: fixed;
}

</style>
<script>
	function showtime(){
	var today = new Date();
	$weekday = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
	month = today.getMonth() + 1 ;
	$('#datetime').html(month + "/"+ today.getDate() + "(" + $weekday[today.getDay()] +")<br>" +today.getHours() + ":" + ('0'+today.getMinutes()).slice(-2) + ":" + ('0' +today.getSeconds()).slice(-2));
	}
	setInterval(showtime,1000);
	</script>
	<nav class="navbar navbar-expand navbar-dark navbar-landing">
		<a class="navbar-brand" href="#">
      <i title="AppStack" data-feather="box"></i>
      Timerecord & Management
    </a>

		<ul class="navbar-nav ml-auto">
			<li class="nav-item active d-none d-md-inline-block">
				<a class="nav-link" href="./UI/signup.php">Sign up</a>
			</li>
		</ul>
		<a href="./UI/signin.php" class="btn btn-primary my-2 my-sm-0 ml-2">Sign In</a>
	</nav>

	<section class="landing-intro">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-11 col-lg-9 col-xl-12 mx-auto">
					<div class="row bg-img filter-img" style="background-image:url('./img/photos/bg.jpg');">
						<div class="col-xl-6 pl-4">
						    <div class="pt-5 text-white" id="datetime" style="font-size:60px"></div>
								<form action="./action/timeAction.php" method="post">
										<input type="text" class="form-control form-control-lg mb-2 w-50" name="empID" placeholder="Your ID" required>
										<input type="password" class="form-control form-control-lg mb-2 w-50" name="pass" placeholder="Password" required>
									<div class="mb-3">   
                                        <?php
										$message = "<span class='small'>Don't you have your ID?</span> <a href='./UI/signup.php' class='small'>Sign up</a><br>
										<a href='./UI/reset.php' class='small'>Forget password?</a><br>";
										if(isset($_SESSION["message"])){
											$message = '<span class="text-warning">'.$_SESSION["message"].'</span>';
											session_destroy();
										}
                                        echo $message;
                                        ?> 
								    </div>
								    <div class="row mb-3">
										<div class="col-lg-3 mb-2 text-center text-white"><button type="submit" class="btn btn-lg btn-block btn-warning p-3" name="swrk"><i class="align-middle fas fa-fw fa-sun"></i><br>Start Work</button></div>
										<div class="col-lg-3 mb-2 text-center text-white"><button type="submit" class="btn btn-lg btn-block btn-primary p-3" name="sbrk"><i class="align-middle fas fa-fw fa-coffee"></i><br>Start Break</button></div>
										<div class="col-lg-3 mb-2 text-center text-white"><button type="submit" class="btn btn-lg btn-block btn-danger p-3" name="ebrk"><i class="align-middle fas fa-fw fa-book-open"></i><br>End Break</button></div>
                                        <div class="col-lg-3 mb-2 text-center text-white"><button type="submit" class="btn btn-lg btn-block btn-secondary p-3" name="ewrk"><i class="align-middle fas fa-fw fa-moon"></i><br>Finish Work</button></div>
                                    </div>
								</form>	
                        </div>
					</div>
		    	</div>
		    </div>
		</div>
    </section>

	<script src="js/app.js"></script>

</body>

</html>