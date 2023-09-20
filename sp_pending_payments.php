<?php
$activePage = 'Payments';
include 'sp_header.php';
?>
<div class="main-content">
    <section id="view-request">
        <div class="detailed-box" id="request-table" style="overflow-x:auto;">



            <body>
                <form action="" method="post">
                    <button class="custom-button accepted" onclick="selectButton(this)" type="submit" name="Requests" value="">Requests</button>
                    <button class="custom-button rejected" onclick="selectButton(this)" type="submit" name="Salaries" value="">Salaries</button>
                    <button class="custom-button pending" onclick="selectButton(this)" type="submit" name="Miscellaneous" value="">Miscellaneous</button>
                    <button class="custom-button all" onclick="selectButton(this)" type="submit" name="vehicle" value="">Vehicle</button>
                </form>
                <br>
            </body>



            <tbody>
                <?php

                if (isset($_POST['Requests'])) {
                    $query = ("SELECT * FROM cart WHERE status='" . mysqli_real_escape_string($conn, "approved") . "' AND payment_status='" . mysqli_real_escape_string($conn, "pending") . "'");
                    $result = mysqli_query($conn, $query);
                ?>
                    <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Requests
                    </h3>
                    <?php
                    echo ('
                     <table class="table user_req table-striped table-hover">
				<thead>
					<tr>
					
						<th>Name</th>
						<th>Department</th>
						<th>Description</th>
						<th>Amount</th>
						<th>Remark</th>
						<th>Bill No</th>
						<th>Date</th>
						<th>Payment-status</th>
                        <th>Action</th>

					</tr>
				</thead>');


                    while ($row = mysqli_fetch_assoc($result)) {


                        $time = new DateTime($row['date']);
                        $date = $time->format('j-n-Y');
                        $time = $time->format('H:i');

                        echo ('

                                        <tr>
										
                                        <th>' . $row['name'] . '</th>
                                        <th>' . $row['dept'] . '</th>
                                        <th>' . $row['details'] . '</th>
                                        <th>' . $row['price'] . '</th>
                                        <th>' . $row['remark'] . '</th>
                                        <th>' . $row['billno'] . '</th
                                        <th></th>
                                        <th>' . $date . '</th>

										');
                        if ($row['payment_status'] == "paid") {
                            echo ('<th style="color:green">Paid</th>');
                        } else {
                            echo ('<th style="color:red">Not Paid</th>');
                        }
                        echo ('
                        									  <th>
									<form action="" method="post">
									    <input type="text" name="id" value="' . $row['id'] . '" hidden>
										<input type="submit" name="pay_request" value="Pay" class="edit" >
											
										
										

										</form>
										</th>
                                    </tr>');
                    }
                }
                if (isset($_POST['Salaries'])) {
                    $query = ("SELECT * FROM salary_report ");
                    $result = mysqli_query($conn, $query);
                    ?>
                    <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Salaries
                    </h3>
                    <?php
                    echo (' <table class="table user_req table-striped table-hover">
				<thead>
					<tr>
					<th><span class="custom-checkbox">
								<input type="checkbox" onchange="selects()" id="selectAll">
								<label for="selectAll"></label></th>
						<th>Username</th>
						<th>Department</th>
						<th>Salary</th>
						<th>Tds</th>
						<th>TA_Status</th>
						<th>TA</th>
						<th>Date</th>
						<th>Payment-status</th>
						<th>Action</th>
					</tr>
				</thead>');







                    while ($row = mysqli_fetch_assoc($result)) {

                        $time = new DateTime($row['date']);
                        $date = $time->format('n.j.Y');
                        $time = $time->format('H:i');

                        echo ('
							 
                                <tr>
								<th><span class="custom-checkbox">
										<input type="checkbox" id="checkbox" name="checkbox" value="1" onchange="checkedBox()">
										<label for="checkbox1"></label></th>
                                        <th>' . $row['username'] . '</th>
                                        <th>' . $row['dept'] . '</th>
                                        <th>' . $row['assigned_salary'] . '</th>
                                        <th>' . $row['tds'] . '</th>
                                        <th>' . $row['ta_status'] . '</th>
                                        <th>' . $row['ta_ea'] .'</th>
                                        
                                        <th>' . $date . '</th>
                                        
								');
                        if ($row['status'] == "paid") {
                            echo ('<th style="color:green">Paid</th>');
                        } else {
                            echo ('<th style="color:red">Not Paid</th>');
                        }
                        echo ('
                        									  <th>
									<form action="" method="post">
									    <input type="text" name="id" value="' . $row['id'] . '" hidden>
										<input type="submit" name="pay_salary" value="Pay" class="edit" >
											
										
										

										</form>
										</th>
                                    </tr>');
                    }
                }
                if (isset($_POST['Miscellaneous'])) {
                    $query = ("SELECT * FROM miscellaneous WHERE payment_status='" . mysqli_real_escape_string($conn, "pending") . "'");
                    $result = mysqli_query($conn, $query);
                    ?>
                    <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Miscellaneous
                    </h3>
                <?php
                    echo (' <table class="table user_req table-striped table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Purpose</th>
						<th>Remark</th>						<th>Amount</th>
                        <th>Date</th>
                        <th>Time</th>
						<th>Payment-Status</th>
						<th>Action</th>
						
					</tr>
				</thead>');







                    while ($row = mysqli_fetch_assoc($result)) {


                        $time = new DateTime($row['timestamp']);
                        $date = $time->format('n.j.Y');
                        $time = $time->format('H:i A');

                        echo (' 
                                        <tr>
										
                                        <th>' . $row['name'] . '</th>
                                        <th>' . $row['purpose'] . '</th>
                                        <th>' . $row['remark'] . '</th>
                                        <th>' . $row['amount'] . '</th>
                                        <th>' . $date .'</th>
                                        <th>' . $time .'</th>
										
                            ');
                        if ($row['payment_status'] == "paid") {
                            echo ('<th style="color:green">Paid</th>');
                        } else {
                            echo ('<th style="color:red">Not Paid</th>');
                        }
                        echo ('  <th>
									<form action="" method="post">
									    <input type="text" name="id" value="' . $row['id'] . '" hidden>
										<input type="submit" name="pay_misc" value="Pay" class="edit" >
											
										
										

										</form>
										</th>


								</tr>');
                    }
                }
                if (isset($_POST['all'])) {
                    $query = ("SELECT * FROM cart");
                    $result = mysqli_query($conn, $query);
                    echo (' <table class="table user_req table-striped table-hover">
				<thead>
					<tr>
					<th><span class="custom-checkbox">
								<input type="checkbox" onchange="selects()" id="selectAll">
								<label for="selectAll"></label></th>
						<th>Name</th>
						<th>Department</th>
						<th>Description</th>
						<th>Amount</th>
						<th>Remark</th>
						<th>Bill No</th>
						<th>Date</th>
						<th>time</th>
						<th>Payment-status</th>
					</tr>
				</thead>');







                    while ($row = mysqli_fetch_assoc($result)) {


                        $time = new DateTime($row['date']);
                        $date = $time->format('n.j.Y');
                        $time = $time->format('H:i');

                        echo ('
                                        <tr>
										<th><span class="custom-checkbox">
										<input type="checkbox" id="checkbox" name="checkbox" value="1" onchange="checkedBox()">
										<label for="checkbox1"></label></th>
                                        <th>' . $row['name'] . '</th>
                                        <th>' . $row['dept'] . '</th>
                                        <th>' . $row['details'] . '</th>
                                        <th>' . $row['price'] . '</th>
                                        <th>' . $row['remark'] . '</th>
                                        <th>' . $row['billno'] . '</th
										<th></th>
                                        <th>' . $date . '</th>
                                        <th>' . $time . '</th>	');
                        if ($row['payment_status'] == "paid") {
                            echo ('<th style="color:green">Paid</th>');
                        } else {
                            echo ('<th style="color:red">Not Paid</th>');
                        }
                        echo ('
                                    </tr>');
                    }
                }
                ?>






            </tbody>

            </table>
            <div>
                <button id="acceptAllBtn" formaction="#">Accept All</button>
                <button id="rejectAllBtn" formaction="#">Reject All</button>
            </div><br>
        </div>
    </section>
</div>
<!------main-content-end----------->



<!----footer-design------------->
<br> <br> <br> <br><br>
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
<script type="text/javascript">
    //select all and reject all

    function selects() {
        var ele = document.getElementsByName("checkbox");
        if (document.getElementById("selectAll").checked == true) {
            document.getElementById("acceptAllBtn").style.visibility = "visible";
            document.getElementById("rejectAllBtn").style.visibility = "visible";
            for (var i = 0; i < ele.length; i++) {
                if (ele[i].type == 'checkbox')
                    ele[i].checked = true;
            }
        } else {
            document.getElementById("acceptAllBtn").style.visibility = "hidden";
            document.getElementById("rejectAllBtn").style.visibility = "hidden";
            for (var i = 0; i < ele.length; i++) {
                if (ele[i].type == 'checkbox')
                    ele[i].checked = false;
            }
        }
    }

    function checkedBox() {
        var ele = document.getElementsByName("checkbox");
        var count = 0;
        for (var i = 0; i < ele.length; i++) {
            if (ele[i].checked == true) {
                count++;
            }
        }
        if (count > 0) {
            document.getElementById("acceptAllBtn").style.visibility = "visible";
            document.getElementById("rejectAllBtn").style.visibility = "visible";
        } else {
            document.getElementById("acceptAllBtn").style.visibility = "hidden";
            document.getElementById("rejectAllBtn").style.visibility = "hidden";
        }
    }
</script>
</body>

</html>