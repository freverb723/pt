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

					<h1 class="h3 mb-3">Opinion</h1>

					<div class="row">


						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
								</div>
								<div class="card-body">
									<form action="../Action/empAction.php" method="post">
										<div class="form-group">
											<label for="subject">Subject</label>
											<input type="text" name="subject" class="form-control w-50">
										</div>
										<div class="form-group">
											<label for="content">Body</label>
											<textarea name="content" class="form-control" placeholder="Please share any ideas or concerns you have. This message is sent anonymously unless you declare your name on it." rows="3"></textarea>
										</div>
										<button type="submit" name="opinion" class="btn btn-primary">Submit</button>
									</form>
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

</body>

</html>