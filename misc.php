<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');

}
//inserting data into miscellaneous table 
require 'connection.php';
if(isset($_POST['misc-submit'])){
 $user = $_SESSION['user'];
 $name = $_POST['misc-name'];
 $purpose = $_POST['misc-purpose'];
 $amount = $_POST['misc-amount'];
 $remark = $_POST['misc-remark'];
 
	$sql = "INSERT INTO miscellaneous (username,name,purpose,amount,remark) VALUES ('$user', '$name','$purpose','$amount','$remark')";
	$result = mysqli_query($conn,$sql);
  header("location:misc.php");
 }


?>
<?php $activePage = 'misc'; include 'adminheadersidebar.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <style>
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600);

.login-box {
  position: absolute;
  top: 17%;
  left: 50%;
  width: 40%;
  height: 540px;
  padding: 40px;
  
  transform: translate(-50%, -50%);
  background: #152935;
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
  margin-top: 200px;
  
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}

.login-box form a input{
  position: relative;
  display: block;
  padding: 10px 20px;
  color: white;
  background:black;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  margin-left: 140px;
  margin-top: 20px;
  margin-bottom:100px;
  letter-spacing: 3px
}

#misc-submit{

}

table {
  background: #152935;
  border-radius: 0.25em;
  border-collapse: collapse;
  margin: 1em;
  margin-top: 700px;
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
	/* css for acceptAll and rejectAll Button*/
	.btnsCheck{
		margin-left:3%;
	}
	#acceptAllBtn {
			color: rgb(229, 117, 56);
			visibility: hidden;
			
		}

		#rejectAllBtn {
			color: green;
			visibility: hidden;
			margin-left:20px;
		}
		
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Admin Dashboard</title>
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
	  <link rel="stylesheet" href="css/admin.css" />
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
	  <script type="text/javascript" src="main.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      
      
  </head>
  <body>
  


		  <!------top-navbar-end-----------> 
		  
		  
		   <!------main-content-start-----------> 
           

		   <div class="login-box">
  <h2>Enter the miscellaneous</h2>
  <form action="" method="post">
    <div class="user-box">
      <input type="text" name="misc-name"  id = "misc-name" required>
      <label>Name</label>  
    </div>
	<div class="user-box">
      <input type="text" name="misc-purpose" id = "misc-purpose" required>
      <label>Purpose</label>
    </div>
	<div class="user-box">
      <input type="text" name="misc-amount" id = "misc-amount" required>
      <label>Amount</label>
    </div>
	<div class="user-box">
      <input type="text" name="misc-remark" id = "misc-remark"  required="false">
      
      <label>Remark</label>
    </div>
	<a href="#">
	  <input type ="submit" name  = "misc-submit" id = "misc-submit" value = " Submit ">
	</a>
  </form>
</div>

<div class="misctable" style="overflow-x:auto;">
<table>

  <thead>
                   <?php
// showing values in the table
      $rowsql = "SELECT id, timestamp, name, amount, purpose, remark FROM miscellaneous";
      $rowresult = mysqli_query($conn, $rowsql);
      $sum =0;
      $no=0;
			if(mysqli_num_rows($rowresult)!=0){ 
        ?>
    <tr>
	<th><span class="custom-checkbox">
											<input type="checkbox" onchange='selects()' id="selectAll">
											<label for="selectAll"></label></th>
      <th>SI NO</th>
      <th>DATE</th>
      <th> Name</th>
      <th>PURPOSE</th>
    
      <th>TIME</th>
      <th>REMARK</th>
      <th>AMOUNT</th>
     
  </thead>
  <tbody>

		<?php
while($row=mysqli_fetch_array($rowresult,MYSQLI_ASSOC)){
  $time = new DateTime($row['timestamp']);
  $date = $time->format('j.n.Y');
  $time = $time->format('H:i A');
  $no=$no+1;
  echo('
								<tr>
								<td><span class="custom-checkbox">
								<input type="checkbox" id="checkbox" name="checkbox" value="1">
								<label for="checkbox1"></label></th>
  <td>'.$no.'</td>
      <td>'.$date.'</td>
      <td>'.$row['name'].'</td>
      <td>'.$row['purpose'].'</td>
      <td>'.$time.'</td>
      <td>'.$row['remark'].'</td>
      <td>'.$row['amount'].'</td>');
      
      $sum = $sum + $row['amount'];
      echo('</tr>');

}
 echo('      <tr>
       
      <td colspan="7" style="text-align:right;"> TOTAL:</td>
	  
      <td>'.$sum.'</td>
</tr>');
      }
      
   
   

 else{
        echo('<h2>NO PENDTING REQUESTS</h2>');
      }?>



  </tbody>
</table>
<div class="btnsCheck">
							<button id="acceptAllBtn" formaction="#">Accept All</button>
							<button id="rejectAllBtn" formaction="#">Reject All</button>
						</div>
</div>
          
<br>
<div class="miscform-container" id="miscbuttons">
					<form form class="form" action="approved_requests.php" method="post">
					    <input name="Approved Expense" type="submit" 
						                    class="bata-btn primary-button" value="Send to Expense" id="aprovexpbtn">
					  
                    </form>	 
					<form form class="form" action="misc.php" method="post">

					    <input name="Miscellanious" type="submit"
                                            class="bata-btn primary-button" value="Delete" id="submitbtn">
					</form> 
											
</div>


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

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="js/jquery-3.3.1.slim.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
  
  
  <script type="text/javascript">
       $(document).ready(function(){
	      $(".xp-menubar").on('click',function(){
		    $("#sidebar").toggleClass('active');
			$("#content").toggleClass('active');
		  });
		  
		  $('.xp-menubar,.body-overlay').on('click',function(){
		     $("#sidebar,.body-overlay").toggleClass('show-nav');
		  });
		  
	   });

	   //Select all boxes of table

	   function selects() {
			var ele = document.getElementsByName("checkbox");
			if (document.getElementById("selectAll").checked == true ) {
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
