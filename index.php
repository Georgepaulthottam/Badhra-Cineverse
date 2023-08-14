<?php 

session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user']!=="Admin") {
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
if(isset($_POST['Packup'])){
	echo ("<script>confirm('are sure you want to pack-up?')</script>");
	$dateview="SELECT * FROM schedule_day WHERE  DATE(date)=".mysqli_real_escape_string($conn,'DATE(NOW())')." ";
	$dateres=mysqli_query($conn,$dateview);
	$daterow=mysqli_fetch_assoc($dateres);
	$day=$daterow['day_no'];
	$datesql = "INSERT INTO schedule_day (schedule_id,day_no) VALUES (1,". $day."+1)";
	$dateres2=mysqli_query($conn,$datesql);
	$usersql = "update users set status='punched-out' ";
	$userres=mysqli_query($conn,$usersql);
	header('location:index.php');



}
include 'adminheadersidebar.php';
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

                        <form style="margin-left:29%" action="" method ="post"><?php 
                            if($_SESSION['status']=='requested'){
                                echo(' <button class="punch-button" id="punchButton" style=" background: #f4d03f; /* Yellow background for Requested state */">
            <i class="fas fa-fingerprint"></i>Requested</button>');
                            }
                            elseif($_SESSION['status']=='accepted'){
                                echo(  '<button class="punch-button" id="punchButton" style="background: #27ae60; /* Green background for Accepted state */">
            <i class="fas fa-check"></i>
            Punched In
        </button>');
                            }
                            else{echo(' <button style=" background: linear-gradient(135deg, #ff5656, #ff8e8e); /* Reddish gradient */
            color: white;
            padding: 15px 20px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            align-items: center"  type ="submit" class="punch-in-btn" id="punch-in-btn"  name ="punch-in-btn">
            <i class="fas fa-fingerprint"></i>&nbsp;Punch-in</button>
                                ');}
                                ?> 

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
                        <a href="Attendance.php" style="color:#E2B842;">View more</a>
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
                        <a href="Requests.php" style="color: #E2B842;">View more</a>
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
                        <a href="misc.php" style="color: #E2B842;">View more</a>
                    </div>
                </div>
						
				  <!------Packup Button-----------> 
				  <form action="index.php" method="post">
				  <input type="submit" value="Packup" name="Packup" class="packupbtn">
				  </form>
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



  
  
  <script>
    // Function to show the popup when "Others" option is selected
    document.getElementById("mySelect").addEventListener("change", function () {
      var popup = document.getElementById("popup");
      var select = document.getElementById("mySelect");
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
