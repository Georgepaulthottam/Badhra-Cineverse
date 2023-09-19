<?php
session_start(); 
$activePage = 'history'; 
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user'] !== "super") {
    header('Location: login.php');
}
include 'studio_header.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Studio</title>
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
        
</head>
<style>
    <style>
    .body {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        background-color: #111;
        color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .middle-container {
        margin: 20px;
    }

    .detailed-box {
        background-color: #222;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .table {
        border-radius: 0.25em;
        border-collapse: collapse;
        width: 100%;
        margin: 1em 0;
        color: grey;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .table th {
        background: #152935;
        border-bottom: 1px solid #364043;
        color: #fff;
        font-size: 0.85em;
        font-weight: 600;
        padding: 0.65em 1em;
        text-align: left;
        vertical-align: middle;
        transition: background-color 0.25s ease; /* Added transition property */
    }

    .table td {
        padding: 0.65em 1em;
        vertical-align: middle;
    }

    .table tbody tr {
        transition: background-color 0.25s ease; 
    }

    .table tbody tr:hover {
        background-color: #014055;
    }

    .table thead th:first-child,
    .table tbody td:first-child {
        padding-left: 0;
    }

    .table thead th:last-child,
    .table tbody td:last-child {
        padding-right: 0;
    }
</style>

</style>

<body>
    <br>
    <div id="middle-container" class="bottom-section">
        <div class="detailed-box" id="request-table">
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
</body>
 <!----footer-design------------->

 <footer class="footer">
                <div class="container-fluid">
                    <div class="footer-in">
                        <p class="mb-0">&copy 2023 Team Helios . All Rights Reserved.</p>
                    </div>
                </div>
            </footer>

</html>