<?php $activePage = 'usercreation'; include 'sp_header.php';
include 'connection.php' ;
$query = ("SELECT * FROM users");
$result = mysqli_query($conn, $query); ?>
<!doctype html>
<html lang="en">
  <head>
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>
<style>
        /* Button Style */
        .add-user-button {
            background-color: #152935;
            color: white;
            border: 1px solid black;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            position:absolute;
            margin:40px;
            left:83%;
        }
        
        /* Popup Styles */
        .popup {
            display: none;
            position: fixed;
            top: 51%;
            left: 60%;
            transform: translate(-50%, -50%);
            background: linear-gradient(#152935, #152935);
            border-radius: 5px;
            width: 75vw;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            z-index: 9999;
            color:white;
            height:82vh;
 
        }

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 9998;
            display: none;
        }

        /* Form Styles */
        .form-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background:#152935;
        }

        .left-block {
            width: 80%;
            
        }

        .right-block {
            width: 30%;
            text-align: center;
            border:2px solid black;
            padding:50px;
            position:absolute;
            left:700px;
            top:80px;
           margin-bottom:20px;
        }
       .right-block img{
        width:100px;
        height:100px;

       }
       #profilepic{
        width:14vw;
       }
        .profile-icon {
            width: 100px;
            height: 100px;
            background-color: lightgray;
            border-radius: 50%;
            margin: 0 auto;
            margin-top: 20px;
        }

        /* Additional Styles */
        .arrow-icon {
            cursor: pointer;
        }

        .bank-pan-fields {
            display: none;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .create-button, .cancel-button {
            flex: 1;
            padding: 10px;
            border: 1px solid black;
            border-radius: 5px;
            cursor: pointer;
        }

        .create-button {
            background-color: #ff0000;
            color: white;
            margin-right: 10px;
        }

        .cancel-button {
            background-color: #000000;
            color: white;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
        form{
            width:60vw;
        }
    .user_crform input[type="text"],input[type="number"]{
        width:12vw;
        height:5vh;
        
    }
    .arrow-icon_salary{
        position:fixed;
        margin-left:600px;
        margin-top:-30px;

    }
    .salary-fields{
        position:relative;
        margin-left:600px;
        
    }
table {
  background: #262f35;
  border-radius: 0.25em;
  border-collapse: collapse;
  margin: 1em;
  margin-top: 130px;
  width: 95%;
  margin-left:30px;
}
th {
  border-bottom: 1px solid #364043;
  color: #E2B842;
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
.miscform-container {
     display: flex;
           }
.bata-btn{
		display: inline-block;
  padding: 8px 8px;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  margin-left: 400px;
  margin-top: 27px;
  text-decoration: none;
  border-radius: 4px;
  transition: background-color 0.3s, color 0.3s, border-color 0.3s;
  cursor: pointer;
  margin-bottom:20px;
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
	
	.btnsCheck{
		margin-left:3%;
	}
    
    #view_btn {
  padding: 5px 8px;
  font-size: 12px;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #000;
  background-color: #fff;
  border: none;
 border-radius:5px;
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
}

#view_btn:hover{
  background-color: #23c483;
  box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
  color: #fff;
  transform: translateY(-7px);
}

#view_btn:active {
  transform: translateY(-1px);
}
 .salary{
    position: absolute;
    margin-left:400px;
    top:360px;
 }

    </style>
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>User Creation </title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="css/custom.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       
		<!--google fonts -->
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Righteous&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=REM&display=swap" rel="stylesheet">
	   <!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
	  <link rel="stylesheet" href="css/style.css" />
	  <link rel="stylesheet" href="css/sp_admin.css" />
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
	 
	

  </head>
  <body>
  

  <button class="add-user-button" id="addUserButton">Add User <i class="fa fa-plus"></i></button>

<div class="popup-overlay" id="popupOverlay" ></div>
<div class="popup" id="popup" style="overflow-x:auto;">
    <span class="close-button" onclick="closePopup()">&#10006;</span>
    <div class="form-container">
        <div class="left-block">
            <h2>ADD USER</h2>
            <form action="sp_usercreation.php" method="POST" enctype="multipart/form-data" class="user_crform">
<div style="display:flex;">
                <label for="firstName">First Name &nbsp;: &nbsp; </label><br>
                <input type="text" id="firstName" name="firstName"  ><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="lastName">Last Name &nbsp;: &nbsp; </label><br>
                <input type="text" id="lastName" name="lastName" ><br><br>
</div>
<div style="display:flex;"
                <label for="userName">User Name &nbsp;: &nbsp; </label><br>
                <input type="text" id="userName" name="userName" ><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="mobile">Mobile &nbsp;: &nbsp;</label><br>
                <input type="number" id="mobile" name="mobile"><br><br>
</div>            
<div style="display:flex;"
                <label for="password">Password &nbsp;: &nbsp; </label><br>
                <input type="text" id="password" name="password"><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="conpassword">Confirm Password &nbsp;: &nbsp;</label><br>
                <input type="text" id="conpassword" name="conpassword"><br><br>
 </div>
                <div class="right-block">
                <img src="user.png">
                <input type="file" name="profilepic" id="profilepic">
                </div>
                <label for="select">Select User/Admin </label>
                <select name="type_user" id="user_type">
                    <option>User</option>
                    <option>Admin</option>
                </select>
                             
                <div class="arrow-icon_salary" onclick="toggleSalaryFields()">&#9660; Salary Details</div>
                <div class="salary-fields">
                    <label for="salaryAssigned">Assigned Salary :</label><br>
                    <input type="text" id="assigned_salary" name="assigned_salary"><br><br>

                    <label for="TDs">TDS:</label><br>
                    <input type="text" id="tds" name="tds"><br><br>

                    <label for="ta">TA/EA:</label><br>
                    <input type="text" id="ta" name="ea"><br><br>

                    <label for="first_bata_salary">1st Bata Salary:</label><br>
                    <input type="text" id="first_bata_salary" name="first_bata_salary"><br><br>

                    <label for="second_bata_salary">2nd Bata Salary:</label><br>
                    <input type="text" id="second_bata_salary" name="second_bata_salary"><br><br>

                    <label for="third_bata_salary">3rd Bata Salary:</label><br>
                    <input type="text" id="third_bata_salary" name="third_bata_salary"><br><br>
                   
                </div>
                 
                <div class="arrow-icon" onclick="toggleBankPanFields()">&#9660; Bank & Pan (Optional)</div>
                <div class="bank-pan-fields">
                    <label for="accountHolder">Account Holder:</label><br>
                    <input type="text" id="accountHolder" name="accountHolder"><br><br>

                    <label for="accountNumber">Account Number:</label><br>
                    <input type="text" id="accountNumber" name="accountNumber"><br><br>

                    <label for="branchName">Branch Name:</label><br>
                    <input type="text" id="branchName" name="branchName"><br><br>

                    <label for="branchIFSC">Branch IFSC:</label><br>
                    <input type="text" id="branchIFSC" name="branchIFSC"><br><br>

                    <label for="panNumber">Pan Number:</label><br>
                    <input type="text" id="panNumber" name="panNumber"><br><br>
                    <!-- Add other bank & pan input fields here -->
                </div>

                
            </form>
        </div>
        
    </div>
    <div class="btn-container">
        <button class="create-button">Create</button>
        <button class="cancel-button" onclick="closePopup()">Cancel</button>
    </div>
</div>

		  <!------top-navbar-end-----------> 
		  
		  
		   <!------main-content-start-----------> 
           
           <table>
<thead>
                
  <tr>
  
    <th>SI NO</th>
    <th>NAME</th>
    <th> TYPE</th>
    <th>SALARY</th>
  
    <th>SALARY STATUS</th>
    <th>DETAILS</th>
   
   
</thead>
<tbody>
    <?php
    $no=0;
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $no = $no + 1;
        echo('<tr>
    <td>' . $no . '</td>
    <td>'.$row['username'].'</td>
    <td>' . $row['dept'] . '</td>
    <td>3500</td>
    <td>pending</td>
    <td> <input type="button" value="View" id="view_btn"></td>
</tr>');
    }
    ?>


</tbody>
</table>



		    <!------main-content-end-----------> 
		  
		 
		 
		 <!----footer-design------------->
		 
		 
		    <div class="container-fluid">
            <footer class="footer">
			   <div class="footer-in">
			      <p class="mb-0">&copy 2023 Team Helios . All Rights Reserved.</p>
			   </div>
			</div>
		 </footer>
		 
		 
		 
		 
	  </div>
   
</div>



<!-------complete html----------->

<script>
    const addUserButton = document.getElementById('addUserButton');
    const popup = document.getElementById('popup');
    const popupOverlay = document.getElementById('popupOverlay');

    addUserButton.addEventListener('click', () => {
        popup.style.display = 'block';
        popupOverlay.style.display = 'block';
    });

    function closePopup() {
        popup.style.display = 'none';
        popupOverlay.style.display = 'none';
    }

    function toggleBankPanFields() {
        const bankPanFields = document.querySelector('.bank-pan-fields');
        const arrowIcon = document.querySelector('.arrow-icon');

        if (bankPanFields.style.display === 'none' || bankPanFields.style.display === '') {
            bankPanFields.style.display = 'block';
            arrowIcon.innerHTML = '&#9650; Bank & Pan (Optional)';
        } else {
            bankPanFields.style.display = 'none';
            arrowIcon.innerHTML = '&#9660; Bank & Pan (Optional)';
        }
    }

    function toggleSalaryFields() {
        const salaryFields = document.querySelector('.salary-fields');
        const arrowIcon_salary = document.querySelector('.arrow-icon_salary');

        if (salaryFields.style.display === 'none' || salaryFields.style.display === '') 
        {
           salaryFields.style.display = 'block';
            arrowIcon_salary.innerHTML = '&#9650; Salary Details';
        } else {
            salaryFields.style.display = 'none';
            arrowIcon_salary.innerHTML = '&#9660; Salary Details';
        }
    }
</script>


  </body>
  
  </html>