<?php
session_start();
include 'connection.php';
$user = $_SESSION['user'];
$dept = $_SESSION['userdept'];

if (isset($_POST['send'])) {
    $rec = $_POST['recipient'];
    $msg = $_POST['msg'];
    $send_quer = ("INSERT INTO `notifications`( `username`, `dept`, `rec_user`, `content`) 
  VALUES ('$user','$dept','$rec',' $msg')");
    $send_res = mysqli_query($conn, $send_quer);
    header("location:user_notification.php");
}


$activePage = 'notification';
include 'user_header.php'; ?>
<!--<div class="profile-box">
  <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
    Notifications</h3>
  <?php /*
  while ($row = mysqli_fetch_assoc($result)) {


    $time = new DateTime($row['time']);
    $date = $time->format('n.j.Y');
    $time = $time->format('H:i');

    echo ('
  <div class="recieve">
    <table>
      <tr>
        <td>
          <i class="material-icons">sms</i>
          <h6>' . $row['username'] . '</h6>
        </td>
        <td>
          <p>' . $row['content'] . '</p>
          <span class="time-right">' . $time . '</span>
        </td>
      </tr>
    </table>
  </div>');
  }*/ ?>

  <button class="open-button" onclick="openForm()">Chat</button>-->


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <style>
        .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin-left: 50px;
            margin-top: 20px;
            word-break: break-all;
        }

        .darker {
            border-color: #ccc;
            background-color: #ddd;
        }

        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        .container img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
        }

        .container img.right {
            float: right;
            margin-left: 20px;
            margin-right: 0;
        }

        .time-right {
            float: right;
            color: #aaa;
        }

        .time-left {
            float: left;
            color: #999;
        }

        /* Button used to open the chat form - fixed at the bottom of the page */
        .open-button {
            background-color: #25D366;
            color: white;
            font-weight: bolder;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            bottom: 23px;
            right: 28px;
            width: 280px;
        }

        /* The popup chat - hidden by default */
        .chat-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* Full-width textarea */
        .form-container textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
            resize: none;
            min-height: 200px;
        }

        /* When the textarea gets focus, do something */
        .form-container textarea:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/send button */
        .form-container .btn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
            background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover,
        .open-button:hover {
            opacity: 1;
        }

        .notification {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #447e46;
            color: white;
            padding: 10px 20px;
            z-index: 999;
        }

        .notification-box {
            margin-left: 60px;
        }

        @media only screen and (max-width: 767px) {

            .container {
                border: 2px solid #dedede;
                background-color: #f1f1f1;
                border-radius: 5px;
                padding: 10px;
                margin-left: 30px;
                margin-top: 20px;
                width: 330px;
                word-break: break-all;
            }

            .darker {
                border-color: #ccc;
                background-color: #ddd;
            }

            .notification-box {
                margin-left: 70px;
                margin-top: 20px;

            }

            .notification-box button {
                margin-left: 30px;
            }

            h3 {
                font-size: 25px;
            }

            .form-container {
                max-width: 350px;
                padding: 10px;
                height: 45vh;
                background-color: white;
            }

            .form-container h1 {
                font-size: 25px;
            }

            .form-container textarea {

                min-height: 100px;
            }

            .open-button {
                position: fixed;
                bottom: 23px;
                right: 58px;
                width: 280px;

            }
        }
    </style>
</head>

