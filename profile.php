<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Admin Dashboard</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	    <!----css3---->
        <link rel="stylesheet" href="css/custom.css">
		<link rel="stylesheet" href="css/profilestyle.css">
		
		
		<!--google fonts -->
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	
	
	   <!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
	  <link rel="stylesheet" href="css/style.css" />
	  <script type="text/javascript" src="main.js"></script>
  </head>
  <body>
  


<div class="wrapper">
     
	  <div class="body-overlay"></div>
	 
	 <!-------sidebar--design------------>
	 
	 <div id="sidebar">
	    <div class="sidebar-header">
			<img src="Bc_logo.png" width="50px" height="50px">
			<h3><span  > &nbsp;Badhra Cineverse</span></h3>
		   
		</div>
		<ul class="list-unstyled component m-0">
		  <li class="dropdown">
		  <a href="index.php" class="dashboard"><i class="material-icons">dashboard</i>Dashboard </a>
		  </li>
		  
		  <li class="active">
		  <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">aspect_ratio</i>Profile
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu1">
		     <li><a href="profile.php">Profile</a></li>
			 
		  </ul>
		  </li>
		  
		  
		   <li class="dropdown">
		  <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">apps</i>Attendance
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu2">
		    <li class="active"><a href="Attendance.php">Attendance Requests</a></li>
						<li><a href="approved_attendance.php">Approved attendance</a></li>
		  </ul>
		  </li>
		  
		   <li class="dropdown">
		  <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">equalizer</i>Request Panel
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu3">
		    <li><a href="Requests.php">Pending Requests</a></li>
			 <li><a href="#">Dept 1</a></li>
			 <li><a href="#">Dept 2</a></li>
		  </ul>
		  </li>
		  
		  
		   <li class="dropdown">
		  <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">extension</i>Crew Management
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu4">
		     <li><a href="#">Pages 1</a></li>
			 <li><a href="#">Pages 2</a></li>
			 <li><a href="#">Pages 3</a></li>
		  </ul>
		  </li>
		  
		   <li class="dropdown">
		  <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">border_color</i>Salary Manager
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu5">
		     <li><a href="#">Pages 1</a></li>
			 <li><a href="#">Pages 2</a></li>
			 <li><a href="#">Pages 3</a></li>
		  </ul>
		  </li>
		  
		  <li class="dropdown">
		  <a href="#homeSubmenu6" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">grid_on</i>Locations
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu6">
		     <li><a href="#">table 1</a></li>
			 <li><a href="#">table 2</a></li>
			 <li><a href="#">table 3</a></li>
		  </ul>
		  </li>
		  
		  
		  <li class="dropdown">
		  <a href="#homeSubmenu7" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">content_copy</i>Pages
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu7">
		     <li><a href="#">Pages 1</a></li>
			 <li><a href="#">Pages 2</a></li>
			 <li><a href="#">Pages 3</a></li>
		  </ul>
		  </li>
		  
		   
		  <li class="">
		  <a href="#" class=""><i class="material-icons">date_range</i>Projects </a>
		  </li>
		  <li class="">
		  <a href="#" class=""><i class="material-icons">library_books</i>Calender </a>
		  </li>
		
		</ul>
	 </div>
	 
   <!-------sidebar--design- close----------->
   
   
   
      <!-------page-content start----------->
   
      <div id="content">
	     
		  <!------top-navbar-start-----------> 
		     
		  <div class="top-navbar">
			<div class="xd-topbar">
				<div class="row">
					<div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
					   <div class="xp-menubar">
						   <span class="material-icons text-white">signal_cellular_alt</span>
					   </div>
					</div>
					
					<div class="col-md-5 col-lg-3 order-3 order-md-2">
						
					</div>
					
					
					<div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
						<div class="xp-profilebar text-right">
						   <nav class="navbar p-0">
							  <ul class="nav navbar-nav flex-row ml-auto">
							  <li class="dropdown nav-item active">
								<a class="nav-link" href="#" data-toggle="dropdown">
								 <span class="material-icons">notifications</span>
								 <span class="notification">4</span>
								</a>
								 <ul class="dropdown-menu">
									<li><a href="#">You Have 4 New Messages</a></li>
									<li><a href="#">You Have 4 New Messages</a></li>
									<li><a href="#">You Have 4 New Messages</a></li>
									<li><a href="#">You Have 4 New Messages</a></li>
								 </ul>
							  </li>
							  
							  
							  
							  <li class="dropdown nav-item">
								<a class="nav-link" href="#" data-toggle="dropdown">
									<img src="profile2.avif" style="width:36px; height:35px; border-radius:45%;"/>
								 <span class="xp-user-live"></span>
								</a>
								 <ul class="dropdown-menu small-menu">
									<li><a href="#editEmployeeModal">
									<span class="material-icons">person_outline</span>
									Profile
									</a></li>
									<li><a href="#">
									<span class="material-icons">settings</span>
									Settings
									</a></li>
									<li><a href="logout.php">
									<span class="material-icons">logout</span>
									Logout
									</a></li>
									
								 </ul>
							  </li>
							  
							  
							  </ul>
						   </nav>
						</div>
					</div>
					
				</div>
				
				<div class="xp-breadcrumbbar text-center">
				   <h4 class="page-title">Profile</h4>
				   <ol class="breadcrumb">
			   
				   </ol>
				</div>
				
				
			</div>
		 </div>
		  <!------top-navbar-end-----------> 
		  
		  
 <!------main-content-start-----------> 
		     
