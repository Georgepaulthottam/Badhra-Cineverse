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

<?php $activePage = 'catering';
include 'sp_header.php'; ?>


<!------main-content-start----------->


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
                            <td>May</td>
                        </tr>
                    </table>
                </div>
                <div class="profile-box">
        <h4>Status</h4>
        

        <table class="table table-striped table-hover" id="displayTable">
                <td>Item</td>
                <td>Nil</span></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td>2</span></td>
            </tr>
            <tr>
                <td>Amount</td>
                <td>500</span></td>
            </tr>
        </table>
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
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Amount</th>  
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <th>1</th>
                            <th>19/03/2023</th>
                            <th>12:00PM</th>
                            <th>Nil</th>
                            <th>50</th>
                            <th>2000</th>  
                        </tr>
                    </tbody>

                </table>
            </div>
            <a href="#" style="color:#E2B842;">View more</a>
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

</body>

</html>