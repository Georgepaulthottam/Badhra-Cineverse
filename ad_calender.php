<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');

}
require 'connection.php';

?>
<?php $activePage = 'calender'; include 'adminheadersidebar.php'; ?>