<div class="main-content">

<div class="main-body">

<div class="row gutters-sm">
<div class="col-md-4 mb-3">
<div class="card">
<div class="card-body">
<div class="d-flex flex-column align-items-center text-center">
<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
<div class="mt-3">
<h4>Demin</h4>
<p class="text-secondary mb-1">Production Department</p>
<p class="text-muted font-size-sm">Phone :+91 9685412322</p>
<button class="btn btn-primary">Upload Photo</button>
<!-- <button class="btn btn-outline-primary">Message</button> -->
</div>
</div>
</div>
</div>
<!-- <div class="card mt-3">
<ul class="list-group list-group-flush">
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
<span class="text-secondary">https://bootdey.com</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
<span class="text-secondary">bootdey</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
<span class="text-secondary">@bootdey</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
<span class="text-secondary">bootdey</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
<span class="text-secondary">bootdey</span>
</li>
</ul>
</div> -->
</div>
<div class="col-md-8">
<div class="card mb-3">
<div class="card-body">
<div class="row">
<div class="col-sm-3">
<h6 class="mb-0">User Name</h6>
</div>
<div class="col-sm-9 text-secondary">
Demin KB
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3">
<h6 class="mb-0">Email</h6>
</div>
<div class="col-sm-9 text-secondary">deminkb012@gmail.com</a>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3">
<h6 class="mb-0">Phone</h6>
</div>
<div class="col-sm-9 text-secondary">
+91 9685412322
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3">
<h6 class="mb-0">Address</h6>
</div>
<div class="col-sm-9 text-secondary">
Kochi, Kerala, India
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-12">
<a class="btn btn-primary" target="__blank" href="profileedit.html">Edit</a>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-8">
	<div class="card mb-3">
	<div class="card-body">
	<div class="row">
	<div class="col-sm-3">
	<h6 class="mb-0">Account Holder</h6>
	</div>
	<div class="col-sm-9 text-secondary">
	Demin K B
	</div>
	</div>
	<hr>
	<div class="row">
	<div class="col-sm-3">
	<h6 class="mb-0">Account Number</h6>
	</div>
	<div class="col-sm-9 text-secondary">1120003456785</a>
	</div>
	</div>
	<hr>
	<div class="row">
	<div class="col-sm-3">
	<h6 class="mb-0">Branch Name</h6>
	</div>
	<div class="col-sm-9 text-secondary">
	Ernakulam
	</div>
	</div>
	<hr>
	<div class="row">
	<div class="col-sm-3">
	<h6 class="mb-0">Branch IFSC</h6>
	</div>
	<div class="col-sm-9 text-secondary">
	FDRL0012544
	</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-sm-3">
		<h6 class="mb-0">PAN Number</h6>
		</div>
		<div class="col-sm-9 text-secondary">
		MFWPK2311G
		</div>
		</div>
	<hr>
	<div class="row">
	<div class="col-sm-12">
	<a class="btn btn-primary" href="profileedit.html">Edit</a>
	</div>
	</div>
	</div>
	</div>
	</div>


<!-- <div class="row gutters-sm">
<div class="col-sm-6 mb-3">
<div class="card h-100">
<div class="card-body">
<h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
<small>Web Design</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>Website Markup</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>One Page</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>Mobile Template</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>Backend API</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
</div>
</div>
<div class="col-sm-6 mb-3">
<div class="card h-100">
<div class="card-body">
<h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
<small>Web Design</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>Website Markup</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>One Page</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>Mobile Template</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>Backend API</small>
 <div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
</div>
</div>

</div> -->
</div>
</div>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>

</div>

  
	<!------main-content-end-----------> 
		  
		 <!----footer-design------------->

		 
		 <footer class="footer">
		    <div class="container-fluid">
			   <div class="footer-in">
			      <p class="mb-0">&copy 2023 Team Helios . All Rights Reserved.</p>
			   </div>
			</div>
		 </footer>
		 
		 
		 
		 
	  </div>
   
</div>
</div>


<!-------complete html----------->





  
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="js/jquery-3.3.1.slim.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
  
  
  <script type="text/javascript">
       $(document).ready(function(){
	      $(".xp-menubar").on('click',function(){
		    $("#sidebar").toggleClass('active');
			$("#content").toggleClass('active');
		  });
		  
		  $('.xp-menubar,.body-overlay').on('click',function(){
		     $("#sidebar,.body-overlay").toggleClass('show-nav');
		  });
		  
	   });
  </script>
  
  



  </body>
  
  </html>


