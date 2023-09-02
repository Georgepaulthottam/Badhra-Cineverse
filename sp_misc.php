<?php
session_start(); 
$activePage = 'misc'; 
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
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600);


table {
  background: #152935;
  border-radius: 0.25em;
  border-collapse: collapse;
  margin: 1em;
  margin-top: 100px;
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
  .sec-button:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .tick-icon {
            font-size: 15px;
            color: #3cb371;
            width: 28px;
            height: 28px;
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
            height: 160px;
            width: 270px;
            transform: translate(-50%, -50%);
            background-color: #e5e4e2;
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



        @media only screen and (max-width: 767px) {


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
    <!------top-navbar-end----------->


    <!------main-content-start----------->

    

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
	
      <th>SI NO</th>
      <th>DATE</th>
      <th> Name</th>
      <th>PURPOSE</th>
    
      <th>TIME</th>
      <th>REMARK</th>
      <th>AMOUNT</th>
<<<<<<< HEAD
      <th>ACTION</th>
=======
    
     
>>>>>>> 2923816c519d68a6b91b685555799d446f286cda
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
								
  <td>'.$no.'</td>
      <td>'.$date.'</td>
      <td>'.$row['name'].'</td>
      <td>'.$row['purpose'].'</td>
      <td>'.$time.'</td>
      <td>'.$row['remark'].'</td>
      <td>'.$row['amount'].'</td>');
     
      $sum = $sum + $row['amount'];
<<<<<<< HEAD
      echo('		  <td><div class="delete-icon" onclick="showDeletePrompt()">
      <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" width="24" height="24" viewBox="0 0 24 24">
        <path d="M0 0h24v24H0z" fill="none"/>
        <path d="M8 9v10c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V9H8zm14-4h-3.5l-1-1h-5l-1 1H2v2h20V5zm-4 11H6v-2h12v2z"/>
      </svg>
    </div>
    </td>
    <div class="delete-prompt" id="deletePrompt">
      <i>Are you sure you want to delete this expense?</i>
      <div class="btn-container">
     <form action="misc.php" method="post">
     <input type="text" name="id" value="'.$row['id'].'" hidden>
        <button class="btn delete" type="submit" name="delete" onclick="deleteExpense()">Delete</button>
        <button class="btn cancel" onclick="hideDeletePrompt()">Cancel</button>
      </form>
      </div>
    </div>
  
            </tr>');
      echo('</tr>');
=======
      
      echo('</tr> ');
>>>>>>> 2923816c519d68a6b91b685555799d446f286cda

}
 echo('      <tr>
       
      <td colspan="7" style="text-align:right;"> TOTAL:</td>
	  
      <td>'.$sum.'</td>
</tr>' );
      }
      
   
   

 else{
        echo('<h2>NO PENDTING REQUESTS</h2>');
      }?>



  </tbody>
</table>

          
<br>

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