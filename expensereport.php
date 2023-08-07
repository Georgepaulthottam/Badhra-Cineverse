<?php 
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
?>
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	


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
		 /* Styling for the box container */
		 .expensebox {
      width: 400px;
      height: 160px;
      background-color: lightgray;
      border: 1px solid gray;
      padding: 20px;
	  box-shadow: 1px 2px 2px 2px rgba(20,20,20,0.4);
	  margin-left:60px;
	  flex:-1;
	  margin-top:10px;
      box-sizing: border-box;
    }

    /* Styling for the fields inside the box */
    .expensefield {
      display: inline-block;
      margin-right: 20px;
    }
	table.table td:last-child{
		   opacity:0.9;
		   font-size:16px;
		   margin:0px 5px;
	   }

    /* Style for the label element */
    label {
      display: inline-block;
      
    }

    /* Style for the value element */
    .expensevalue {
      display: inline-block;
    }
	.bata-btn{
		display: inline-block;
  padding: 12px 20px;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  margin-left: 280px;
  margin-top: 27px;
  text-decoration: none;
  border-radius: 4px;
  transition: background-color 0.3s, color 0.3s, border-color 0.3s;
  cursor: pointer;
}
.primary-button {
  background-color:  #002147  ;
  color: #ffffff;
  border: 2px solid #002e63 ;
}

.primary-button:hover {
  background-color: #0056b3;
  border-color: #0056b3;
}
	.form-container {
            display: flex;
        }

		.form {
            flex: -2;
           
        }
		.hidden-row {
            display: none;
        }
		
		table {
  background: #152935;
  border-radius: 0.25em;
  border-collapse: collapse;
  margin: 1em;
 
 
  width: 1200px;
  margin-left:30px;
}
th {
  border-bottom: 1px solid #364043;
  color: #da9100;
  font-size: 0.85em;
  font-weight: 600;
  padding: 0.5em 1em;
  text-align: left;
}
td {
  color: #fff;
  font-weight: 400;
  padding: 0.65em 1em;
}

tbody tr {
  transition: background 0.25s ease;
}
tbody tr:hover {
  background: #014055;
}

  .add-icon {
      font-size: 15px;
      color: #007bff;
	  width:24px;
	  height:24px;
	  text-align: center;

	  background: #002147;
    }
	.tick-icon {
      font-size: 15px;
      color: #3cb371;
	  width:28px;
	  height:28px;
	  background: #002147;
    }

		
	</style>
	 <script>
        function toggleRows() {
            var rows = document.getElementsByClassName("hidden-row");
            for (var i = 0; i < rows.length; i++) {
                rows[i].style.display = "table-row";
            }
        }

        function calculateTotals() {
            var amountInputs = document.getElementsByName("amount");
            var totalExpense = 0;

            for (var i = 0; i < amountInputs.length; i++) {
                var amountValue = parseFloat(amountInputs[i].value);
                if (!isNaN(amountValue)) {
                    totalExpense += amountValue;
                }
            }
			var closingBalanceInput = document.getElementById("closing-balance");
            var totalExpenseField = document.getElementById("total-expense");

            var closingBalance = parseFloat(closingBalanceInput.value);
            if (!isNaN(closingBalance)) {
                var remainingBalance = closingBalance - totalExpense;
                totalExpenseField.textContent = totalExpense.toFixed(2);
                closingBalanceInput.value = remainingBalance.toFixed(2);
            }
        }
    </script>
</head>

