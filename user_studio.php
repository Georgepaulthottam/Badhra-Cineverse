<?php
session_start(); 
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user'] !== "studio") {
    header('Location: login.php');
}
$activePage = 'home';
include 'studio_header.php';

?>
<div id="main-container">
    <div class="top-section">
        <div class="profile-box">
            <h3>Status</h3>
            <table>
                <tr>
                    <br>
                    <td>Date:</td>
                    <td>03/02/23</td>
                </tr>
            </table>
        </div>
        <div class="profile-box" id="timing">
            <h3>Timing</h3>
            <form action="">
            <table>
                <tr>
                    <td><label for="date">Date:</label></td>
                    <td><input type="text" id="date" placeholder="Enter Date"></td>
                </tr>
                <tr>
                    <td><label for="airedTime">Aired Time:</label></td>
                    <td><input type="text" id="airedTime" placeholder="Enter Aired Time"></td>
                </tr>
                <tr>
                    <td><label for="fine">Fine:</label></td>
                    <td><input type="text" id="fine" placeholder="Enter Fine"></td>
                </tr>
                <tr>
                    <td style="text-align:center" colspan="2" class="buttons">
                        <input type="submit" value="Submit" class="studiosubmitbtn" onclick="changeTimingContent()">
                        <button class="studiosubmitbtn">cancel</button>
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
    <div class="top-section">
        <div class="profile-box" style="overflow-x:auto;">
            <h3>Content Table</h3>
            <table>
                <tr>
                    <th>Sl.No</th>
                    <th>Date</th>
                    <th>Content Length</th>
                    <th>Aired Time</th>
                    <th>Fine</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1/2/23</td>
                    <td>1:23:23</td>
                    <td>12:00</td>
                    <td>125</td>
                </tr>
            </table>
            <a href="user_studiohistory.php" style="color:#E2B842;">View More</a>
        </div>
    </div>
</div>
<script>
    var timing = document.getElementById("timing");
    function changeTimingContent(){
        timing.innerHTML ='<h3>Timing</h3>\n' +
            '<table>\n' +
            '    <tr>\n' +
            '       <td>Date : </td>\n' +
            '        <td>23/06/2023</td>\n' +
            '   </tr>\n' +
            '  <tr>\n' +
            '        <td>Aired Time :</td>\n' +
            '        <td>12:00</td>\n' +
            '    </tr>\n' +
            '    <tr>\n' +
            '        <td>Fine :</td>\n' +
            '        <td>250</td>\n' +
            '    </tr>\n' +
            '    </table>';
    }
</script>
<?php include 'studio_footer.php';?>

