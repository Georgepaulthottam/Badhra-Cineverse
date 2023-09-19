<?php
session_start(); 
$activePage = 'studio'; 
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user'] !== "super") {
    header('Location: login.php');
}
include 'sp_header.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    
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
    <head>
    <title>Studio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            
        }

        .top-section {
            display: flex;
            justify-content: space-between;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 10px;
            padding: 20px;
            
        }

        .profile-box {
            flex: 1;
            padding: 10px;
        }

        .profile-box h4 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td, table th {
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
            color:black;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
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
        <div class="profile-box">
            <h3>Timing</h3>
            <table>
                <tr>
                    <td>Date:</td>
                    <td>18/10/2023</td>
                </tr>
                <tr>
                    <td>Aired Time: </td>
                    <td>12:00</td>
                </tr>
                <tr>
                    <td>Fine:</td>
                    <td>250</td>
                </tr>
                
            </table>
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
        </div>
    </div>
</div>

</body>




            <!------main-content-end----------->



            <!----footer-design------------->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="footer-in">
                        <p class="mb-0">&copy 2023 Team Helios . All Rights Reserved.</p>
                    </div>
                </div>
            </footer>

</html>