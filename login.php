<?php 
session_start();
require 'connection.php';
if(isset($_POST["submit"])){  
if(isset($_POST['username']) && isset($_POST['password'])) {  
    $user=$_POST['username'];  
    $pass=$_POST['password'];
    $query=("SELECT * FROM users WHERE username='".mysqli_real_escape_string($conn,$user)."' AND password='".mysqli_real_escape_string($conn,$pass)."'");  
    $conquer=mysqli_query($conn, $query);
    $numrows=mysqli_num_rows($conquer);  
    if($numrows!=0)  
    {  
        
    while($row=mysqli_fetch_assoc($conquer))  
    {  
    $dbusername=$row['username'];  
    $dbpassword= $row['password'];  
    $dbuserdept=$row['dept'];
    $dbattendance=$row['attendance'];
    $status=$row['status'];
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    }  
    $_SESSION['user']=$user;
    $_SESSION['userdept']=$dbuserdept;
    $_SESSION['attendance']=$dbattendance;
    $_SESSION['status']=$status;
    $_SESSION['Firstname']=$firstname;
    $_SESSION['Lastname']=$lastname;
   if($dbuserdept=="Artist" or $dbuserdept=="camera" or $dbuserdept=="Makeup"){    
    header("location:user_index.php");
    }
    elseif($dbusername=="Admin"){
        header("location:index.php");

     
    } else {  
    echo "<script>alert('invalid username or password!')</script>";  
    } 
}
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-page/style.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <title>Badhra Cineverse</title>
</head>

<body>

    <div class="login-card-container">
        <div class="login-card">
            <div class="login-card-logo">
                <img src="login-page/logo.png" alt="logo">
            </div>
            <div class="login-card-header">
                <h1>Sign In</h1>
                
                <div>Please login to use the platform</div>
            </div>
            <form class="login-card-form" method="post" action="">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input type="text" placeholder="Enter Username" id="username"  name="username"
                    autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Enter Password" id="password" name="password"
                     required>
                </div>
                <div class="form-item-other">
                    <div class="checkbox">
                        <input type="checkbox" id="rememberMeCheckbox" checked>
                        <label for="rememberMeCheckbox">Remember me</label>
                    </div>
                    <a href="#">I forgot my password!</a>
                </div>
                <button type="submit" name="submit" id="submit">Login</button>
            </form>
           
        </div>
        
    </div>

</body>

</html>