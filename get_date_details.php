<?php
// Assuming you have a database connection established already
// Replace DB_HOST, DB_USER, DB_PASSWORD, and DB_NAME with your actual database credentials

$connection=MYSQLI_CONNECT("localhost","root",'',"sample");

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_GET['date'])) {
    $selectedDate = $_GET['date'];

    $query = "SELECT salary, requests FROM date_details WHERE date = '$selectedDate'";

    $result = mysqli_query($connection, $query);
    $count=mysqli_num_rows($result);
    if ($count>0) {
        $data = mysqli_fetch_assoc($result);
        echo json_encode($data);
    } else {
        echo json_encode(["error" => "Error executing query"]);
    }
} else {
    echo json_encode(["error" => "Invalid date"]);
}

mysqli_close($connection);
?>
