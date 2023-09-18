<?php
$activePage = 'salary';
include 'sp_header.php';
?>

<div class="middle-section" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
    <div id="salary-status" class="salary-status">
        <div class="salary-status-child">
            <h4 style="border-bottom:1px solid white;">SALARY STATUS</h4>
            <table style="width:100%">
                <tr>
                    <td>
                        <h5>Schedule : July</h5>
                    </td>
                    <td>
                        <h5>Date : 30/05/2023</h5>
                    </td>
                    <td>
                        <h5>Payment : Paid</h5>
                    </td>
                </tr>
            </table>
            <div class="salary-status-part1" style="float:left; width:100%;">
                <table class="salary-status-main-table">
                    <tr>
                        <td>
                            <h5 style="margin-left:21%">Select Department:</h5>
                        </td>
                        <td id="departmentselect"><select name="" class="salary-status-main-select" onchange="enableUser(this.value)">
                                <option value="0">Please Select Department</option>
                                <option value="1">art 1</option>
                                <option value="2">mak 2</option>
                                <option value="3">artist 1</option>
                                <option value="4">admin 2</option>
                                <option value="5">camera 1</option>
                                <option value="6">fdf 2</option>
                            </select>
                        </td>
                    </tr>
                </table>


                <div class="user-none" id="appear1">
                    <table>
                        <tr>
                            <td>
                                <h5 style="margin-left:21%">Select User:</h5>
                            </td>
                            <td>
                                <select name="" class="salary-status-main-select">
                                    <option value="">art 1</option>
                                    <option value="">art 2</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="user-none" id="appear2">
                    <table>
                        <tr>
                            <td>
                                <h5 style="margin-left:21%">Select User:</h5>
                            </td>
                            <td><select name="" class="salary-status-main-select">
                                    <option value="">mak 1</option>
                                    <option value="">mak 2</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="user-none" id="appear3">
                    <table>
                        <tr>
                            <td>
                                <h5 style="margin-left:21%">Select User:</h5>
                            </td>
                            <td><select name="" class="salary-status-main-select">
                                    <option value="">arti 1</option>
                                    <option value="">arti 2</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="user-none" id="appear4">
                    <table>
                        <!-- Content for appear4 -->
                    </table>
                </div>
                <div class="user-none" id="appear5">
                    <table>
                        <!-- Content for appear5 -->
                    </table>
                </div>
                <div class="user-none" id="appear6">
                    <table>
                        <!-- Content for appear6 -->
                    </table>
                </div>
                <div class="user-none" id="appear7">
                    <table>
                        <!-- Content for appear7 -->
                    </table>
                </div>

                <tr>
                    <td>
                        <h5 style="margin-left:21%">Select Status:</h5>
                    </td>
                    <td><select name="" class="salary-status-main-select">
                            <option value="">Paid</option>
                            <option value="">Unpaid</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;"><input type="submit" value="Ok" class="okbutton"></td>
                </tr>

            </div>
        </div>
    </div>
    <div id="select-user" class="salary-status">
        <div class="salary-status-child" style="background-color:white;" id="dept_select">
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
        <div class="salary-status-child" id="scheduleDetails">
            <table class="salary-status-table">
                <tr>
                    <th colspan="2">
                        <h5>DETAILS PER SCHEDULE</h5>
                    </th>
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
        <div class="salary-status-child" id="salaryRate">
            <table class="salary-status-table">
                <tr>
                    <th colspan="2">
                        <h5>SALARY</h5>
                    </th>
                </tr>
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
                    <td colspan="2" style="text-align:center;"><input type="submit" value="Edit" class="okbutton" onclick="salaryRate()"></td>
                </tr>
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

    function salaryRate() {
        salary.innerHTML = '<form action="">\n' +
            '    <table id="edittable" class="salary-status-table">\n' +
            '        <tr><th colspan="2">SALARY</th></tr>\n' +
            '   <tr>\n' +
            '        <td>Assigned Salary :</td>\n' +
            '        <td><input type="text"></td>\n' +
            '    </tr>\n' +
            '   <tr>\n' +
            '        <td>TDS :</td>\n' +
            '        <td><input type="text"></td>\n' +
            '    </tr>\n' +
            '    <tr>\n' +
            '        <td>TA :</td>\n' +
            '        <td><input type="text"></td>\n' +
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


    function enableUser(selectedValue) {
        // Check if the selected department is not 'Please Select Department'
        if (selectedValue !== '0') {
            // Hide all user dropdowns with class 'user-none'
            const userDropdowns = document.querySelectorAll('.user-none');
            userDropdowns.forEach(function(dropdown) {
                dropdown.style.display = 'none';
            });

            // Show the selected user dropdown
            const selectedUserDropdown = document.getElementById('appear' + selectedValue);
            if (selectedUserDropdown) {
                selectedUserDropdown.style.display = 'block';
            }
        }
    }
</script>