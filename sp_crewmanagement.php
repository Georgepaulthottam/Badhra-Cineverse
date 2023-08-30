<?php
session_start(); 
$activePage = 'crew'; 
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user'] !== "super") {
    header('Location: login.php');
}
include 'sp_header.php';
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

</head>

<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    flex-direction: column;
    
  }

  .user-container {
    margin-top: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 30px;
  }

  .select-label {
    font-size: 18px;
    font-weight: bold;
    margin-right: 10px;
  }

  select {
    appearance: none;
    background-color: #ffffff;
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
  }

  select:focus {
    outline: none;
    border-color: #007bff;
  }

  select::after {
    content: '\25BC';
    margin-left: 5px;
  }

  .info-container {
    display: none;
    text-align: center;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }

  .info-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
  }
  .fontcol{
    background-color: ffff;
  }

  .schedule-select {
    margin-top: 10px;
  }

  .cards-container {
    
    display: none;
    justify-content: space-around;
    margin-top: 20px;
   
  }

  .card {
    height:300px;
    width: 350px;
    background: linear-gradient(45deg, #152935,#053e4c, #152935);
    color: #ffffff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
  }

  .card:hover {
    transform: scale(1.05);
    box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.2);
  }

  .card-heading {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
  }

  .count {
    font-size: 24px;
    margin-bottom: 5px;
  }

  .status-label {
    font-size: 14px;
  }

  table {
  background: #152935;
  border-radius: 0.25em;
  border-collapse: collapse;
  margin: 1em;
  margin-top: 70px;
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
thead{
    font-weight: 600;
  padding: 0.5em 1em;
   
}
</style>

    <!------top-navbar-end----------->


    <!------main-content-start----------->

    <body>
    <div class="user-container">
    <label class="select-label">Select user:</label>
    <select id="userSelect">
      <option value="default" disabled selected>Select a user</option>
      <option value="user1">User 1</option>
      <option value="user2">User 2</option>
      <option value="user3">User 3</option>
      <option value="user4">User 4</option>
    </select>
  </div>

  <div class="info-container" id="infoContainer">
    <p class="info-title">Title: Geetha Govindam</p>
    <p>Schedule:</p>
    <div class="schedule-select">
      <select id="scheduleSelect">
        <option value="default" disabled selected>Select a month</option>
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="Auguest">Auguest</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
       
      </select>
    </div>
  </div>

  <div class="cards-container" id="cardsContainer">
    <div class="card">
      <p class="card-heading">Total Attendance <i>(per day)</i><div class="count">35</div></p>
      
      <div class="status-label">Approved &nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp15</div>
      <div class="status-label">Rejected &nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp15</div>
      <div class="status-label">Pending &nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp15</div>
    </div>
    <div class="card">
      <p class="card-heading">Total Requests</p>
      <div class="count">48</div>
      <div class="status-label">Approved &nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp15</div>
      <div class="status-label">Rejected &nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp15</div>
      <div class="status-label">Pending &nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp15</div>
    </div>
  </div>

  <div class="misctable" style="overflow-x:auto;">
<table>



  <thead>
  <tr >
  <td></td>
  <td></td>
  <td></td>
    <td><b> Miscellaneous</b></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  </thead>
                  
    <tr>
	
      <th>SI NO</th>
      <th>Date</th>
      <th> Name</th>
      <th>Purpose</th>
    
      <th>Time</th>
      <th>Remark</th>
      <th>Amount</th>
    </tr>
    
  

    <tr>
        <td>1</td>
        <td>12/06/2023</td>
        <td>ggggg</td>
        <td>bgvfc</td>
        <td>09:00</td>
        <td>gtgff</td>
        <td>70</td>
    </tr>
    <tr>
        <td>1</td>
        <td>12/06/2023</td>
        <td>ggggg</td>
        <td>bgvfc</td>
        <td>09:00</td>
        <td>gtgff</td>
        <td>70</td>
    </tr>
    <tr>
        <td>1</td>
        <td>12/06/2023</td>
        <td>ggggg</td>
        <td>bgvfc</td>
        <td>09:00</td>
        <td>gtgff</td>
        <td>70</td>
    </tr>
     
  <tbody>

	




  </tbody>
</table>
<div class="attendence" style="overflow-x:auto;">
		
				<table >
                    
                <thead>
                <tr >
               <td></td>
              <td></td>
                <td></td>
               <td><b> Expense Report</b></td>
               <td></td>
               <td></td>
                  <td></td>
               </tr>
              </thead>
										
					<tr>
                      <th>SI No.</th>
                      <th>Name</th>
                      <th>Purpose</th>
                      <th>Amount</th>
					            <th>Quantity</th>
                       <th>Mode</th>

                  
                
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
					
					<tr>
                      <td></td>
                      <td></td>
                      <td></td>
					  <td></td>
                      <td></td>
                    </tr>
					
                     
                </table>


  <script>
     const userSelect = document.getElementById("userSelect");
     const scheduleSelect = document.getElementById("scheduleSelect");
    const infoContainer = document.getElementById("infoContainer");
    const cardsContainer = document.getElementById("cardsContainer");

    userSelect.addEventListener("change", function() {
      if (userSelect.value !== "default") {
        infoContainer.style.display = "block";
        cardsContainer.style.display = "none";
      } else {
        infoContainer.style.display = "none";
        cardsContainer.style.display = "none";
      }
    });

    scheduleSelect.addEventListener("change", function() {
      if (scheduleSelect.value !== "default") {
        infoContainer.style.display = "block";
        cardsContainer.style.display = "flex";
      } else {
        infoContainer.style.display = "none";
        cardsContainer.style.display = "none";
      }
    });
  </script>
</body>


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


   



</html>