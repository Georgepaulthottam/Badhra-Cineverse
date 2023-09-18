<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user'] !== "Admin") {
  header('Location: login.php');
}
require 'connection.php';
$query = ("SELECT * FROM users where dept='" . mysqli_real_escape_string($conn, 'Artist') . "'");
$result = mysqli_query($conn, $query);
$query2 = ("SELECT * FROM users where dept='" . mysqli_real_escape_string($conn, 'Camera') . "'");
$result2 = mysqli_query($conn, $query2);
$query3 = ("SELECT * FROM users where dept='" . mysqli_real_escape_string($conn, 'Costume') . "'");
$result3 = mysqli_query($conn, $query3);
$query4 = ("SELECT * FROM users where dept='" . mysqli_real_escape_string($conn, 'Art') . "'");
$result4 = mysqli_query($conn, $query4);
$query5 = ("SELECT * FROM users where dept='" . mysqli_real_escape_string($conn, 'Production') . "'");
$result5 = mysqli_query($conn, $query5);
$query6 = ("SELECT * FROM users where dept='" . mysqli_real_escape_string($conn, 'Makeup') . "'");
$result6 = mysqli_query($conn, $query6);
$query7 = ("SELECT * FROM accom_details");
$result7 = mysqli_query($conn, $query7);

