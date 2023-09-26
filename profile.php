<?php
session_start();
require 'connection.php';
// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');

}
if(isset($_POST['chpass'])){
	$pass=$_POST['curpass'];
	$query=("SELECT * FROM users WHERE username='".mysqli_real_escape_string($conn,$_SESSION['user'])."' AND password='".mysqli_real_escape_string($conn,$pass)."'");  
    $conquer=mysqli_query($conn, $query);
    $numrows=mysqli_num_rows($conquer);  
    if($numrows!=0)  
    {  
        
    while($row=mysqli_fetch_assoc($conquer))  
    {  if($row['password']==$pass){
		$newpass=$_POST['newpass'];
		$confpass=$_POST['confirmpass'];
		if($newpass==$confpass){
				$query2=("update  users set password='".mysqli_real_escape_string($conn,$newpass)."' WHERE username='".mysqli_real_escape_string($conn,$_SESSION['user'])."'");  
                $conquer2=mysqli_query($conn, $query2);
				header("location:profile.php");

		}
		else{echo "<script>alert('Enter the same password')</script>";}


	}
		else{echo "<script>alert('Enter correct password')</script>";}
	
}
	}else{echo "<script>alert('Enter correct password')</script>";}

}
?>
<?php $activePage = 'profile'; include 'adminheadersidebar.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Profile Admin</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	    <!----css3---->
        <link rel="stylesheet" href="css/custom.css">
		<link rel="stylesheet" href="css/profilestyle.css">
		
		
		<!--google fonts -->
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	
	
	   <!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
	  <link rel="stylesheet" href="css/style.css" />
	  <script type="text/javascript" src="main.js"></script>
  </head>
  <body>
  

 <!------main-content-start-----------> 
		     
 <div class="main-content">
