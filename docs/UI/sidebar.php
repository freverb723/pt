<?php
session_start();
$username = $_SESSION['idn']["emp_name"];
$id = $_SESSION['idn']["emp_id"];
$avatar = $_SESSION['idn']["emp_pic"];
$status = $_SESSION['idn']["emp_status"];
?>
<nav id="sidebar" class="sidebar">
			<div class="sidebar-content ">
				<a class="sidebar-brand" href="index.php">
          <i class="align-middle" data-feather="box"></i>
          <span class="align-middle">Timerecord &amp; Management</span>
        </a>

		<?php
		switch($status){
			case 'RT':
			require 'sidebar_rt.php';
			break;
			case 'PB':
			require 'sidebar_rt.php';
			break;
			case 'MT':
			require 'sidebar_mt.php';
			break;
			case 'MG':
			require 'sidebar_mg.php';
			break;
			case 'SM':
			require 'sidebar_mg.php';
			break;
		}
		?>