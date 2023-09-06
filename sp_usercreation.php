
<?php $activePage = 'misc'; include 'adminheadersidebar.php'; ?>
<!doctype html>
<html lang="en">
  <head>
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>

<style>
.button {
            background-color: #333;
            color: white;
            border: 2px solid #333;
            padding: 10px 20px;
            cursor: pointer;
        }
        
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }
        
        .popup-content {
            background-color: #152935;
            margin: 100px auto;
            padding: 20px;
            width: 80%;
            max-width: 500px;
            border-radius: 5px;
            color: white;
        }
        
        .close {
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        
        .scrollable {
            max-height: 400px;
            overflow-y: scroll;
        }
        
        /* Styles for form elements */
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        
        .form-group input[type="text"],
        .form-group input[type="password"],
        .form-group select,
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #fff;
            color: #333;
        }
        
        /* Styles for the arrow and hidden bank details */
        
        .arrow {
            cursor: pointer;
            margin-top: 20px;
            text-decoration: underline;
        }
        
        .hidden {
            display: none;
        }

table {
  background: #152935;
  border-radius: 0.25em;
  border-collapse: collapse;
  margin: 1em;
  margin-top: 200px;
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
 

    </style>
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Miscellaneous </title>
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
	  <script type="text/javascript" src="main.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="//code.ionicframework.com/nightly/js/ionic.bundle.js"></script>  
 

  </head>
  <body>
  


		  <!------top-navbar-end-----------> 
		  
		  
		   <!------main-content-start-----------> 
           
		  
<button id="popupButton" class="button">Open Form</button>
    <div id="popupForm" class="popup">
        <span class="close" id="closeButton">&times;</span>
        <form class="popup-content" action="#">
            <div class="scrollable">
                <h2>Popup Form</h2>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstName" required>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastName" required>
                </div>
                <div class="form-group">
                    <label for="userName">User Name</label>
                    <input type="text" id="userName" name="userName" required>
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" id="mobile" name="mobile" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select id="type" name="type">
                        <option value="Camera">Camera</option>
                        <option value="Art">Art</option>
                        <option value="Makeup">Makeup</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="profilePicture">Profile Picture</label>
                    <input type="file" id="profilePicture" name="profilePicture" accept="image/*">
                </div>
                <div class="arrow" id="bankArrow">Bank and PAN &#9660;</div>
                <div id="bankDetails" class="hidden">
                    <div class="form-group">
                        <label for="accountHolder">Account Holder</label>
                        <input type="text" id="accountHolder" name="accountHolder">
                    </div>
                    <div class="form-group">
                        <label for="accountName">Account Name</label>
                        <input type="text" id="accountName" name="accountName">
                    </div>
                    <div class="form-group">
                        <label for="branchName">Branch Name</label>
                        <input type="text" id="branchName" name="branchName">
                    </div>
                    <div class="form-group">
                        <label for="branchIFSC">Branch IFSC</label>
                        <input type="text" id="branchIFSC" name="branchIFSC">
                    </div>
                    <div class="form-group">
                        <label for="panNumber">PAN Number</label>
                        <input type="text" id="panNumber" name="panNumber">
                    </div>
                </div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
           
           <table>

<thead>
                
  <tr>
  
    <th>SI NO</th>
    <th>NAME</th>
    <th> TYPE</th>
    <th>SALARY</th>
  
    <th>SALARY STATUS</th>
    <th>DETAILS</th>
   
   
</thead>
<tbody>
<tr>
    <td>1</td>
    <td>alwin</td>
    <td>camera</td>
    <td>3500</td>
    <td>pending</td>
    <td> <input type=button value=view></td>
</tr>
<tr>
    <td>2</td>
    <td>Anantika</td>
    <td>makeup</td>
    <td>2500</td>
    <td>paid</td>
    <td> <input type=button value=view></td>
</tr>
<tr>
    <td>3</td>
    <td>sneha</td>
    <td>camera</td>
    <td>4500</td>
    <td>pending</td>
    <td> <input type=button value=view></td>
</tr>
<tr>
    <td>1</td>
    <td>alwin</td>
    <td>camera</td>
    <td>3500</td>
    <td>pending</td>
    <td> <input type=button value=view></td>
</tr>
<tr>
    <td>1</td>
    <td>alwin</td>
    <td>camera</td>
    <td>3500</td>
    <td>pending</td>
    <td> <input type=button value=view></td>
</tr>
<tr>
    <td>1</td>
    <td>alwin</td>
    <td>camera</td>
    <td>3500</td>
    <td>pending</td>
    <td> <input type=button value=view></td>
</tr>
<tr>
    <td>1</td>
    <td>alwin</td>
    <td>camera</td>
    <td>3500</td>
    <td>pending</td>
    <td> <input type=button value=view></td>
</tr>

</tbody>
</table>



		    <!------main-content-end-----------> 
		  
		 
		 
		 <!----footer-design------------->
		 
		 
		    <div class="container-fluid">
            <footer class="footer">
			   <div class="footer-in">
			      <p class="mb-0">&copy 2023 Team Helios . All Rights Reserved.</p>
			   </div>
			</div>
		 </footer>
		 
		 
		 
		 
	  </div>
   
</div>

<script>// JavaScript to toggle the visibility of bank details

        const bankArrow = document.getElementById('bankArrow');
        const bankDetails = document.getElementById('bankDetails');
        
        bankArrow.addEventListener('click', () => {
            if (bankDetails.style.display === 'none' || bankDetails.style.display === '') {
                bankDetails.style.display = 'block';
                bankArrow.innerHTML = 'Bank and PAN &#9650;';
            } else {
                bankDetails.style.display = 'none';
                bankArrow.innerHTML = 'Bank and PAN &#9660;';
            }
        });
        
        // JavaScript to open and close the popup form
        
        const popupButton = document.getElementById('popupButton');
        const popupForm = document.getElementById('popupForm');
        const closeButton = document.getElementById('closeButton');
        
        popupButton.addEventListener('click', () => {
            popupForm.style.display = 'block';
        });
        
        closeButton.addEventListener('click', () => {
            popupForm.style.display = 'none';
        });
        
        window.addEventListener('click', (event) => {
            if (event.target === popupForm) {
                popupForm.style.display = 'none';
            }
        });
        </script>

<!-------complete html----------->


  </body>
  
  </html>
