<?php
session_start(); 
$activePage = 'profile'; 
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user'] !== "super") {
    header('Location:login.php');
}
include 'sp_header.php';
?>
<style>
    .main-content{

        min-height: 82.9vh;
    }
</style>

 <!------main-content-start-----------> 
		     <body>

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
									<input type="text" class="form-control" value="<?php echo $_SESSION['user']?>" placeholder="Enter your name">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $_SESSION['email']?>" placeholder="Enter your email">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $_SESSION['phone']?>"placeholder="Enter your password">
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-sm-3">
								<h6 class="mb-0">Address</h6>
							</div>
							<div class="col-sm-9 text-secondary">
								<textarea class="form-control" value="<?php echo $_SESSION['address']?>" placeholder="Enter your Address"></textarea>
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
			
		</body>
			
			<footer class="footer">
		    <div class="container-fluid">
				<div class="footer-in">
					<p class="mb-0">&copy 2023 Team Helios . All Rights Reserved.</p>
				</div>
			</div>
		</footer>
 

<!-------complete html----------->
