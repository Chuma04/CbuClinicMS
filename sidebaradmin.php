<!-- main-sidebar opened -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="main-sidebar app-sidebar sidebar-scroll">
			<div class="main-sidebar-header">
				<a class="desktop-logo logo-light active" href="index-2.html" class="text-center mx-auto"><img src="images/logo.png" class="main-logo"></a>
				<a class="desktop-logo icon-logo active"href="index-2.html"><img src="images/logo.png" class="logo-icon"></a>
				<a class="desktop-logo logo-dark active" href="index-2.html"><img src="images/logo.png" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="index-2.html"><img src="images/logo.png" class="logo-icon dark-theme" alt="logo"></a>
			</div><!-- /logo -->
			<div class="main-sidebar-loggedin">
				<div class="app-sidebar__user">
					<div class="dropdown user-pro-body text-center">
						<div class="user-pic">
							<img src="images/logo.png" alt="user-img" class="rounded-circle mCS_img_loaded">
						</div>
						<div class="user-info">
							<h6 class=" mb-0 text-dark"><?php @session_start(); echo $_SESSION['username'];?></h6>
							<span class="text-muted app-sidebar__user-name text-sm">Administrator</span>
						</div>
					</div>
				</div>
			</div><!-- /user -->
			<div class="sidebar-navs">
				<ul class="nav  nav-pills-circle">
					
					<li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout">
						<a href="logout.php" class="nav-link text-center m-2">
							<i class="fe fe-power"></i>
						</a>
					</li>
				</ul>
			</div>
			<div class="main-sidebar-body">
				<ul class="side-menu ">
					
					<li class="slide">
						<a class="side-menu__item" href="users.php"><i class="side-menu__icon fe fe-database"></i><span class="side-menu__label">Users</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" href="students.php"><i class="side-menu__icon fe fe-database"></i><span class="side-menu__label">Students</span></a>
					</li>
					
					
				</ul>
			</div>
		</aside>
		<!-- /main-sidebar -->