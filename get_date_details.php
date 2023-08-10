<?php
// Assuming you have a database connection established already
// Replace DB_HOST, DB_USER, DB_PASSWORD, and DB_NAME with your actual database credentials

$connection=MYSQLI_CONNECT("localhost","root",'',"bhadra");

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_GET['date'])) {
    $selectedDate = $_GET['date'];
    $query1 = "SELECT * FROM `cart` WHERE date LIKE '$selectedDate%'";
    $query2 = "SELECT * FROM `cart` WHERE status='approved'and date LIKE '$selectedDate%'";
    $query3 = "SELECT * FROM `cart` WHERE status='rejected' and date LIKE '$selectedDate%'";
    //$query4 = "SELECT * FROM `salary` WHERE date LIKE '$selectedDate%'";
    //$query5 = "SELECT * FROM `accomodation` WHERE date LIKE '$selectedDate%'";
    

    $result1 = mysqli_query($connection, $query1);
    $result2 = mysqli_query($connection, $query2);
    $result3 = mysqli_query($connection, $query3);
    //$result4 = mysqli_query($connection, $query4);
    //$result5 = mysqli_query($connection, $query5);

    if ($result1) {
        $data['details1'] = mysqli_num_rows($result1);
    }

    if ($result2) {
        $data['details2'] =mysqli_num_rows($result2);
    }
    if ($result3) {
        $data['details3'] =mysqli_num_rows($result3);
    }
    // if ($result4) {
    //     $data['details4'] = mysqli_fetch_assoc($result4);
    // }
    // if ($result5) {
    //     $data['details5'] = mysqli_fetch_assoc($result5);
    // }
    echo json_encode($data);
} else {
    echo json_encode(["error" => "Invalid date"]);
}

mysqli_close($connection);
?>
