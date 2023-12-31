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
<div id="user_chat">
<h2>Popup Chat Window</h2>
<form action="#" Method="post">
  <button type="submit" name="super-admin" value="super-admin" id="noti_btns">Super Admin</button>
  <button type="submit" name="admin" value="admin" id="noti_btns" >Admin</button>
</form>
 <?php
    if (isset($_POST['super-admin'])) {
        $query = ("SELECT * FROM notifications WHERE rec_user='" . mysqli_real_escape_string($conn, $dept) . "'and dept='" . mysqli_real_escape_string($conn, 'super') . "'");
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {


            $time = new DateTime($row['time']);
            $date = $time->format('n.j.Y');
            $time = $time->format('H:i');
            echo('
<div class="container">
  <i class="material-icons">chat_bubble_outline</i>
  <p>' . $row['content'] .'</p>
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
  <p>' . $row2['content'] .'</p>
  <span class="time-left">' . $time2 . '</span>
</div>');
    }
echo('


<div class="notification" id="notification">Message sent!</div>
<button class="open-button" onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm">
  <form class="form-container" method="post" action="#">
    <h1>Chat</h1>
    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="msg" required></textarea>
    <input type="text" name="recipient" value="super" hidden>

    <button type="submit" class="btn" name="send"  id="send-button" onclick="notify()">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
</div>');
    
  }
    if (isset($_POST['admin'])) {
      $query = ("SELECT * FROM notifications WHERE rec_user='" . mysqli_real_escape_string($conn, $dept) . "'and dept='" . mysqli_real_escape_string($conn, 'admin') . "'");
      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_assoc($result)) {


        $time = new DateTime($row['time']);
        $date = $time->format('n.j.Y');
        $time = $time->format('H:i');
        echo ('
<div class="container">
  <i class="material-icons">chat_bubble_outline</i>
  <p>' . $row['content'] . '</p>
  <span class="time-right">' . $time . '</span>
</div>');
      }
      $query2 = ("SELECT * FROM notifications WHERE username='" . mysqli_real_escape_string($conn, $user) . "' AND rec_user='" . mysqli_real_escape_string($conn, 'admin') . "'");
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
  <form class="form-container" method="post" action="#">
    <h1>Chat</h1>
    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="msg" required></textarea>
    <input type="text" name="recipient" value="admin" hidden>

    <button type="submit" class="btn" name="send" id="send-button" onclick="notify()">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
</div>');
      
    }
    ?>
<footer class="footer">
    <div class="container-fluid">
        <div class="footer-in">
            <p class="mb-0">&copy 2023 Team Helios . All Rights Reserved.</p>
        </div>
    </div>
</footer>
<script>
  const sendButton = document.getElementById('send-button');
  const notification = document.getElementById('notification');
  var mestatus=false;
  function notify(){
    var mestatus=true;
  }
  function openForm() {
    document.getElementById('myForm').style.display = 'block';
  }

  function closeForm() {
    document.getElementById('myForm').style.display = 'none';
    if(mestatus==true){
      notification.style.display = 'block';
    setTimeout(() => {
      notification.style.display = 'none';
    }, 3000);
    }
  }
</script>