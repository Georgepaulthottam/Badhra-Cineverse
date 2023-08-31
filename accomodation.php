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
<?php $activePage = 'accomodation'; 
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
	<link rel="stylesheet" href="css/accomodationstyle.css">
  <link rel="stylesheet" type="text/css" href="css/virtual-select.min.css">

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
    .radio-group {
    display: inline-block;
    margin-right: 20px; /* Adjust as needed */
  }

  #multi_option{
        max-width: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        width: 750px;
    }
    .vscomp-toggle-button{
        padding: 10px 30px 10px 10px;
        border-radius: 5px;
    }
  
    .user-none {
            display: none;
        }
	</style>
</head>

<body>



	
			<!------top-navbar-end----------->


			<!------main-content-start----------->

		<div class="main-content">


            <div class="profile-box">
                <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                    Accomodation Details</h3>
                <div class="request-status" id="request1">
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                   <h6 class="mb-2">Department</h6>
                                </div>
                              <div class="col-sm-8 text-secondary">
                                <select id="to" name="to" onchange="enableUser(this)">
                                  <option value="">Select Department</option>
                                  <option value="1">Camera Dept.</option>
                                  <option value="2">Makeup Dept.</option>
                                  <option value="3">Artist Dept</option>
                                  <option value="4">Costume Dept.</option>
                                  <option value="5">Art Dept.</option>
                                </select>
                              </div>
                            </div>
                           
                            <div class="row mb-3 user-none" id="appear1">
                                <div class="col-sm-3">
                                <h6 class="mb-2">Users</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                <select id="multi_option" multiple name="native-select" placeholder="Select Users" data-silent-initial-value-set="false">
                                    <option value="1">CameraUser1</option>
                                    <option value="2">CameraUser2</option>
                                    <option value="3">CameraUser3</option>
                                    <option value="4">CameraUser4</option>
                                    <option value="5">CameraUser5</option>
                                    <option value="6">CameraUser6</option>
                                  </select>
                                </div>
                                </div>
                                <div class="row mb-3 user-none" id="appear2">
                                <div class="col-sm-3">
                                <h6 class="mb-2">Users</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                <select id="multi_option" multiple name="native-select" placeholder="Select Users" data-silent-initial-value-set="false">
                                    <option value="1">MakeupUser1</option>
                                    <option value="2">MakeupUser2</option>
                                    <option value="3">MakeupUser3</option>
                                    <option value="4">MakeupUser4</option>
                                    <option value="5">MakeupUser5</option>
                                    <option value="6">MakeupUser6</option>
                                  </select>
                                </div>
                                </div>
                                <div class="row mb-3 user-none" id="appear3">
                                <div class="col-sm-3">
                                <h6 class="mb-2">Users</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                <select id="multi_option" multiple name="native-select" placeholder="Select Users" data-silent-initial-value-set="false">
                                    <option value="1">ArtistUser1</option>
                                    <option value="2">ArtistUser2</option>
                                    <option value="3">ArtistUser3</option>
                                    <option value="4">ArtistUser4</option>
                                    <option value="5">ArtistUser5</option>
                                    <option value="6">ArtistUser6</option>
                                  </select>
                                </div>
                                </div>
                                <div class="row mb-3 user-none" id="appear4">
                                <div class="col-sm-3">
                                <h6 class="mb-2">Users</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                <select id="multi_option" multiple name="native-select" placeholder="Select Users" data-silent-initial-value-set="false">
                                    <option value="1">CostumeUser1</option>
                                    <option value="2">CostumeUser2</option>
                                    <option value="3">CostumeUser3</option>
                                    <option value="4">CostumeUser4</option>
                                    <option value="5">CostumeUser5</option>
                                    <option value="6">CostumeUser6</option>
                                  </select>
                                </div>
                                </div>
                                <div class="row mb-3 user-none" id="appear5">
                                <div class="col-sm-3">
                                <h6 class="mb-2">Users</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                <select id="multi_option" multiple name="native-select" placeholder="Select Users" data-silent-initial-value-set="false">
                                    <option value="1">ArtUser1</option>
                                    <option value="2">ArtUser2</option>
                                    <option value="3">ArtUser3</option>
                                    <option value="4">ArtUser4</option>
                                    <option value="5">ArtUser5</option>
                                    <option value="6">ArtUser6</option>
                                  </select>
                                </div>
                                </div>
                                
                        
                                <div class="row mb-3">
                                <div class="col-sm-3">
                                <h6 class="mb-2">Accomodation</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                            <select id="to" name="to">
                                <option value="">Select Accomodation</option>
                                <option value="Hotel1">Hotel 1</option>
                                <option value="Hotel2">Hotel 2</option>
                                <option value="Hotel3">Hotel 3</option>
                            </select>
                                </div>
                                </div>

                                <div class="row mb-3">
                                <div class="col-sm-3">
                                <h6 class="mb-2">Description</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                <textarea class="form-control" placeholder="Enter the details(optional)"></textarea>
                                </div>
                                </div>
                                <input type="button" class="btn btn-primary" value="Add" onclick="AddRow()">
                        </div>
                    </form>
                </div>
            </div>  
		</div>
    <div class="attendence" style="overflow-x:auto;">
					
          <table class="table table-striped table-hover" id="show">
            <thead>
              <tr>
                <th><span class="custom-checkbox">
                    <input type="checkbox" onchange='selects()' id="selectAll">
                    <label for="selectAll"></label></th>
                <th>Department</th>
                <th>Users</th>
                <th>Accomodation</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
            </thead>

        


          </table>
          <div>
            <button id="acceptAllBtn" formaction="#">Accept All</button>
            <button id="rejectAllBtn" formaction="#">Reject All</button>
          </div><br>
    
      </div>


