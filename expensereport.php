<?php 
session_start();
require 'connection.php';
// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
if(isset($_POST['inp'])){
	$name=$_POST['name'];
	$purpose=$_POST['purpose'];
	$amount=$_POST['amount'];
	$number=$_POST['quantity'];
	$user=$_SESSION['user'];
	$quer="INSERT INTO `daily_expense`( `username`, `name`, `description`, `quantity`, `price`) values('".$user."','".$name."','".$purpose."',".$number.",".$amount.")";
	$result=mysqli_query($conn,$quer);
	header("location:expensereport.php");


}
if(isset($_POST['delete'])){
	$id=$_POST['id'];
	$quer2="DELETE FROM daily_expense where id=".mysqli_real_escape_string($conn,$id).""; 
		$result2=mysqli_query($conn,$quer2);
	header("location:expensereport.php");

}
?>
<?php $activePage = 'expense'; include 'adminheadersidebar.php'; ?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<title>Expense Report</title>
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
      background-color:#cfcfc4 ;
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
.rowiee {
	background-color: #436b95;
}

  .addnew {
	display: inline-block;
  padding: 8px 13px;
  font-size: 12px;
  
  text-align: center;
  margin-left:30px;
  margin-top: 27px;
  text-decoration: none;
  border-radius: 4px;
  transition: background-color 0.3s, color 0.3s, border-color 0.3s;
  cursor: pointer;
	 
    }
	.sec-button {
		background-color:  #da9100  ;
  color: #ffffff;
  border: 2px solid #da9100 ;
}
.sec-button:hover {
  background-color: #0056b3;
  border-color: #0056b3;
}
	.tick-icon {
      font-size: 15px;
      color: #3cb371;
	  width:28px;
	  height:28px;
	  background: #002147;
    }
	.delete-icon {
    display: inline-block;
    cursor: pointer;
	font-size: 8px;
  }
  .delete-prompt {
    display: none;
	font-family: Arial, sans-serif;
    position: fixed;
    top: 57%;
    left: 67%;
	font: size 5px;
	height:160px;
	width: 270px;
    transform: translate(-50%, -50%);
    background-color: #e5e4e2 ;
    border: 1px solid #ccc;
    padding: 20px;
    box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
  }
  .delete-prompt h2 {
    margin-top: 0;
  }
  .btn-container {
    text-align: center;
    margin-top: 20px;
  }
  .btn {
    padding: 8px 16px;
    margin: 0 10px;
    cursor: pointer;
  }
  .btn.delete {
    background-color: #f44336;
    color: white;
  }
  .btn.cancel {
    background-color: #ccc;
    color: black;
  }
  @media only screen and (max-width: 767px){
	.expensebox {
      width: 300px;
      height: 160px;
      background-color:#cfcfc4 ;
      border: 1px solid gray;
      padding: 20px;
	  box-shadow: 1px 2px 2px 2px rgba(20,20,20,0.4);
	  margin-left:5px;
	  flex:-1;
	  margin-top:10px;
      box-sizing: border-box;
    }
	

    /* Styling for the fields inside the box */
    .expensefield {
      display: inline-block;
      margin-right: 20px;
    }

  }
		
	</style>
	 <script>
        function toggleRows() {
            var rows = document.getElementsByClassName("hidden-row");
            for (var i = 0; i < rows.length; i++) {
                rows[i].style.display = "table-row";
            }
        }

       
		function showDeletePrompt() {
            document.getElementById("deletePrompt").style.display = "block";
         }

        function hideDeletePrompt() {
            document.getElementById("deletePrompt").style.display = "none";
         }

        function deleteExpense() {
      // Code to delete the expense
           hideDeletePrompt();
      
         }
		
    </script>
</head>

<body>


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
				          <div class="expensebox" id="expensebox">
                             <div class="expensefield">
                                <label for="opening-balance">Location: &emsp; </label>
                                <span class="expensevalue"> Diamond Plaza Trivanathapuram</span>
	                          
                             </div>
                          </div>
                        </th>
                    </table>
					
					<br>
					<button onclick="toggleRows()" class="addnew sec-button">ADD EXPENSE
                      </button>

		<div class="attendence" style="overflow-x:auto;">
		
				<table >
										<?php
// showing values in the table
      $rowsql = "SELECT * FROM daily_expense";
      $rowresult = mysqli_query($conn, $rowsql);
      $sum=0;
      $no=0;
			if(mysqli_num_rows($rowresult)!=0){ 
        ?>
					<tr>
                      <th>SI No.</th>
                      <th>Name</th>
                      <th>Purpose</th>
                      <th>Amount</th>
					  <th>Quantity</th>
					  <th>Mode</th>

                    </tr>
					<?php
while($row=mysqli_fetch_array($rowresult,MYSQLI_ASSOC)){
  $time = new DateTime($row['datetime']);
  $date = $time->format('j.n.Y');
  $time = $time->format('H:i A');
  $no=$no+1;
  echo('

                    <tr>
                      <td>'.$no.'</td>
                      <td>'.$row['name'].'</td>
                      <td>'.$row['description'].'</td>
                      <td>₹'.$row['price'].'</td>
					  <td>'.$row['quantity'].'</td>
					  <td></td>
					  
					  <td><div class="delete-icon" onclick="showDeletePrompt()">
    <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" width="24" height="24" viewBox="0 0 24 24">
      <path d="M0 0h24v24H0z" fill="none"/>
      <path d="M8 9v10c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V9H8zm14-4h-3.5l-1-1h-5l-1 1H2v2h20V5zm-4 11H6v-2h12v2z"/>
    </svg>
  </div>
  </td>
  <div class="delete-prompt" id="deletePrompt">
    <i>Are you sure you want to delete this expense?</i>
    <div class="btn-container">
	 <form action="expensereport.php" method="post">
	 <input type="text" name="id" value="'.$row['id'].'" hidden>
      <button class="btn delete" type="submit" name="delete" onclick="deleteExpense()">Delete</button>
      <button class="btn cancel" onclick="hideDeletePrompt()">Cancel</button>
	  </form>
    </div>
  </div>

					');
					$sum=$sum+$row['price'];
}
      }
   else{
        echo('<h2>NO PENDTING REQUESTS</h2>');
      }?>
                    <tr class="hidden-row">
						<form action="expensereport.php" method="post">
					  <td></td>
                      <td><input type="text" name="name" placeholder="Enter Name"></td>
                      <td><input type="text" name="purpose" placeholder="Enter Purpose"></td>
                      <td><input type="text" name="amount" placeholder="Enter Amount"></td>
					  <td><input type="text" name="quantity" placeholder="Enter quantity"></td>
					  <td></td>
					  <td> <button class="tick-icon" name="inp" type="submit">
						</form>
    <i class="fas fa-check-circle"></i></td>
                    </tr>
					<tr>
                      <td></td>
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
					  <td></td>
                    </tr>
					<tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
					  <td></td>
                    </tr>
					<tr class="rowiee">
  
                      <td ></td>
                      <td>Closing Balance:</td>
                      <td>$400</td>
                      <td>Total Expense:</td>
					  <td><?php echo('₹'.$sum.'');?></td>
					  <td></td>
					  <td ></td>
                    </tr>
					<tr>
                      <td></td>
                      <td></td>
                      <td></td>
					  <td></td>
                      <td></td>
                    </tr>
					
                     
                </table>

                

               

                
				<div>
							<button id="acceptAllBtn" formaction="#">Accept All</button>
							<button id="rejectAllBtn" formaction="#">Reject All</button>
						</div><br>
	
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