<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');

}
require 'connection.php';
$query=("SELECT * FROM attendance_request");
$result=mysqli_query($conn,$query);
if(isset($_GET['acc'])){
	echo "<script>alert('wait for admin to enable punch-in')</script>";  

$delid=$_GET['acc'];
$query2=("SELECT *FROM attendance_request WHERE id=".mysqli_real_escape_string($conn,$delid)." ");
$result2=mysqli_query($conn,$query2);
$row2=mysqli_fetch_assoc($result2);
$delusername=$row2['username'];
$deldept=$row2['dept'];
$query3=("INSERT INTO approved_attendance(username,dept) values('".$delusername."','".$deldept."')");
$result3=mysqli_query($conn,$query3);
$query4=("DELETE FROM attendance_request where id=".mysqli_real_escape_string($conn,$delid)." ");
$result4=mysqli_query($conn,$query4);
$query5=("UPDATE users SET attendance=attendance+1 where username='".mysqli_real_escape_string($conn,$delusername)."' ");
$result5=mysqli_query($conn,$query5);
$sql2=("UPDATE users set status='accepted' WHERE username='".mysqli_real_escape_string($conn,$delusername)."'");
$result1=mysqli_query($conn,$sql2);
echo "<script>alert('Attendance Accepted')</script>";

header('location:Attendance.php');




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
	<!----css3---->
	<link rel="stylesheet" href="css/custom.css">


	<!--google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


	<!--google material icon-->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css" />
	<script type="text/javascript" src="main.js"></script>
	<style>
		/* css for acceptAll and rejectAll Button*/
		#acceptAllBtn {
			color: rgb(229, 117, 56);
			visibility: hidden;
			margin-left: 0%;
		}

		#rejectAllBtn {
			color: green;
			visibility: hidden;
		}
	</style>
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
				<li>
					<a href="index.php" class="dashboard"><i class="material-icons">dashboard</i>Dashboard </a>
				</li>

				<li class="dropdown">
					<a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">aspect_ratio</i>Profile
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu1">
						<li><a href="profile.html">Profile</a></li>
					</ul>
				</li>


				<li class="active">
					<a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">aspect_ratio</i>Attendance
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu1">
						<li class="active"><a href="Attendance.php">Attendance Requests</a></li>
						<li><a href="approved_attendance.php">Approved attendance</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">equalizer</i>Request Panel
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu3">
						<li><a href="Requests.php">Pending Requests</a></li>
			 <li><a href="#">Dept 1</a></li>
			 <li><a href="#">Dept 2</a></li>
					</ul>
				</li>


				<li class="dropdown">
					<a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">extension</i>Crew Management
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu4">
						<li><a href="#">Pages 1</a></li>
						<li><a href="#">Pages 2</a></li>
						<li><a href="#">Pages 3</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">border_color</i>Salary Manager
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu5">
						<li><a href="#">Pages 1</a></li>
						<li><a href="#">Pages 2</a></li>
						<li><a href="#">Pages 3</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#homeSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">grid_on</i>Locations
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu6">
						<li><a href="#">table 1</a></li>
						<li><a href="#">table 2</a></li>
						<li><a href="#">table 3</a></li>
					</ul>
				</li>


				<li class="dropdown">
					<a href="#homeSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">content_copy</i>Pages
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu7">
						<li><a href="#">Pages 1</a></li>
						<li><a href="#">Pages 2</a></li>
						<li><a href="#">Pages 3</a></li>
					</ul>
				</li>


				<li class="">
					<a href="#" class=""><i class="material-icons">date_range</i>copy </a>
				</li>
				<li class="">
					<a href="#" class=""><i class="material-icons">library_books</i>calender </a>
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
												<li><a href="#">
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
						<h4 class="page-title">Attendence Request</h4>
						<ol class="breadcrumb">

						</ol>
					</div>


				</div>
			</div>
			<!------top-navbar-end----------->


			<!------main-content-start----------->

			<div class="main-content">
				<div class="attendence" style="overflow-x:auto;">
					<form action="#">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
												<?php
			if(mysqli_num_rows($result)!=0){ 
			?>
									<th><span class="custom-checkbox">
											<input type="checkbox" onchange='selects()' id="selectAll">
											<label for="selectAll"></label></th>
									<th>Name</th>
									<th>Department</th>
									<th>Time</th>
									<th>Phone</th>
									<th>Actions</th>
								</tr>
							</thead>

							<tbody>
								<?php
								
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
									echo('
								<tr>
									<th><span class="custom-checkbox">
											<input type="checkbox" id="checkbox" name="checkbox" value="1">
											<label for="checkbox1"></label></th>
									<th>'.$row['username'].'</th>
									<th>'.$row['dept'].'</th>
									<th>Time</th>
									<th>702341231</th>

									<th>
										<a href="Attendance.php?acc='.$row['id'].'" class="edit" >
											<span>Accept</span>
										</a>
										<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">

											<span>Decline&#xE872;</span>
										</a>
									</th>
								</tr>');
	                            }
							}
							else{
								echo('<h2>NO PENDTING REQUESTS</h2>');
							}

								?>
						</table>
						<div>
							<button id="acceptAllBtn" formaction="#">Accept All</button>
							<button id="rejectAllBtn" formaction="#">Reject All</button>
						</div><br>
					</form>
				</div>
			</div>
			<!------main-content-end----------->



			<!----footer-design------------->
            <br><br> <br><br>
			<footer class="footer">
				<div class="container-fluid">
					<div class="footer-in">
						<p class="mb-0">&copy 2023 Team Helios . All Rights Reserved.</p>
					</div>
				</div>
			</footer>




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
		$(document).ready(function () {
			$(".xp-menubar").on('click', function () {
				$("#sidebar").toggleClass('active');
				$("#content").toggleClass('active');
			});

			$('.xp-menubar,.body-overlay').on('click', function () {
				$("#sidebar,.body-overlay").toggleClass('show-nav');
			});

		});

		//select all and reject all
		function selects() {
			var ele = document.getElementsByName("checkbox");
			if (document.getElementById("selectAll").checked == true) {
				document.getElementById("acceptAllBtn").style.visibility = "visible";
				document.getElementById("rejectAllBtn").style.visibility = "visible";
				for (var i = 0; i < ele.length; i++) {
					if (ele[i].type == 'checkbox')
						ele[i].checked = true;
				}
			}
			else{
				document.getElementById("acceptAllBtn").style.visibility = "hidden";
				document.getElementById("rejectAllBtn").style.visibility = "hidden";
				for (var i = 0; i < ele.length; i++) {
					if (ele[i].type == 'checkbox')
						ele[i].checked = false;
				}
			}
		}
	</script>


</body>

</html>