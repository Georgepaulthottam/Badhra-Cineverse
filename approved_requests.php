<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
	header('Location: login.php');
}
require 'connection.php';
$user = $_SESSION['user'];






?>
<?php $activePage = 'request';
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
	<link rel="stylesheet" href="CSS/buttons.css">


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




	<!------top-navbar-end----------->


	<!------main-content-start----------->
	<div class="main-content">
		<div class="attendence" style="overflow-x:auto;">

			<table class="table table-striped table-hover">

				<body>
					<form action="approved_requests.php" method="post">
						<button class="custom-button accepted" type="submit" name="accept" value="">Accepted</button>
						<button class="custom-button rejected" type="submit" name="rejected" value="">Rejected</button>
						<button class="custom-button pending" type="submit" name="requested" value="">Pending</button>
						<button class="custom-button all" type="submit" name="all" value="">All</button>
					</form>
					<br>
				</body>
				<thead>
					<tr>
						<th>Name</th>
						<th>Department</th>
						<th>Description</th>
						<th>Amount</th>
						<th>Remark</th>
						<th>Bill No</th>
						<th>Date</th>
						<th>time</th>
					</tr>
				</thead>

				<tbody>
					<?php
					if (isset($_POST['accept'])) {
						$query = ("SELECT * FROM cart WHERE status='" . mysqli_real_escape_string($conn, "approved") . "'");
						$result = mysqli_query($conn, $query);


						while ($row = mysqli_fetch_assoc($result)) {


							$time = new DateTime($row['date']);
							$date = $time->format('j-n-Y');
							$time = $time->format('H:i');

							echo ('
                                        <tr>

                                        <th>' . $row['name'] . '</th>
                                        <th>' . $row['dept'] . '</th>
                                        <th>' . $row['details'] . '</th>
                                        <th>' . $row['price'] . '</th>
                                        <th>' . $row['remark'] . '</th>
                                        <th>' . $row['billno'] . '</th
                                        <th>' . $date . '</th>
                                        <th>' . $time . '</th>


								</tr>');
						}
					}
					if (isset($_POST['requested'])) {
						$query = ("SELECT * FROM cart WHERE status='" . mysqli_real_escape_string($conn, "requested") . "'");
						$result = mysqli_query($conn, $query);







						while ($row = mysqli_fetch_assoc($result)) {

							$time = new DateTime($row['date']);
							$date = $time->format('n.j.Y');
							$time = $time->format('H:i');

							echo ('
                                <tr>


                                        <th>' . $row['name'] . '</th>
                                        <th>' . $row['dept'] . '</th>
                                        <th>' . $row['details'] . '</th>
                                        <th>' . $row['price'] . '</th>
                                        <th>' . $row['remark'] . '</th>
                                        <th>' . $row['billno'] . '</th
                                        <th>' . $date . '</th>
                                        <th>' . $time . '</th>

                                   


								</tr>');
						}
					}
					if (isset($_POST['rejected'])) {
						$query = ("SELECT * FROM cart WHERE status='" . mysqli_real_escape_string($conn, "rejected") . "'");
						$result = mysqli_query($conn, $query);







						while ($row = mysqli_fetch_assoc($result)) {


							$time = new DateTime($row['date']);
							$date = $time->format('n.j.Y');
							$time = $time->format('H:i A');

							echo ('
                                        <tr>

                                        <th>' . $row['name'] . '</th>
                                        <th>' . $row['dept'] . '</th>
                                        <th>' . $row['details'] . '</th>
                                        <th>' . $row['price'] . '</th>
                                        <th>' . $row['remark'] . '</th>
                                        <th>' . $row['billno'] . '</th
                                        <th>' . $date . '</th>
                                        <th>' . $time . '</th>


								</tr>');
						}
					}
					if (isset($_POST['all'])) {
						$query = ("SELECT * FROM cart");
						$result = mysqli_query($conn, $query);







						while ($row = mysqli_fetch_assoc($result)) {


							$time = new DateTime($row['date']);
							$date = $time->format('n.j.Y');
							$time = $time->format('H:i');

							echo ('
                                        <tr>

                                        <th>' . $row['name'] . '</th>
                                        <th>' . $row['dept'] . '</th>
                                        <th>' . $row['details'] . '</th>
                                        <th>' . $row['price'] . '</th>
                                        <th>' . $row['remark'] . '</th>
                                        <th>' . $row['billno'] . '</th
                                        <th>' . $date . '</th>
                                        <th>' . $time . '</th>

								</tr>');
						}
					}
					?>






				</tbody>


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
	<br> <br> <br> <br><br>
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








	<script type="text/javascript">
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
			} else {
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