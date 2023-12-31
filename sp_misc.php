<?php
ob_start();
session_start();
require 'connection.php';
$activePage = 'misc';
include 'sp_header.php';
// Check if the user is not logged in
if (!isset($_SESSION['user']) or $_SESSION['user'] !== "super") {
    header('Location: login.php');
}
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $quer2 = "DELETE FROM miscellaneous where id=" . mysqli_real_escape_string($conn, $id) . "";
    $result2 = mysqli_query($conn, $quer2);
    header("location:sp_misc.php");
}
ob_end_flush();
?>
<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Super Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Righteous&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=REM&display=swap" rel="stylesheet">
    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/sp_admin.css" />
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.4/xlsx.full.min.js"></script>

    <!-- For PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600);


        table {
            background: #262f35;
            border-radius: 0.25em;
            border-collapse: collapse;
            margin: 1em;
            margin-top: 100px;
            width: 95%;
            margin-left: 30px;
        }

        th {
            border-bottom: 1px solid #364043;
            color: #E2B842;
            font-size: 0.85em;
            font-weight: 600;
            padding: 0.5em 1em;
            text-align: left;
        }

        td {
            color: #fff;
            font-weight: 400;
            padding: 0.65em 1em;
        }

        tbody tr {
            transition: background 0.25s ease;
        }

        tbody tr:hover {
            background: #014055;
        }

        .miscform-container {
            display: flex;
        }

        .bata-btn {
            display: inline-block;
            padding: 8px 8px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin-left: 400px;
            margin-top: 27px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .primary-button {
            background-color: #002147;
            color: #ffffff;
            border: 2px solid #002e63;
        }

        .primary-button:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        /* css for acceptAll and rejectAll Button*/
        #acceptAllBtn {

            visibility: hidden;
            margin-left: 40%;
            color: #fff;
            border: 1px solid rgb(2, 8, 3);
            border-radius: 10%;
            padding: 5px;
            background-color: #2bcd72;
            letter-spacing: 2px;
            cursor: pointer;
        }

        #rejectAllBtn {

            visibility: hidden;
            color: #fff;
            background-color: #F44336;
            border: 1px solid black;
            border-radius: 10%;
            padding: 4px;
            margin-left: 1%;
            letter-spacing: 1px;
            cursor: pointer;
        }

        .btnsCheck {
            margin-left: 3%;
        }

        .sec-button:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .tick-icon {
            font-size: 15px;
            color: #3cb371;
            width: 28px;
            height: 28px;
            background: #002147;
        }

        .delete-icon {
            display: inline-block;
            cursor: pointer;
            font-size: 8px;
        }

        .delete-prompt {
            display: none;
            font-family: Arial, sans-serif;
            position: fixed;
            top: 46%;
            left: 57%;
            font-size: 19px;
            height: 160px;
            width: 270px;
            transform: translate(-50%, -50%);
            background-color: #e5e4e2;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        }

        .delete-prompt h2 {
            margin-top: 0;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            padding: 8px 16px;
            margin: 0 10px;
            cursor: pointer;
        }

        .btn.delete {
            background-color: #f44336;
            color: white;
        }

        .btn.cancel {
            background-color: #ccc;
            color: black;
        }



        @media only screen and (max-width: 767px) {


            /* Styling for the fields inside the box */
            .expensefield {
                display: inline-block;
                margin-right: 20px;
            }

        }

        .download-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 21.3vh;
            flex-direction: column;
        }

        .button-container {
            display: flex;
            align-items: center;
        }

        #download-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            margin-left: 10px;
        }

        .dropbtn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-left: -35px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .separator {

            height: 40px;
            background-color: #ccc;

        }
    </style>
    <script>
        function toggleRows() {
            var rows = document.getElementsByClassName("hidden-row");
            for (var i = 0; i < rows.length; i++) {
                rows[i].style.display = "table-row";
            }
        }


        function showDeletePrompt() {
            document.getElementById("deletePrompt").style.display = "block";
        }

        function hideDeletePrompt() {
            document.getElementById("deletePrompt").style.display = "none";
        }

        function deleteExpense() {
            // Code to delete the expense
            hideDeletePrompt();

        }
    </script>
</head>

