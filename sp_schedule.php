<?php
session_start(); 
$activePage = 'schedule'; 
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
      
      height:370px;
    width: 530px;
    background: #f8f8ff;
    color: #0000;
    padding: 1px;
    border-radius: 11px;
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
    }
	table.table td:last-child{
		   opacity:0.9;
		   font-size:16px;
		   margin:0px 5px;
	   }

    /* Style for the label element */
    label {
      display: inline-block;
      color:#536878;
      font-size: 23px;
      margin-left: 10px;
      
    }
    span.expensevalue{
        color: #5f9ea0; 
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
	
  .transperant{
    background-color:#dcdcdc;
  }
  .profile-box{
    width: 1160px;
    height: 50px
  }
  @media only screen and (max-width: 767px){


    /* Styling for the fields inside the box */
    .expensefield {
      display: inline-block;
      margin-right: 20px;
    }

  }

  .start-schedule-button {
            background: linear-gradient(to bottom,#5f9ea0, #00827f);
            border: none;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            width:330px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .start-schedule-button:hover {
            background: linear-gradient(to bottom, #0053a0, #0074e4);
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
            margin-left:240px;
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

        .end-schedule-button {
            margin-top:15px;
            background: linear-gradient(to bottom, #e40000, #a00000);
            border: none;
            color: #fff;
            padding: 10px 20px;
            width: 330px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .end-schedule-button:hover {
            transform: scale(1.05);
        }
        .end-schedule-button {
            background: linear-gradient(to bottom, #e40000, #a00000);
        }

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
        color: black; /* Set font color to black */
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
            color: #333; /* Change the color to your preference */
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
   
    text-align: center;
    margin-left:50px;
    margin-top:10px;
    width:1080px;
    background-color: #f8f8ff;
    padding: 5px;
    margin-bottom:40px;
    margin-right: 20px;
    box-shadow: 1px 2px 2px 2px rgba(20, 20, 20, 0.4);
    border-radius: 10px;
    border: 1px solid grey;
  }

  .schedule-select {
    margin-right:160px;
    margin-top: 15px;
  }

  .scedule {
    margin-top:30px;
    font-size: larger;
    margin-right:160px;
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
    margin-top: 20px;
    width: 1100px;
    margin-left:50px;
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


  

      
    
</style>
<script>
     function toggleTableVisibility() {
    var scheduleSelect = document.getElementById("scheduleSelect");
    var tablesContainer = document.getElementById("tablesContainer");

    // Check if the selected value is "default" (i.e., no month selected)
    if (scheduleSelect.value === "default") {
      tablesContainer.style.display = "none"; // Hide the table
    } else {
      tablesContainer.style.display = "block"; // Show the table
    }
  }
   
        function toggleInputField() {
        var scheduleInput = document.getElementById("schedule-input");
        var enteredValue = document.getElementById("schedule-name").value;
        var scheduleDisplay = document.getElementById("schedule-display");
        var endScheduleButton = document.getElementById("end-schedule-button");

        if (scheduleInput.style.display === "none") {
            scheduleInput.style.display = "block";
            scheduleDisplay.style.display = "none";
            endScheduleButton.style.display = "none";
        } else {
            scheduleInput.style.display = "none";
            scheduleDisplay.style.display = "block";
            scheduleDisplay.innerHTML = "Schedule Name: \"" + enteredValue + "\"";
            endScheduleButton.style.display = "block";
        }
    }

    function cancelSchedule() {
        var scheduleInput = document.getElementById("schedule-input");
        var endScheduleButton = document.getElementById("end-schedule-button");

        scheduleInput.style.display = "none";
        endScheduleButton.style.display = "none";
    }

    function confirmEndSchedule() {
        var confirmResult = window.confirm("Are you sure you want to end this schedule?");
        if (confirmResult) {
            alert("Schedule Ended!");
            // Reset the page to its initial state
            document.getElementById("schedule-name").value = ""; // Clear the input field
            toggleInputField(); // Hide the input field, display the "Start Schedule" button
        }
    }
    </script>
</head>

<body>
    <!------top-navbar-end----------->


    <!------main-content-start----------->
    <div class="main-container">
    <div class="main-content">
        <div class="attendence" style="overflow-x:auto;">
            <table class="profile-box">
                <thead>
                <tr>
                    <th>&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;<b>TITLE: &emsp; &emsp;</b>Geetha Govindam   &emsp; &emsp;&emsp; &emsp;&emsp;&emsp; &emsp;&emsp; &emsp;&emsp;&emsp; &emsp;&emsp; &emsp;&emsp;</th>
                    <th>&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;<b>DATE: &emsp; &emsp;</b> 13-09-2023</th>
                </tr>
                </thead>
            </table>
            <table class="transparent">
                <tr>
                    <td>
                        <div class="expensebox">
                            <div class="expensefield">
                            <b>
                            <p class="card-heading">SCHEDULE</p> 
                           
                            <button class="start-schedule-button" onclick="toggleInputField()">Start Schedule</button><br><br>
                            <div id="schedule-input" style="display: none;">
                               <label for="schedule-name">Schedule Name: &emsp; </label>
                                  <input type="text" id="schedule-name">
                                     <div class="action-buttons">
                                         <button class="action-button save-button" onclick="toggleInputField()">Save</button>
                                          <button class="action-button cancel-button" onclick="cancelSchedule()">Cancel</button>

                                     </div>
                            </div>
                           <div id="schedule-display" style="display: none;"></div> 
                                 <button id="end-schedule-button" class="end-schedule-button" style="display: none;" onclick="confirmEndSchedule()">End Schedule</button> <!-- "End Schedule" button -->


                          <!-- Confirmation prompt for ending schedule -->
                             <div id="delete-prompt" class="delete-prompt">
                             <h6>Are you sure you want to end the schedule?</h6>
                                 <div class="btn-container">
                                        <button class="btn delete" onclick="endSchedule()">End</button>
                                        <button class="btn cancel" onclick="cancelEndSchedule()">Cancel</button>
                                  </div>
                             </div>
                        </b>
                    </div>
                </div>
            </td>
            <td>
                <div class="expensebox">
                    <div class="expensefield">
                        <b>
                            <p class="card-heading">DETAILS</p> <br>
                            
                            <label for="schedule-name">Schedule&emsp;&emsp;&emsp; &nbsp;: &emsp;&emsp; </label>
                            <span class="expensevalue">May</span><br>
	                          <label for="opening-balance">Schedule Day    &emsp;  &nbsp;&emsp;:    &nbsp;  &emsp;&emsp; </label>
                              <span class="expensevalue">02</span> &nbsp; &nbsp; &nbsp;&emsp;<br>
                        </b>
                    </div>
                </div>
            </td>
        </tr>
    </table>


    <div class="info-container" id="infoContainer">
  <p class="scedule"><b>Schedule:</b></p>
  <div class="schedule-select">
    <select id="scheduleSelect" onchange="toggleTableVisibility()">
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

  <div class="misctable" style="overflow-x:auto;">
  <div class="tables-container" id="tablesContainer">
    <table>



  <thead>
  <tr >
  <td></td>
  <td></td>
  <td></td>
    <td></td>
    <td><b><h3> Schedule </h3></b></td>
    <td><b> <h3>Report</h3> </b></td>
    <td></td>
  </tr>
  </thead>
                  
    <tr>
      <th>SI NO</th>
      <th>Schedule</th>
      <th>Date</th>
      <th>Location</th>
      <th>Total Bata</th>
      <th>Total Attendance</th>
      <th>Total Request</th>
      <th>Total Miscellanious</th>
      <th>Total Expense</th>
      <th>Details</th>
    </tr>
    
  

    <tr>
        <td>1</td>
        <td>12/06/2023</td>
        <td>ggggg</td>
        <td>bgvfc</td>
        <td>bgvfc</td>
        <td>09:00</td>
        <td>gtgff</td>
        <td>70</td>
        <td>gtgff</td>
        <td></button>view</button></td>
    </tr>
    <tr>
        <td>1</td>
        <td>12/06/2023</td>
        <td>ggggg</td>
        <td>bgvfc</td>
        <td>bgvfc</td>
        <td>09:00</td>
        <td>gtgff</td>
        <td>70</td>
        <td>gtgff</td>
        <td></button>view</button></td>
    </tr>
    <tr>
        <td>1</td>
        <td>12/06/2023</td>
        <td>ggggg</td>
        <td>bgvfc</td>
        <td>09:00</td>
        <td>gtgff</td>
        <td>bgvfc</td>
        <td>70</td>
        <td>gtgff</td>
        <td></button>view</button></td>
    </tr>
     
  <tbody>

	




  </tbody>
  </table>
  </div>
</div>


































    <!-------------end of main------------------->
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="footer-in">
                <p class="mb-0">&copy 2023 Team Helios. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</div>
      


  

</body>

</html>