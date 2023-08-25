<?php
session_start();
include 'connection.php';
$user = $_SESSION['user'];
$dept = $_SESSION['userdept'];
$query = ("SELECT * FROM notifications WHERE rec_user='" . mysqli_real_escape_string($conn, $dept) . "'");
$result = mysqli_query($conn, $query);
if(isset($_POST['send'])){
  $rec=$_POST['recipient'];
  $msg=$_POST['msg'];
  $send_quer=("INSERT INTO `notifications`( `username`, `dept`, `rec_user`, `content`) 
  VALUES ('$user','$dept','$rec ',' $msg')");
  $send_res=mysqli_query($conn,$send_quer);
  header("location:user_notification.php");
}


$activePage = 'notification';
include 'user_header.php'; ?>
<div class="profile-box">
  <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
    Notifications</h3>
    <?php
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
          <h6>'.$row['username'].'</h6>
        </td>
        <td>
          <p>' . $row['content'] .'</p>
          <span class="time-right">' . $time . '</span>
        </td>
      </tr>
    </table>
  </div>');}?>
  
  <button class="open-button" onclick="openForm()">Chat</button>


  <div class="chat-popup" id="myForm">
    <form class="form-container" action="user_notification.php" method="post">
      <h1>Chat</h1>
      To:
      <select id="recipient" name="recipient">
        <option value="recipient1@example.com">Art Dept.</option>
        <option value="Artist">Artist Dept.</option>
        <option value="recipient3@example.com">Makeup Dept.</option>
        <option value="recipient4@example.com">Camera Dept.</option>
        <option value="recipient5@example.com">Makeup Dept.</option>
        <option value="recipient6@example.com">All Dept.</option>
      </select>
      <textarea placeholder="Type message.." name="msg" required></textarea>

      <button type="submit" class="btn" id="send-button" name="send" onclick="notify()">Send</button>
      <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
  </div>
</div>
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
</body>
</html>




