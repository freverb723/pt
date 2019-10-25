<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">
	<title>AppStack - Admin &amp; Dashboard Template</title>
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

					<h1 class="h3 mb-3">Calendar</h1>

					<div class="card">
						<div class="card-header">
							<h5 class="card-title">FullCalendar</h5>
							<h6 class="card-subtitle text-muted">Open source JavaScript jQuery plugin for a full-sized, drag & drop event calendar.</h6>
						</div>
						<div class="card-body">
							<div id="fullcalendar"></div>
						</div>
					</div>

				</div>
			</main>

			<?php require 'footer.php'; ?>
		</div>
	</div>

	<script src="../js/app.js"></script>

	<script>
		$(function() {
			$("#fullcalendar").fullCalendar({
				header: {
					left: "prev,next today",
					center: "title",
					right: "month,agendaWeek,agendaDay,listMonth"
				},
				weekNumbers: true,
				eventLimit: true,
				editable: true,
				events: "https://fullcalendar.io/demo-events.json"
			});
		});
	</script>
</body>

</html>