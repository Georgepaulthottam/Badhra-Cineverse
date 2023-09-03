<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user'] !== "Admin") {
    header('Location: login.php');

}
require 'connection.php';
$query=("SELECT * FROM approved_attendance where DATE(datetime)=".mysqli_real_escape_string($conn,'DATE(NOW())')."");
$result=mysqli_query($conn,$query);




?>
<?php $activePage = 'attendance'; include 'adminheadersidebar.php'; ?>
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
	</style>
</head>

<body>



	
			<!------main-content-start----------->

			<div class="main-content">
				<div class="attendence" style="overflow-x:auto;">
					<form action="#">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
												<?php
			if(mysqli_num_rows($result)!=0){ 


			?>
									<th><span class="custom-checkbox">
											<input type="checkbox" onchange='selects()' id="selectAll">
											<label for="selectAll"></label></th>
									<th>Name</th>
									<th>Department</th>
									<th>Time</th>
									<th>date</th>
									<th>Phone</th>
								</tr>
							</thead>

							<tbody>
								<?php
								
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
								   $time = new DateTime($row['datetime']);
                                   $date = $time->format('j.n.Y');
                                   $time = $time->format('H:i A');
									echo('
								<tr>
									<th><span class="custom-checkbox">
											<input type="checkbox" id="checkbox" name="checkbox" value="1">
											<label for="checkbox1"></label></th>
									<th>'.$row['username'].'</th>
									<th>'.$row['dept'].'</th>
									<th>'.$time.'</th>
									<th>'.$date.'</th>
									<th>702341231</th>

									
								</tr>');
	                            }
							}
							else{
								echo('<h2>NO PENDTING REQUESTS</h2>');
							}

								?>
						</table>
						<div>
							<button id="acceptAllBtn" formaction="#">Accept All</button>
							<button id="rejectAllBtn" formaction="#">Reject All</button>
						</div><br>
					</form>
				</div>
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

		//select all and reject all
		function selects() {
			var ele = document.getElementsByName("checkbox");
			if (document.getElementById("selectAll").checked == true) {
				document.getElementById("acceptAllBtn").style.visibility = "visible";
				document.getElementById("rejectAllBtn").style.visibility = "visible";
				for (var i = 0; i < ele.length; i++) {
					if (ele[i].type == 'checkbox')
						ele[i].checked = true;
				}
			}
			else{
				document.getElementById("acceptAllBtn").style.visibility = "hidden";
				document.getElementById("rejectAllBtn").style.visibility = "hidden";
				for (var i = 0; i < ele.length; i++) {
					if (ele[i].type == 'checkbox')
						ele[i].checked = false;
				}
			}
		}
	</script>





</body>

</html>