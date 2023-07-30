<?php 
session_start();
include "connection.php";
if (isset($_POST['punchin'])) {
	$user = $_SESSION['user'];
	$dbuserdept = $_SESSION['userdept'];
	$sql = "INSERT INTO attendance (username, dept) VALUES ('$user','$dbuserdept')";
	$result=mysqli_query($conn,$sql);
	$sql2=("UPDATE users SET attendance = attendance+1 where username='".mysqli_real_escape_string($conn,$user)."' ");
    $result1=mysqli_query($conn,$sql2);
	// echo "alert('ATTENDANCE REQUEST SUBMITTED')";
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
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
	  <link rel="stylesheet" href="css/style.css" />
	 
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
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

		  <li class="active">
		  <a href="#" class="dashboard"><i class="material-icons">dashboard</i>Dashboard </a>
		  </li>
		  

		  <li class="dropdown">
		  <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">aspect_ratio</i>Profile
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu1">
		     <li><a href="profile.html">Profile</a></li>
			 
		  </ul>
		  </li>
		  
		  
		   <li class="dropdown">
		  <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">apps</i>Attendance
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu2">
		     <li><a href="Attendance.php">Attendance Requests</a></li>
			 <li><a href="approved_attendance.php">Approved attendance</a></li>
			 
		  </ul>
		  </li>
		  
		   <li class="dropdown">
		  <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">equalizer</i>Request Panel
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu3">
		     <li><a href="Requests.html">Pending Requests</a></li>
			 <li><a href="#">Pages 2</a></li>
			 <li><a href="#">Pages 3</a></li>
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
					     <div class="xp-searchbar">
						    
							 </form>
						 </div>
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
									 <li><a href="#">
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
				    <h4 class="page-title">Dashboard</h4>
					<ol class="breadcrumb">
				
					</ol>
				 </div>
				 
				 
			 </div>
		  </div>
		  <!------top-navbar-end-----------> 
		  
		  
		   <!------main-content-start-----------> 
		     
		      <div class="main-content">
				
			<!------Attendance bar Box-----------> 
						<div class="box">
						<div class="container">
                           <div class="circular-progress">
							<span class="progress-value">20%</span>
						 	</div>
						<span class="text">Attendance</span>

						</div>
							<form action = "" method = "post">
								<!-- <button type="button" id = "punchin" class="punchin" >Punch In</button> -->
								<input type="submit" class="punchin" id="punchin"  name ="punchin" value = "PUNCH IN" >
							</form>
					</div>

					<!------Pooja time and Location bar Box----------->
					  <div class="box" style="height:26vh;">
						<div class="container">
						
						<input type="text" class="time-input" placeholder="Pooja Starting Time" onfocus="(this.type='time')">
						
					   
					   <input type="text" class="time-input" placeholder="Enter Location" required>
					</div>

				</div>

<!------Bata Details bar Box----------->
				<div class="box" style="height:42vh;">
					<div class="container">

					<div class="caption">Current Bata</div>
					 <span class="textbata">.......</span>
					<button class="batabtn">Bata - 1</button>
					<button class="batabtn" >Bata - 2</button>
					<button class="batabtn" >Bata - 3</button>
				
				</div>

			</div>	
				  
			     <div class="row">
				    <div class="col-md-12">
					   <div class="table-wrapper">
					     
					   <div class="table-title">
					     <div class="row">
						     <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
							    <h2 class="ml-lg-2">
									
									Attendance Approval</h2>
							 </div>
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
							   
							   
							 </div>
					     </div>
					   </div>
					   
					   <div class="attendence" style="overflow-x:auto;">
						<form action="#">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										
										<th>Name</th>
										<th>Department</th>
										
										<th>Actions</th>
									</tr>
								</thead>
	
								<tbody>
									<tr>
										
										<th>Demin K Benny</th>
										<th>camera</th>
										
	
										<th>
											<a href="#editEmployeeModal" class="edit" data-toggle="modal">
												<span>Accept</span>
											</a>
											<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
	
												<span>Decline</span>
											</a>
										</th>
									</tr>
	
	
									<tr>
										
										<th>Anantika</th>
										<th>Artist</th>
										
	
										<th>
											<a href="#editEmployeeModal" class="edit" data-toggle="modal">
												<span>Accept</span>
											</a>
											<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
	
												<span>Decline</span>
											</a>
										</th>
									</tr>
	
	
									<tr>
										
										<th>Joel B George</th>
										<th>Makeup</th>
										
	
										<th>
											<a href="#editEmployeeModal" class="edit" data-toggle="modal">
												<span>Accept</span>
											</a>
											<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
	
												<span>Decline</span>
											</a>
										</th>
									</tr>
									
									<tr>

										<th>Aravind KM</th>
										<th>Makeup</th>

										<th>
											<a href="#editEmployeeModal" class="edit" data-toggle="modal">
												<span>Accept</span>
											</a>
											<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
	
												<span>Decline</span>
											</a>
										</th>
									</tr>
	
	
								</tbody>
	
	
							</table>
							
						</form>
					</div>
					   
					  
					  
					<div class="attendence" style="overflow-x:auto;">
						<form action="#">
							<table class="table table-striped table-hover">
								<div class="table-title" id="table-title" style="border-radius:25px 25px 0px 0px;">
									
										   <h2 class="ml-lg-2" >
											   
											   Other Requests </h2>
										</div>
								<thead>
									<tr>
												<th>Name</th>
												<th>Department</th>
												<th>Description</th>
												<th>Quantity</th>
												<th>Amount</th>
												<th style="min-width:100%;">Actions</th>
									</tr>
								</thead>
	
								<tbody>
									<tr>
										
										<th>Demin K Benny</th>
										<th>camera</th>
										<th>Time</th>
										<th>2500</th>
										<th>20</th>
	
										<th>
											<a href="#editEmployeeModal" class="edit" data-toggle="modal">
												<span>Accept</span>
											</a>
											<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
	
												<span>Decline</span>
											</a>
										</th>
									</tr>
	
	
									<tr>
										
										<th>Anantika</th>
										<th>Artist</th>
										<th>Time</th>
										<th>5500</th>
										<th>25</th>
										<th>
											<a href="#editEmployeeModal" class="edit" data-toggle="modal">
												<span>Accept</span>
											</a>
											<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
	
												<span>Decline</span>
											</a>
										</th>
									</tr>
	
	
									<tr>
										
										<th>Joel B George</th>
										<th>Makeup</th>
										<th>Time</th>
										<th>1500</th>
										<th>60</th>
										<th>
											<a href="#editEmployeeModal" class="edit" data-toggle="modal">
												<span>Accept</span>
											</a>
											<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
	
												<span>Decline</span>
											</a>
										</th>
									</tr>

									<tr>
										
										<th>Aravind KM</th>
										<th>Artist</th>
										<th>Time</th>
										<th>1500</th>
										<th>80</th>
										<th>
											<a href="#editEmployeeModal" class="edit" data-toggle="modal">
												<span>Accept</span>
											</a>
											<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
	
												<span>Decline</span>
											</a>
										</th>
									</tr>
	
	
	
								</tbody>
	
	
							</table>
							
						</form>
					
					</div>
					<br>
					<input type="button" value="Pack-Up" id="packupbtn">
					
					
					
									   <!----add-modal start--------->
		<div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Employees</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
		    <label>Name</label>
			<input type="text" class="form-control" required>
		</div>
		<div class="form-group">
		    <label>Email</label>
			<input type="emil" class="form-control" required>
		</div>
		<div class="form-group">
		    <label>Address</label>
			<textarea class="form-control" required></textarea>
		</div>
		<div class="form-group">
		    <label>Phone</label>
			<input type="text" class="form-control" required>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success">Add</button>
      </div>
    </div>
  </div>
</div>

					   <!----edit-modal end--------->
					   
					   
					   
					   
					   
				   <!----edit-modal start--------->
		<div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Employees</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
		    <label>Name</label>
			<input type="text" class="form-control" required>
		</div>
		<div class="form-group">
		    <label>Email</label>
			<input type="emil" class="form-control" required>
		</div>
		<div class="form-group">
		    <label>Address</label>
			<textarea class="form-control" required></textarea>
		</div>
		<div class="form-group">
		    <label>Phone</label>
			<input type="text" class="form-control" required>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
</div>

					   <!----edit-modal end--------->	   
					   
					   
					 <!----delete-modal start--------->
		<div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Employees</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this Records</p>
		<p class="text-warning"><small>this action Cannot be Undone,</small></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success">Delete</button>
      </div>
    </div>
  </div>
</div>

					   <!----edit-modal end--------->   
					   
					
					
				 
			     </div>
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


