<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user'] !== "Admin") 
{
    header('Location: login.php'); 
}
require 'connection.php';
?>
<?php 
$activePage='salary';
include 'adminheadersidebar.php';
?>
<div class="middle-section" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
<div id="salary-status" class="salary-status" style="">
        <div class="salary-status-child">
            <table style="width:100%">
                    <tr>
                        <td><h5>Schedule : July</h5></td>
                        <td><h5>Date : 30/05/2023</h5></td>
                        <td><h5>Payment : Paid</h5></td>
                    </tr>
            </table>
        </div>
    </div>
    <div id="select-user" class="salary-status">
        <div class="salary-status-child" style="background-color:white;">
        <div class="dropdown">
        <h5 style="color:black;">Select Department : </h5>
            <select id="departmentSelect" class="dropbtn">
                <option value="Department 1">Department 1</option>
                <option value="Department 2">Department 2</option>
                <option value="Department 3">Department 3</option>
            </select>
        </div>
        <div class="dropdown" style="left:0%">
            <h5 style="color:black;">Select User : </h5>
            <select id="departmentSelect" class="dropbtn">
                <option value="Department 1">User 1</option>
                <option value="Department 2">User 2</option>
                <option value="Department 3">User 3</option>
            </select>
        </div>
        </div>
        </div>
        <div class="salary-status">
        <div class="salary-status-child">
            <table class="salary-status-table">
                <tr><th colspan="2"><h5>DETAILS PER SCHEDULE</h5></th></tr>
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
        <div class="salary-status-child" id="salaryRate">
            <table class="salary-status-table">
                <tr><th colspan="2" ><h5>SALARY</h5></th></tr>
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
                <tr><td colspan="2" style="text-align:center;"><input type="submit" value="Edit" class="okbutton" onclick="salaryRate()"></td></tr>
            </table>
        </div>
    </div>
    <div class="salary-status">
        <div class="salary-status-child" style="overflow-x:auto;">
        <h4>SALARY REPORT</h4>
        <table class="table table-striped table-hover" style="color:white;">
            <tr>
                <td>Sim</td>
                <td>Date</td>
                <td>Bata</td>
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
                <td>AAA</td>
            </tr> 
        </table>
        <a href="" style="color:#E2B842;">View more</a>
        </div>
    </div>
</div>
<script>
    var salary = document.getElementById("salaryRate");
    function salaryRate(){
        salary.innerHTML = '<form action="">\n' +
            '    <table id="edittable" class="salary-status-table">\n' +
            '                 <tr><th colspan="2">SALARY</th></tr>\n' +
            '    <tr>\n' +
            '       <td>Assigned Salary :</td>\n' +
            '        <td>1000</td>\n' +
            '   </tr>\n' +
            '  <tr>\n' +
            '        <td>TDS :</td>\n' +
            '        <td>2%</td>\n' +
            '    </tr>\n' +
            '    <tr>\n' +
            '        <td>TA :</td>\n' +
            '        <td><input type="text" class="edit-ta-input"></td>\n' +
            '    </tr>\n' +
            '        <tr>\n' +
            '            <td style="text-align:center;"><button>Save</button></td>\n' +
            '            <td style="text-align:center;"><button onclick="cancelEdit()">Cancel</button></td>\n' +
            '        </tr>\n' +
            '    </table>\n' +
            '</form>';
    }
    function cancelEdit() {
        // Implement the behavior you want when the "Cancel" button is clicked.
        // For now, you can simply reset the innerHTML to its original content.
        salary.innerHTML = '<table class="salary-status-table">\n' +
            '        <tr><th colspan="2">SALARY</th></tr>\n' +
            '    <tr>\n' +
            '       <td>Assigned Salary :</td>\n' +
            '        <td>1000</td>\n' +
            '   </tr>\n' +
            '  <tr>\n' +
            '        <td>TDS :</td>\n' +
            '        <td>2%</td>\n' +
            '    </tr>\n' +
            '    <tr>\n' +
            '        <td>TA :</td>\n' +
            '        <td>250</td>\n' +
            '    </tr>\n' +
            '    <tr><td colspan="2" style="text-align:center;"><input type="submit" value="Edit" class="okbutton" onclick="salaryRate()"></td></tr>' +
            '    </table>';
    }
</script>
   
