<?php
session_start(); 
$activePage = 'accomodation'; 
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user'] !== "super") {
    header('Location: login.php');
}
include 'sp_header.php';
?>

<!doctype html>
<html lang="en">

<head>
	
    <style>


body {
      background-color: #dcdcdc;
    }

    

    /* Styling for the box container */
    .expensebox {

      height: 370px;
      width: 500px;
      background: #f8f8ff;
      color: #0000;
      padding: 3px;
      border-radius: 11px;
      border-color: #0000;
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
      padding-top: 50px;
      margin-right: 20px;
    }

    
    /* Style for the label element */
    label {
      display: inline-block;
      color: #536878;
      font-size: 23px;
      margin-left: 10px;
      font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif

    }

    span.expensevalue {
      color: #00827f;
      font-size: 21px;
    }

    /* Style for the value element */
    .expensevalue {
      display: inline-block;
    }
	
	
th {
  border-bottom: 1px solid #364043;
  color:#ffbf00 ;
  font-size: 0.85em;
  font-weight: 600;
  padding-left: 5px;
  text-align: left;
  
}
td {
  color: #fff;
  font-weight: 400;
  
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
	
  .transperant{
    background-color:#dcdcdc;
  }
  .profile-box{
    width: 1160px;
    height: 60px;
    padding-bottom:10px;
  }
  @media only screen and (max-width: 767px){ 


    /* Styling for the fields inside the box */
    .expensefield {
      display: inline-block;
      margin-right: 20px;
    }

    }

    .start-schedule-button {
      background: linear-gradient(to bottom, #5f9ea0, #00827f);
      border: none;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      width: 330px;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .start-schedule-button:hover {
      background: linear-gradient(to bottom, #00827f #5f9ea0);
      transform: scale(1.05);
    }

    /* Style the input field */
    #schedule-input {
      margin-top: 10px;
      display: none;
    }

    .action-buttons {
      margin-top: 15px;
      text-align: center;
    }

    .action-button {
      padding: 8px 20px;
      font-size: 16px;
      margin: 0 10px;
      cursor: pointer;
      border: none;
      border-radius: 5px;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .save-button {
      margin-left: 160px;
      margin-top:20px;
      background: linear-gradient(to bottom, #666, #444);
      color: #fff;
      width: 90px;
      height: 40px;
      padding-bottom: 7px;
    }

    .cancel-button {
      width: 90px;
      background: linear-gradient(to bottom, #ccc, #999);
      color: #000;
      height: 40px;
      padding-bottom: 7px;
    }

    .action-button:hover {
      transform: scale(1.05);
    }

    .e
    /* Style the confirmation prompt */
    .delete-prompt {
      display: none;
      color: black;
      font-family: Arial, sans-serif;
      position: fixed;
      top: 50%;
      font-size: 14px;
      left: 50%;
      font-size: 16px;
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
      color: black;
      /* Set font color to black */
    }

    .btn.delete {
      background-color: #f44336;
      color: white;
    }

    .btn.cancel {
      background-color: #ccc;
      color: black;
    }

    /* Set font color to black for the schedule name display */
    #schedule-display {
      color: black;
    }

    .card-heading {
      padding-bottom: 10px;
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      
      margin-top:2px;  
      color: #333;
      font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
      /* Change the color to your preference */
    }


    .select-label {
      font-size: 18px;
      font-weight: bold;
      margin-right: 10px;
    }

    select {
      appearance: none;
      background-color: #fffff;
      border: 2px solid #ccc;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
    }

    #scheduleSelect {
      margin-left: 70px;
      margin-top: -50px;
      position: absolute;
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

      text-align: center;
      margin-left: 50px;
      margin-top: 10px;
      width: 1080px;
      background-color: #f8f8ff;
      padding: 5px;
      margin-bottom: 40px;
      margin-right: 20px;
      box-shadow: 1px 2px 2px 2px rgba(20, 20, 20, 0.4);
      border-radius: 10px;
      border: 1px solid grey;
    }

    .schedule-select {
      margin-right: 160px;
      margin-top: 15px;
    }

    .scedule {
      margin-top: 30px;
      font-size: larger;
      margin-right: 160px;
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

    .tables-container {
   
    margin-top: 4px;
    width: 1100px;
    margin-left:40px;
    margin-bottom:20px;
    background-color:#262F35;
    height:350px;
    padding-top:15px;
    border-radius:7px;
  }

  table {
  
  border-radius: 0.25em;
  border-collapse: collapse;
  margin: 1em;
  width:1020px;
 
}

.popup-message {
  display: none;
  position: fixed;
  margin-left:600px;
 margin-top:35px;
  transform: translate(-50%, -50%);
  background-color: limegreen;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  text-align: center;
  z-index: 9999;
  box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.4);
  border: 2px solid #d3d3d3;
  opacity: 0;
  animation: fadeIn 0.5s ease-out forwards; 
  
  transition: transform 0.2s, box-shadow 0.2s, background-color 0.2s;
}


@keyframes fadeIn {
  0% {
    opacity: 0;
    transform: translate(-50%, -50%) scale(0.8);
  }
  100% {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
  }
}

.popup-message:hover {
  background-color: #2ecc71; 
  transform: translate(-50%, -50%) scale(1.05); 
  box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.4); 
}
.table-heading {
    text-align: center; 
    font-size: 18px; 
    font-weight: bold; 
    padding-bottom: 17px; 
   
}
h4{
  color:#ffff;
}
.view-button {
    background: transparent;
    font-style: italic;
    color: limegreen;
    border: none;
    cursor: pointer;
}

.cardscontainer{
  display: flex;
   justify-content: space-between;
   margin-top:30px;
}
.tables-container {
    
    margin-top: 20px;
    
    background-color:fffff;
  }

  table {
  background: #262f35;
  border-radius: 0.25em;
  border-collapse: collapse;
  margin: 1em;
  
  margin-left: 30px;
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
.view-button {
    background: transparent;
    font-style: italic;
    color: limegreen;
    border: none;
    cursor: pointer;
}

.user-container {
    margin-top: 30px;
 margin-left:20px;
 
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 30px;
    background:#fff;
     height:15vh;
     border-radius:20px;
     width:75vw;
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
    box-shadow: 1px 2px 2px 2px rgba(20, 20, 20, 0.2);
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
 
  


    </style>

   
      


<script>

function saveLocation() {
        var locationName = document.getElementById("location-name").value;
        var rentAmount = document.getElementById("rent-amt").value;

        if (locationName.trim() !== "" && rentAmount.trim() !== "") {
           
        // Show the pop up
        var popupMessage = document.getElementById("popup-message");
        popupMessage.style.display = "block";
        setTimeout(function () {
            popupMessage.style.display = "none";
        }, 2000);
    } else {
        alert("Please fill in both Location and Rent fields.");
    }
}

function cancelSchedule() {

}




 
</script>

    
    <!------------main content-------->

    <div class="main-container">
    <div class="main-content">
    <div class="attendence" style="overflow-x:auto;">
        <div class="cardscontainer">
            <div class="expensebox"  style="margin-bottom: 20px; margin-left:40px;" >
                <div class="expensefield">
                <b>
                                <p class="card-heading">ADD DETAILS</p>
                                <label for="location-name">Location:&emsp;</label>
                                <input type="text" id="location-name" name="location-name" placeholder="Enter Location Name"><br>
                                <label for="rent-amt">Rent:&emsp;&emsp;&nbsp;&emsp;</label>
                                <input type="text" id="rent-amt" name="rent-amt" placeholder="Enter Rent">
                                <button class="action-button save-button" onclick="saveLocation()">Save</button>

                                <button class="action-button cancel-button" onclick="cancelSchedule()">Cancel</button>
                            </b>
                </div>
            </div>
            <div id="popup-message" class="popup-message">Location Added Successfully</div>


            <div class="expensebox" style="margin-bottom: 10px; margin-right: 80px;">
    <p class="card-heading" style="margin-top: 70px; margin-bottom: -5px;">DETAILS</p><br>
    <div class="request-status" id="card2">
        <div class="request-status" style="max-height: 220px; overflow-y: auto; overflow-x: hidden;">
            <table class="table table-striped table-hover" id="location-table" style="width: 465px; margin-top: -10px;">
                <thead>
                    <tr>
                        <th style="color: #2e324f; padding-left:30px;"><h5>LOCATION</h5></th>
                        <th style="color: #2e324f; padding-left:80px;"><h5>RENT</h5></th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <h5 style="color: #102d10;">Kochi</h5>
                    </td>
                    <td>
                      <h5 style="color: #102d10;">600</h5>
                    </td>
                    <td>
                      <img src="https://www.gstatic.com/images/icons/material/system/2x/edit_black_24dp.png" alt="Edit Icon" style="cursor: pointer; height:25px;">

                    </td>
                    <td>
                    <img src="https://www.gstatic.com/images/icons/material/system/2x/delete_forever_black_24dp.png" alt="Delete Icon" style="cursor: pointer; height:25px;">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5 style="color: #102d10;">Kumily</h5>
                    </td>
                    <td>
                      <h5 style="color: #102d10;">1000</h5>
                    </td>
                    <td>
                      <img src="https://www.gstatic.com/images/icons/material/system/2x/edit_black_24dp.png" alt="Edit Icon" style="cursor: pointer; height:25px;">

                    </td>
                    <td>
                    <img src="https://www.gstatic.com/images/icons/material/system/2x/delete_forever_black_24dp.png" alt="Delete Icon" style="cursor: pointer; height:25px;">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5 style="color: #102d10;">Kottayam</h5>
                    </td>
                    <td>
                      <h5 style="color: #102d10;">6000</h5>
                    </td>
                    <td>
                      <img src="https://www.gstatic.com/images/icons/material/system/2x/edit_black_24dp.png" alt="Edit Icon" style="cursor: pointer; height:25px;">

                    </td>
                    <td>
                    <img src="https://www.gstatic.com/images/icons/material/system/2x/delete_forever_black_24dp.png" alt="Delete Icon" style="cursor: pointer; height:25px;">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5 style="color: #102d10;">Kozhikode</h5>
                    </td>
                    <td>
                      <h5 style="color:#102d10;">5000</h5>
                    </td>
                    <td>
                      <img src="https://www.gstatic.com/images/icons/material/system/2x/edit_black_24dp.png" alt="Edit Icon" style="cursor: pointer; height:25px;">

                    </td>
                    <td>
                    <img src="https://www.gstatic.com/images/icons/material/system/2x/delete_forever_black_24dp.png" alt="Delete Icon" style="cursor: pointer; height:25px;">
                    </td>
                  </tr>

               
          
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<div class="user-container">
    <label class="select-label">Select location:</label> 
    <select id="userSelect">
    <option value="default" disabled selected>Select a location</option>
      <option value="user1">KOCHI</option>
      <option value="user2">TVM</option>
      <option value="user3">KUMALI</option>
      <option value="user4">ALLAPUZHA</option>
    </select>&nbsp;&nbsp;
    <label class="select-label">Select Date:</label>
    
    
     
    <input type="date" style="height:49px;">
    
  </div>
   
    
                      
<div class="misctable" style="overflow-x:auto;">
  <div class="tables-container" id="tablesContainer">
<table>
  <thead>
  <tr>
          <th colspan="9" class="table-heading"> Location Details</th>
        </tr>

        <tr>
      <th>SI NO</th>
      <th>Date</th>
      <th>Schedule</th>
      <th>LOCATION</th>
      <th>DEPARTMENT</th>
      <th>Rent</th>
      <th> REGISTERD USER</th>
      <th>UNREGISTERED USER</th>
      <th>TOTAL</th>
     
     
    </tr>
  </thead>
  
    <tr>
        <td>1</td>
        <td>12/06/2023</td>
        <td>ggggg</td>
        <td>bgvfc</td>
        <td>09:00</td>
        <td>gtgff</td>
        <td>gtgff</td>
        <td>gtgff</td>
        <td>gtgff</td>
       
        
    </tr>
    <tr>
        <td>1</td>
        <td>12/06/2023</td>
        <td>ggggg</td>
        <td>bgvfc</td>
        <td>09:00</td>
        <td>gtgff</td>
        <td>gtgff</td>
        <td>gtgff</td>
        <td>gtgff</td>
       
       
    </tr>
    <tr>
        <td>1</td>
        <td>12/06/2023</td>
        <td>ggggg</td>
        <td>bgvfc</td>
        <td>09:00</td>
        <td>gtgff</td>
        <td>gtgff</td>
        <td>gtgff</td>
        <td>gtgff</td>    
    </tr>
 

   
</table>

</div>

</div>


     <!------------footer-------->
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









</body>

</html>