<script>
  
  var list1 = [];
  var list2 = [];
  var list3 = [];
  var list4 = [];

  var n = 1;
  var x = 0;

  function AddRow(){

    var AddRown = document.getElementById('show');
    var NewRow = AddRown.insertRow(n);

    list1[x] = document.getElementById("1").value;
    list2[x] = document.getElementById("2").value;
    list3[x] = document.getElementById("3").value;
    list4[x] = document.getElementById("4").value;

    var cel1 = NewRow.insertCell(0);
    var cel2 = NewRow.insertCell(1);
    var cel3 = NewRow.insertCell(2);
    var cel4 = NewRow.insertCell(3);

    cel1.innerHTML = list1[x];
    cel2.innerHTML = list2[x];
    cel3.innerHTML = list3[x];
    cel4.innerHTML = list4[x];

    n++;
    x++;
  }

</script>

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
  <script type="text/javascript" src="js/virtual-select.min.js"></script>


	<script type="text/javascript">

        function enableUser(answer) {
            var userDropdown = document.getElementById('appear1');
            if (answer.value == 1) {
              userDropdown.classList.remove('user-none');
            } else {
              userDropdown.classList.add('user-none');
            }
            var userDropdown = document.getElementById('appear2');
            if (answer.value == 2) {
              userDropdown.classList.remove('user-none');
            } else {
              userDropdown.classList.add('user-none');
            }
            var userDropdown = document.getElementById('appear3');
            if (answer.value == 3) {
              userDropdown.classList.remove('user-none');
            } else {
              userDropdown.classList.add('user-none');
            }
            var userDropdown = document.getElementById('appear4');
            if (answer.value == 4) {
              userDropdown.classList.remove('user-none');
            } else {
              userDropdown.classList.add('user-none');
            }
            var userDropdown = document.getElementById('appear5');
            if (answer.value == 5) {
              userDropdown.classList.remove('user-none');
            } else {
              userDropdown.classList.add('user-none');
            }
        }

		$(document).ready(function () {
			$(".xp-menubar").on('click', function () {
				$("#sidebar").toggleClass('active');
				$("#content").toggleClass('active');
			});

			$('.xp-menubar,.body-overlay').on('click', function () {
				$("#sidebar,.body-overlay").toggleClass('show-nav');
			});
		});

    VirtualSelect.init({ 
	  ele: '#multi_option' 
	});

  

		
	</script>


</body>

</html>