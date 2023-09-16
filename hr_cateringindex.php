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

?>

<?php $activePage = 'home';
include 'hr_cateringheader.php'; ?>


<!------main-content-start----------->

<!-- Notification message popup -->
		  
<div class="notification-popup <?php echo ($activePage === 'home') ? 'active' : ''; ?>">
        
        <p>Wellcome Back ,<?php  echo $_SESSION['user']; ?></p>
        <span class="progress"></span>
         </div>
 <!-- Notification message popup ends-->

  <!------main-content-start----------->
  <div id="main-container" class="middle-section">
            <div class="top-section">
                <div class="profile-box">
                    <h4>Details</h4>
                    <table class="table table-striped table-hover">
                        <tr>
                            <td>Date</td>
                            <td>19/05/2023</td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>Geetha Govindham</td>
                        </tr>
                        <tr>
                            <td>Schedule</td>
                            <td>October</td>
                        </tr>
                    </table>
                </div>
                <div class="profile-box">
                <h4>Status</h4>
                    
                </div>
            </div>
            
        </div>

            <!------main-content-end----------->

    <!------middle-container contains request details----------->
    <div id="middle-container" class="bottom-section">
        <div class="detailed-box" id="request-table">
            <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">History
            </h3>
            <div class="request-table" style="overflow-x:auto;">

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Si.No</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Quantity</th>
                            <th>Amount</th>  
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
                                        <th>' . $row['price'] . '</th>>
                                    </tr>');
                        }





                        ?>
                    </tbody>

                </table>
            </div>
            <a href="hr_cateringhistory.php" style="color:#E2B842;">View more</a>
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