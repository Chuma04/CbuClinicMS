<?php
	session_start();
	include_once("classes/class.login.php");
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$login = new LOGIN();
		extract($_POST);

		$login = $login->authenticate($lemail,$lpassword);
		if($login)
		{
			
			$_SESSION['id'] = $login->id;
			$_SESSION['username'] = $login->username;
			
			if($login->type=="admin"){
				
				$_SESSION['type'] = $login->type;
				header("location:users.php");
			}
			else if($login->type=="doctor")
			{
				$_SESSION['type'] = $login->type;
				header("location:doctor.php");
			}
			else if($login->type=="nurse")
			{
				$_SESSION['type'] = $login->type;
				header("location:nurse.php");
			}
			else if($login->type=="pharmacist")
			{
				$_SESSION['type'] = $login->type;
				header("location:pharmacist.php");
			}
			else if($login->type=="labtectnician")
			{
				$_SESSION['type'] = $login->type;
				header("location:labtectnician.php");
			}
			
		}
	}
		
	
?>

<!DOCTYPE html>
<html lang="en">
	
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
		<!-- Title -->
		<title> Login - Student Health Management System </title>

		<!--- Favicon -->
		<link rel="icon" href="assets/img/brand/favicon.png" type="image/x-icon"/>

		<!--- Icons css -->
		<link href="assets/css/icons.css" rel="stylesheet">

		
		<!--- Right-sidemenu css -->
		<link href="assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!--- Custom Scroll bar -->
		<link href="assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

		<!--- Style css -->
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/skin-modes.css" rel="stylesheet">

		<!--- Sidemenu css -->
		<link href="assets/css/sidemenu.css" rel="stylesheet">

		<!--- Animations css -->
		<link href="assets/css/animate.css" rel="stylesheet">
		
		<!--- Switcher css -->
		<link href="assets/switcher/css/switcher.css" rel="stylesheet">
		<link href="assets/switcher/demo.css" rel="stylesheet">	</head>
	
	<body class="main-body">

	<!-- Loader -->
		<div id="global-loader">
			<img src="images/logo.png" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->
				<!-- main-signin-wrapper -->
		<div class="my-auto page page-h">
			<div class="main-signin-wrapper">
				<div class="main-card-signin d-md-flex wd-100p">
				<div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white" >
					<div class="my-auto authentication-pages">
						<div>
							<img src="images/logo.png" class=" m-0 mb-4" alt="logo">
							<h5 class="mb-4">Copperbelt University Clinic registration System</h5>
							<p class="mb-5">This is a place where we keep all important patient records</p>
							<a href="#" class="btn btn-success">Learn More</a>
						</div>
					</div>
				</div>
				<div class="p-5 wd-md-50p">
					<div class="main-signin-header">
						<h2>Welcome!</h2>
						<h4>Please sign in to continue</h4>
						<form action="signin.php"  method="POST">
							<div class="form-group">
								<label>Username</label><input class="form-control" placeholder="Enter your email" type="text" name="lemail">
							</div>
							<div class="form-group">
								<label>Password</label> <input class="form-control" placeholder="Enter your password" type="password" name="lpassword">
							</div><button class="btn btn-main-primary btn-block">Sign In</button>
						</form>
					</div>
					<div class="main-signin-footer mt-3 mg-t-5">
						
						
					</div>
				</div>
			</div>
			</div>
		</div>
		<!-- /main-signin-wrapper -->
		
		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

		<!--- JQuery min js -->
		<script src="assets/plugins/jquery/jquery.min.js"></script>

		<!--- Datepicker js -->
		<script src="assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

		<!--- Bootstrap Bundle js -->
		<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!--- Ionicons js -->
		<script src="assets/plugins/ionicons/ionicons.js"></script>

		
		<!--- Moment js -->
		<script src="assets/plugins/moment/moment.js"></script>

		<!--- JQuery sparkline js -->
		<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

		<!--- Perfect-scrollbar js -->
		<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="assets/plugins/perfect-scrollbar/p-scroll.js"></script>


		<!--- Rating js -->
		<script src="assets/plugins/rating/jquery.rating-stars.js"></script>
		<script src="assets/plugins/rating/jquery.barrating.js"></script>

		<!--- Custom Scroll bar Js -->
		<script src="assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>


		<!--- Sidebar js -->
		<script src="assets/plugins/side-menu/sidemenu.js"></script>


		<!--- Right-sidebar js -->
		<script src="assets/plugins/sidebar/sidebar.js"></script>
		<script src="assets/plugins/sidebar/sidebar-custom.js"></script>
		
		<!--- Eva-icons js -->
		<script src="assets/js/eva-icons.min.js"></script>

		<!--- Scripts js -->
		<script src="assets/js/script.js"></script>

		<!--- Custom js -->
		<script src="assets/js/custom.js"></script>
		
		<!--- Switcher js -->
		<script src="assets/switcher/js/switcher.js"></script>
	
	</body>


</html>