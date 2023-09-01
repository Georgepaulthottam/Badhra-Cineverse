<?php $activePage = 'vehicle'; include 'adminheadersidebar.php'; ?>
<!doctype html>
<html lang="en">
  <head>
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
	  
	  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	 <style>
        
section {
    margin:40px 200px;
    text-align: center;
    padding: 16px;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    color:black;
    font-weight:100;
    width:60vw;
     
}
.startKm{
    position:absolute;
    margin-left:40px;    
    
}
.endKm{
    position:absolute;
    margin-left:40px;    
}
.driverselect{
    position:absolute;
    margin-left:40px;  
}
.inputfield1 select{

text-align:center;
  border-radius: 5px;
  background: #333333;
  padding: 8px;
  letter-spacing:1px;
  cursor: text;
  color:#dcdcdc;
  width:16.3vw;
  margin-right:110px;
}

.inputfield1{
 position:relative;
    display:flex;
justify-content:right;
}
.inputfield1 input[type="number"]
{
    align-items: center;
  border-radius: 5px;
  background: #333333;
  padding: 8px;
  text-align:center;
  cursor: text;
  color:#dcdcdc;
  letter-spacing:1px;
  margin-right:110px;
  width:16.3vw;
}
.inputfield1 input[type="file"]
{
    align-items: center;
  border-radius: 5px;
  letter-spacing:1px;
  background: #333333;
  text-align:center;
  padding: 5px;
  cursor: text;
  color:#dcdcdc;
  width:16.4vw;
  margin-right:109px;
}
::placeholder{
color:#dcdcdc;
}
#dateDisplay{
    font-weight:500;
}
hr {
  border-top: 0.3px solid grey;
  opacity:0.5;
}
@media only screen and (max-width: 767px){
    section {
    margin:50px 20px;
    text-align: center;
    padding: 10px;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    color:black;
    font-weight:100;
    width:90vw;
     
}
.startKm{
    position:absolute;
    margin-left:10px;    
    
}
.endKm{
    position:absolute;
    margin-left:10px;    
}
.driverselect{
    position:absolute;
    margin-left:10px;  
}
#dateDisplay{
    font-weight:600;
}
.inputfield1 input[type="number"]
{
    align-items: center;
  border-radius: 5px;
  background: #3D3D3D;
  padding: 5px;
  text-align:center;
  cursor: text;
  color:#dcdcdc;
  letter-spacing:1px;
  margin-right:20px;
  width:38vw;
}
.inputfield1 input[type="file"]
{
    align-items: center;
  border-radius: 5px;
  letter-spacing:1px;
  background: #333333;
  text-align:center;
  padding: 5px;
  cursor: text;
  color:#dcdcdc;
  width:66.4vw;
  margin-left:20px;
  margin-top:40px;
  margin-right:40px;
}
.inputfield1 select{

text-align:center;
  border-radius: 5px;
  background: #333333;
  padding: 8px;
  letter-spacing:1px;
  cursor: text;
  color:#dcdcdc;
  width:38.3vw;
  margin-right:20px;
}

}
     </style>
  </head>
  <body>
		  <!------top-navbar-end-----------> 
		  
		  
		   <!------main-content-start-----------> 
		 
    <section>

        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
            Vehicle Department Portal</h3>

                <div id="dateDisplay"></div>
                    <br><br>
                    <form action="" method="post">
                        
                                <h6 class="driverselect">Select Driver :</h6>
                                <div class="inputfield1">
                                    <select id="driverselect" name="drivername">
                                        <option value="0" selected disabled>Not Selected</option>
                                        <option value="1">Driver 1</option>
                                        <option value="2">Driver 2</option>
                                        <option value="3">Driver 3</option>
                                    </select>
                                  </div>
                           
                            
                    
<hr>
                        <h6 class="startKm">Starting KM :</h6>
                        <div class="inputfield1">
                        <input type="number" id="startKm" placeholder="Enter Starting KM">    
                        </div>

<hr>

                        <h6 class="startKm">Starting KM(Upload Image) :</h6>
                        <div class="inputfield1">
                        <input type="file" id="startImg" placeholder="Select Starting KM Photo">    
                        </div>

<hr>
                        <h6 class="startKm">Ending KM :</h6>
                        <div class="inputfield1">
                        <input type="number" id="endKm" placeholder="Enter Ending KM ">    
                        </div>

<hr>

                        <h6 class="startKm">Ending KM(Upload Image) :</h6>
                        <div class="inputfield1">
                        <input type="file" id="endImg" placeholder="Select Ending KM Photo">    
                        </div>

<hr>




                    <!----footer-design------------->
                </section>
                    <br> <br>
		 <footer class="footer">
		    <div class="container-fluid">
			   <div class="footer-in">
			      <p class="mb-0">&copy 2023 Team Helios . All Rights Reserved.</p>
			   </div>
			</div>
		 </footer>
		 
		 
		 
<!-------complete html----------->





<script>document.addEventListener("DOMContentLoaded", function() {
    const dateDisplay = document.getElementById("dateDisplay");
    const startKmInput = document.getElementById("startKm");
    const endKmInput = document.getElementById("endKm");
    const submitBtn = document.getElementById("submitBtn");

    // Display current date and day
    const currentDate = new Date();
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    dateDisplay.textContent = currentDate.toLocaleDateString('en-US', options);

    submitBtn.addEventListener("click", function() {
        const startKm = parseInt(startKmInput.value);
        const endKm = parseInt(endKmInput.value);

        if (!isNaN(startKm) && !isNaN(endKm)) {
            const distance = endKm - startKm;
            alert(`Distance traveled: ${distance} km`);
        } else {
            alert("Please enter valid values for Starting Km and Ending Km.");
        }
    });
});

        </script>
    </body>
  
  </html>
