<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Message</title>
<style>
  body {
    font-family: 'Times New Roman', Times, serif;
  }
  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
  }
  .compose-box {
    width: 100%;
    min-height: 170px;
    padding: 10px;
    border: 1px solid #ccc;
    resize: vertical;
  }
  .send-button {
    background-color: #4285f4;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5%;
    cursor: pointer;
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
  .table-box {
    margin-top: 20px;
    border-collapse: collapse;
    width: 100%;
  }
  .table-box th, .table-box td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
  }
  .table-box th {
    background-color: #f2f2f2;
  }
</style>
</head>
<body>
<div class="container">
  <h1>Compose</h1>
  <form id="compose-form">
    <label for="recipient">To:</label>
    <select id="recipient" name="recipient">
      <option value="recipient1@example.com">Art Dept.</option>
      <option value="recipient2@example.com">Artist Dept.</option>
      <option value="recipient3@example.com">Makeup Dept.</option>
      <option value="recipient4@example.com">Camera Dept.</option>
      <option value="recipient5@example.com">Makeup Dept.</option>
      <option value="recipient6@example.com">All Dept.</option>
    </select>
    <br>
    <br>
    <textarea class="compose-box" name="message" placeholder="Write your message here..."></textarea>
    <br>
    <button type="button" class="send-button" id="send-button">Send</button>
  </form>
  <div class="notification" id="notification">Message sent!</div>
  <h2>Other Messages</h2>
  <table class="table-box">
    <thead>
      <tr>
        <th>Incoming Messages</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Sample incoming message 1</td>
      </tr>
      <tr>
        <td>Sample incoming message 2</td>
      </tr>
    </tbody>
  </table>
  <table class="table-box">
    <thead>
      <tr>
        <th>Sent Messages</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Sample sent message 1</td>
      </tr>
      <tr>
        <td>Sample sent message 2</td>
      </tr>
    </tbody>
  </table>
</div>
<script>
  const sendButton = document.getElementById('send-button');
  const notification = document.getElementById('notification');

  sendButton.addEventListener('click', () => {
    notification.style.display = 'block';
    setTimeout(() => {
      notification.style.display = 'none';
    }, 2002);
  });
</script>
</body>
</html>