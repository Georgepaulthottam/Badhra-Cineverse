<?php

session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user'] !== "Admin") {
    header('Location: login.php');
}
include "connection.php";
$user = $_SESSION['user'];
$datesql = "SELECT * FROM schedule_day WHERE  DATE(date)=" . mysqli_real_escape_string($conn, 'DATE(NOW())') . " "; 
$dateres1 = mysqli_query($conn, $datesql);
$drow=mysqli_fetch_assoc($dateres1);
$schedule_day=$drow['day_no'];
$schedule_loc=$drow['location'];
$schedule_bata=$drow['bata'];
$att_query = ("SELECT * FROM users WHERE username='" . mysqli_real_escape_string($conn, $user) . "' limit 0,4");
$att_result = mysqli_query($conn, $att_query);
$att_row = mysqli_fetch_assoc($att_result);
$attendance = $att_row['attendance'];
$query8 = ("SELECT * FROM cart WHERE status='" . mysqli_real_escape_string($conn, "requested") . "' limit 0,4");
$result8 = mysqli_query($conn, $query8);
$msquery = ("SELECT * FROM miscellaneous limit 0,4");
$msresult = mysqli_query($conn, $msquery);
$query = ("SELECT * FROM attendance_request limit 0,4");
$result = mysqli_query($conn, $query);
if (isset($_POST['accept_req'])) {
    $id = $_POST['req_id'];
    $query9 = ("update cart set status='approved' where id='$id'");

    $quer = mysqli_query($conn, $query9);
    header("location:index.php");
}
if (isset($_POST['settime'])) {
    $timestamp = strtotime($_POST['time']);
    $mysql_date = date("Y-m-d H:m:s", $timestamp);
    $timequer = "UPDATE schedule_day SET pooja_time = '$mysql_date' where DATE(date)=" . mysqli_real_escape_string($conn, 'DATE(NOW())') . "";
    $timeres = mysqli_query($conn, $timequer);
    header("location:index.php");
}

if (isset($_POST['setloctn'])) {
    $loctn = $_POST['loctn'];
    $locquer = "UPDATE schedule_day SET location = '" . $loctn . "' WHERE  DATE(date)=" . mysqli_real_escape_string($conn, 'DATE(NOW())') . "";
    $locres = mysqli_query($conn, $locquer);
    header("location:index.php");
}
// admin attendance
if (isset($_POST['accept'])) {

    $delid = $_POST['id'];
    $query2 = ("SELECT *FROM attendance_request WHERE id=" . mysqli_real_escape_string($conn, $delid) . " ");
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    $delusername = $row2['username'];
    $deldept = $row2['dept'];
    $query3 = ("INSERT INTO approved_attendance(username,dept) values('" . $delusername . "','" . $deldept . "')");
    $result3 = mysqli_query($conn, $query3);
    $query4 = ("DELETE FROM attendance_request where id=" . mysqli_real_escape_string($conn, $delid) . " ");
    $result4 = mysqli_query($conn, $query4);
    $query5 = ("UPDATE users SET attendance=attendance+1 where username='" . mysqli_real_escape_string($conn, $delusername) . "' ");
    $result5 = mysqli_query($conn, $query5);
    $sql2 = ("UPDATE users set status='accepted' WHERE username='" . mysqli_real_escape_string($conn, $delusername) . "'");
    $result6 = mysqli_query($conn, $sql2);
    echo "<script>alert('Attendance Accepted')</script>";

    header('location:index.php');
}
        //Bata entries
        if (isset($_POST['bata2'])) {
            

            // Create a prepared statement
            $sql = "UPDATE schedule_day SET bata = 2 WHERE DATE(date) = CURDATE()";
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt) {
                // Execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    header('location:index.php');
                } else {
                    // Handle the case where execution fails
                    echo "Error executing query: " . mysqli_error($conn);
                }

                // Close the prepared statement
                mysqli_stmt_close($stmt);
            } else {
                // Handle the case where the prepared statement creation fails
                echo "Error creating prepared statement: " . mysqli_error($conn);
            }
        }

        if (isset($_POST['bata3'])) {
           

            // Create a prepared statement
            $sql = "UPDATE schedule_day SET bata = 3 WHERE DATE(date) = CURDATE()";
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt) {
                // Execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    header('location:index.php');
                } else {
                    // Handle the case where execution fails
                    echo "Error executing query: " . mysqli_error($conn);
                }

                // Close the prepared statement
                mysqli_stmt_close($stmt);
            } else {
                // Handle the case where the prepared statement creation fails
                echo "Error creating prepared statement: " . mysqli_error($conn);
            }
        }

