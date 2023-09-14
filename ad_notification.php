<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');

}
require 'connection.php';
 $activePage = 'notification'; 
 include 'adminheadersidebar.php'; ?>

