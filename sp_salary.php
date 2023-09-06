<?php 
$activePage='salary';
include 'sp_header.php';
 ?>
 <body>

     <div class="middle-section">
         <div id="salary-status" class="salary-status" style="background:#0f231a">
            <div class="salary-status-child">
                <table class="salary-status-table">
                    <tr>
                        <td>Schedule : </td>
                        <td>July</td>
                    </tr>
                    <tr>
                        <td>Payment Status : </td>
                        <td>Paid</td>
                    </tr>
                </table>
            </div>
            <div class="salary-status-child">
                <form action="">
                    <table class="salary-status-table">
                        <tr><td>Select Status:</td></tr>
                        <tr><td>Paid/Not Paid</td></tr>
                        <tr><td colspan="2" style="text-align:center;"><button>ok</button></td></tr>
                    </table>
                </form>
            </div>
        </div>
        <div id="select-user" class="salary-status" style="background-color:white;">
            <div class="dropdown">
                <button class="dropbtn">Select User</button>
                <div class="dropdown-content">
                    <div>User 1</div>
                    <div>User 2</div>
                    <div>User 3</div>
                </div>
            </div>
        </div>
        <div class="salary-status">
            <div class="salary-status-child">
                <table class="salary-status-table">
                    <tr><th colspan="2">DETAILS PER SCHEDULE</th></tr>
                    <tr>
                        <td>Total Bata :</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>1st Bata :</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>2nd Bata :</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>Third Bata :</td>
                        <td>12</td>
                    </tr>
                </table>
            </div>
            <div class="salary-status-child">
                <table class="salary-status-table">
                    <tr><th colspan="2">SALARY</th></tr>
                    <tr>
                        <td>Assigned Salary :</td>
                        <td>1000</td>
                    </tr>
                    <tr>
                        <td>TDS :</td>
                        <td>2%</td>
                    </tr>
                    <tr>
                        <td>TA :</td>
                        <td>250</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;"><button colsapn="2">Edit</button></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="salary-status">
        <div class="salary-status-child">
            <h4>SALARY REPORT</h4>
            <table class="table table-striped table-hover" style="color:white;">
                <tr>
                    <td>Sim</td>
                    <td>Date</td>
                    <td>Salary</td>
                    <td>TDS</td>
                    <td>TA</td>
                    <td>Total</td>
                    <td>Status</td>
                </tr>
                <tr>
                    <td>AAA</td>
                    <td>AAA</td>
                    <td>AAA</td>
                    <td>AAA</td>
                    <td>AAA</td>
                    <td>AAA</td>
                    <td>AAA</td>
                </tr> 
            </table>
            <a href="" style="color:#E2B842;">View more</a>
        </div>
    </div>
</div>
</body>