<body>
    <div class="notification-box">


        <h3>Popup Chat Window</h3>
        <form action="#" method="post">
            <button type="submit" name="super-admin" value="super-admin">Super Admin</button>
            <button type="submit" name="admin" value="admin">Admin</button>
        </form>
    </div>
    <?php
    if (isset($_POST['super-admin'])) {
        $query = ("SELECT * FROM notifications WHERE rec_user='" . mysqli_real_escape_string($conn, $dept) . "'and dept='" . mysqli_real_escape_string($conn, 'super') . "'");
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {


            $time = new DateTime($row['time']);
            $date = $time->format('n.j.Y');
            $time = $time->format('H:i');
            echo ('    <div class="container">
      <i class="material-icons">chat_bubble_outline</i>
      <p>' . $row['content'] . '</p>
      <span class="time-right">' . $time . '</span>
    </div>');
        }
        $query2 = ("SELECT * FROM notifications WHERE username='" . mysqli_real_escape_string($conn, $user) . "' AND rec_user='" . mysqli_real_escape_string($conn, 'super') . "'");
        $result2 = mysqli_query($conn, $query2);
        while ($row2 = mysqli_fetch_assoc($result2)) {


            $time2 = new DateTime($row2['time']);
            $date2 = $time2->format('n.j.Y');
            $time2 = $time2->format('H:i');
            echo ('
    <div class="container darker">
      <i class="material-icons">chat</i>
      <p>' . $row2['content'] . '</p>
      <span class="time-left">' . $time2 . '</span>
    </div>');
        }
        echo ('
    
    <div class="notification" id="notification">Message sent!</div>
    <button class="open-button" onclick="openForm()">Chat</button>

    <div class="chat-popup" id="myForm">
      <form class="form-container" action="user_notification.php" method="post">
        <h1>Chat</h1>
        <label for="msg"><b>Message</b></label>
        <textarea placeholder="Type message.." name="msg" required></textarea>
        <input type="text" name="recipient" value="super" hidden>

        <button type="submit" class="btn" id="send-button" name="send" onclick="notify()">Send</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </form>
    </div>');
    }

    if (isset($_POST['admin'])) {
        $query = ("SELECT * FROM notifications WHERE rec_user='" . mysqli_real_escape_string($conn, $dept) . "'and dept='" . mysqli_real_escape_string($conn, 'admin') . "'");
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {


            $time = new DateTime($row['time']);
            $date = $time->format('n.j.Y');
            $time = $time->format('H:i');

            echo ('    <div class="container">
      <i class="material-icons">chat_bubble_outline</i>
      <p>' . $row['content'] . '</p>
      <span class="time-right">' . $time . '</span>
    </div>');
        }
        $query2 = ("SELECT * FROM notifications WHERE username='" . mysqli_real_escape_string($conn, $user) . "'and rec_user='" . mysqli_real_escape_string($conn, 'admin') . "'");
        $result2 = mysqli_query($conn, $query2);
        while ($row2 = mysqli_fetch_assoc($result2)) {


            $time2 = new DateTime($row2['time']);
            $date2 = $time2->format('n.j.Y');
            $time2 = $time2->format('H:i');
            echo ('
    <div class="container darker">
      <i class="material-icons">chat</i>
      <p>' . $row2['content'] . '</p>
      <span class="time-left">' . $time2 . '</span>
    </div>');
        }
        echo ('
    <div class="notification" id="notification">Message sent!</div>
    <button class="open-button" onclick="openForm()">Chat</button>

    <div class="chat-popup" id="myForm">
      <form class="form-container" action="user_notification.php" method="post">
        <h1>Chat</h1>
        <label for="msg"><b>Message</b></label>
        <textarea placeholder="Type message.." name="msg" required></textarea>
        <input type="text" name="recipient" value="admin" hidden>

        <button type="submit" class="btn" id="send-button" name="send" onclick="notify()">Send</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </form>
    </div>');
    }

    ?>



    <div class="notification" id="notification">Message sent!</div>
    <button class="open-button" onclick="openForm()">Chat</button>

    <div class="chat-popup" id="myForm">
        <form class="form-container">
            <h1>Chat</h1>
            <label for="msg"><b>Message</b></label>
            <textarea placeholder="Type message.." name="msg" required></textarea>

            <button type="submit" class="btn" id="send-button" onclick="notify()">Send</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>

    <script>
        const sendButton = document.getElementById('send-button');
        const notification = document.getElementById('notification');
        var mestatus = false;

        function notify() {
            var mestatus = true;
        }

        function openForm() {
            document.getElementById('myForm').style.display = 'block';
        }

        function closeForm() {
            document.getElementById('myForm').style.display = 'none';
            if (mestatus == true) {
                notification.style.display = 'block';
                setTimeout(() => {
                    notification.style.display = 'none';
                }, 3000);
            }
        }
    </script>
    <br><br><br>
    <footer class="footer">
        <div class="container-fluid">
            <div class="footer-in">
                <p class="mb-0">&copy 2023 Team Helios . All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>