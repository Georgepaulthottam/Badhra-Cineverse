<?php 
if($activePage == 'vehicle')
{
	$PageTitle="Vehicle Department";
}
else if($activePage == 'home'){
	$PageTitle="Dashboard";
}
else if($activePage == 'notification'){
	$PageTitle="Notification Panel";
}
else if($activePage == 'misc'){
	$PageTitle="Miscellaneous";
}
else if($activePage == 'profile'){
	$PageTitle="Profile";
}

else if($activePage == 'attendance'){ 
	$PageTitle="Attendance Panel ";
}
else if($activePage == 'expense'){
	$PageTitle="Expense Report ";
}
else if($activePage == 'calender'){
	$PageTitle="Calender View ";
}
else if($activePage == 'crew'){
	$PageTitle="Crew Manegement ";
}
else if($activePage == 'salary'){
	$PageTitle="Salary Management ";
}
else if($activePage == 'usercreation'){
	$PageTitle="User Creation ";
} 
else if($activePage == 'schedule'){
	$PageTitle="Schedule View ";
} 
else if($activePage == 'catering'){
	$PageTitle="HR Catering Panel ";
} 
else if($activePage == 'accomodation'){
	$PageTitle="Accomodation ";
} 
else if($activePage == 'location'){
	$PageTitle="Location ";
} 
else if ($activePage == 'Payments') {
	$PageTitle = "Payments";
}


