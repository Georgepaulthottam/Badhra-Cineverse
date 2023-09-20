<?php
session_start(); 
$activePage = 'accomodation'; 
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user'] !== "super") {
    header('Location: login.php');
}
include 'sp_header.php';
?>
<!doctype html>
<html lang="en">

<head>
   
<style>
    
</style>
</head>

<body>
    <!------top-navbar-end----------->


    <!------main-content-start----------->
    <div class="main-container">

        hii enter your contents here and remove this
    </div>
        <!------main-content-end----------->



        <!----footer-design------------->

        <footer class="footer">
            <div class="container-fluid">
                <div class="footer-in">
                    <p class="mb-0">&copy 2023 Team Helios. All Rights Reserved.</p>
                </div>
            </div>
        </footer>





    <!-------complete html----------->


  

</body>

</html>