if (isset($_POST['punchin'])) {
    $user = $_SESSION['user'];
    $dbuserdept = $_SESSION['userdept'];
    $sql = "INSERT INTO attendance (username, dept) VALUES ('$user','$dbuserdept')";
    $result7 = mysqli_query($conn, $sql);
    $sql2 = ("UPDATE users SET attendance = attendance+1 ,status='accepted' where username='" . mysqli_real_escape_string($conn, $user) . "' ");
    $result1 = mysqli_query($conn, $sql2);
    $_SESSION['status'] = 'accepted';
    header('location:index.php');
    // echo "alert('ATTENDANCE REQUEST SUBMITTED')";
}
if (isset($_POST['packup'])) {
    echo ("<script>confirm('are sure you want to pack-up?')</script>");
    $dateview = "SELECT * FROM schedule_day WHERE  DATE(date)=" . mysqli_real_escape_string($conn, 'DATE(NOW())') . " ";
    $dateres = mysqli_query($conn, $dateview);
    $daterow = mysqli_fetch_assoc($dateres);
    $day = $daterow['day_no'];
    $sch_date=$daterow['date'];
    $newdate=date('Y-m-d', strtotime($sch_date. ' + 1 days'));
    $datesql = "INSERT INTO schedule_day (schedule_id,day_no,date) VALUES (1," . $day . "+1,'$newdate')";
    $dateres2 = mysqli_query($conn, $datesql);
    //select absent users
    $quer = ("select * from users");
    $presentres=mysqli_query($conn,$quer);
    while ($row = $presentres->fetch_assoc()) {
        $absent_user = $row["username"];
        $absent_dept=$row["dept"];
        $quer2 = ("select * from approved_attendance where  DATE(`datetime`) = DATE(NOW()) and username='$absent_user'");
        $conquer2 = mysqli_query($conn, $quer2);
        if (mysqli_num_rows($conquer2) == 0) {
            $quer2 = ("insert into absent_dates(username,dept) values( '".$absent_user."','".$absent_dept."')");
            $conquer2 = mysqli_query($conn, $quer2);
        }
    }

    $usersql = "update users set status='punched-out' ";
    $userres = mysqli_query($conn, $usersql);
    header('location:index.php');
}

?>
<!-- Active page is for splitting the header into seperate files.. and to recognise each pages -->
<?php $activePage = 'home';
include 'adminheadersidebar.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Admin Dashboard</title>
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
    <link rel="stylesheet" href="css/admin.css" />
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /*confirmation for Packup popup css*/
        .pkp-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: none;
        }

        .pkp-model {
            position: fixed;
            top: 52%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
            z-index: 1001;
            display: none;

        }

        .pkp-model .pkp-model-content {
            position: relative;
            background: #2d2d2d;
            color: #fff;
            padding: 30px;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;

            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
        }

        .pkp-model .pkp-confirmationtext {
            position: relative;
            margin-bottom: 20px;
            text-align: center;
            font-size: 1.25em;
        }

        .pkp-model .pkp-buttoncontainer {
            display: flex;
            justify-content: center;
            gap: 60px;
        }

        .pkp-model .pkp-model-content button {
            position: relative;
            font-size: 1.25em;
            background: black;
            border: none;
            cursor: pointer;
            color: var(--white);
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid white;
            width: 7vw;

        }

        .pkp-model .pkp-model-content button:hover {
            color: #999;
        }

        /*confirmation for Packup css ends*/
    </style>
</head>

