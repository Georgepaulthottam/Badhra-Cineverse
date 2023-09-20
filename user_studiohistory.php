<?php
session_start(); 
$activePage = 'home'; 
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user'] !== "studio") {
    header('Location: login.php');
}
include 'studio_header.php';?>
    <div id="middle-container" class="bottom-section">
        <div class="profile-box" id="request-table" style="overflow-x:auto;">
            <h3>Content Table</h3>
            <table class="table">
                <thead>
                    <tr>
                        <td><b>SI No.</b></td>
                        <td><b>Date</b></td>
                        <td><b>Content Length</b></td>
                        <td><b>Aired Time</b></td>
                        <td><b>Fine</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>1/2/23</td>
                        <td>1:23:23</td>
                        <td>12:00</td>
                        <td>125</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>1/2/23</td>
                        <td>1:23:23</td>
                        <td>12:00</td>
                        <td>125</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>1/2/23</td>
                        <td>1:23:23</td>
                        <td>12:00</td>
                        <td>125</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>1/2/23</td>
                        <td>1:23:23</td>
                        <td>12:00</td>
                        <td>125</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php include 'studio_footer.php';?>?>

