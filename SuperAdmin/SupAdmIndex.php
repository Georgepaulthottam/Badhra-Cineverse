
 <?php $activePage = 'home'; include 'SupAdmHeader.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Super Admin Dashboard</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="../css/custom.css">
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
	  <link rel="stylesheet" href="../css/style.css" />
	  <link rel="stylesheet" href="../css/SupAdmin.css">
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
                            Users  Attendance</h3>
                        <a href="#">
                            <div class="pie-chart-container">
                                <canvas id="attendance-chart"></canvas>
                                <div class="percentage-label" id="percentageLabel"></div>
                            </div>
                        </a><br>

                       
 
                    </div>  
                    <div class="profile-box">
                        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                           Total Crew</h3>
                        <div class="request-status" id="request1">
                        
                        <div class="request-status">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <a href="">
                                        <th>Technicians</th>
                                        <th>50</th>
                                    </a>
                                </tr>
                               
                                <tr>
                                    <th>Artists</th>
                                    <th>20</th>
                                </tr>
                                <tr>
                                    <th>Admin</th>
                                    <th>2</th>
                                </tr>
                            </table>
                        </div>
				    

                        </div>
                    </div>

                    
                    <div class="profile-box">
                        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                            Admin  Attendance</h3>
                        <a href="#">
                            <div class="pie-chart-container">
                                <canvas id="attendance-chart"></canvas>
                                <div class="percentage-label" id="percentageLabel"></div>
                            </div>
                        </a><br>

                       
 
                    </div>  	
                    </div>
                </div>
                  <!------Second block items-----------> 
		     
                <div id="super_top-container" class="super_top-section">
                
                    <div class="profile-box" id="super_profile_box">
                        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                          Status</h3>
                        <div class="request-status" id="request1">
                        
                        <div class="request-status">
                            <table class="table table-striped table-hover">
                                <tr>
                                   
                                        <th>Starting Time</th>
                                        <th>8:00 Am</th>
                                    </a>
                                </tr>
                               
                                <tr>
                                    <th> Current Bata </th>
                                    <th>2</th>
                                </tr>
                                <tr>
                                    <th>Total Requests</th>
                                    <th>20</th>
                                </tr>
                                <tr>
                                    <th>Packup Time</th>
                                    <th>9:00 PM</th>
                                </tr>
                            </table>
                        </div>
				    

                        </div>
                    </div>
                     <div class="profile-box" id="super_profile_box">
                        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                           Daily Expense</h3>
                        <div class="request-status" id="request1">
                        
                        <div class="request-status">
                            <table class="table table-striped table-hover">
                            <tr>
                                   
                                   <th>Opening Balance</th>
                                   <th>12000</th>
                               </a>
                           </tr>
                          
                           <tr>
                               <th>Advance Amount</th>
                               <th>2000</th>
                           </tr>
                          
                           <tr>
                               <th>Total</th>
                               <th>1 Lakh</th>
                           </tr>
                            </table>
                        </div>
				    

                        </div>
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
        const progressBarPercentage = 76; // Replace this with your desired percentage value.
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


  </body>
  
  </html>
