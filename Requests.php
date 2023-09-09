<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
	header('Location: login.php');
}
require 'connection.php';
$user = $_SESSION['user'];
$query = ("SELECT * FROM cart WHERE status='" . mysqli_real_escape_string($conn, "requested") . "'");
$result = mysqli_query($conn, $query);
if (isset($_POST['accept'])) {
	$id = $_POST['id'];
	$query2 = ("update cart set status='approved' where id='$id'");
	$quer = mysqli_query($conn, $query2);
}
if (isset($_POST['reject'])) {
	$id = $_POST['id'];
	$query2 = ("update cart set status='rejected' where id='$id'");
	$quer = mysqli_query($conn, $query2);
}



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
			
			visibility: hidden;
			margin-left: 0%;
			color: #fff;
    border: 1px solid rgb(2, 8, 3);
    border-radius: 10%;
    padding: 5px;
    background-color: #2bcd72;
    letter-spacing: 2px;
    cursor: pointer;
		}

		#rejectAllBtn {
			
			visibility: hidden;
			color: #fff;
    background-color: #F44336;
    border: 1px solid black;
    border-radius: 10%;
    padding: 4px;
    
    letter-spacing: 1px;
    cursor: pointer;
		}
	</style>
</head>

<body>



	<!------main-content-start----------->
	<div class="main-content">
    <section id="view-request">
        <div class="detailed-box_admin" id="request-table_admin">
            <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Pending Requests
            </h3>
            
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th><span class="custom-checkbox">
								<input type="checkbox" onchange='selects()' id="selectAll">
								<label for="selectAll"></label></th>
						<th>Name</th>
						<th>Department</th>
						<th>Description</th>
						<th>Amount</th>
						<th>Remark</th>
						<th>Bill No</th>
						<th>Date</th>
						<th>Time</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php
					while ($row = mysqli_fetch_assoc($result)) {


						$time = new DateTime($row['date']);
						$date = $time->format('n.j.Y');
						$time = $time->format('H:i');

						echo ('
                                     <tr>
									 <th><span class="custom-checkbox">
											<input type="checkbox" id="checkbox" name="checkbox" value="1">
											<label for="checkbox1"></label></th>
                                        <th>' . $row['name'] . '</th>
                                        <th>' . $row['dept'] . '</th>
                                        <th>' . $row['details'] . '</th>
                                        <th>' . $row['price'] . '</th>
                                        <th>' . $row['remark'] . '</th>
                                        <th>' . $row['billno'] . '</th>
										
                                        <th>' . $date . '</th>
                                        <th>' . $time . '</th>
									  <th>
									<form action="approved_requests.php" method="post">
									    <input type="text" name="id" value="' . $row['id'] . '" hidden>
										<input type="submit" name="accept" value="Accept" class="edit" >
											
										
										<input type="submit" name="reject" value="Decline" class="delete" >

										</form>
										</th>

                                   


								</tr>');
					}
					?>






				</tbody>


			</table>
			<div>
							<button id="acceptAllBtn" formaction="#">Accept All</button>
							<button id="rejectAllBtn" formaction="#">Reject All</button>
						</div><br>
			</div>
    </section>
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