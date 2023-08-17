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
        
.container {
    margin:20px 20px;
    text-align: center;
    padding: 20px;
    border-radius: 10px;
    background-color: #444;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    color:#fff;
}

h1 {
    margin-bottom: 20px;
}

.input-container {
    margin: 10px 0;
}

input[type="number"]{
    padding: 10px;
    border: none;
    background-color: #555;
    color: #fff;
    border-radius: 5px;
    border:1px solid black;
    width: 100%;
border-bottom:2px solid grey;
}

input[type="file"] {
    padding: 10px;
    border: none;
    background-color: #555;
    color: #fff;
    border-radius: 5px;
    width: 230px;
    border:1px solid black;
}

button {
 padding: 17px 30px;
 border-radius: 50px;
 border: 0;
 background-color: white;
 box-shadow: rgb(0 0 0 / 5%) 0 0 8px;
 letter-spacing: 1.5px;
 text-transform: uppercase;
 font-size: 18px;
 transition: all .5s ease;
}

button:hover {
 letter-spacing: 3px;
 background-color: hsl(261deg 80% 48%);
 color: hsl(0, 0%, 100%);
 box-shadow: rgb(93 24 220) 0px 7px 29px 0px;
}

button:active {
 letter-spacing: 3px;
 background-color: hsl(261deg 80% 48%);
 color: hsl(0, 0%, 100%);
 box-shadow: rgb(93 24 220) 0px 0px 0px 0px;
 transform: translateY(10px);
 transition: 100ms;
}
select {
    display: block;
    margin: 10px auto;
    width: 30%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
  }
::placeholder{
    color:#fff;
}
     </style>
  </head>
  <body>
		  <!------top-navbar-end-----------> 
		  
		  
		   <!------main-content-start-----------> 
		     
		   
            
           <div class="container">
        <h1>Vehicle Department Portal</h1>
        <div id="dateDisplay"></div>
        <select id="driverSelect">
    <option value="driver1">Driver 1</option>
    <option value="driver2">Driver 2</option>
    <option value="driver3">Driver 3</option>
    <!-- Add more options as needed -->
  </select>

  <!-- Starting KM-->
  <div class="input-container">
      <input type="file" id="startImg" placeholder="Select Starting Km Photo">
  </div>
  
          <div class="input-container">
              <input type="number" id="startKm" placeholder="Enter the Starting Km">
          </div>
<!-- Ending KM -->

  <div class="input-container">
      <input type="file" id="startImg" placeholder="Select Ending Km Photo">
  </div>
        <div class="input-container">
            <input type="number" id="endKm" placeholder="Enter the Ending Km">
        </div>
        <button id="submitBtn">Submit</button>
    </div>
    
		 
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
