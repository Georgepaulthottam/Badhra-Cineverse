<?php  
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');

}
require 'connection.php';
$user=$_SESSION['user'];


?>

<?php require('user_header.php'); //header and siderbar?>


            <!------main-content-start----------->
            <div class="main-content">
                <section id="view-request">
                    <div class="detailed-box" id="request-table">
                        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Request
                        </h3>
                        <div class="attendence" style="overflow-x:auto;">
                            <div class="requestfilter">
                               <form action="user_view_request.php" method="post">
                                        <button type="submit" name="accept" style="background:#27ae60;" value="">Accepted</button>
                                        <button type="submit" name="rejected" style="background:#FF5733 ;" value="">Rejected</button>
                                        <button type="submit" name="requested" style="background:#F8BA03;" value="">Pending</button>
                                        <button type="submit" name="all" style="background:#036DF8 ;" value="">All</button>
                                </form>
                                <br>
                            </div>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Item</th>
                                        <th>Description</th>
                                        <th>price</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    <?php
                                    if (isset($_POST['accept'])) {
                                     $query=("SELECT * FROM cart WHERE status='".mysqli_real_escape_string($conn,"approved")."' and username='".mysqli_real_escape_string($conn,$user)."'");
                                      $result=mysqli_query($conn,$query); 
                                    while($row=mysqli_fetch_assoc($result)){
                                        

                                   $time = new DateTime($row['date']);
                                   $date = $time->format('n.j.Y');
                                   $time = $time->format('H:i');

                                        echo('
                                        <tr>
                                        <td>'.$date.'</td>
                                        <td>'.$time.'</td>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$row['details'].'</td>
                                        <td>'.$row['price'].'</td>
                                        <td>'.$row['number'].'</td>
                                        <td>'.$row['price']*$row['number'].'</td>
                                        <td>'.$row['status'].'</td>
                                    </tr>');
                                    }}
                                    if (isset($_POST['rejected'])) {
                                     $query=("SELECT * FROM cart WHERE status='".mysqli_real_escape_string($conn,"rejected")."' and username='".mysqli_real_escape_string($conn,$user)."'");
                                      $result=mysqli_query($conn,$query); 
                                    while($row=mysqli_fetch_assoc($result)){
                                        

                                   $time = new DateTime($row['date']);
                                   $date = $time->format('n.j.Y');
                                   $time = $time->format('H:i');

                                        echo('
                                        <tr>
                                        <td>'.$date.'</td>
                                        <td>'.$time.'</td>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$row['details'].'</td>
                                        <td>'.$row['price'].'</td>
                                        <td>'.$row['number'].'</td>
                                        <td>'.$row['price']*$row['number'].'</td>
                                        <td>'.$row['status'].'</td>
                                    </tr>');
                                    }}
                                    if (isset($_POST['requested'])) {
                                     $query=("SELECT * FROM cart WHERE status='".mysqli_real_escape_string($conn,"requested")."'and username='".mysqli_real_escape_string($conn,$user)."'");
                                      $result=mysqli_query($conn,$query); 
                                    while($row=mysqli_fetch_assoc($result)){
                                        

                                   $time = new DateTime($row['date']);
                                   $date = $time->format('n.j.Y');
                                   $time = $time->format('H:i');

                                        echo('
                                        <tr>
                                        <td>'.$date.'</td>
                                        <td>'.$time.'</td>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$row['details'].'</td>
                                        <td>'.$row['price'].'</td>
                                        <td>'.$row['number'].'</td>
                                        <td>'.$row['price']*$row['number'].'</td>
                                        <td>'.$row['status'].'</td>
                                    </tr>');
                                    }}
                                    if (isset($_POST['all'])) {
                                     $query=("SELECT * FROM cart WHERE username='".mysqli_real_escape_string($conn,$user)."'");
                                      $result=mysqli_query($conn,$query); 
                                    while($row=mysqli_fetch_assoc($result)){
                                        

                                   $time = new DateTime($row['date']);
                                   $date = $time->format('n.j.Y');
                                   $time = $time->format('H:i');

                                        echo('
                                        <tr>
                                        <td>'.$date.'</td>
                                        <td>'.$time.'</td>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$row['details'].'</td>
                                        <td>'.$row['price'].'</td>
                                        <td>'.$row['number'].'</td>
                                        <td>'.$row['price']*$row['number'].'</td>
                                        <td>'.$row['status'].'</td>
                                    </tr>');
                                    }}
                                    
                                   
                                    


                                ?></tbody>
    
    
                            </table>
    
                        </div>
                </section>
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



    <!-------complete html----------->






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $(".xp-menubar").on('click', function () {
                $("#sidebar").toggleClass('active');
                $("#content").toggleClass('active');
            });

            $('.xp-menubar,.body-overlay').on('click', function () {
                $("#sidebar,.body-overlay").toggleClass('show-nav');
            });

        });

    </script>





</body>

</html>