<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user'] !== "Admin") {
    header('Location: login.php');
}
require 'connection.php';
//ta_update
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $ta = $_POST['ta'];
    $sql = "UPDATE salary_report SET ta_status = 'yes', ta_ea = $ta WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    header('Location: ad_salary.php');
}
?>
<?php
$activePage = 'salary';
include 'adminheadersidebar.php';
?>
<div class="middle-section" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
    <div class="salary-status">
        <div class="salary-status-child" style="overflow-x:auto;">
            <h4>SALARY REPORT</h4>
            <table class="table table-striped table-hover" style="color:white;">
                <?php
                $query = ("SELECT * FROM salary_report  ");
                $result = mysqli_query($conn, $query);
                ?>
                <tr>
                    <td>Sl no</td>
                    <td>Date</td>
                    <td>Username</td>
                    <td>Dept</td>
                    <td>Payment Status</td>
                    <td>TA status</td>
                    <td>TA</td>
                    <td>Action</td>
                </tr>
                <tr><?php
                    $no = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $no = $no + 1;

                        $time = new DateTime($row['date']);
                        $date = $time->format('n.j.Y');
                        $time = $time->format('H:i');

                        echo ('
        <form action="" method="POST">
          <td>' . $no . '</td>
          <td>' . $date . '</td>
          <th>' . $row['username'] . '</th>
          <th>' . $row['dept'] . '</th>
          
          <input type="text" name="id" value="' . $row['id'] . '" hidden>
          
          ');
                        if ($row['status'] == "paid") {
                            echo ('<th style="color:green">Paid</th>');
                        } else {
                            echo ('<th style="color:red">Not Paid</th>');
                        }
                        if ($row['ta_status'] == "no") {
                            echo ('
          <td><input name="checkbox[]" type="checkbox" onchange="TACheckbox()"></td>
          <td name="taBox">--</td>');
                        } else {
                            echo ('<td><input name="checkbox[]" type="checkbox" checked></td>
          <td>' . $row['ta_ea'] . '</td>
          ');
                        }
                        echo ('
          <td><input type="submit" name="submit" class="view-btn"></td>
        </form>
        </tr>');
                    }
                    ?>

            </table>
        </div>
    </div>
</div>
<script>
    function TACheckbox() {
        var ele = document.getElementsByName("checkbox[]");
        for (var i = 0; i < ele.length; i++) {
            var tacolumn = document.getElementsByName("taBox")[i];
            if (ele[i].checked == true) {
                tacolumn.innerHTML = '<td><input type="text" name="ta" placeholder="Enter TA" style="width: 50%;"></td>';
            } else {
                tacolumn.innerHTML = '<td>--</td>';
            }
        }
    }
</script>