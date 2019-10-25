			<nav class="navbar navbar-expand navbar-light bg-white">
				<a class="sidebar-toggle d-flex mr-2">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav ml-auto">
						
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                <img src="<?php echo '../img/avatars/'.$avatar ; ?>" class="avatar img-fluid rounded-circle mr-1" alt="Chris Wood" /> <span class="text-dark"><?php echo $username; ?></span>
              </a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="profile.php"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="evaluation.php"><i class="align-middle mr-1" data-feather="pie-chart"></i> Evaluation</a>
								<a class="dropdown-item" href="opinion.php"><i class="align-middle mr-1" data-feather="message-circle"></i>Opinion</a>
								<a class="dropdown-item" href="signout.php"><i class="align-middle mr-1" data-feather="log-out"></i>Sign out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>