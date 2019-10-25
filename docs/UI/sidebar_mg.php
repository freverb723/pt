				<ul class="sidebar-nav">
					<li class="sidebar-item" active>
						<a href="#dashboards" data-toggle="collapse" class="sidebar-link  collapsed">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Attendance</span>
            </a>
						<ul id="dashboards" class="sidebar-dropdown list-unstyled active" data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="timerecord.php">Time Record</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="schedule.php">Schedule</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="holiday.php">Holiday Request</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="application.php">Applications</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#forms" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Information</span>
            </a>
						<ul id="forms" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="profile.php">Profile</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="teachers.php">Teachers</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="students.php">Students</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="opinion.php">Opinions</a></li>
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