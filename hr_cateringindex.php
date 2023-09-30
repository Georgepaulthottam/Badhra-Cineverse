<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
function settime()
{
}
require 'connection.php';
$user = $_SESSION['user'];
$status = $_SESSION['status'];
$query = ("SELECT * FROM cart WHERE username='" . mysqli_real_escape_string($conn, $user) . "' limit 0,5");
$result = mysqli_query($conn, $query);
$query1 = "SELECT * FROM `cart` WHERE username='" . mysqli_real_escape_string($conn, $user) . "'";
$query2 = "SELECT * FROM `cart` WHERE status='approved'and username='" . mysqli_real_escape_string($conn, $user) . "'";
$query3 = "SELECT * FROM `cart` WHERE status='rejected' and username='" . mysqli_real_escape_string($conn, $user) . "'";
$query4 = "SELECT * FROM `cart` WHERE status='requested' and username='" . mysqli_real_escape_string($conn, $user) . "'";
$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);
$result3 = mysqli_query($conn, $query3);
$result4 = mysqli_query($conn, $query4);

    $query5 = "SELECT * FROM `hr_catering`";
    $result5 = mysqli_query($conn, $query5);

if (isset($_POST['req_accept'])) {
    $item = $_POST['timeInput'];
    $quantity = $_POST['quantityInput'];
    $amount = $_POST['amountInput'];
    $querry6 = "INSERT INTO hr_catering (item, quantity, amount) VALUES ('$item','$quantity','$amount')";
    $result6 = mysqli_query($conn, $querry6);
    
}
?>

<?php $activePage = 'home';
include 'hr_cateringheader.php'; ?>


<!------main-content-start----------->



  <!------main-content-start----------->
  <div id="main-container" class="middle-section">
            <div class="top-section">
                <div class="profile-box">
                    <h4>Details</h4>
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Date</th>
                            <th>19/05/2023</th>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <th>Geetha Govindham</th>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <th style="color:red">Pending</th>
                        </tr>
                    </table>
                </div>
                <div class="profile-box">
        <h4>Status</h4>
        <form action="" method="post">
        <table class="table table-striped table-hover" id="HideTable">
            
            <tr>
                <th>Item</th>
                <th><input type="text" class="timeInput" name="timeInput" placeholder="Enter the item" id="timeInput" required></th>
            </tr>
            <tr>
                <th>Quantity</th>
                <th><input type="number" class="quantityInput"  name="quantityInput" placeholder="Enter the quantity" id="quantityInput" required></th>
            </tr>
            <tr>
                <th>Amount</th>
                <th><input type="number" class="amountInput" name="amountInput" placeholder="Enter the amount" id="amountInput" required></th>
            </tr>
        </table>
        

        <input type="submit" name="req_accept" value="Submit" class="edit" id="submitButton">
        <input type="button" value="Cancel" class="delete" id="cancelButton" data-toggle="modal">
        </form>
    </div>
            
            </div>
            
        </div>

            <!------main-content-end----------->

    <!------middle-container contains request details----------->
    <div id="middle-container" class="bottom-section" >
        <div class="detailed-box" id="request-table" style="overflow-x:auto;">
            <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">History
            </h3>
            <div class="request-table" >

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Si.No</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Amount</th>  
                        </tr>
                    </thead>

                    <tbody>
                       
                            <?php
                            $no = 0;
                                while ($hrrow = mysqli_fetch_array($result5)) {
                                    $time = new DateTime($hrrow['date']);
                                    $date = $time->format('j.n.Y');
                                    $time = $time->format('H:i A');

                                     $no = $no + 1;

                                    echo ('
                                        <tr>
                            <td>' . $no . '</td>
                            <td>' . $date . '</td>
                            <td>' . $time . '</td>
                            <td>' . $hrrow['item'] . '</td>
                            <td>' . $hrrow['quantity'] . '</td>
                            <td>' . $hrrow['amount'] . '</td> </tr>');
                                }
                        ?> 
                    </tbody>

                </table>
            </div>
            <a href="hr_cateringhistory.php" style="color:#E2B842;">View more</a>
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



<!-------complete html----------->

<script>
        // Select the Cancel button
        const cancelButton = document.getElementById('cancelButton');

        // Add a click event listener to the Cancel button
        cancelButton.addEventListener('click', function () {
            // Clear the input fields
            document.getElementById('timeInput').value = '';
            document.getElementById('quantityInput').value = '';
            document.getElementById('amountInput').value = '';
        });

        // // Select the Submit button
        // const submitButton = document.getElementById('submitButton');

        // // Add a click event listener to the Submit button
        // submitButton.addEventListener('click', function () {
        //     // Hide the input fields
        //     document.getElementById('HideTable').style.display = 'none';

        //     // Show the display elements
        //     const displayTime = document.getElementById('displayTime');
        //     const displayQuantity = document.getElementById('displayQuantity');
        //     const displayAmount = document.getElementById('displayAmount');

        //     displayTime.textContent = document.getElementById('timeInput').value;
        //     displayQuantity.textContent = document.getElementById('quantityInput').value;
        //     displayAmount.textContent = document.getElementById('amountInput').value;

        //     // Hide the Submit and Cancel buttons
        //     submitButton.style.display = 'none';
        //     cancelButton.style.display = 'none';
            
        //     // Show the display table
        //     document.getElementById('displayTable').style.display = 'table';
        // });
    </script>




</body>

</html>