require 'connection.php';
$query = ("SELECT * FROM users where username='super'");
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$image = $row['image'];
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<title>Super Admin Dashboard</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!----css3---->
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/buttons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!--google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Righteous&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=REM&display=swap" rel="stylesheet">
	<!--google material icon-->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/sp_admin.css" />
	<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>



	<div class="wrapper">

		<div class="body-overlay"></div>
		<!-------sidebar--design------------>

		<div id="sidebar">
			<div class="sidebar-header">
				<img src="Bc_logo.png" width="50px" height="50px">
				<h3><span> &nbsp;Badhra Cineverse</span></h3>
			</div>

			<ul class="list-unstyled component m-0">

				<li class="<?php echo ($activePage === 'home') ? 'active' : ''; ?>">
					<a href="sp_index.php" class="dashboard"><i class="material-icons">dashboard</i>Dashboard </a>
				</li>

				<li class="<?php echo ($activePage === 'Payments') ? 'active' : ''; ?>">
					<a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">pending_actions</i>Payments
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu2">
						<li><a href="sp_pending_payments.php">Pending payments</a></li>
						<li><a href="sp_recent_payments.php">Recent payments</a></li>

					</ul>
				</li>


				
			
						<li class="<?php echo ($activePage === 'profile') ? 'active' : ''; ?>">
					<a href="sp_profile.php" class=""><i class="material-icons">account_circle</i>Profile</a>
				</li>



				<li class="<?php echo ($activePage === 'attendance') ? 'active' : ''; ?>">
					<a href="sp_approved_attendance.php" class=""><i class="material-icons">stacked_line_chart</i>Attendance</a>
				</li>

				
				
				


				<li class="<?php echo ($activePage === 'crew') ? 'active' : ''; ?>">
					<a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">groups</i>Crew Management
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu4">
						<li><a href="sp_crewmanagement.php">Admin Crew Manegement</a></li>
						<li><a href="sp_usercrewmanagement.php">User Crew Manegement</a></li>
					</ul>
				</li>

				

				<li class="<?php echo ($activePage === 'misc') ? 'active' : ''; ?>">
					<a href="sp_misc.php" class=""><i class="material-icons">miscellaneous_services</i>Miscellaneous</a>
				</li>
				<li class="<?php echo ($activePage === 'location') ? 'active' : ''; ?>">
					<a href="sp_location.php" class=""><i class="material-icons">location_on</i>Location</a>
				</li>


				<li class="<?php echo ($activePage === 'usercreation') ? 'active' : ''; ?>">
					<a href="sp_usercreation.php" class=""><i class="material-icons">person_add_alt_1</i>User Creation</a>
				</li>
				<li class="<?php echo ($activePage === 'notification') ? 'active' : ''; ?>">
					<a href="sp_notification.php" class=""><i class="material-icons">notifications_active</i>Notifications </a>
				</li>

				
				<li class="<?php echo ($activePage === 'schedule') ? 'active' : ''; ?>">
					<a href="sp_schedule.php" class=""><i class="material-icons">remove_red_eye</i>Schedule View</a>
				</li>

				<li class="<?php echo ($activePage === 'catering') ? 'active' : ''; ?>">
					<a href="sp_hrcateringindex.php" class=""><i class="material-icons">food_bank</i>HR Catering  </a>
				</li>

				<li class="<?php echo ($activePage === 'accomodation') ? 'active' : ''; ?>">
		  <a href="sp_accomodation.php" class=""><i class="material-icons">bed</i>Accomodation </a>
		  </li>

				<li class="<?php echo ($activePage === 'vehicle') ? 'active' : ''; ?>">
					<a href="vehicleAdmin.php" class=""><i class="material-icons">commute</i>Vehicle Department </a>
				</li>


				<li class="<?php echo ($activePage === 'calender') ? 'active' : ''; ?>">
					<a href="sp_calender.php" class=""><i class="material-icons">calendar_month</i>Calender </a>
				</li>
				<li class="<?php echo ($activePage === 'expense') ? 'active' : ''; ?>">
					<a href="sp_expensereport.php" class=""><i class="material-icons">currency_rupee</i>Expense Report</a>
				</li>
		</ul>
	 </div>
	 
   <!-------sidebar--design- close----------->
   
   
   
      <!-------page-content start----------->
   
      <div id="content">
	  <div id="overlay" class="overlay"></div>
    <div id="custom-confirm" class="model" style="display:none">
        <div class="model-content">
            <div class="confirmationtext">
            <p>Are you sure you want to log out?</p>
            </div>
            <div class="buttoncontainer">
				
            <button  id="yes-button">Yes</button>
            <button id="no-button">No</button>
            </div>
        </div>
    </div>
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
								     <li><a href="sp_notification.php">You Have 3 New Messages</a></li>
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
								     <li><a href="profile.php">
									 <span class="material-icons">person_outline</span>
									 Profile
									 </a></li>
									 <li><a href="#">
									 <span class="material-icons">settings</span>
									 Settings
									 </a></li>
									 <li><a href="#" id="LogoutBtn">
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
				    <h4 class="page-title"><?php echo $PageTitle; ?></h4>
					<ol class="breadcrumb">
					</ol>
				 </div>
				 
			 </div>
		  </div>
		

			<!-- Optional JavaScript -->
			<!-- Optional JavaScript -->
			<!-- jQuery first, then Popper.js, then Bootstrap JS -->
			<script src="js/jquery-3.3.1.slim.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/jquery-3.3.1.min.js"></script>


			<script type="text/javascript">
				$(document).ready(function() {
					$(".xp-menubar").on('click', function() {
						$("#sidebar").toggleClass('active');
						$("#content").toggleClass('active');
					});

					$('.xp-menubar,.body-overlay').on('click', function() {
						$("#sidebar,.body-overlay").toggleClass('show-nav');
					});

				});
			</script>

			<script>
				//for logout popup
				const LogoutBtn = document.getElementById("LogoutBtn");
				const overlay = document.getElementById('overlay');
				const customConfirm = document.getElementById('custom-confirm');
				const yesButton = document.getElementById('yes-button');
				const noButton = document.getElementById('no-button');

				LogoutBtn.addEventListener("click", () => {
					overlay.style.display = 'block';
					customConfirm.style.display = 'block';
				});

				yesButton.addEventListener('click', function() {
					// Perform logout action here
					window.location.href = "login.php";
				});

				noButton.addEventListener('click', function() {
					overlay.style.display = 'none';
					customConfirm.style.display = 'none';
				});
			</script>
</body>

</html>