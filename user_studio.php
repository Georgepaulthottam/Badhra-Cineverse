<?php
session_start(); 
$activePage = 'home'; 
include 'studio_header.php';
?>
<!doctype html>
<html lang="en">
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

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s;
            
        }

        input[type="text"]:focus {
            border-color: #007bff;
        }

        .buttons {
            text-align: right;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            margin-right: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
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
                    <td colspan="2" class="buttons">
                        <a href ='user_studioafter.php'><button id="submitBtn">Submit</button>
                        <button id="cancelBtn">Cancel</button>
                    </td>
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
            <a href="user_studiohistory.php">View More</a>
        </div>
    </div>
</div>

</body>
</html>



            <!------main-content-end----------->



            <!----footer-design------------->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="footer-in">
                        <p class="mb-0">&copy 2023 Team Helios . All Rights Reserved.</p>
                    </div>
                </div>
            </footer>
