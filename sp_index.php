<!-- Active page is for splitting the header into seperate files.. and to recognise each pages -->
<?php
session_start();
$activePage = 'home';
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user'] !== "super") {
    header('Location: login.php');
}

include 'sp_header.php';
include 'connection.php';
$query = ("SELECT * FROM attendance_request limit 0,4");
$result = mysqli_query($conn, $query);
$query8 = ("SELECT * FROM cart WHERE status='" . mysqli_real_escape_string($conn, "requested") . "' limit 0,4");
$result8 = mysqli_query($conn, $query8);
$msquery = ("SELECT * FROM miscellaneous limit 0,4");
$msresult = mysqli_query($conn, $msquery);
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
    <style>
        .sec-button:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .tick-icon {
            font-size: 15px;
            color: #3cb371;
            width: 28px;
            height: 28px;
            background: #002147;
        }

        .delete-icon {
            display: inline-block;
            cursor: pointer;
            font-size: 8px;
        }

        .delete-prompt {
            display: none;
            font-family: Arial, sans-serif;
            position: fixed;
            top: 57%;
            left: 67%;
            font: size 5px;
            height: 160px;
            width: 270px;
            transform: translate(-50%, -50%);
            background-color: #e5e4e2;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        }

        .delete-prompt h2 {
            margin-top: 0;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            padding: 8px 16px;
            margin: 0 10px;
            cursor: pointer;
        }

        .btn.delete {
            background-color: #f44336;
            color: white;
        }

        .btn.cancel {
            background-color: #ccc;
            color: black;
        }



        @media only screen and (max-width: 767px) {


            /* Styling for the fields inside the box */
            .expensefield {
                display: inline-block;
                margin-right: 20px;
            }

        }
    </style>

</head>

<body>
    <!------top-navbar-end----------->


    <!------main-content-start----------->

    <!-- Notification message popup -->
		  
    <div class="notification-popup <?php echo ($activePage === 'home') ? 'active' : ''; ?>">
        
        <p>Wellcome Back ,<?php  echo $_SESSION['user']; ?></p>
        <span class="progress"></span>
         </div>
 <!-- Notification message popup ends-->

 
    <!------FIrst Chart----------->
    <div id="main-container" class="middle-section">
        <div id="top-container" class="top-section">
            <div class="profile-box" id="card1">
                <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                    Users Attendance</h3>
                <a href="#">
                    <div class="pie-chart-container">
                        <canvas id="attendance-chart"></canvas>
                        <div class="percentage-label" id="percentageLabel"></div>
                    </div>
                </a><br>
            </div>

            <!------First Chart ends----------->
            <div class="profile-box">
                <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                    Total Crew</h3>
                <div class="request-status" id="card2">

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

            <!------Second Chart----------->
            <div class="profile-box" id="card3">
                <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                    Admin Attendance</h3>
                <a href="#">
                    <div class="pie-chart-container">
                        <canvas id="admin-attendance-chart"></canvas>
                        <div class="percentage-label" id="adminPercentageLabel"></div>
                    </div>
                </a><br>
                <br>



            </div>
        </div>
        <!------Second Chart ends----------->
    </div>

    <!------Second block items----------->

    <div id="super_top-container" class="super_top-section">

        <div class="profile-box" id="super_profile_box" id="card4">
            <h3 style="font-family: 'Exo', sans-serif;">
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
        <div class="profile-box" id="super_profile_box" id="card5">
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
                            <th>
                                <input type="text" placeholder="Enter Amount" id="amountinput">
                            </th>
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
            <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Expense Report
            </h3>
            <div class="request-table" style="overflow-x:auto;">

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <?php
                            $rowsql = "SELECT * FROM daily_expense";
                            $rowresult = mysqli_query($conn, $rowsql);
                            $sum = 0;
                            $no = 0;
                            if (mysqli_num_rows($rowresult) != 0) {
                            ?>
                                <th>SI No.</th>
                                <th>Name</th>
                                <th>Purpose</th>
                                <th>Amount</th>
                                <th>Quantity</th>
                                <th>Mode</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                                while ($row = mysqli_fetch_array($rowresult, MYSQLI_ASSOC)) {
                                    $time = new DateTime($row['datetime']);
                                    $date = $time->format('j.n.Y');
                                    $time = $time->format('H:i A');
                                    $no = $no + 1;
                                    echo ('

                    <tr>
                      <td>' . $no . '</td>
                      <td>' . $row['name'] . '</td>
                      <td>' . $row['description'] . '</td>
                      <td>₹' . $row['price'] . '</td>
					  <td>' . $row['quantity'] . '</td>
					  <td></td>
					  
					  <td><div class="delete-icon" onclick="showDeletePrompt()">
    <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" width="24" height="24" viewBox="0 0 24 24">
      <path d="M0 0h24v24H0z" fill="none"/>
      <path d="M8 9v10c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V9H8zm14-4h-3.5l-1-1h-5l-1 1H2v2h20V5zm-4 11H6v-2h12v2z"/>
    </svg>
  </div>
  </td>
  <div class="delete-prompt" id="deletePrompt">
    <i>Are you sure you want to delete this expense?</i>
    <div class="btn-container">
	 <form action="expensereport.php" method="post">
	 <input type="text" name="id" value="' . $row['id'] . '" hidden>
      <button class="btn delete" type="submit" name="delete" onclick="deleteExpense()">Delete</button>
      <button class="btn cancel" onclick="hideDeletePrompt()">Cancel</button>
	  </form>
    </div>
  </div>

					');
                                    $sum = $sum + $row['price'];
                                }
                            } else {
                                echo ('<h2>NO PENDTING REQUESTS</h2>');
                            }
                    ?>
                    </tbody>

                </table>
            </div>
            <a href="sp_expensereport.php" style="color:#E2B842;">View more</a>
        </div>
    </div>
    <!------bottom-container contains Other requests panel----------->
    < <!--- Misc Section Box--->
        <div id="middle-container" class="bottom-section">
            <div class="detailed-box" id="request-table">
                <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Miscellaneous
                </h3>
                <div class="request-table" style="overflow-x:auto;">

                    <table class="table table-striped table-hover">
                        <thead>
                            <?php
                            if (mysqli_num_rows($msresult) != 0) {
                                $sum = 0;
                                $no = 0;

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
                                while ($msrow = mysqli_fetch_assoc($msresult)) {


                                    $time = new DateTime($msrow['timestamp']);
                                    $date = $time->format('j.n.Y');
                                    $time = $time->format('H:i A');

                                    $no = $no + 1;

                                    echo ('
                                        <tr>
  <td>' . $no . '</td>
      <td>' . $date . '</td>
      <td>' . $msrow['name'] . '</td>
      <td>' . $msrow['purpose'] . '</td>
      <td>' . $time . '</td>
      <td>' . $msrow['remark'] . '</td>
      <td>' . $msrow['amount'] . '</td>');
                                    $sum = $sum + $msrow['amount'];
                                    echo ('</tr>');
                                }
                            } else {
                                echo ('<h2>No Pending Requests</h2>');
                            }
                        ?>


                        </tbody>

                    </table>
                    </form>
                </div>
                <a href="sp_misc.php" style="color: #E2B842;">View more</a>


                
            </div>
        </div>


        <!------main-content-end----------->



        <!----footer-design------------->

        <footer class="footer">
            <div class="container-fluid">
                <div class="footer-in">
                    <p class="mb-0">&copy 2023 Team Helios. All Rights Reserved.</p>
                </div>
            </div>
        </footer>


        </div>

        </div>



        <!-------complete html----------->
        <script>
            function toggleRows() {
                var rows = document.getElementsByClassName("hidden-row");
                for (var i = 0; i < rows.length; i++) {
                    rows[i].style.display = "table-row";
                }
            }


            function showDeletePrompt() {
                document.getElementById("deletePrompt").style.display = "block";
            }

            function hideDeletePrompt() {
                document.getElementById("deletePrompt").style.display = "none";
            }

            function deleteExpense() {
                // Code to delete the expense
                hideDeletePrompt();

            }
        </script>

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
            <?php echo ("
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
        

        ");
            ?>

            function updateAdminPieChart(percentage) {
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

                const adminAttendanceChart = document.getElementById('admin-attendance-chart').getContext('2d');
                new Chart(adminAttendanceChart, chartConfig);

                // Update the percentage label
                const adminPercentageLabel = document.getElementById('adminPercentageLabel');
                adminPercentageLabel.textContent = `${percentage}%`;
            }

            // Example: To update the admin pie chart with a percentage value (e.g., 65%):
            const adminProgressBarPercentage = 65; // Replace this with your desired percentage value.
            updateAdminPieChart(adminProgressBarPercentage);
        </script>

</body>

</html>