<body>



	<div class="wrapper">

		<div class="body-overlay"></div>

		<!-------sidebar--design------------>

		<div id="sidebar">
			<div class="sidebar-header">
							<img src="Bc_logo.png" width="50px" height="50px">
		   <h3><span  > &nbsp;Badhra Cineverse</span></h3>
			</div>
			<ul class="list-unstyled component m-0">
				<li>
					<a href="index.php" class="dashboard"><i class="material-icons">dashboard</i>Dashboard </a>
				</li>

				<li class="dropdown">
					<a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">aspect_ratio</i>Profile
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu1">
						<li><a href="profile.html">Profile</a></li>
					</ul>
				</li>


				<li class="">
					<a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">aspect_ratio</i>Attendance
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu1">
						<li ><a href="Attendance.php">Attendance Requests</a></li>
						<li class=""><a href="approved_attendance.php" >Approved Attendance</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">equalizer</i>Request Panel
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu3">
						<li><a href="Requests.php">Pending Requests</a></li>
						<li><a href="approved_requests.php">approved Requests</a></li>
			 <li><a href="#">Dept 1</a></li>
			 <li><a href="#">Dept 2</a></li>
					</ul>
				</li>


				<li class="dropdown">
					<a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">extension</i>Crew Management
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu4">
						<li><a href="#">Pages 1</a></li>
						<li><a href="#">Pages 2</a></li>
						<li><a href="#">Pages 3</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">border_color</i>Salary Manager
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu5">
						<li><a href="#">Pages 1</a></li>
						<li><a href="#">Pages 2</a></li>
						<li><a href="#">Pages 3</a></li>
					</ul>
				</li>
				<li class="dropdown">
		           <a href="#homeSubmenu6" data-toggle="collapse" aria-expanded="false" 
		           class="dropdown-toggle">
		          <i class="material-icons">grid_on</i>Miscellaneous
		          </a>
		           <ul class="collapse list-unstyled menu" id="homeSubmenu6">
		          <li><a href="misc.php">Miscellaneous</a></li>
			 
		           </ul>
		       </li>

				<li class="dropdown">
					<a href="#homeSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">grid_on</i>Locations
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu6">
						<li><a href="#">table 1</a></li>
						<li><a href="#">table 2</a></li>
						<li><a href="#">table 3</a></li>
					</ul>
				</li>


				<li class="dropdown">
					<a href="#homeSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">content_copy</i>Pages
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu7">
						<li><a href="#">Pages 1</a></li>
						<li><a href="#">Pages 2</a></li>
						<li><a href="#">Pages 3</a></li>
					</ul>
				</li>


				<li class="">
					<a href="#" class=""><i class="material-icons">date_range</i>copy </a>
				</li>
				<li class="">
					<a href="#" class=""><i class="material-icons">library_books</i>calender </a>
				</li>
				<li class="active">
					<a href="expensereport.php" class=""><i class="material-icons">currency_rupee</i>Expense Report</a>
					
				</li>

			</ul>
		</div>

		<!-------sidebar--design- close----------->



		<!-------page-content start----------->

		<div id="content">

			<!------top-navbar-start----------->

			<div class="top-navbar">
				<div class="xd-topbar">
					<div class="row">
						<div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
							<div class="xp-menubar">
								<span class="material-icons text-white">signal_cellular_alt</span>
							</div>
						</div>

						<div class="col-md-5 col-lg-3 order-3 order-md-2">
							
						</div>


						<div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
							<div class="xp-profilebar text-right">
								<nav class="navbar p-0">
									<ul class="nav navbar-nav flex-row ml-auto">
										<li class="dropdown nav-item active">
											<a class="nav-link" href="#" data-toggle="dropdown">
												<span class="material-icons">notifications</span>
												<span class="notification">4</span>
											</a>
											<ul class="dropdown-menu">
												<li><a href="#">You Have 4 New Messages</a></li>
												<li><a href="#">You Have 4 New Messages</a></li>
												<li><a href="#">You Have 4 New Messages</a></li>
												<li><a href="#">You Have 4 New Messages</a></li>
											</ul>
										</li>

										

										<li class="dropdown nav-item">
											<a class="nav-link" href="#" data-toggle="dropdown">
												<img src="img/user.jpg" style="width:40px; border-radius:50%;" />
												<span class="xp-user-live"></span>
											</a>
											<ul class="dropdown-menu small-menu">
												<li><a href="#">
														<span class="material-icons">person_outline</span>
														Profile
													</a></li>
												<li><a href="#">
														<span class="material-icons">settings</span>
														Settings
													</a></li>
												<li><a href="logout.php">
														<span class="material-icons">logout</span>
														Logout
													</a></li>

											</ul>
										</li>


									</ul>
								</nav>
							</div>
						</div>

					</div>

					<div class="xp-breadcrumbbar text-center">
						<h4 class="page-title">Daily Expense Report</h4>
						<ol class="breadcrumb">

						</ol>
					</div>


				</div>
			</div>
			<!------top-navbar-end----------->


			<!------main-content-start----------->

			<div class="main-content">
				<div class="attendence" style="overflow-x:auto;">
					
					<table class="profile-box">
							<thead>
					            <tr>
								<th>TITLE:</th>
			                    <th>DATE:</th>
	                            </tr>
                    </table>
					<table>
						<th>
                          <div class="expensebox">
                            <div class="expensefield">
                              <label for="opening-balance">Opening Balance: &emsp; </label>
                              <span class="expensevalue">19215</span><br>
	                          <label for="opening-balance">Advance: &emsp; &nbsp; &emsp; &emsp;  &emsp; </label>
                              <span class="expensevalue">5000</span><br>
	                          <label for="opening-balance">Total: &emsp; &emsp; &emsp; &emsp; &emsp;&emsp;&nbsp;</label>
                              <span class="expensevalue">69215</span>
                            </div>
                          </div>
                        </th>
                        <th>
				          <div class="expensebox">
                             <div class="expensefield">
                                <label for="opening-balance">Location: &emsp; </label>
                                <span class="expensevalue"> Diamond Plaza Trivanathapuram</span>
	                          
                             </div>
                          </div>
                        </th>
                    </table>
					<div class="form-container">
					<form form class="form" action="approved_requests.php" method="post">
					    <input name="Approved Expense" type="submit" 
						                    class="bata-btn primary-button" value="Approved Expense" id="aprovexpbtn">
					  
                    </form>	 
					<form form class="form" action="misc.php" method="post">

					    <input name="Miscellanious" type="submit"
                                            class="bata-btn primary-button" value="Miscellanious" id="submitbtn">
					</form> 
											
                    </div>
					<br>
					<br>
					<br>
		<div class="attendence" style="overflow-x:auto;">
			<form action="#">
				<table >
					<tr>
                      <th>SI No.</th>
                      <th>Name</th>
                      <th>Purpose</th>
                      <th>Amount</th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Sajith</td>
                      <td>Salary</td>
                      <td>$1000</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Lakshmi</td>
                      <td>Rent</td>
                      <td>$800</td>
                    </tr>
                    <tr class="hidden-row">
                      <td><input type="text" name="si_no" placeholder="SI No."></td>
                      <td><input type="text" name="name" placeholder="Enter Name"></td>
                      <td><input type="text" name="purpose" placeholder="Enter Purpose"></td>
                      <td><input type="text" name="amount" placeholder="Enter Amount"></td>
					  <td> <Button class="tick-icon" type="submit">
    <i class="fas fa-check-circle"></i></td>
                    </tr>
					<tr>
                      <td><button onclick="toggleRows()"><div class="add-icon">
    <i class="fas fa-plus-circle"></i></button></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
					<tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
					<tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
					<tr>
                      <td></td>
                      <td></td>
                      <td>Closing Balance:</td>
                      <td>$400</td>
                    </tr>
					<tr>
                      <td></td>
                      <td></td>
                      <td>Total Expense:</td>
                      <td>$600</td>
                    </tr>
					
                     
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