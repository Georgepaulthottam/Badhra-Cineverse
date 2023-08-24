<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
function settime()
{
}
require 'connection.php';
$user = $_SESSION['user'];
$status = $_SESSION['status'];
$query = ("SELECT * FROM cart WHERE username='" . mysqli_real_escape_string($conn, $user) . "' limit 0,5");
$result = mysqli_query($conn, $query);
$query1 = "SELECT * FROM `cart` WHERE username='" . mysqli_real_escape_string($conn, $user) . "'";
$query2 = "SELECT * FROM `cart` WHERE status='approved'and username='" . mysqli_real_escape_string($conn, $user) . "'";
$query3 = "SELECT * FROM `cart` WHERE status='rejected' and username='" . mysqli_real_escape_string($conn, $user) . "'";
$query4 = "SELECT * FROM `cart` WHERE status='requested' and username='" . mysqli_real_escape_string($conn, $user) . "'";




$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);
$result3 = mysqli_query($conn, $query3);
$result4 = mysqli_query($conn, $query4);

// user punch in
// for accepting punchin requests into the attendance_request table
if (isset($_POST['punch-in-btn'])) {
    $dbuserdept = $_SESSION['userdept'];
    $sql = "INSERT INTO attendance_request (username, dept) VALUES ('$user', '$dbuserdept')";
    $punchin = mysqli_query($conn, $sql);
    $sql2 = ("UPDATE users set status='requested' WHERE username='" . mysqli_real_escape_string($conn, $user) . "'");
    $result1 = mysqli_query($conn, $sql2);
    $_SESSION['status'] = 'requested';

    echo "<script>alert('ATTENDANCE REQUEST SUBMITTED')</script>";
    header('Location: user_index.php');
}

?>

<?php $activePage = 'home';
include 'user_header.php'; ?>


<!------main-content-start----------->
<!------main container divided into 3 containers: top, middle,bottom----------->
<!------top-container contains attendence, request status and schedule----------->
<div id="main-container" class="middle-section">
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

            <form style="margin-left:25%" action="" method="post"><?php
                                                                    if ($_SESSION['status'] == 'requested') {
                                                                        echo (' <button class="punch-button" id="punchButton" style=" background: #f4d03f; /* Yellow background for Requested state */">
            <i class="fas fa-fingerprint"></i>Requested</button>');
                                                                    } elseif ($_SESSION['status'] == 'accepted') {
                                                                        echo ('<button class="punch-button" id="punchButton" style="background: #27ae60; /* Green background for Accepted state */">
            <i class="fas fa-check"></i>
            Punched In
        </button>');
                                                                    } else {
                                                                        echo (' <button style=" background: linear-gradient(135deg, #ff5656, #ff8e8e); /* Reddish gradient */
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
                                ');
                                                                    }
                                                                    ?>

            </form>

            <!------punch in button ends----------->

        </div>
        <div class="profile-box">
            <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                Request Status</h3>
            <div class="request-status" id="request_box">
                <table class="table table-striped table-hover">
                    <tr>
                        <a href="">
                            <th>Accepted</th>
                            <th><?php echo ($result2->num_rows) ?></th>
                        </a>
                    </tr>
                    <tr>
                        <th>Rejected</th>
                        <th><?php echo ($result3->num_rows) ?></th>
                    </tr>
                    <tr>
                        <th>pending</th>
                        <th><?php echo ($result4->num_rows) ?></th>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <th><?php echo ($result1->num_rows) ?></th>
                    </tr>
                </table>
                <table>
                    <tr>
                        <th style="text-align: left;"><a href="user_view_request.php" class="punch-in-btn">View Requests</a>
                        </th>
                        <th style="text-align: right;"><a href="user_make_request.php" class="punch-in-btn">Make Requests</a>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
        <div class="profile-box">
            <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                Schedule</h3>
            <div class="request-status" id="schedule_box">
                <table class="table table-striped table-hover">
                    <tr>
                        <a href="">
                            <th>Date</th>
                            <th><?php $time = new DateTime();
                                $date = $time->format('j-n-Y');
                                echo ($date); ?></th>
                        </a>
                    </tr>
                    <tr>
                        <th>Day</th>
                        <th>03</th>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <th>Ernakulam</th>
                    </tr>
                    <tr>
                        <th>Bata</th>
                        <th>First</th>
                    </tr>
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
                            <th>remark</th>
                            <th>Bill No</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {


                            $time = new DateTime($row['date']);
                            $date = $time->format('n-j-Y');
                            $time = $time->format('H:i');

                            echo ('
                                        <tr>
                                        <th>' . $date . '</th>
                                        <th>' . $time . '</th>
                                        <th>' . $row['name'] . '</th>
                                        <th>' . $row['details'] . '</th>
                                        <th>' . $row['price'] . '</th>
                                        <th>' . $row['remark'] . '</th>
                                        <th>' . $row['billno'] . '</th>
                                        <th>' . $row['price'] . '</th>
                                        <th>' . $row['status'] . '</th>
                                    </tr>');
                        }





                        ?>
                    </tbody>

                </table>
            </div>
            <a href="user_view_request.php" style="color:#E2B842;">View more</a>
        </div>
    </div>
    <!------bottom-container contains accomodation and notification----------->
    <div id="bottom-container" class="top-section">
        <div class="profile-box">
            <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                Notifications</h3>
            <div class="recieve">
                <table>
                    <tr>
                        <td>
                            <i class="material-icons">sms</i>
                            <h6>SuperAdmin</h6>
                        </td>
                        <td>
                            <p>Hello. How are you today?</p>
                            <span class="time-right">11:00</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="recieve">
                <table>
                    <tr>
                        <td>
                            <i class="material-icons">sms</i>
                            <h6>SuperAdmin</h6>
                        </td>
                        <td>
                            <p>Hello. How are you today?</p>
                            <span class="time-right">11:00</span>
                        </td>
                    </tr>
                </table>
            </div>
            <a href="user_notification.php" style="color:#E2B842;">View more</a>
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
                backgroundColor: ['#152935', '#f0f0f0'],
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
        percentageLabel.textContent = `${percentage}`;
    }

    // Call this function with the desired percentage value to update the pie chart.
    // Example: updatePieChart(85); // This will update the pie chart to 85%.
    // updatePieChart(50); // This will update the pie chart to 50%.
    // updatePieChart(0);  // This will update the pie chart to 0%.
    <?php echo ("
        // Example: To update the pie chart with the percentage value from the progress bar:
        const progressBarPercentage = " . $_SESSION['attendance'] . "; // Replace this with your desired percentage value.
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
</script>


</body>

</html>