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
    <style>
    .movie-wrap {
     position: relative;
     padding-bottom: 56.25%;
     height: 0;
     overflow: hidden;
    }
 
    .movie-wrap iframe {
     position: absolute;
     top: 0;
     left: 0;
     width: 100%;
     height: 100%;
    }
        </style>
</head>

<body>
	<div class="wrapper">
		<?php require 'sidebar.php'; ?>
		<div class="main">
        <?php require 'header.php'; ?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Videos</h1>

					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
								</div>
								<div class="card-body movie-wrap m-3">
                                <iframe class="w-100" src="https://www.youtube.com/embed/LRLiXtvP12o" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
							</div>
						</div>

						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
								</div>
								<div class="card-body movie-wrap m-3">
								<iframe class="w-100" src="https://www.youtube.com/embed/pKoH9GkEKxQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
							</div>
                        </div>
                        
                        <div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
								</div>
								<div class="card-body movie-wrap m-3">
                                <iframe class="w-100" src="https://www.youtube.com/embed/qekYxar3cO0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
							</div>
						</div>

						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
								</div>
								<div class="card-body movie-wrap m-3">
								<iframe src="https://www.youtube.com/embed/A3QVsz5H-q4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
							</div>
						</div>

                        <div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
								</div>
								<div class="card-body movie-wrap m-3">
                                <iframe src="https://www.youtube.com/embed/AfYHrMNLE94" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
							</div>
                        </div>
                        
                        <div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
								</div>
								<div class="card-body movie-wrap m-3">
                                <iframe src="https://www.youtube.com/embed/5jvTrfiVuRM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
							</div>
						</div>
                    
                        
					</div>
				</div>
			</main>
			<?php require 'footer.php'; ?>
		</div>
	</div>

	<script src="js/app.js"></script>

</body>

</html>