<body>
    <!------top-navbar-end----------->


    <!------main-content-start----------->



    <div class="misctable" style="overflow-x:auto;">
        <table>

            <thead>
                <?php
                // showing values in the table
                $rowsql = "SELECT id, timestamp, name, amount, purpose, remark FROM miscellaneous";
                $rowresult = mysqli_query($conn, $rowsql);
                $sum = 0;
                $no = 0;
                if (mysqli_num_rows($rowresult) != 0) {
                ?>
                    <tr>
                        <th><span class="custom-checkbox">
                                <input type="checkbox" onchange='selects()' id="selectAll">
                                <label for="selectAll"></label></th>
                        <th>SI NO</th>
                        <th>DATE</th>
                        <th> Name</th>
                        <th>PURPOSE</th>

                        <th>TIME</th>
                        <th>REMARK</th>
                        <th>AMOUNT</th>
                        <th>ACTION</th>
            </thead>
            <tbody>

            <?php
                    while ($row = mysqli_fetch_array($rowresult, MYSQLI_ASSOC)) {
                        $time = new DateTime($row['timestamp']);
                        $date = $time->format('j.n.Y');
                        $time = $time->format('H:i A');
                        $no = $no + 1;
                        echo ('
								<tr>
								</th><th> <span class="custom-checkbox">
									 <input type="checkbox" id="checkbox" name="checkbox" value="1">
									 <label for="checkbox1"></label></th>
  <td>' . $no . '</td>
      <td>' . $date . '</td>
      <td>' . $row['name'] . '</td>
      <td>' . $row['purpose'] . '</td>
      <td>' . $time . '</td>
      <td>' . $row['remark'] . '</td>
      <td>' . $row['amount'] . '</td>');

                        $sum = $sum + $row['amount'];
                        echo ('		  <td><div class="delete-icon" onclick="showDeletePrompt()">
      <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" width="24" height="24" viewBox="0 0 24 24">
        <path d="M0 0h24v24H0z" fill="none"/>
        <path d="M8 9v10c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V9H8zm14-4h-3.5l-1-1h-5l-1 1H2v2h20V5zm-4 11H6v-2h12v2z"/>
      </svg>
    </div>
    </td>
    <div class="delete-prompt" id="deletePrompt">
      <i>Are you sure you want to delete this expense?</i>
      <div class="btn-container">
     <form action="sp_misc.php" method="post">
     <input type="text" name="id" value="' . $row['id'] . '" hidden>
        <button class="btn delete" type="submit" name="delete" onclick="deleteExpense()">Delete</button>
        <button class="btn cancel" onclick="hideDeletePrompt()">Cancel</button>
      </form>
      </div>
    </div>
  
            </tr>');
                        echo ('</tr>');
                    }
                    echo ('      <tr>
       
      <td colspan="8" style="text-align:right;"> TOTAL:</td>
	  
      <td>' . $sum . '</td>
</tr>');
                } else {
                    echo ('<h2>NO PENDTING REQUESTS</h2>');
                } ?>



            </tbody>
        </table>
        <div>
            <button id="acceptAllBtn" formaction="#">Accept All</button>
            <button id="rejectAllBtn" formaction="#">Reject All</button>
        </div><br>


        <div class="download-container">
            <div class="button-container">
                <button id="download-button">Download as PDF</button>
                <div class="dropdown">
                    <button class="dropbtn">&#9660;</button>
                    <div class="dropdown-content">
                        <button id="download-excel-button">Download as Excel</button>
                        <button id="download-pdf-button" >Download as PDF</button>
                    </div>
                </div>
            </div>

            <br>

            <!------main-content-end----------->


            <!----footer-design------------->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="footer-in">
                        <p class="mb-0">&copy 2023 Team Helios. All Rights Reserved.</p>
                    </div>
                </div>
            </footer>



            <!-------complete html----------->
            <!-- For Excel (XLSX) -->

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
            </script>

            <script>
                const {
                    jsPDF
                } = window.jspdf;

                function downloadExcel() {
                    const table = document.querySelector("table");
                    const rows = Array.from(table.querySelectorAll("tr"));
                    const data = rows.map(row => Array.from(row.querySelectorAll("td, th")).map(cell => cell.textContent));
                    const worksheet = XLSX.utils.aoa_to_sheet(data);
                    const workbook = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(workbook, worksheet, "Table Data");
                    XLSX.writeFile(workbook, "table_data.xlsx");
                }

                function printdiv(elem) {
                    var header_str = '<html><head><title>' + document.title + '</title></head><body>';
                    var footer_str = '</body></html>';
                    var new_str = document.getElementById(elem).innerHTML;
                    var old_str = document.body.innerHTML;
                    document.body.innerHTML = header_str + new_str + footer_str;
                    window.print();
                    document.body.innerHTML = old_str;
                    return false;
                }

                // Function to download the table as a PDF
                function downloadPDF() {
                    print()
                    /*const pdfOptions = {
                        margin: 10,
                        filename: "table_data.pdf",
                        image: {
                            type: 'jpeg',
                            quality: 0.98
                        },
                        html2canvas: {
                            scale: 2
                        },
                        jsPDF: {
                            unit: 'mm',
                            format: 'a4',
                            orientation: 'portrait'
                        }
                    };

                    const element = document.querySelector(".misctable");

                    html2pdf()
                        .from(element)
                        .set(pdfOptions)
                        .outputPdf(pdf => {
                            const blob = new Blob([pdf], {
                                type: 'application/pdf'
                            });
                            const url = window.URL.createObjectURL(blob);
                            const link = document.createElement('a');
                            link.href = url;
                            link.download = pdfOptions.filename;
                            link.click();
                        });*/
                }

                // Attach click event listeners to the download buttons
                document.getElementById("download-excel-button").addEventListener("click", downloadExcel);
                document.getElementById("download-pdf-button").addEventListener("click", downloadPDF);

                // script.js
                document.getElementById("download-button").addEventListener("click", function() {
                    const format = document.getElementById("pdf").innerText.toLowerCase();
                    const fileName = `page.${format}`;
                    const pdfOptions = {
                        filename: fileName,
                        image: {
                            type: 'jpeg',
                            quality: 0.98
                        },
                        html2canvas: {
                            scale: 2
                        },
                        jsPDF: {
                            unit: 'mm',
                            format: 'a4',
                            orientation: 'portrait'
                        }
                    };

                    html2pdf().from(document.body).set(pdfOptions).outputPdf(function(pdf) {
                        const blob = new Blob([pdf], {
                            type: 'application/pdf'
                        });
                        const link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = fileName;
                        link.click();
                    });
                });
            </script>
</body>

</html>