<body>
    <!------top-navbar-end----------->


    <!------main-content-start----------->

    <!-- Notification message popup -->

    <div class="notification-popup <?php echo ($activePage === 'home') ? 'active' : ''; ?>">

        <p>Wellcome Back ,<?php echo $_SESSION['user']; ?></p>
        <span class="progress"></span>
    </div>
    <!-- Notification message popup ends-->


    <div id="main-container" class="middle-section">
        <div id="top-container" class="top-section">
            <div class="profile-box">
                <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                    Attendance</h3>
                <a href="#">
                    <div class="pie-chart-container">
                        <canvas id="attendance-chart"></canvas>
                        <div class="percentage-label" id="percentageLabel"></div>
                    </div>
                </a><br>

                <!------punch in button starts----------->

                <form style="margin-left:29%" action="" method="post"><?php
                                                                        if ($_SESSION['status'] == 'accepted') {
                                                                            echo ('<button class="punch-button" id="punchButton" style="background: #27ae60; /* Green background for Accepted state */
               color: white;
            padding: 15px 20px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
           
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            align-items: center"">
            <i class="fas fa-check"></i>
            Punched In
        </button>');
                                                                        } else {
                                                                            echo (' <button style=" background: linear-gradient(135deg, #ff5656, #ff8e8e); /* Reddish gradient */
            color: white;
            padding: 15px 20px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
           
            margin-top:20px;
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            align-items: center"  type ="submit" class="punch-in-btn" id="punch-in-btn"  name ="punchin">
            <i class="fas fa-fingerprint"></i>&nbsp;Punch-in</button>
                                ');
                                                                        }
                                                                        ?>

                </form>

                <!------punch in button ends----------->

            </div>
            <div class="profile-box">
                <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                    Location Details</h3>
                <div class="request-status" id="request1">

                    <form action="" method="post">
                        <div class="input-container">
                            <input placeholder="Enter Pooja Starting Time..." class="input-field" type="text" onfocus="(this.type='time')">
                            <label for="input-field" class="input-label">Enter Pooja Starting Time...</label>
                            <span class="input-highlight"></span>
                        </div>

                        <button type="submit" id="setlocbtn" name="settimebtn">
                            <div class="svg-wrapper-1">
                                <div class="svg-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="currentColor" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8zm-1-10.414V7a1 1 0 0 1 2 0v5.293l2.293 2.293a1 1 0 1 1-1.414 1.414l-3-3a1 1 0 0 1-.293-.707z"></path>
                                    </svg>
                                </div>
                            </div>
                            <span>Set Time</span>
                        </button>

                        <!------Select Optionss with popup----------->


                        <select id="mySelect">
                            <option value="option0" selected>Set Location</option>
                            <option value="option1">Location 1</option>
                            <option value="option2">Location 2</option>
                            <option value="option3">Location 3</option>
                            <option value="others">Others</option>
                        </select>
                        <div class="popup" id="popup">
                            <a class="close" href="#">X</a>
                            <h5>Enter Manually:</h5>

                            <div class="input-container">
                                <input placeholder="Enter Location..." class="input-field" type="text" id="location">
                                <label for="input-field" class="input-label">Enter Location</label>
                                <span class="input-highlight"></span>
                            </div>
                            <br>

                            <div class="input-container">
                                <input placeholder="Enter Rent..." class="input-field" type="text" id="rent">
                                <label for="input-field" class="input-label">Enter Rent</label>
                                <span class="input-highlight"></span>
                            </div>
                            <br>
                            <button onclick="saveChoice()" id="popupbtn">Save</button>

                        </div>

                        <button type="submit" id="setlocbtn" name="setlocbtn">
                            <div class="svg-wrapper-1">
                                <div class="svg-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                                    </svg>
                                </div>
                            </div>
                            <span>Set Location</span>
                        </button>

                        <!---Location rent --->
                        <div class="input-container">
                            <input placeholder="Extra Rent..." class="input-field" type="text">
                            <label for="input-field" class="input-label">Extra Rent</label>
                            <span class="input-highlight"></span>
                        </div>

                        <button type="submit" id="setlocbtn" name="setrentbtn">
                            <div class="svg-wrapper-1">
                                <div class="svg-wrapper">
                                    <!-- Dollar Icon SVG -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="currentColor" d="M10.5 2H9v2h1.3l-.76 8H7v2h1.53l-.76 8H5v2h5.03l.76-8H12v-2H9.03l.76-8zM13 6v2h1.5l.76 8H17v2h-4.53l-.76-8H11V6h2z"></path>
                                    </svg>
                                </div>
                            </div>
                            <span>Sent Rent</span>
                        </button>
                    </form>


                </div>
            </div>
            <div class="profile-box">
                <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                    Bata Details</h3>
                <div class="request-status">
                    <table class="table table-striped table-hover">
                        <tr>
                            <a href="">
                                <th>Current Bata</th>
                                <th>Bata<?php echo $schedule_bata; ?></th>
                            </a>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <th>Ernakulam</th>
                        </tr>

                    </table>
                </div>
                <form action="" method="post">
                    <input type="submit" id="bata1" name="bata1" value="Bata 1" class="bata-btn" disabled>
                    <input type="submit" id="bata2" name="bata2" value="Bata 2" class="bata-btn" <?php if($schedule_bata==2){echo "disabled";} ?>>
                    <input type="submit" id="bata3" name="bata3" value="Bata 3" class="bata-btn"<?php if($schedule_bata==3){echo "disabled";} ?> >
                </form>

            </div>
        </div>
        <br>
        <!------middle-container contains  attendance request details----------->
        <div id="middle-container" class="bottom-section">
            <div class="detailed-box" id="request-table">
                <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Attendance Requests
                </h3>
                <div class="request-table" style="overflow-x:auto;">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <?php
                                if (mysqli_num_rows($result) != 0) {
                                ?>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Time</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        echo ('
								<tr>

									<th>' . $row['username'] . '</th>
									<th>' . $row['dept'] . '</th>
									<th>Time</th>
									<th>702341231</th>

									<th>
									<form action="index.php" method="post">
									    <input type="text" name="id" value="' . $row['id'] . '" hidden>
										<input type="submit" name="accept" value="Accept" class="edit" >
											
										
										<input type="submit" value="Decline" class="delete" data-toggle="modal">

										</form>
									</th>
								</tr>');
                                    }
                                } else {
                                    echo ('<h2>No Pending Requests</h2>');
                                }

                        ?>
                        </tbody>

                    </table>
                </div>
                <a href="Attendance.php" style="color:#E2B842;">View more</a>
            </div>
        </div>
        <br>
        <!------bottom-container contains Other requests panel----------->
        <div id="middle-container" class="bottom-section">
            <div class="detailed-box" id="request-table">
                <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Other Requests
                </h3>
                <div class="request-table" style="overflow-x:auto;">

                    <table class="table table-striped table-hover">
                        <thead>
                            <?php
                            if (mysqli_num_rows($result8) != 0) {
                            ?>
                                <tr>

                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>price</th>
                                    <th>Remark</th>
                                    <th>Bill No</th>
                                    <th>actions</th>
                                </tr>
                        </thead>

                        <tbody>
                        <?php
                                while ($row = mysqli_fetch_assoc($result8)) {


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



                                        <th>
									<form action="index.php" method="post">
									    <input type="text" name="req_id" value="' . $row['id'] . '" hidden>
										<input type="submit" name="req_accept" value="Accept" class="edit" >
											
										
										<input type="submit" value="Decline" class="delete" data-toggle="modal">

										</form>
										</a>
										</th>

								</tr>');
                                }
                            } else {
                                echo ('<h2>No Pending Requests</h2>');
                            }
                        ?>


                        </tbody>

                    </table>
                    </form>
                </div>
                <a href="Requests.php" style="color: #E2B842;">View more</a>
            </div>
        </div>
        <br>
        <!--- Misc Section Box--->
        <div id="middle-container" class="bottom-section">
            <div class="detailed-box" id="request-table">
                <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Miscellaneous
                </h3>
                <div class="request-table" style="overflow-x:auto;">

                    <table class="table table-striped table-hover">
                        <thead>
                            <?php
                            if (mysqli_num_rows($msresult) != 0) {
                                $sum = 0;
                                $no = 0;

                            ?>
                                <tr>

                                    <th>SI No</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Purpose</th>
                                    <th>Time</th>
                                    <th>Remark</th>
                                    <th>Amount</th>
                                </tr>
                        </thead>

                        <tbody>
                        <?php
                                while ($msrow = mysqli_fetch_assoc($msresult)) {


                                    $time = new DateTime($msrow['timestamp']);
                                    $date = $time->format('j.n.Y');
                                    $time = $time->format('H:i A');

                                    $no = $no + 1;

                                    echo ('
                                        <tr>
  <td>' . $no . '</td>
      <td>' . $date . '</td>
      <td>' . $msrow['name'] . '</td>
      <td>' . $msrow['purpose'] . '</td>
      <td>' . $time . '</td>
      <td>' . $msrow['remark'] . '</td>
      <td>' . $msrow['amount'] . '</td>');
                                    $sum = $sum + $msrow['amount'];
                                    echo ('</tr>');
                                }
                            } else {
                                echo ('<h2>No Pending Requests</h2>');
                            }
                        ?>


                        </tbody>

                    </table>
                    </form>
                </div>
                <a href="misc.php" style="color: #E2B842;">View more</a>
            </div>
        </div>

        <!------Packup Button----------->



        <button name="Packup" class="packupbtn" id="packupBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none" class="svg-icon">
                <g stroke-width="2" stroke-linecap="round" stroke="#fff">
                    <rect y="5" x="4" width="16" rx="2" height="16"></rect>
                    <path d="m8 3v4"></path>
                    <path d="m16 3v4"></path>
                    <path d="m4 11h16"></path>
                </g>
            </svg>
            <span class="lable">Packup</span>
        </button>

        <div id="pkp-overlay" class="pkp-overlay"></div>
        <div id="pkp-custom-confirm" class="pkp-model" style="display:none">
            <div class="pkp-model-content">
                <div class="pkp-confirmationtext">
                    <p>Do you really want to end today's schedule?</p>
                </div>
                <form method="post" action="index.php">
                    <div class="pkp-buttoncontainer">


                        <button type="submit" id="pkp-yes-button" name="packup">Packup</button>
                        <button id="pkp-no-button">Cancel</button>
                    </div>
            </div>
        </div>
        </form>


        <!------Packup Button Ends----------->
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





    <script>
        //script for attendance piechart
        function updatePieChart(percentage) {
            const chartData = {
                labels: ['Attended', 'Missed'],
                datasets: [{
                    data: [percentage, 100 - percentage],
                    backgroundColor: ['#152935', '#f0f0f0'],
                    borderWidth: 0,
                }],
            };

            const chartConfig = {
                type: 'doughnut',
                data: chartData,
                options: {
                    cutout: '70%',
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                    },
                    tooltips: {
                        enabled: false,
                    },
                },
            };

            const attendanceChart = document.getElementById('attendance-chart').getContext('2d');
            new Chart(attendanceChart, chartConfig);

            // Update the percentage label
            const percentageLabel = document.getElementById('percentageLabel');
            percentageLabel.textContent = `${percentage}%`;
        }

        // Call this function with the desired percentage value to update the pie chart.
        // Example: updatePieChart(85); // This will update the pie chart to 85%.
        // updatePieChart(50); // This will update the pie chart to 50%.
        // updatePieChart(0);  // This will update the pie chart to 0%.
        <?php echo ("
        // Example: To update the pie chart with the percentage value from the progress bar:
        const progressBarPercentage = " . $attendance . "; // Replace this with your desired percentage value.
        updatePieChart(progressBarPercentage);

        //script for Accomodation Textbox (other)
        function accomodation() {
            if(document.getElementById('accomLocation').style.visibility == 'visible'){
                document.getElementById('accomLocation').style.visibility = 'hidden';
            }
            else{
                document.getElementById('accomLocation').style.visibility = 'visible';
            }
        }


        //Script for puchin buttton
        

        ");
        ?>
    </script>




    <script>
        // Function to show the popup when "Others" option is selected
        document.getElementById("mySelect").addEventListener("change", function() {
            var popup = document.getElementById("popup");
            var select = document.getElementById("mySelect");
            if (select.value === "others") {
                popup.style.display = "block";
            } else {
                popup.style.display = "none";
            }
        });

        // Function to save the choice and hide the popup
        function saveChoice() {
            var select = document.getElementById("mySelect");
            var locationInput = document.getElementById("location").value;
            var rentInput = document.getElementById("rent").value;
            var newOptionText = locationInput + " - " + rentInput;

            if (locationInput && rentInput) {
                var newOption = document.createElement("option");
                newOption.value = "custom";
                newOption.innerHTML = newOptionText;
                select.appendChild(newOption);
                select.value = "custom";
                var popup = document.getElementById("popup");
                popup.style.display = "none";
            } else {
                alert("Please enter both location and rent.");
            }
        }

        //Close the popup
        // From http://jsfiddle.net/LxauG/606/

        $('.close').click(function() {
            $(".popup").fadeOut(300);
            location.reload();
        });

        $(".popup").on('blur', function() {
            $(this).fadeOut(300);
        });
    </script>
    <script>
        //for logout popup
        const pkpBtn = document.getElementById("packupBtn");
        const pkp_overlay = document.getElementById('pkp-overlay');
        const pkp_customConfirm = document.getElementById('pkp-custom-confirm');
        const pkp_yesButton = document.getElementById('pkp-yes-button');
        const pkp_noButton = document.getElementById('pkp-no-button');

        pkpBtn.addEventListener("click", () => {
            pkp_overlay.style.display = 'block';
            pkp_customConfirm.style.display = 'block';
        });

        pkp_yesButton.addEventListener('click', function() {
            // Perform logout action here
            window.location.href = "";
        });

        pkp_noButton.addEventListener('click', function() {
            pkp_overlay.style.display = 'none';
            pkp_customConfirm.style.display = 'none';
        });
    </script>

</body>

</html>