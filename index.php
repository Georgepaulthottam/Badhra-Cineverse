<?php 
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
include "connection.php";
$user=$_SESSION['user'];
$att_query=("SELECT * FROM users WHERE username='".mysqli_real_escape_string($conn,$user)."' limit 0,4");
$att_result=mysqli_query($conn,$att_query);
$att_row=mysqli_fetch_assoc($att_result);
$attendance=$att_row['attendance'];
$query8=("SELECT * FROM cart WHERE status='".mysqli_real_escape_string($conn,"requested")."' limit 0,4");
$result8=mysqli_query($conn,$query8);
$msquery=("SELECT * FROM miscellaneous limit 0,4");
$msresult=mysqli_query($conn,$msquery);
$query=("SELECT * FROM attendance_request limit 0,4");
$result=mysqli_query($conn,$query);
if (isset($_POST['accept_req'])) {
	$id=$_POST['req_id'];
    $query9 = ("update cart set status='approved' where id='$id'") ;

    $quer=mysqli_query($conn, $query9);
	header("location:index.php");



  }
if(isset($_POST['settime'])){
	 $timestamp = strtotime($_POST['time']);
 $mysql_date = date("Y-m-d H:m:s", $timestamp);
	$timequer="UPDATE schedule_day SET pooja_time = '$mysql_date' where DATE(date)=".mysqli_real_escape_string($conn,'DATE(NOW())')."";
    $timeres=mysqli_query($conn,$timequer);
	header("location:index.php");

  }

if(isset($_POST['setloctn'])){
	$loctn=$_POST['loctn'];
	$locquer="UPDATE schedule_day SET location = '".$loctn."' WHERE  DATE(date)=".mysqli_real_escape_string($conn,'DATE(NOW())')."";
    $locres=mysqli_query($conn,$locquer);
	header("location:index.php");

  }
