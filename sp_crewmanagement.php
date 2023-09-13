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
    background-color: #dcdcdc;
    display: flex;
    flex-direction: column;
    
  }

  .user-container {
    margin-top: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 30px;
    background:#fff;
     height:15vh;
     border-radius:20px;
     width:80vw;
     box-shadow: 1px 2px 2px 2px rgba(20, 20, 20, 0.2);
  }

  .select-label {
    font-size: 18px;
    font-weight: bold;
    margin-right: 10px;
  }

  select {
    appearance: none;
    background-color:#fffff ;
    border: 2px solid #ccc;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
  }
  #scheduleSelect{
    margin-left:70px;
    margin-top:-50px;
    position:absolute;
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
    height: 100px;
    display: none;
    text-align: center;
    margin-left:30px;
    
    background-color: #fdfdfd;
    padding: 5px;
    margin-bottom:40px;
    margin-right: 20px;
    box-shadow: 1px 2px 2px 2px rgba(20, 20, 20, 0.4);
    border-radius: 10px;
    border: 1px solid grey;
  }
 
  .info-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
    margin-top: 30px;
    margin-right:600px;
  }
  .fontcol{
    background-color: ffff;
  }

  .schedule-select {
    margin-left:550px;
    margin-top: 10px;
  }

  .cards-container {
    
    display: none;
    justify-content: space-around;
    margin-top: 60px;
   
  }

  .card {
    height:270px;
    width: 530px;
    background: #ffff;
    color: #0000;
    padding: 20px;
   
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;

    border-radius: 8px;
    border-color:  #0000;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3);
  }

  .card:hover {
    transform: scale(1.03);
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
  .tables-container {
    display: none;
    margin-top: 20px;
    width: 1300px;
   
    background-color:fffff;
  }

  table {
  background: #262f35;
  border-radius: 0.25em;
  border-collapse: collapse;
  margin: 1em;
  margin-top: 70px;
  margin-left: 100px;
  width: 1050px;
  
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
.attendence{
 
    width: 1200px;
   

}
 .card-container {
    background-color: #f0f0f0;
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    margin-bottom: 30px;
  }
  .scedule {
    margin-top:-60px;
    font-size: larger;
    margin-left:550px;
  }

  .schedule-btn {
    
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
  }

  .schedule-btn:hover {
    background-color: #0056b3;
  }
  p.card-heading{
    color: #000;
  }
  div.status-label{
    color:#000;
    font-size:17px;
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
    <br>
    <p class="scedule"><b>Schedule:</b></p>
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
  <div class="tables-container" id="tablesContainer">
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
      <th>Name</th>
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
		
				<table>
 
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
                      <td>hsjdfs</td>
                      <td>snacjkADJN</td>
                      <td>ssnc</td>
                      <td>scn</td>
                      <td>ssnc</td>
                      <td>scn</td>
					  
                    </tr>
					<tr>
                      <td>zcdzD</td>
                      <td>dzvd</td>
                      <td>dvdV</td>
                      <td>ddVv</td>
                      <td>ssnc</td>
                      <td>scn</td>
					 
                    </tr>
					<tr>
                      <td>dvZDV</td>
                      <td>zvzdV</td>
                      <td>zdvzdv</td>
                      <td>zvdv</td>
                      <td>ssnc</td>
                      <td>scn</td>
					  
                    </tr>
					
					<tr>
                      <td>dsd</td>
                      <td>sdsd</td>
                      <td>sdsd</td>
                      <td>ssnc</td>
                      <td>scn</td>
					 
                    </tr>
					
                     
                </table>
</div>


  <script>
     const userSelect = document.getElementById("userSelect");
     const scheduleSelect = document.getElementById("scheduleSelect");
    const infoContainer = document.getElementById("infoContainer");
    const cardsContainer = document.getElementById("cardsContainer");
    const tablesContainer = document.getElementById("tablesContainer");

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
        tablesContainer.style.display = "block";
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