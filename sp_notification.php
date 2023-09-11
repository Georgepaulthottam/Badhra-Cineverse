<?php 
$activePage='salary';
include 'sp_header.php';
 ?>
<div id="user_chat">
<form action="#">
  <table class="salary-status-main-table" style="width:50%">
    <tr>
      <td><select id="chat-select" name="department">
      <option value="department1">Admin</option>
      <option value="department2">Department 2</option>
      <option value="department3">Department 3</option>
      <option value="department4">Department 4</option>
      <option value="department5">Department 5</option>
      <option value="department6">Department 6</option>
      <option value="department7">Department 7</option>
    </select></td>
    </tr>
  </table>
</form>
<div class="container">
  <i class="material-icons">chat_bubble_outline</i>
  <p>Hello. How are you today?</p>
  <span class="time-right">11:00</span>
</div>

<div class="container darker">
  <i class="material-icons">chat</i>
  <p>Hey! I'm fine. Thanks for asking!</p>
  <span class="time-left">11:01</span>
</div>

<div class="container">
  <i class="material-icons">chat_bubble_outline</i>
  <p>Hello. How are you today?</p>
  <span class="time-right">11:00</span>
</div>

<div class="container darker">
  <i class="material-icons">chat</i>
  <p>Hey! I'm fine. Thanks for asking!</p>
  <span class="time-left">11:01</span>
</div>
<div class="container">
  <i class="material-icons">chat_bubble_outline</i>
  <p>Hello. How are you today?</p>
  <span class="time-right">11:00</span>
</div>

<div class="container darker">
  <i class="material-icons">chat</i>
  <p>Hey! I'm fine. Thanks for asking!</p>
  <span class="time-left">11:01</span>
</div>

<div class="container">
  <i class="material-icons">chat_bubble_outline</i>
  <p>Hello. How are you today?</p>
  <span class="time-right">11:00</span>
</div>

<div class="container darker">
  <i class="material-icons">chat</i>
  <p>Hey! I'm fine. Thanks for asking!</p>
  <span class="time-left">11:01</span>
</div>

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
</div>
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