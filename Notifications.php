<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');

}
require 'connection.php';
$query=("SELECT * FROM attendance_request");
$result=mysqli_query($conn,$query);
if(isset($_POST['acc'])){
	

$delid=$_POST['id'];
$query2=("SELECT *FROM attendance_request WHERE id=".mysqli_real_escape_string($conn,$delid)." ");
$result2=mysqli_query($conn,$query2);
$row2=mysqli_fetch_assoc($result2);
$delusername=$row2['username'];
$deldept=$row2['dept'];
$query3=("INSERT INTO approved_attendance(username,dept) values('".$delusername."','".$deldept."')");
$result3=mysqli_query($conn,$query3);
$query4=("DELETE FROM attendance_request where id=".mysqli_real_escape_string($conn,$delid)." ");
$result4=mysqli_query($conn,$query4);
$query5=("UPDATE users SET attendance=attendance+1 where username='".mysqli_real_escape_string($conn,$delusername)."' ");
$result5=mysqli_query($conn,$query5);
$sql2=("UPDATE users set status='accepted' WHERE username='".mysqli_real_escape_string($conn,$delusername)."'");
$result1=mysqli_query($conn,$sql2);
echo "<script>alert('Attendance Accepted')</script>";

header('location:Attendance.php');




}

?>
<?php $activePage = 'notification'; include 'adminheadersidebar.php'; ?>
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


	<!--google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


	<!--google material icon-->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css" />
	<script type="text/javascript" src="main.js"></script>
	<style>
		/* css for acceptAll and rejectAll Button*/
		#acceptAllBtn {
			color: rgb(229, 117, 56);
			visibility: hidden;
			margin-left: 0%;
		}

		#rejectAllBtn {
			color: green;
			visibility: hidden;
			
		}
		
		
    /* Inline CSS for simplicity (Ideally, you should use separate CSS files) */
    
    
    .container {
      max-width: 900px;
      max-height: 800px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    
    .form-group {
      margin-bottom: 10px;
    }
    
    label {
      display: block;
      font-weight: bold;
    }
    
    select, input[type="text"], textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }
    
    .submit-btn {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  
	</style>
</head>

<body>



	
			<!------top-navbar-end----------->


			<!------main-content-start----------->

			<div class="main-content">
			<div class="container">
    <form>
      <div class="form-group">
        <label for="to">To:</label>
        <select id="to" name="to">
          <option value="">Select recipient</option>
          <option value="recipient1@example.com">Camera Dept.</option>
          <option value="recipient2@example.com">Makeup Dept.</option>
          <option value="recipient3@example.com">Artist Dept</option>
          <option value="recipient4@example.com">Costume Dept.</option>
          <option value="recipient5@example.com">Art Dept.</option>
          <option value="recipient6@example.com">Camerman Dept.</option>
        </select>
      </div>
      <div class="form-group">
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" placeholder="Enter subject">
      </div>
      <div class="form-group">
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="6" placeholder="Compose your email"></textarea>
      </div>
      <button type="submit" class="submit-btn">Send</button>
    </form>
  </div>
			</div>
			

			<!------main-content-end----------->



			<!----footer-design------------->
            <br><br> <br><br>
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


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>


	<script type="text/javascript">
		$(document).ready(function () {
			$(".xp-menubar").on('click', function () {
				$("#sidebar").toggleClass('active');
				$("#content").toggleClass('active');
			});

			$('.xp-menubar,.body-overlay').on('click', function () {
				$("#sidebar,.body-overlay").toggleClass('show-nav');
			});

		});

	
		
	</script>


</body>

</html>