<?php
session_start();
// Destroy the session
    session_destroy();

    // Redirect the user to the login page after logout
    header('Location: login.php');
    exit;
    ?>