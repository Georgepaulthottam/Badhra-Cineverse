<?php
session_start(); 
$activePage = 'crewuser';
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user'] !== "super") {
  header('Location: login.php');
}
include "sp_header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Attendance and Salary Management</title>
<style>
  body {
    font-family: 'Times New Roman', Times, serif;
    background-color: #f0f0f0;
  }
  .container {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    margin: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  }
  .hidden {
    display: none;
  }
</style>
</head>
<body>
  <div class="container">
    <label for="userSelect">Select user:</label>
    <select id="userSelect">
      <option disabled selected>Select user</option>
      <option value="art">Art</option>
      <option value="camera">Camera</option>
      <option value="makeup">Makeup</option>
      <option value="cameraman">Cameraman</option>
      <option value="artist">Artist</option>
    </select>
  </div>

  <div class="container hidden" id="detailsContainer">
    <div style="display: flex; justify-content: space-between;">
      <div>
        <h3>Title: Geetha Govindam</h3>
      </div>
      <div>
        <label for="scheduleSelect"><b>Schedule:</b></label>
        <select id="scheduleSelect">
          <option disabled selected>Select schedule</option>
          <option value="january">January</option>
          <option value="february">February</option>
          <option value="march">March</option>
          <option value="april">April</option>
          <option value="may">May</option>
          <option value="june">June</option>
          <option value="july">July</option>
          <option value="august">August</option>
          <option value="september">September</option>
          <option value="octoebr">October</option>
          <option value="november">November</option>
          <option value="December">December</option>

          <!-- Add more months here -->
        </select>
      </div>
    </div>
  </div>

  <div class="container hidden" id="attendanceContainer">
    <div style="display: flex; justify-content: space-between;">
      <div>
        <p>Attendance Approved: <b>20</b></p>
        <p>Rejected: <b>0</b></p>
        <p>Pending: <b>3</b></p>
        <p>Total Attendance: <b>20/23</b></p>
      </div>
      <div>
        <p>Assigned: <b>17500</b></p>
        <p>TA: <b>2500</b></p>
        <p>TD: <b>1000</b></p>
        <p>Total: <b>21000</b></p>
      </div>
    </div>
  </div>

  <div class="container hidden" id="requestsContainer">
    <h3>Requests</h3>
    <p>No pending requests</p>
  </div>

  <script>
    const userSelect = document.getElementById('userSelect');
    const detailsContainer = document.getElementById('detailsContainer');
    const scheduleSelect = document.getElementById('scheduleSelect');
    const attendanceContainer = document.getElementById('attendanceContainer');
    const requestsContainer = document.getElementById('requestsContainer');

    userSelect.addEventListener('change', () => {
      detailsContainer.classList.remove('hidden');
    });

    scheduleSelect.addEventListener('change', () => {
      attendanceContainer.classList.remove('hidden');
      requestsContainer.classList.remove('hidden');
    });
  </script>
</body>
</html>
