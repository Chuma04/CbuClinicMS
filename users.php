
<?php
session_start();
if(!isset($_SESSION['id']))
		{
			header("location:signin.php");
		}
		
		
if($_SESSION['type']!="admin")
		{
			header("location:signin.php");
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
		<title>  Home -  Users </title>

		<!--- Favicon -->
		<link rel="icon" href="assets/img/brand/favicon.png" type="image/x-icon"/>

		<!--- Icons css -->
		<link href="assets/css/icons.css" rel="stylesheet">

		<!-- Owl-carousel css-->
<link href="assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet"/>

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

	<body class="main-body  app sidebar-mini">
		
		
		
		<!-- Loader -->
		<div id="global-loader">
			<img src="assets/img/loaders/loader-4.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<?php
			include("sidebaradmin.php");
		?>
		
		<!-- main-content -->
		<div class="main-content">
		<!-- main-header -->
			<?php include("header.php");?>
			<!-- /main-header -->

			<!-- container -->
			<div class="container-fluid">
									<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div>
						<h4 class="content-title mb-2">Hi, welcome back!</h4>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page"></li>
							</ol>
						</nav>
					</div>
					<div class="d-flex my-auto">
						<div class=" d-flex right-page">
							
							
						</div>
					</div>
				</div>
				<!-- /breadcrumb -->
									<!-- main-content-body -->
				<div class="main-content-body">
					
					<!-- row -->
					<!-- /row -->

					<!-- row -->
					<!-- /row -->

					<!-- row -->
					<div class="row row-sm ">
						<div class="col-md-12 col-xl-12">
							<div class="card overflow-hidden review-project">
								<div class="card-body">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-10">All Users</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
										<button class="btn btn-primary" onClick="addUser()">Add User</button>
									</div>
									<p class="tx-12 text-muted mb-3">All the  defined users.<a href="#">Learn more</a></p>
									<div class="table-responsive mb-0">
										<table class="table table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
											<thead>
												<tr> 	
													<th>#</th>
													<th>Username</th>
													<th>Type</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody id="instable">
												
												
												
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /row -->

					<!-- row -->
					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /main-content -->
					
            		
					<!-- Basic modal -->
		<div class="modal" id="addModal">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Add User</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<form id="addForm">
					<div class="modal-body">
						
									
									<div class="col-lg">
									<label>Username</label>
										<input id="firstName_edit" name="username" class="form-control" placeholder="First Name" type="text">
									</div>
									
									<div class="col-lg">
									<label>Password</label>
										<input id="lastName_edit" name="password" class="form-control" placeholder="Password" type="password">
									</div>
									
									<div class="col-lg">
									<label>Type</label>
										<Select id="type" name="type" class="form-control">
											<option value="admin"> Administrator </option>
											<option value="doctor"> Doctor </option>
											<option value="nurse"> Nurse </option>
											<option value="labtectnician"> Lab Tectnician </option>
											<option value="pharmacist"> Pharmacist </option>
										</Select>
									</div>
						
					</div>
					<div class="modal-footer">
						<button class="btn ripple btn-primary" type="submit">Save changes</button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		
		<!-- End Basic modal -->
		
		
		<!-- Small modal -->
		<div class="modal" id="deleteModal">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title">Delete User</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<form id="deleteForm">
					<div class="modal-body">
					<input id="id_delete" class="form-control" name="id"  type="hidden">
						<p>
						Are you sure you want to delete these deatils?
						</p>
					</div>
					<div class="modal-footer justify-content-center">
						<button type="submit" class="btn ripple btn-danger" type="button"> Delete</button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- End Small Modal -->
		
		<!-- Small modal -->
		<div class="modal" id="barcodeModal">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title">Barcode</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<form id="ddd">
					<div class="modal-body">
					<input id="id_delete" class="form-control" name="id"  type="hidden">
						<center>
						<img id="barcodeImage">
						<p id="barcodetext"><p>
						</center>
					</div>
					<div class="modal-footer justify-content-center">
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- End Small Modal -->
					
					
					
					
					
					
					
					<!-- Footer opened -->
		<?php include("footer.php")?>
		
		
		<!-- Footer closed -->		
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

				<!--- Chart bundle min js -->
		<script src="assets/plugins/chart.js/Chart.bundle.min.js"></script>
		<!--- Internal Sampledata js -->
		<script src="assets/js/chart.flot.sampledata.js"></script>
		<!--- Index js -->
		<script src="assets/js/index.js"></script>

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
		<script>
		  $(document).ready(function() {
			 getUsers();
			  
			   //editForm
			 $("#addForm").on('submit',(function(e) {
			  e.preventDefault();
			  $.ajax({
					   url: "ajax.saveUser.php",
					   type: "POST",
					   data:  new FormData(this),
					   contentType: false,
							 cache: false,
					   processData:false,
					   beforeSend : function()
						   {
							// put your check here :)
						   },
					   success: function(r)
						  {
							alert(r);
							$("#addModal").modal("hide");
							getUsers();
						  },
						 error: function(e) 
						  {
							   alert(e);
						  }          
				});
			 }));
			  
			  
			  //deleteForm
			 $("#deleteForm").on('submit',(function(e) {
			  e.preventDefault();
			  $.ajax({
					   url: "ajax.deleteUser.php",
					   type: "POST",
					   data:  new FormData(this),
					   contentType: false,
							 cache: false,
					   processData:false,
					   beforeSend : function()
						   {
							// put your check here :)
						   },
					   success: function(r)
						  {
							alert(r);
							$("#deleteModal").modal("hide");
							getUsers();
						  },
						 error: function(e) 
						  {
							   alert(e);
						  }          
				});
			 }));
			  
			  
			  
			  
			   });
			   
			   function getUsers()
			   {
				   var xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function()
				  {
					if (this.readyState == 4 && this.status == 200)
						{
							document.getElementById("instable").innerHTML = this.responseText;
						}
				  };
				  xhttp.open("POST", "ajax.getUsers.php", true);
				  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				  xhttp.send();
			   }
			   
			   function editGrave(id,firstName,lastName,nrc,city,date,description)
			   {
				   document.getElementById("id_edit").value = id;
				   document.getElementById("firstName_edit").value = firstName;
				   document.getElementById("lastName_edit").value = lastName;
				   document.getElementById("nrc_edit").value = nrc;
				   document.getElementById("city_edit").value = city;
				   document.getElementById("date_edit").value = date;
				   document.getElementById("description_edit").value = description;
				   $("#editModal").modal();
			   }
			   
			   function generateBar(barcode)
			   {
				   var xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function()
				  {
					if (this.readyState == 4 && this.status == 200)
						{
							document.getElementById("barcodeImage").src = 'barcodes/'+barcode+".png";
							document.getElementById("barcodetext").innerHTML = barcode;
							$("#barcodeModal").modal();
							
						}
				  };
				  xhttp.open("POST", "barcode.php?size=100&text="+barcode+"&filepath=barcodes/"+barcode+".png&sizefactor=2", true);
				  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				  xhttp.send();
			   }
			   
			   function deleteModal(id)
			   {
				   document.getElementById("id_delete").value = id;
				   $("#deleteModal").modal();
			   }
			   
			   function addUser(id)
			   {
				   $("#addModal").modal();
			   }
		</script>
	</body>
</html>