<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user'] !== "Admin") 
{
    header('Location: login.php'); 
}
require 'connection.php';
?>
<?php 
$activePage='salary';
include 'adminheadersidebar.php';
?>
<div class="middle-section" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
    <div class="salary-status">
        <div class="salary-status-child" style="overflow-x:auto;">
        <h4>SALARY REPORT</h4>
        <table class="table table-striped table-hover" style="color:white;">
            <tr>
                <td>Sl no</td>
                <td>Date</td>
                <td>Username</td>
                <td>Dept</td>
                <td>Payment Status</td>
                <td>TA</td>
            </tr>
            <tr>
                <td>AAA</td>
                <td>AAA</td>
                <td>AAA</td>
                <td>AAA</td>
                <td>AAA</td>
                <td><input type="text" placeholder="Enter TA" style="width: 50%;"></td>
            </tr>
            <tr>
                <td>AAA</td>
                <td>AAA</td>
                <td>AAA</td>
                <td>AAA</td>
                <td>AAA</td>
                <td><input type="text" placeholder="Enter TA" style="width: 50%;"></td>
            </tr>
        </table>
        <input type="submit" class="view-btn">
        </div>
    </div>
</div>
<script>
</script>
   
