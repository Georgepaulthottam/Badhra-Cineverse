<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');

}

require 'connection.php';
$date=DATE($_GET['date']);
$user=$_SESSION['user'];
$activePage = 'calender'; 
include 'user_header.php';
?>


            <!------main-content-start----------->
            <div id="main-container" class="middle-section">
               <div class="bottom-section">
                <div class="profile-box" style="overflow-x:auto;">
                    <h5 style="color:red;"><?php echo $date?></h5>
                    <table id="datewisetbl">
                        <tr>
                            <td>Salary : </td>
                            <td>1750</td>
                            <td>Accomodation : </td>
                            <td>Hotel1</td>
                        </tr>
                    </table><br>
                    <h5 style="color:black;">Request</h5>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $date=DATE($_GET['date']);
                           $query=("SELECT * FROM cart WHERE username='".mysqli_real_escape_string($conn,$user)."' and date>='".mysqli_real_escape_string($conn,$date.' 00:00:00')."' and date <='".mysqli_real_escape_string($conn,$date.' 23:59:59')."'");
                                      $result=mysqli_query($conn,$query); 
                                    while($row=mysqli_fetch_assoc($result)){
                                        

                                   $time = new DateTime($row['date']);
                                   $date = $time->format('n.j.Y');
                                   $time = $time->format('H:i');

                                        echo('
                                        <tr>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$row['details'].'</td>
                                        <td>'.$row['price'].'</td>
                                        <td>'.$row['number'].'</td>
                                        <td>'.$row['price']*$row['number'].'</td>
                                        <td>'.$row['status'].'</td>
                                    </tr>');
                                    }
                                    ?>
                        </tbody>
                    </table>
                </div>
               </div>
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

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
  
  
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
</body>

</html>