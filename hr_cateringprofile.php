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
<?php $activePage = 'profile'; include 'hr_cateringheader.php'; ?>
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
<button class="btn btn-primary">Upload Photo</button>
<a href="#editPasswordModal" data-toggle="modal"><button class="btn btn-outline-primary" >Change Password</button></a>
</div>
</div>
</div>
</div>
<!-- <div class="card mt-3">
<ul class="list-group list-group-flush">
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
<span class="text-secondary">https://bootdey.com</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
<span class="text-secondary">bootdey</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
<span class="text-secondary">@bootdey</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
<span class="text-secondary">bootdey</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
<span class="text-secondary">bootdey</span>
</li>
</ul>
</div> -->
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
<h6 class="mb-0">Account Holder</h6>
</div>
<div class="col-sm-9 text-secondary">
'.$_SESSION['user'].'
</div>
</div>
<hr>
<div class="row">
	<div class="col-sm-3">
	<h6 class="mb-0">Account Number</h6>
	</div>
	<div class="col-sm-9 text-secondary">1120003456785</a>
	</div>
	</div>
	<hr>
	<div class="row">
	<div class="col-sm-3">
	<h6 class="mb-0">Branch Name</h6>
	</div>
	<div class="col-sm-9 text-secondary">
	Ernakulam
	</div>
	</div>
	<hr>
	<div class="row">
	<div class="col-sm-3">
	<h6 class="mb-0">Branch IFSC</h6>
	</div>
	<div class="col-sm-9 text-secondary">
	FDRL0012544
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

<!-- <div class="row gutters-sm">
<div class="col-sm-6 mb-3">
<div class="card h-100">
<div class="card-body">
<h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
<small>Web Design</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>Website Markup</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>One Page</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>Mobile Template</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>Backend API</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
</div>
</div>
<div class="col-sm-6 mb-3">
<div class="card h-100">
<div class="card-body">
<h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
<small>Web Design</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>Website Markup</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>One Page</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>Mobile Template</small>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<small>Backend API</small>
 <div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
</div>
</div>

</div> -->
</div>
</div>
')?>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>

</div>

  
	<!------main-content-end-----------> 
		  
		 <!----footer-design------------->

		 
		 <footer class="footer">
		    <div class="container-fluid">
			   <div class="footer-in">
			      <p class="mb-0">&copy 2023 Team Helios . All Rights Reserved.</p>
			   </div>
			</div>
		 </footer>
 
		 
	  </div>
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
							<input type="submit" name="chpass" class="btn btn-primary" value="Save Changes">
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
							<div class="row mb-3">
							<div class="col-sm-3">
							<h6 class="mb-0">Account Holder</h6>
							</div>
							<div class="col-sm-9 text-secondary">
							<input type="text" class="form-control" placeholder="Enter your name">
							</div>
							</div>
							<div class="row mb-3">
							<div class="col-sm-3">
							<h6 class="mb-0">Account Number</h6>
							</div>
							<div class="col-sm-9 text-secondary">
							<input type="number" class="form-control" placeholder="Enter your account no">
							</div>
							</div>
							<div class="row mb-3">
							<div class="col-sm-3">
							<h6 class="mb-0">Branch Name</h6>
							</div>
							<div class="col-sm-9 text-secondary">
							<input type="text" class="form-control" placeholder="Enter your branch name">
							</div>
							</div>
							<div class="row mb-3">
							<div class="col-sm-3">
							<h6 class="mb-0">Branch IFSC</h6>
						    </div>
							<div class="col-sm-9 text-secondary">
							<input type="text" class="form-control" placeholder="Enter your branch ifsc">
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

</div>


<!-------complete html----------->




  </body>
  
  </html>
