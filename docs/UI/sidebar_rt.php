				<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a href="#dashboards" data-toggle="collapse" class="sidebar-link  collapsed">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Attendance</span>
            </a>
						<ul id="dashboards" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="timerecord.php">Time Record</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="schedule.php">Schedule</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="holiday.php">Holiday Request</a></li>
						</ul>
					</li>
					<li class="sidebar-item active">
						<a href="#layouts" data-toggle="collapse" class="sidebar-link">
              <i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Teaching Materials</span>
            </a>
						<ul id="layouts" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="layouts-sidebar-sticky.html">Vocabulary</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="layouts-sidebar-collapsed.html">Grammar</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="layouts-boxed.html">Cebu Guide</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="./videos.php">Videos & Scripts</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="layouts-boxed.html">Japanese in classroom</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#forms" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Information</span>
            </a>
						<ul id="forms" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="profile.php">Profile</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="evaluation.php">Evaluation Data</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="students.php">Students</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="opinion.php">Opinion</a></li>
						</ul>
					</li>
				</ul>

				<div class="sidebar-bottom d-none d-lg-block">
					<div class="media">
						<img class="rounded-circle mr-3" src="<?php echo '../img/avatars/'.$avatar ; ?>" alt="<?php echo "$username"; ?>" width="40" height="40">
						<div class="media-body">
							<h5 class="mb-1"><?php echo $username;?></h5>
							<div>
								<i class="fas fa-circle text-success"></i> Online
							</div>
						</div>
					</div>
				</div>

			</div>
		</nav>