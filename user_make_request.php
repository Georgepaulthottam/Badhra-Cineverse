<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
$user = $_SESSION['user'];
require 'connection.php';
if (isset($_POST['submit'])) {
    $name = $_POST['itemname'];
    $remark = $_POST['remark'];
    $billno = $_POST['billno'];
    $details = $_POST['details'];
    $price = $_POST['cost'];

    $quer = ("INSERT INTO `cart`(`name`,`username`,`dept`,`remark`,`billno`, `details`, `price`, `status`) 
    VALUES ('$name','$user','".$_SESSION['userdept']."','$remark','$billno','$details',$price,'requested')");
    $conquer = mysqli_query($conn, $quer);
    echo "<script>alert('order submitted successfuly')</script>";
}

?>

<?php $activePage = 'request';
include 'user_header.php'; ?>


<!------main-content-start----------->
<div class="main-content">
    <section id="view-request">
        <div class="profile-box">
            <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Make Request
            </h3>
            <div class="attendence" style="overflow-x:auto;" id="makerequest">

                <table class="table table-striped table-hover">
                    <tbody>
                        <form action="" method="POST">
                            <tr>
                                <th>Item Name</th>
                                <th>:</th>
                                <th><input type="text" id="itemname" name="itemname"></th>
                            </tr>
                            <tr>
                                <th>Item Description:</th>
                                <th>:</th>
                                <th><input type="text" id="details" name="details"></th>
                            </tr>
                            <tr>
                                <th>Price:</th>
                                <th>:</th>
                                <th><input type="text" id="cost" name="cost"></th>
                            </tr>

                            <tr>
                                <th>Remark:</th>
                                <th>:</th>
                                <th><input type="text" id="remark" name="remark"></th>
                            </tr>
                            <tr>
                                <th>Bill.No:</th>
                                <th>:</th>
                                <th><input type="text" id="billno" name="billno"></th>
                            </tr>
                            <tr>
                                <th colspan="3"><input type="submit" id="submit" name="submit" value="Make Request" class="punch-in-btn"></th>
                            </tr>
                        </form>
                    </tbody>


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
    $(document).ready(function() {
        $(".xp-menubar").on('click', function() {
            $("#sidebar").toggleClass('active');
            $("#content").toggleClass('active');
        });

        $('.xp-menubar,.body-overlay').on('click', function() {
            $("#sidebar,.body-overlay").toggleClass('show-nav');
        });

    });
</script>





</body>

</html>