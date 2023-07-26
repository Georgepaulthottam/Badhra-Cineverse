<?php
session_start();
require 'connection.php';
$user=$_SESSION['user'];
$query=("SELECT * FROM cart WHERE username='".mysqli_real_escape_string($conn,$user)."' limit 0,5");
$result=mysqli_query($conn,$query);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Art Department</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- css3 -->
    <link rel="stylesheet" href="css/custom.css">

    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />

    <!--user css-->
    <link rel="stylesheet" href="css/user.css" />

    <script type="text/javascript" src="main.js"></script>

    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>



    <div class="wrapper">

        <div class="body-overlay"></div>

        <!-------sidebar--design------------>

        <div id="sidebar">
            <div class="sidebar-header">
                <h3><img src="img/logo.png" class="img-fluid" /><span>BadhraCineverse</span></h3>
            </div>
            <ul class="list-unstyled component m-0">
                <li class="active">
                    <a href="#" class="dashboard"><i class="material-icons">dashboard</i>Dashboard </a>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">aspect_ratio</i>Layouts
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                        <li><a href="#">layout 1</a></li>
                        <li><a href="#">layout 2</a></li>
                        <li><a href="#">layout 3</a></li>
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">aspect_ratio</i>Layouts
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                        <li><a href="#">layout 1</a></li>
                        <li><a href="#">layout 2</a></li>
                        <li><a href="#">layout 3</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">equalizer</i>charts
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu3">
                        <li><a href="#">Pages 1</a></li>
                        <li><a href="#">Pages 2</a></li>
                        <li><a href="#">Pages 3</a></li>
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">extension</i>UI Element
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu4">
                        <li><a href="#">Pages 1</a></li>
                        <li><a href="#">Pages 2</a></li>
                        <li><a href="#">Pages 3</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">border_color</i>forms
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu5">
                        <li><a href="#">Pages 1</a></li>
                        <li><a href="#">Pages 2</a></li>
                        <li><a href="#">Pages 3</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">grid_on</i>tables
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
                            <div class="xp-searchbar">
                                <form>
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit" id="button-addon2">Go
                                            </button>
                                        </div>
                                    </div>
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

                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                <span class="material-icons">question_answer</span>
                                            </a>
                                        </li>

                                        <li class="dropdown nav-item">
                                            <a class="nav-link" href="#" data-toggle="dropdown">
                                                <img src="img/user.jpg" style="width:40px; border-radius:50%;" />
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
                        <h4 class="page-title">Art Department</h4>
                        <ol class="breadcrumb">

                        </ol>
                    </div>


                </div>
            </div>
            <!------top-navbar-end----------->


            <!------main-content-start----------->
            <!------main container divided into 3 containers: top, middle,bottom----------->
            <!------top-container contains attendence, request status and schedule----------->
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
                        <button class="punch-in-btn" id="punch-in-btn" onclick="punchIn()"> PUNCH IN </button>
                    </div>
                    <div class="profile-box">
                        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                            Request Status</h3>
                        <div class="request-status">
                            <table>
                                <tr style="border-bottom: 1px solid rgb(14, 243, 14);">
                                    <a href="">
                                        <th>Accepted</th>
                                        <th>2</th>
                                    </a>
                                </tr>
                                <tr style="border-bottom: 1px solid rgb(249, 2, 2);">
                                    <th>Rejected</th>
                                    <th>2</th>
                                </tr>
                                <tr style="border-bottom: 1px solid rgb(248, 237, 22);">
                                    <th>pending</th>
                                    <th>2</th>
                                </tr>
                                <tr>
                                    <th style="text-align: left;"><a href="user_view_request.php"
                                            class="punch-in-btn">View Requests</a>
                                    </th>
                                    <th style="text-align: left;"><a href="user_make_request.php"
                                            class="punch-in-btn">Make Requests</a>
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="profile-box">
                        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                            Schedule</h3>
                        <div class="request-table" style="overflow-x:auto;">
                            <table class="table table-striped table-hover">
                                <thead style="color: black;">
                                    <tr>
                                        <th style="font-weight: bolder;">Start Date</th>
                                        <th style="font-weight: bold;">25/07/2023</th>
                                    </tr>
                                    <tr>
                                        <th style="font-weight: bolder;">Day</th>
                                        <th style="font-weight: bolder;">03</th>
                                    </tr>
                                    <tr>
                                        <th style="font-weight: bolder;">Location</th>
                                        <th style="font-weight: bold;">Ernalulam</th>
                                    </tr>
                                    <tr>
                                        <th style="font-weight: bolder;">Bata</th>
                                        <th style="font-weight: bold;">First</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <a href="#" class="punch-in-btn">View Details</a>
                    </div>
                </div>
                <!------middle-container contains request details----------->
                <div id="middle-container" class="bottom-section">
                    <div class="detailed-box" id="request-table">
                        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Request
                        </h3>
                        <div class="request-table" style="overflow-x:auto;">

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Item</th>
                                        <th>Description</th>
                                        <th>price</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                    while($row=mysqli_fetch_assoc($result)){
                                        

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
                                        <th>'.$row['price']*$row['number'].'</th>
                                        <th>'.$row['status'].'</th>
                                    </tr>');
                                    }
                                    
                                   
                                    


                                ?>
                                </tbody>
                                 
                            </table>
                        </div>
                        <a href="user_view_request.php" style="color: red;">View more</a>
                    </div>
                </div>
                <!------bottom-container contains accomodation and notification----------->
                <div id="bottom-container" class="top-section">
                    <div class="profile-box" id="Accommodation">
                        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                            Accommodation</h3>
                        <h6 style="text-align:left;">Accommodation : </h6>
                        <div class="request-table" style="overflow-x:auto;">
                            <form action="#">
                                <table class="table table-striped table-hover">
                                    <thead style="color: black;">
                                        <tr>
                                            <th style="font-weight: bolder;">
                                                Home:<br></Home:br><input type="radio" id="AccomHome"
                                                    name="Accomdation">
                                            </th>
                                            <th style="font-weight: bolder;">
                                                Hotel:<br><input type="radio" id="AccomHotel" name="Accomdation">
                                            </th>
                                            <th style="font-weight: bolder;">
                                                Other: <br> <input type="radio" id="AccomOther" name="Accomdation"
                                                    onchange="accomodation()">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" style="align-content:center;"><input type="text"
                                                    id="accomLocation" style="visibility: hidden;"></th>
                                        </tr>
                                    </thead>
                                </table>
                                <input type="submit" id="accomBtn" name="accomBtn" class="punch-in-btn" value="Save">
                            </form>
                        </div>
                    </div>
                    <div class="profile-box">
                        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                            Notifications</h3>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: left;">
                                        <h6>From : <br>Super Admin</h6>
                                    </th>
                                    <th>
                                        <p style="text-align:left;">Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit.</p>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="text-align: left;">
                                        <h6>From : <br>Super Admin</h6>
                                    </th>
                                    <th>
                                        <p style="text-align:left;">Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit.</p>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                        <a href="request_details.html" style="color: red;">View more</a>
                    </div>
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
    
    <script>
        //script for attendance piechart
        function updatePieChart(percentage) {
            const chartData = {
                labels: ['Attended', 'Missed'],
                datasets: [{
                    data: [percentage, 100 - percentage],
                    backgroundColor: ['#8ec2ea', '#f0f0f0'],
                    borderWidth: 0,
                }],
            };

            const chartConfig = {
                type: 'doughnut',
                data: chartData,
                options: {
                    cutout: '60%',
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
        const progressBarPercentage = ".$_SESSION['attendance']."; // Replace this with your desired percentage value.
        updatePieChart(progressBarPercentage);

        //script for Accomodation Textbox (other)
        function accomodation() {
            document.getElementById('accomLocation').style.visibility = 'visible';
        }

        //Script for puchin buttton
        function punchIn(){
            document.getElementById('punch-in-btn').style.color='green';
            document.getElementById('punch-in-btn').style.border='1px solid green';
            document.getElementById('punch-in-btn').textContent='Punched';

        }

    </script>
   ");
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>