<?php echo('
<div class="main-body">

<div class="row gutters-sm">
<div class="col-md-4 mb-3">
<div class="card">
<div class="card-body">
<div class="d-flex flex-column align-items-center text-center">
<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="200">
<div class="mt-3">
<h4>'.$_SESSION['user'].'</h4>
<p class="text-secondary mb-1">'.$_SESSION['userdept'].'</p>
<p class="text-muted font-size-sm">Kozikode, Kerala, India</p>
<a href="#editProfilepicModal" data-toggle="modal"><button class="btn btn-primary" >Upload Photo</button></a>
<a href="#editPasswordModal" data-toggle="modal"><button class="btn btn-outline-primary" >Change Password</button></a>
</div>
</div>
</div>
</div>

</div>

<div class="col-md-8">
<div class="card mb-3">
<div class="card-body">
<div class="row">
<div class="col-sm-3">
<h6 class="mb-0">User Name</h6>
</div>
<div class="col-sm-9 text-secondary">
'.$_SESSION['user'].'
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3">
<h6 class="mb-0">Email</h6>
</div>
<div class="col-sm-9 text-secondary">'.$_SESSION['email'].'</a>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3">
<h6 class="mb-0">Phone</h6>
</div>
<div class="col-sm-9 text-secondary">
+91 '.$_SESSION['phone'].'
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3">
<h6 class="mb-0">Address</h6>
</div>
<div class="col-sm-9 text-secondary">
Kozikode, Kerala, India
</div>
</div>
<hr>
	<div class="row">
		<div class="col-sm-3">
		<h6 class="mb-0">PAN Number</h6>
		</div>
		<div class="col-sm-9 text-secondary">
		MFWPK2311G
		</div>
		</div>
		<hr>
<div class="row">
<div class="col-sm-12">
	<a href="#editDetailsModal" data-toggle="modal"><button class="btn btn-primary" >Edit</button></a>
</div>
</div>
</div>
</div>
</div>


</div>
</div>
')?>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
       $(document).ready(function(){
	      $(".xp-menubar").on('click',function(){
		    $("#sidebar").toggleClass('active');
			$("#content").toggleClass('active');
		  });
		  
		  $('.xp-menubar,.body-overlay').on('click',function(){
		     $("#sidebar,.body-overlay").toggleClass('show-nav');
		  });
		  
	   });	
</script>

</div>

  
	<!------main-content-end-----------> 
		  
 <!----edit-modal start--------->
 <div class="modal fade" tabindex="-1" id="editPasswordModal" role="dialog">
					<div class="modal-dialog" role="document">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Change Password</h5>
						  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
						</div>
						<div class="modal-body">
						  <div class="form-group">
							<form action="profile.php" method="post">
							  <label>Current Password</label>
							  <input type="password" class="form-control" name="curpass" required>
						  </div>
						  <div class="form-group">
							  <label>New Password</label>
							  <input type="password" class="form-control" name="newpass" required>
						  </div>
						  <div class="form-group">
							  <label>Confirm Password</label>
							  <input type="password" class="form-control" name="confirmpass" required>
						  </div>
						 
						</div>
						<div class="modal-footer">
							<input type="submit" name="#" class="btn btn-primary" value="Save Changes">
							<input type="button" class="btn btn-primary" data-dismiss="modal" value="Cancel">
						</div>
					  </div>
					</div>
					 </form>
				  </div>
										 <!----edit-modal end--------->

                                         
 		   <!----edit-modal start--------->
				   <div class="modal fade" tabindex="-1" id="editProfilepicModal" role="dialog">
					<div class="modal-dialog" role="document">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Change Profile Photo</h5>
						  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
						</div>
						<div class="modal-body">
						  <div class="form-group">
				<form action="profile.php" method="post">
							  <label>Upload Your Image</label>
							  <input type="file" class="form-control" name="propic" required>
						  </div>
						</div>
						<div class="modal-footer">
							<input type="submit" name="#" class="btn btn-primary" value="Save Changes">
							<input type="button" class="btn btn-primary" data-dismiss="modal" value="Cancel">
						</div>
					  </div>
					</div>
				</form>
				  </div>
		 <!----edit-modal end--------->

										 <!----edit-detailsmodal start--------->
				   <div class="modal fade" tabindex="-1" id="editDetailsModal" role="dialog">
					<div class="modal-dialog" role="document">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Edit Details</h5>
						  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
						</div>
						<div class="modal-body">
						  <div class="row mb-3">
							<div class="col-sm-3">
							<h6 class="mb-0">User name</h6>
							</div>
							<div class="col-sm-9 text-secondary">
							<input type="text" class="form-control" placeholder="Enter your name">
							</div>
							</div>
							<div class="row mb-3">
							<div class="col-sm-3">
							<h6 class="mb-0">Email</h6>
							</div>
							<div class="col-sm-9 text-secondary">
							<input type="text" class="form-control" placeholder="Enter your email">
							</div>
							</div>
							<div class="row mb-3">
							<div class="col-sm-3">
							<h6 class="mb-0">Phone</h6>
							</div>
							<div class="col-sm-9 text-secondary">
							<input type="text" class="form-control" placeholder="Enter your password">
							</div>
							</div>
							<div class="row mb-3">
							<div class="col-sm-3">
							<h6 class="mb-0">Address</h6>
							</div>
							<div class="col-sm-9 text-secondary">
							<textarea class="form-control" placeholder="Enter your Address"></textarea>
							</div>
							</div>
							<div class="row">
							<div class="col-sm-3"></div>
							<div class="col-sm-9 text-secondary">
							</div>
							</div>
						</div>

						<div class="modal-footer">
						<input type="button" class="btn btn-primary" value="Save Changes">
						<input type="button" class="btn btn-primary" data-dismiss="modal" value="Cancel">
						</div>
					  </div>
					</div>
				  </div>
	 <!----edit-modal end--------->

 <!----footer-design------------->

		 
 <footer class="footer">
		    <div class="container-fluid">
			   <div class="footer-in">
			      <p class="mb-0">&copy 2023 Team Helios . All Rights Reserved.</p>
			   </div>
			</div>
		 </footer>
 

<!-------complete html----------->


  </body>
  
  </html>


