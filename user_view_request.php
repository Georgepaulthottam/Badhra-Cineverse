<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
require 'connection.php';
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/buttons.css">

</head>
<script>
    function selectButton(button) {
        const buttons = document.querySelectorAll('.custom-button');
        buttons.forEach(btn => {
            btn.classList.remove('selected');
        });
        button.classList.add('selected');
    }
</script>





<?php $activePage = 'request';
include 'user_header.php'; ?>


<!------main-content-start----------->

<div class="main-content">
    <section id="view-request">
        <div class="detailed-box" id="request-table">
            <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Request
            </h3>
            <div class="attendence" style="overflow-x:auto;">

                <body>
                    <form action="user_view_request.php" method="post">
                        <button class="custom-button accepted" onclick="selectButton(this)" type="submit" name="accept" value="">Accepted</button>
                        <button class="custom-button rejected" onclick="selectButton(this)" type="submit" name="rejected" value="">Rejected</button>
                        <button class="custom-button pending" onclick="selectButton(this)" type="submit" name="requested" value="">Pending</button>
                        <button class="custom-button all" onclick="selectButton(this)" type="submit" name="all" value="">All</button>
                    </form>
                    <br>
                </body>

                <table class="table user_req table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Remark</th>
                            <th>Bill No</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Payment-Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        if (isset($_POST['accept'])) {
                            $query = ("SELECT * FROM cart WHERE status='" . mysqli_real_escape_string($conn, "approved") . "' and username='" . mysqli_real_escape_string($conn, $user) . "'");
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {


                                $time = new DateTime($row['date']);
                                $date = $time->format('n.j.Y');
                                $time = $time->format('H:i');

                                echo ('
                                        <tr>
                                        <th>' . $date . '</th>
                                        <th>' . $time . '</th>
                                        <th>' . $row['name'] . '</th>
                                        <th>' . $row['details'] . '</th>
                                        <th>' . $row['remark'] . '</th>
                                        <th>' . $row['billno'] . '</th>
                                        <th>' . $row['price'] . '</th>
                                        <th>' . $row['status'] . '</th>
                                        ');
                                        if($row['payment_status']=="paid"){
                                            echo ('<th style="color:green">Paid</th>');

                                        }
                                        else{
                                            echo ('<th style="color:red">Not Paid</th>');
                                        }
                                        echo ('
                                    </tr>');
                            }
                        } elseif (isset($_POST['rejected'])) {
                            $query = ("SELECT * FROM cart WHERE status='" . mysqli_real_escape_string($conn, "rejected") . "' and username='" . mysqli_real_escape_string($conn, $user) . "'");
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {


                                $time = new DateTime($row['date']);
                                $date = $time->format('n.j.Y');
                                $time = $time->format('H:i');

                                echo ('
                                        <tr>
                                        <th>' . $date . '</th>
                                        <th>' . $time . '</th>
                                        <th>' . $row['name'] . '</th>
                                        <th>' . $row['details'] . '</th>
                                        <th>' . $row['price'] . '</th>
                                        <th>' . $row['remark'] . '</th>
                                        <th>' . $row['billno'] . '</th>
                                        <th>' . $row['price']  . '</th>
                                        <th>' . $row['status'] . '</th>
                                    </tr>');
                            }
                        } elseif (isset($_POST['requested'])) {
                            $query = ("SELECT * FROM cart WHERE status='" . mysqli_real_escape_string($conn, "requested") . "'and username='" . mysqli_real_escape_string($conn, $user) . "'");
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {


                                $time = new DateTime($row['date']);
                                $date = $time->format('n.j.Y');
                                $time = $time->format('H:i');

                                echo ('
                                        <tr>
                                        <th>' . $date . '</th>
                                        <th>' . $time . '</th>
                                        <th>' . $row['name'] . '</th>
                                        <th>' . $row['details'] . '</th>
                                    
                                        <th>' . $row['remark'] . '</th>
                                        <th>' . $row['billno'] . '</th>
                                        <th>' . $row['price'] . '</th>
                                        <th>' . $row['status'] . '</th>');
                                        if($row['payment_status']=="paid"){
                                            echo ('<th style="color:green">Paid</th>');

                                        }
                                        else{
                                            echo ('<th style="color:red">Not Paid</th>');
                                        }
                                        echo ('
                                    </tr>');
                                   
                            }
                        } elseif (isset($_POST['all'])) {
                            $query = ("SELECT * FROM cart WHERE username='" . mysqli_real_escape_string($conn, $user) . "'");
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {


                                $time = new DateTime($row['date']);
                                $date = $time->format('n.j.Y');
                                $time = $time->format('H:i');

                                echo ('
                                        <tr>
                                        <th>' . $date . '</th>
                                        <th>' . $time . '</th>
                                        <th>' . $row['name'] . '</th>
                                        <th>' . $row['details'] . '</th>
                                        <th>' . $row['remark'] . '</th>
                                        <th>' . $row['billno'] . '</th>
                                        <th>' . $row['price']  . '</th>
                                        <th>' . $row['status'] . '</th>');
                                if ($row['payment_status'] == "paid") {
                                    echo ('<th style="color:green">Paid</th>');
                                } else {
                                    echo ('<th style="color:red">Not Paid</th>');
                                }
                                echo ('
                                    </tr>');
                                   
                            }
                        } else {
                            $query = ("SELECT * FROM cart WHERE   username='" . mysqli_real_escape_string($conn, $user) . "'");
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {


                                $time = new DateTime($row['date']);
                                $date = $time->format('n.j.Y');
                                $time = $time->format('H:i');

                                echo ('
                                        <tr>
                                        <th>' . $date . '</th>
                                        <th>' . $time . '</th>
                                        <th>' . $row['name'] . '</th>
                                        <th>' . $row['details'] . '</th>
                                        <th>' . $row['price'] . '</th>
                                        <th>' . $row['remark'] . '</th>
                                        <th>' . $row['billno'] . '</th>
                                        <th>' . $row['price'] . '</th>
                                        <th>' . $row['status'] . '</th>
                                    </tr>');
                            }
                        }





                        ?></tbody>


                </table>

            </div>
    </section>
</div>
<!------main-content-end----------->



<!----footer-design------------->

<footer class="footer">
    <div class="container-fluid">
        <div class="footer-in">
            <p class="mb-0">&copy 2023 Team Helios . All Rights Reserved.</p>
        </div>
    </div>
</footer>




</div>

</div>

<!-------complete html----------->

</html>