// admin attendance
if(isset($_POST['accept'])){
	
$delid=$_POST['id'];
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
$result6=mysqli_query($conn,$sql2);
echo "<script>alert('Attendance Accepted')</script>";

header('location:index.php');

}
if (isset($_POST['punchin'])) {
	$user = $_SESSION['user'];
	$dbuserdept = $_SESSION['userdept'];
	$sql = "INSERT INTO attendance (username, dept) VALUES ('$user','$dbuserdept')";
	$result7=mysqli_query($conn,$sql);
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
	  <link rel="stylesheet" href="css/admin.css" />
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
		     <li><a href="profileadmin.php">Profile</a></li>
			 
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
		     <li><a href="Requests.php">Pending Requests</a></li>
			 <li><a href="approved_requests.php">Approved requests</a></li

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
		  <i class="material-icons">grid_on</i>Miscellaneous
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu6">
		     <li><a href="misc.php">Miscellaneous</a></li>
			 
		  </ul>
		  </li>
		  
		  
		  <li class="dropdown">
		  <a href="#homeSubmenu7" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">content_copy</i>Notifications
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu7">
		     <li><a href="Notifications.php">Notification</a></li>
		  </ul>
		  </li>
		  
		   
		  <li class="">
		  <a href="#" class=""><i class="material-icons">date_range</i>Projects </a>
		  </li>
		  <li class="">
		  <a href="#" class=""><i class="material-icons">library_books</i>Calender </a>
		  </li>
		  <li class="">
					<a href="expensereport.php" class=""><i class="material-icons">currency_rupee</i>Expense Report</a>
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
								     <li><a href="Notifications.php	">You Have 4 New Messages</a></li>
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
				    <h4 class="page-title">Dashboard</h4>
					<ol class="breadcrumb">
					</ol>
				 </div>
				 
			 </div>
		  </div>
		  <!------top-navbar-end-----------> 
		  
		  
		   <!------main-content-start-----------> 
		     
		   <div id="main-container" class="middle-section" >
                <div id="top-container" class="top-section">
                    <div class="profile-box">
                        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                            Attendance</h3>
                        <a href="#">
                            <div class="pie-chart-container">
                                <canvas id="attendance-chart"></canvas>
                                <div class="percentage-label" id="percentageLabel"></div>
                            </div>
                        </a><br>

                        <!------punch in button starts----------->

                            <form action="" method ="post">
                            
                                <input  type ="submit" class="punch-in-btn" id="punch-in-btn"  name ="punchin" value = "PUNCH IN" >

                            </form>

                        <!------punch in button ends----------->
 
                    </div>  
                    <div class="profile-box">
                        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                            Pooja Location</h3>
                        <div class="request-status" id="request1">
                        
                                    <form action="" method ="post">
                          <input type="text" class="time-input" name="time" placeholder="Pooja Starting Time" onfocus="(this.type='time')"></th>
										<input name="settime" type="submit"   class="punch-in-btn" value="Set Time" name="settime "id="settimebtn">
                                    
                             

									 <!------Select Optionss with popup----------->	
										<select id="mySelect">
											<option value="option0" selected>Set Location</option>
											<option value="option1">Location 1</option>
											<option value="option2">Location 2</option>
											<option value="option3">Location 3</option>
											<option value="others">Others</option>
										</select>
										<div class="popup" id="popup">
										<a class="close" href="#">X</a>
											<h5>Enter Manually:</h5>
											
											<input type="text" id="location" placeholder="Enter Location">
											<br>
											
											<input type="text" id="rent" placeholder="Enter Rent">
											<br>
											<button onclick="saveChoice()" id="popupbtn">Save</button>
										</div>
										
										<input type="submit" class="punch-in-btn" name="setloctn" value="Set Location" id="setlocbtn">
                   
										<!---Location rent --->
                         <input type="text" class="time-input" placeholder="Extra Location Rent" ></th>
                                    
									<input name="submit" type="button" class="punch-in-btn" value="Set Location" id="submitbtn">  
                           </form>
                        </div>
                    </div>

					
                    <div class="profile-box">
                        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                            Bata Details</h3>
                        <div class="request-status">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <a href="">
                                        <th>Current Bata</th>
                                        <th>Bata 1</th>
                                    </a>
                                </tr>
                               
                                <tr>
                                    <th>Location</th>
                                    <th>Ernakulam</th>
                                </tr>
                                
                            </table>
                        </div>
						<input type="button" id="bata1" name="bata1"  value="Bata 1" class="bata-btn">
						<input type="button"  id="bata2"name="bata2" value="Bata 2"class="bata-btn">
						<input type="button"  id="bata3" name="bata3"  value="Bata 3" class="bata-btn">
						
                    </div>
                </div>
                <!------middle-container contains  attendance request details----------->
                <div id="middle-container" class="bottom-section">
                    <div class="detailed-box" id="request-table">
                        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Attendance Requests
                        </h3>
                        <div class="request-table" style="overflow-x:auto;">

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
									<?php
			if(mysqli_num_rows($result)!=0){ 
			?>
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

									<th>'.$row['username'].'</th>
									<th>'.$row['dept'].'</th>
									<th>Time</th>
									<th>702341231</th>

									<th>
									<form action="index.php" method="post">
									    <input type="text" name="id" value="'.$row['id'].'" hidden>
										<input type="submit" name="accept" value="Accept" class="edit" >
											
										
										<input type="submit" value="Decline" class="delete" data-toggle="modal">

										</form>
									</th>
								</tr>');
	                            }
							}
							else{
								echo('<h2>No Pending Requests</h2>');
							}

								?>
                                </tbody>
                                 
                            </table>
                        </div>
                        <a href="Attendance.php" style="color: red;">View more</a>
                    </div>
                </div>
                <!------bottom-container contains Other requests panel----------->
                <div id="middle-container" class="bottom-section">
                    <div class="detailed-box" id="request-table">
                        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Other Requests
                        </h3>
                        <div class="request-table" style="overflow-x:auto;">

                            <table class="table table-striped table-hover">
                                <thead>
									<?php
			                        if(mysqli_num_rows($result8)!=0){ 
			                        ?>
                                    <tr>
							
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Item</th>
                                        <th>Description</th>
                                        <th>price</th>
                                        <th>Quantity</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>

                                <tbody>
								<?php 
                                    while($row=mysqli_fetch_assoc($result8)){
                                        

                                   $time = new DateTime($row['date']);
                                   $date = $time->format('n.j.Y');
                                   $time = $time->format('H:i');

                                        echo('
                                        <tr>
                                        <th>'.$date.'</th>
                                        <th>'.$time.'</th>
                                        <th>'.$row['name'].'</th>
                                        <th>'.$row['details'].'</th>
                                        <th>'.$row['price'].'</th>
                                        <th>'.$row['number'].'</th>



                                        <th>
									<form action="index.php" method="post">
									    <input type="text" name="req_id" value="'.$row['id'].'" hidden>
										<input type="submit" name="req_accept" value="Accept" class="edit" >
											
										
										<input type="submit" value="Decline" class="delete" data-toggle="modal">

										</form>
										</a>
										</th>

								</tr>');}
									}
								else{
								echo('<h2>No Pending Requests</h2>');
							}
								?>


                                </tbody>
                                 
                            </table>
									</form>
                        </div>
                        <a href="Requests.php" style="color: red;">View more</a>
                    </div>
                </div>

				<!--- Misc Section Box--->
				<div id="middle-container" class="bottom-section">
                    <div class="detailed-box" id="request-table">
                        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Miscellaneous
                        </h3>
                        <div class="request-table" style="overflow-x:auto;">

                            <table class="table table-striped table-hover">
                                <thead>
									<?php
			                        if(mysqli_num_rows($msresult)!=0){ 
										 $sum=0;
								   $no=0;

			                        ?>
                                    <tr>
							
                                        <th>SI No</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Purpose</th>
                                        <th>Time</th>
                                        <th>Remark</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>

                                <tbody>
								<?php 
                                    while($msrow=mysqli_fetch_assoc($msresult)){
                                        

                                 $time = new DateTime($msrow['timestamp']);
                                 $date = $time->format('j.n.Y');
                                 $time = $time->format('H:i A');
								  
								   $no=$no+1;

                                        echo('
                                        <tr>
  <td>'.$no.'</td>
      <td>'.$date.'</td>
      <td>'.$msrow['name'].'</td>
      <td>'.$msrow['purpose'].'</td>
      <td>'.$time.'</td>
      <td>'.$msrow['remark'].'</td>
      <td>'.$msrow['amount'].'</td>');
      $sum = $sum + $msrow['amount'];
      echo('</tr>');}
									}
								else{
								echo('<h2>No Pending Requests</h2>');
							}
								?>


                                </tbody>
                                 
                            </table>
									</form>
                        </div>
                        <a href="misc.php" style="color: red;">View more</a>
                    </div>
                </div>
						
				  <!------Packup Button-----------> 
				  <input type="button" value="Packup" name="Packup" class="packupbtn">
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





<script>
        //script for attendance piechart
        function updatePieChart(percentage) {
            const chartData = {
                labels: ['Attended', 'Missed'],
                datasets: [{
                    data: [percentage, 100 - percentage],
                    backgroundColor: ['#152935', '#f0f0f0'],
                    borderWidth: 0,
                }],
            };

            const chartConfig = {
                type: 'doughnut',
                data: chartData,
                options: {
                    cutout: '70%',
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                    },
                    tooltips: {
                        enabled: false,
                    },
                },
            };

            const attendanceChart = document.getElementById('attendance-chart').getContext('2d');
            new Chart(attendanceChart, chartConfig);

            // Update the percentage label
            const percentageLabel = document.getElementById('percentageLabel');
            percentageLabel.textContent = `${percentage}%`;
        }

        // Call this function with the desired percentage value to update the pie chart.
        // Example: updatePieChart(85); // This will update the pie chart to 85%.
        // updatePieChart(50); // This will update the pie chart to 50%.
        // updatePieChart(0);  // This will update the pie chart to 0%.
        <?php echo("
        // Example: To update the pie chart with the percentage value from the progress bar:
        const progressBarPercentage = ".$attendance."; // Replace this with your desired percentage value.
        updatePieChart(progressBarPercentage);

        //script for Accomodation Textbox (other)
        function accomodation() {
            if(document.getElementById('accomLocation').style.visibility == 'visible'){
                document.getElementById('accomLocation').style.visibility = 'hidden';
            }
            else{
                document.getElementById('accomLocation').style.visibility = 'visible';
            }
        }


        //Script for puchin buttton
        

    </script>
   ");
    ?>



     <!-- Optional JavaScript -->
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
  </script>
  
  
  <script>
    // Function to show the popup when "Others" option is selected
    document.getElementById("mySelect").addEventListener("change", function () {
      var popup = document.getElementById("popup");
      var select = document.getElementById("mySelect");
	  const inputField1 = document.getElementById('inputField1');
const inputField2 = document.getElementById('inputField2');

// Load saved input field values from localStorage (if available)
inputField1.value = localStorage.getItem('inputField1Value') || '';
inputField2.value = localStorage.getItem('inputField2Value') || '';

      if (select.value === "others") {
        popup.style.display = "block";
      } else {
        popup.style.display = "none";
      }
    });

    // Function to save the choice and hide the popup
    function saveChoice() {
      var select = document.getElementById("mySelect");
      var locationInput = document.getElementById("location").value;
      var rentInput = document.getElementById("rent").value;
      var newOptionText = locationInput + " - " + rentInput;

      if (locationInput && rentInput) {
        var newOption = document.createElement("option");
        newOption.value = "custom";
        newOption.innerHTML = newOptionText;
        select.appendChild(newOption);
        select.value = "custom";
        var popup = document.getElementById("popup");
        popup.style.display = "none";
      } else {
        alert("Please enter both location and rent.");
      }
    }
	//Close the popup
	// From http://jsfiddle.net/LxauG/606/

$('.close').click(function() {
   $(".popup").fadeOut(300);
   location.reload();	
});

$(".popup").on('blur',function(){
    $(this).fadeOut(300);
});

  </script>



  </body>
  
  </html>
