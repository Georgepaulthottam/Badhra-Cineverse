<?php
session_start(); 
$activePage = 'expense'; 
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user'] !== "super") {
    header('Location: login.php');
}
include 'sp_header.php';
require 'connection.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Super Admin Dashboard</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/sp_admin.css" />
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
		 body{
      background-color:#dcdcdc;
    }
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
      
      height:220px;
    width: 530px;
    background: #ffff;
    color: #0000;
    padding: 20px;
    border-radius: 8px;
    border-color:  #0000;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
    }

    .expensebox:hover {
    transform: scale(1.03);
    box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.2);
  }

    /* Styling for the fields inside the box */
    .expensefield {
      display: inline-block;
      padding-top:50px;
      margin-right: 20px;
      color:#0000;
    }
	table.table td:last-child{
		   opacity:0.9;
		   font-size:16px;
		   margin:0px 5px;
	   }

    /* Style for the label element */
    label {
      display: inline-block;
      color:#000;
      
    }

    /* Style for the value element */
    .expensevalue {
      display: inline-block;
      color: #0000;
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
  width: 1090px;
  margin-left:60px;
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
  .transperant{
    background-color:#dcdcdc;
    color:#0000;
  }
  .profile-box{
    width: 1160px;
    height: 50px
  }
  span.expensevalue{
    color:#000;
  }
  @media only screen and (max-width: 767px){


    /* Styling for the fields inside the box */
    .expensefield {
      display: inline-block;
      margin-right: 20px;
    }

  }
		
	</style>
</head>

<body>
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
					<table class="transperant">
						<td>
            <div class="expensebox">
                            <div class="expensefield"><b>
                              <label for="opening-balance">Opening Balance&emsp;&emsp;: &emsp;&emsp; </label>
                              <span class="expensevalue">19215</span><br>
	                          <label for="opening-balance">Advance&emsp; &emsp;&emsp;  &emsp; &emsp;:    &emsp;&emsp; </label>
                              <span class="expensevalue">5000</span><br>
	                          <label for="opening-balance">&emsp;Total &emsp; &emsp; &emsp; &emsp;&emsp;&emsp;: &emsp; &emsp; </label>
                              <span class="expensevalue">69215</span></b>
                            </div>
                          </div>
                        </td>
                        <td>
				          <div class="expensebox" id="expensebox"><b>
                             <div class="expensefield">
                                <label for="opening-balance">Location: &emsp; </label>
                                <span class="expensevalue"> Diamond Plaza Trivanathapuram</span>
	                          
                             </div></b>
                          </div>
                        </td>
                    </table>
					
					<br>
					

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
                    <p class="mb-0">&copy 2023 Team Helios. All Rights Reserved.</p>
                </div>
            </div>
        </footer>



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