if (isset($_POST['add'])) {

  $accommedation = $_POST['accommedation'];
  $desc = $_POST['description'];
  $usr = $_POST["username"];
  if (!empty($usr)) {
    foreach ($usr as $tempusername) {
      $addsql = "INSERT INTO `temp_acc` (`username`, `accommedation`, `description`) VALUES (?,?,?)";
      $stmt = mysqli_prepare($conn, $addsql);
      mysqli_stmt_bind_param($stmt, "sss", $tempusername, $accommedation, $desc);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
    }
  }
  header("location:accomodation.php");
  die();
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

    select,
    input[type="text"],
    textarea {
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
      margin-right: 20px;
      /* Adjust as needed */
    }

    #multi_option {
      max-width: 100%;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
      width: 750px;
    }

    .vscomp-toggle-button {
      padding: 10px 30px 10px 10px;
      border-radius: 5px;
    }

    .user-none {
      display: none;
    }

    .dropbtn {
      background-color: #fff;
      color: black;
      padding: 16px;
      font-size: 16px;
      width: 50%;
      border: none;
      cursor: pointer;
    }

    .dropdown1 {
      position: relative;
      display: inline-block;
      padding: 10px;
      width: 50px;
    }

    .dropdown1-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown1-content div {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown1-content div input {
      border: none;
    }

    .dropdown1-content div:hover {
      background-color: #f1f1f1
    }

    .dropdown1:hover .dropdown1-content {
      display: block;
    }

    .dropdown1:hover .dropbtn {
      background-color: #2576d3;
    }


    .custom-select {
      position: relative;
      width: 100%;
      max-width: 1000px;
      /* Adjust the max-width as needed */
      z-index: 1;
    }

    .custom-options {
      display: none;
      position: absolute;
      width: 100%;
      max-width: 1000px;
      /* Adjust the max-width as needed */
      background-color: #fff;
      /* Add your desired background color here */
      border: 1px solid #ccc;
      /* Add a border for styling */
      border-radius: 5px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 2;
    }

    .custom-option {
      display: flex;
      align-items: center;
      padding: 5px 10px;
    }

    .custom-option input[type="checkbox"] {
      margin-right: 10px;
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
                  <option value="6">Other</option>
                </select>
              </div>
            </div>

            <div class="row mb-3 user-none" id="appear1">
              <div class="col-sm-3">
                <h6 class="mb-2">Registered Users</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                <select id="multi_option" multiple name="usernamew[]" placeholder="Select Users" data-silent-initial-value-set="false">
                  <?php
                  while ($row2 = mysqli_fetch_assoc($result2)) {
                    echo (' <option value="' . $row2['username'] . '">' . $row2['username'] . '</option>');
                  }


                  ?>
                </select>
              </div>
            </div>
            <div class="row mb-3 user-none" id="appear2">
              <div class="col-sm-3">
                <h6 class="mb-2">Registered Users</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                <select id="multi_option" multiple name="usernamew[]" placeholder="Select Users" class="custom-select" data-silent-initial-value-set="false">
                  <?php
                  while ($row6 = mysqli_fetch_assoc($result6)) {
                    echo (' <option value="' . $row6['username'] . '">' . $row6['username'] . '</option>');
                  }


                  ?>
                </select>
              </div>
            </div>
            <div class="row mb-3 user-none" id="appear3">
              <div class="col-sm-3">
                <h6 class="mb-2">Registered Users</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                <div class="custom-select" id="user-dropdown">
                  <label for="user-options">Select Users</label>

                  <div id="user-options" class="custom-options">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo (' 
                        <div class="custom-option">
                            <input type="checkbox" name="username[]" value="' . $row['username'] . '" onclick="updateSelectedUsers()">
                            <label>' . $row['username'] . '</label>
                        </div>
                    ');
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>


            <div class="row mb-3 user-none" id="appear4">
              <div class="col-sm-3">
                <h6 class="mb-2">Registered Users</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                <select id="multi_option" multiple name="usernamew[]" placeholder="Select Users" data-silent-initial-value-set="false">
                  <?php
                  while ($row3 = mysqli_fetch_assoc($result3)) {
                    echo ('
                     <option value="' . $row3['username'] . '">' . $row3['username'] . '</option>');
                  }


                  ?>
                </select>
              </div>
            </div>
            <div class="row mb-3 user-none" id="appear5">
              <div class="col-sm-3">
                <h6 class="mb-2">Registered Users</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                <select id="multi_option" multiple name="usernamew[]" placeholder="Select Users" data-silent-initial-value-set="false">
                  <?php
                  while ($row4 = mysqli_fetch_assoc($result4)) {
                    echo (' <option value="' . $row4['username'] . '">' . $row4['username'] . '</option>');
                  }


                  ?>
                </select>
              </div>
            </div>
            <div class="row mb-3 user-none" id="appear6">
              <div class="col-sm-3">
                <h6 class="mb-2">Registered Users</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                <input type="textbox" class="form-control" name='usernamew[]' placeholder="Enter the new users">
              </div>
            </div>
            
            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-2">Accomodation</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                <select id="to" name="accommedation" onchange="enableAccomo(this)">
                  <option value="">Select Accomodation</option>
                  <?php
                  while ($row7 = mysqli_fetch_assoc($result7)) {
                    echo (' 
                    <option value="' . $row7['location'] . '">' . $row7['location'] . '</option>');
                  }


                  ?>
                  <option value="0">Other</option>
                </select>
              </div>
            </div>
            <div class="row mb-3 user-none" id="appear7">
              <div class="col-sm-3">
                <h6 class="mb-2">Accomodation</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                <input type="textbox" class="form-control" name="accommedation" placeholder="Enter the new accomodation">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-2">Unregistered Users</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                <input type="number" class="form-control" name="accommedation" placeholder="Enter the no of Unregistered Users">
              </div>
            </div>


            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-2">Description</h6>
              </div>
              <div class="col-sm-8 text-secondary">
                <textarea class="form-control" placeholder="Enter the details(optional)" name="description"></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" value="Add" name="add">Add</button>
          </div>
        </form>
      </div>
    </div>
    <br>

    <div class="profile-box" style="overflow-x:auto;">
      <table class="table table-striped table-hover" id="">
        <thead>
          <tr>
            <th><span class="custom-checkbox">
                <input type="checkbox" onchange='selects()' id="selectAll">
                <label for="selectAll"></label></th>
            <th>Department</th>
            <th>Registered Users</th>
            <th>Accomodation</th>
            <th>Unregistered Users</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $acsql = ("SELECT * FROM temp_acc");
          $accres = mysqli_query($conn, $acsql);
          while ($accrow = mysqli_fetch_assoc($accres)) {
            echo (' <tr>
            <th><span class="custom-checkbox">
                <input type="checkbox" id="checkbox" name="checkbox" value="1">
                <label for="checkbox1"></label></th>
            <th>Camera dept</th>
            <th>' . $accrow['username'] . '</th>
            <th>' . $accrow['accommedation'] . '</th>
            <th>' . $accrow['description'] . '</th>

            <th>
              <form action="#" method="post">
                <input type="button" value="Remove" class="delete" data-toggle="modal">
              </form>
            </th>
          </tr>');
          }
          ?>



      </table>
      <div class="modal-footer">
        <input type="button" class="btn btn-primary" value="Submit">
      </div>
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
      var userDropdown = document.getElementById('appear6');
      if (answer.value == 6) {
        userDropdown.classList.remove('user-none');
      } else {
        userDropdown.classList.add('user-none');
      }
      var userDropdown = document.getElementById('appear7');
      if (answer.value == 0) {
        userDropdown.classList.remove('user-none');
      } else {
        userDropdown.classList.add('user-none');
      }
    }

    function enableAccomo(answer) {
      var userDropdown = document.getElementById('appear7');
      if (answer.value == 0) {
        userDropdown.classList.remove('user-none');
      } else {
        userDropdown.classList.add('user-none');
      }
    }



    var userOptions = document.getElementById("user-options");
    var selectUsersLabel = document.querySelector(".custom-select label"); // Assuming your label is within a container with the class "custom-select"
    var selectedUsers = [];

    function updateSelectedUsers() {
      selectedUsers = Array.from(userOptions.querySelectorAll("input[type=checkbox]:checked"))
        .map(function(checkbox) {
          return checkbox.nextElementSibling.textContent;
        });

      if (selectedUsers.length > 0) {
        selectUsersLabel.textContent = "Select Users: " + selectedUsers.join(", ");
      } else {
        selectUsersLabel.textContent = "Select Users";
      }
    }


    document.getElementById("user-dropdown").addEventListener("click", function(event) {
      if (userOptions.style.display === "block") {
        userOptions.style.display = "none";
      } else {
        userOptions.style.display = "block";
      }
      event.stopPropagation(); // Prevent the click event from reaching the document
    });

    // Close the dropdown when clicking outside
    document.addEventListener("click", function() {
      userOptions.style.display = "none";
    });

    // Prevent clicks inside the dropdown from closing it
    userOptions.addEventListener("click", function(event) {
      event.stopPropagation();
    });




    VirtualSelect.init({
      ele: '#multi_option'
    });
  </script>




</body>

</html>