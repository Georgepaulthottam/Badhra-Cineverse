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

      height: 370px;
      width: 530px;
      background: #f8f8ff;
      color: #0000;
      padding: 1px;
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

    table.table td:last-child {
      opacity: 0.9;
      font-size: 16px;
      margin: 0px 5px;
    }

    /* Style for the label element */
    label {
      display: inline-block;
      color: #536878;
      font-size: 23px;
      margin-left: 10px;

    }

    span.expensevalue {
      color: #00827f;
      font-size: 21px;
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
      margin: 20px 0;
      color: #333;
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
    display: none;
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
  margin-left:37px;
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
  background-color: #2ecc71; /* Change color on hover */
  transform: translate(-50%, -50%) scale(1.05); /* Zoom in on hover */
  box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.4); /* Add shadow on hover */
}
.table-heading {
    text-align: center; /* Center the text horizontally */
    font-size: 18px; /* Adjust font size as needed */
    font-weight: bold; /* Make it bold if desired */
    padding-bottom: 17px; 
    padding-top: 17px;/* Add padding for spacing */
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



    </style>

    <script>



<script>
  function displayPopupMessage() {
    var popupMessage = document.getElementById("popup-message");
    popupMessage.innerHTML = "LOCATION ADDED SUCCESSFULLY";
    popupMessage.style.display = "block";
    setTimeout(function () {
      popupMessage.style.display = "none";
    }, 2000); // Hide the message after 2 seconds
  }
</script>

    </script>
    <!------------main content-------->

    <div class="main-container">
    <div class="main-content">
    <div class="attendence" style="overflow-x:auto;">
        <div class="cardscontainer">
            <div class="expensebox"  style="margin-bottom: 20px; margin-left:40px;" >
                <div class="expensefield">
                     <b>
                        <p class="card-heading">LOCATION</p>
                        <label for="schedule-name">Location: &emsp; </label>
                        <input type="text" id="location-name" name="location-name" placeholder="Enter Location Name"><br>
                        <label for="schedule-name">Rent: &emsp; </label>&nbsp;&emsp;&emsp;&emsp;
                        <input type="text" id="rent-amt" name="rent-amt" placeholder="Enter Rent">
                        <button class="action-button save-button" onclick="toggleInputField(); displayPopupMessage();">Save</button>

                        <button class="action-button cancel-button" onclick="cancelSchedule()">Cancel</button> 
                    </b>
                </div>
            </div>
            <div id="popup-message" class="popup-message"></div>


            <div class="expensebox"  style="margin-bottom: 10px; margin-right:80px;">
                <p class="card-heading" style="margin-top:70px; margin-bottom:-5px;">DETAILS</p> <br>
                <div class="request-status" id="card2">

                    <div class="request-status">
                        <table class="table table-striped table-hover" style="width:465px; margin-top:-10px; ">
                            <tr>
                                <a href="">
                                    <th><h5>LOCATION</h5></th>
                                    <th><h5>RENT</h5></th>
                                </a>
                            </tr>

                            <tr>
                                <th><h5>Calicut</h5></th>
                                <th><h5>400</h5></th>
                            </tr>
                            <tr>
                                <th><h5>Kochi</h5></th>
                                <th><h5>200</h5></th>
                            </tr>
                            
                        </table>
                    </div>


                </div>
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
