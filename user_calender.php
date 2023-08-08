<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Art Department</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- css3 -->
    <link rel="stylesheet" href="css/custom.css">

    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />

    <!--user css-->
    <link rel="stylesheet" href="css/user.css" />

    <script type="text/javascript" src="main.js"></script>

    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
       #calendar {
            flex:1;
            text-align: center;
            background-color: #fdfdfd;
            padding: 20px;
            box-shadow: 1px 2px 2px 2px rgba(20,20,20,0.4);
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        td {
            padding: 10px;
            text-align: center;
            background-color: white;
            align-items: center;
            justify-content:center;
        }

        th {
            padding: 10px;
            text-align: center;
            border-spacing: 50px;
            background-color: #f2f2f2;
            font-weight: bolder;
            color: #333;
        }

        caption {
            font-size: 24px;
            font-weight: bold;
            
        }
        .captioncell{
            margin-left:375px
        }

        td {
            position: relative;
            cursor: pointer;
        }

        .current-month {
            color: #333;
        }

        .current-day {
            background-color: #ffcccb;
        }

        .important-date {
            background-color: #f9a825;
            color: #fff;
        }

        .navigation {
            text-align: center;
            margin-top: 10px;
        }

        .navigation-btn-container {
            display: inline-block;
        }

        .navigation-btn {
            cursor: pointer;
            font-size: 50px;
            margin: 0 10px;
        }

        .navigation-btn:hover {
            color: #777;
        }

        .dateLink {
            text-decoration: none;
            color: black;
        }
        /* Styles for the popup */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            color:black;
        }
        @media only screen and (max-width: 767px){
        .captioncell{
            margin-left:65px
        }
        }
    </style>
</head>

<body>



    <div class="wrapper">

        <div class="body-overlay"></div>

        <!-------sidebar--design------------>

        <div id="sidebar">
            <div class="sidebar-header">
            <img src="Bc_logo.png" width="50px" height="50px">
			<h3><span  > &nbsp;Badhra Cineverse</span></h3>
            </div>
            <ul class="list-unstyled component m-0">
                <li class="active">
                    <a href="#" class="dashboard"><i class="material-icons">dashboard</i>Dashboard </a>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">aspect_ratio</i>Requests
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                    <li><a href="user_view_request.php">Pending Requests</a></li>
			
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">aspect_ratio</i>Salary Manager
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                        <li><a href="#">layout 1</a></li>
                       
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">equalizer</i>Locations
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu3">
                        <li><a href="#">Pages 1</a></li>
                        <li><a href="#">Pages 2</a></li>
                       
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">extension</i>Calender
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu4">
                        <li><a href="#">Pages 1</a></li>
                        <li><a href="#">Pages 2</a></li>
                        <li><a href="#">Pages 3</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">border_color</i>Suggestions
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu5">
                        <li><a href="#">Pages 1</a></li>
                        <li><a href="#">Pages 2</a></li>
                        <li><a href="#">Pages 3</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">grid_on</i>tables
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu6">
                        <li><a href="#">table 1</a></li>
                        <li><a href="#">table 2</a></li>
                        <li><a href="#">table 3</a></li>
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#homeSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">content_copy</i>Pages
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu7">
                        <li><a href="#">Pages 1</a></li>
                        <li><a href="#">Pages 2</a></li>
                        <li><a href="#">Pages 3</a></li>
                    </ul>
                </li>


                <li class="">
                    <a href="#" class=""><i class="material-icons">date_range</i>copy </a>
                </li>
                <li class="">
                    <a href="#" class=""><i class="material-icons">library_books</i>calender </a>
                </li>

            </ul>
        </div>

        <!-------sidebar--design- close----------->



        <!-------page-content start----------->

        <div id="content">

            <!------top-navbar-start----------->

            <div class="top-navbar">
                <div class="xd-topbar">
                    <div class="row">
                        <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                            <div class="xp-menubar">
                                <span class="material-icons text-white">signal_cellular_alt</span>
                            </div>
                        </div>

                        <div class="col-md-5 col-lg-3 order-3 order-md-2">
                            
                        </div>


                        <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                            <div class="xp-profilebar text-right">
                                <nav class="navbar p-0">
                                    <ul class="nav navbar-nav flex-row ml-auto">
                                        <li class="dropdown nav-item active">
                                            <a class="nav-link" href="#" data-toggle="dropdown">
                                                <span class="material-icons">notifications</span>
                                                <span class="notification">4</span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">You Have 4 New Messages</a></li>
                                                <li><a href="#">You Have 4 New Messages</a></li>
                                                <li><a href="#">You Have 4 New Messages</a></li>
                                                <li><a href="#">You Have 4 New Messages</a></li>
                                            </ul>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                <span class="material-icons">question_answer</span>
                                            </a>
                                        </li>

                                        <li class="dropdown nav-item">
                                            <a class="nav-link" href="#" data-toggle="dropdown">
                                                <img src="img/user.jpg" style="width:40px; border-radius:50%;" />
                                                <span class="xp-user-live"></span>
                                            </a>
                                            <ul class="dropdown-menu small-menu">
                                                <li><a href="#">
                                                        <span class="material-icons">person_outline</span>
                                                        Profile
                                                    </a></li>
                                                <li><a href="#">
                                                        <span class="material-icons">settings</span>
                                                        Settings
                                                    </a></li>
                                                <li><a href="logout.php">
                                                        <span class="material-icons">logout</span>
                                                        Logout
                                                    </a></li>

                                            </ul>
                                        </li>


                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>

                    <div class="xp-breadcrumbbar text-center">
                        <h4 class="page-title">Art Department</h4>
                        <ol class="breadcrumb">

                        </ol>
                    </div>


                </div>
            </div>
            <!------top-navbar-end----------->


            <!------main-content-start----------->
            <!------main container divided into 3 containers: top, middle,bottom----------->
            <!------top-container contains attendence, request status and schedule----------->
            <div id="main-container" class="middle-section">
                <div id="calendar" style="overflow-x:auto;"></div>
                <div class="popup" id="dateDetailsPopup">
                <div class="popup-content" id="popupContent">
                <!-- Salary and request details will be displayed here -->
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



    <!-------complete html----------->
    
    <script>
        // Include your database connection file here
        // Replace 'YOUR_DB_CONNECTION' with the actual connection code
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'sample') or die(mysqli_error());

        // Function to fetch events from the database
        function getEventsFromDatabase() {
            // Replace 'calendar_events' with your actual table name
            $query = "SELECT * FROM calendar_events";
            $result = mysqli_query($GLOBALS['conn'], $query);

            $events = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $events[] = $row;
            }

            return $events;
        }

        // Fetch events from the database
        $events = getEventsFromDatabase();

        // Convert the PHP array to a JSON object for JavaScript usage
        $events_json = json_encode($events);
        ?>

        // Sample data for important dates (replace this with data fetched from the database)
        var importantDates = <?php echo $events_json; ?>;
        var currentDate = new Date();

        function attachEventListenersToDates() {
            const calendarDates = document.querySelectorAll('.dateLink');
            const popup = document.getElementById('dateDetailsPopup');
            const popupContent = document.getElementById('popupContent');

            calendarDates.forEach(date => {
                date.addEventListener('click', () => {
                    const selectedDate = date.dataset.date;
                    console.log(selectedDate);
                    fetchDateDetails(selectedDate);
                });
            });
            function fetchDateDetails(selectedDate) {
                // Send a request to the PHP backend to retrieve salary and request details
                fetch(`get_date_details.php?date=${selectedDate}`)
                    .then(response => response.json())
                    .then(data => {
                        if (Object.keys(data).length < 2) {
                popupContent.innerHTML = `<p>No data available for ${selectedDate}</p>`;
            } else {
                // Display salary and request details in the popup
                popupContent.innerHTML = `
                    <h4>Details for ${selectedDate}</h4>
                    <p>Salary: $${data.salary}</p>
                    <p>Requests: ${data.requests}</p>
                    <p>Requests: ${data.requests}</p>
                    <p>Requests: ${data.requests}</p>
                    <a style=color:red; href="details_page.html?date=${selectedDate}">View More</a>
                `
            }
                        // Show the popup
                        popup.style.display = 'block';
                    })
                    .catch(error => {
                        console.error('Error fetching date details:', error);
                    });
            }

            popup.addEventListener('click', function (event) {
                if (event.target === popup) {
                    popup.style.display = 'none';
                }
            });
        }
        function createCalendar(year, month) {
            var calendar = document.getElementById('calendar');
            var date = new Date(year, month - 1, 1); // Note: month is 0-indexed
            var currentMonth = date.getMonth();
            var today = new Date();

            // Clear previous calendar content
            calendar.innerHTML = '';

            // Create the table for the current month
            var table = document.createElement('table');
            var caption = document.createElement('caption');
            var navrow=document.createElement('tr');
            var navcell1=document.createElement('td');
            var navcell2=document.createElement('td');
            var navcell3=document.createElement('td');
            caption.textContent = new Intl.DateTimeFormat('en-US', { month: 'long'}).format(date);
            var prevButton = document.createElement('span');
            prevButton.classList.add('navigation-btn');
            prevButton.innerHTML = '&#8249;';
            prevButton.onclick = prevMonth;
            navcell1.appendChild(prevButton);
            navcell2.appendChild(caption);
            var nextButton = document.createElement('span');
            nextButton.classList.add('navigation-btn');
            nextButton.innerHTML = '&#8250;';
            nextButton.onclick = nextMonth;
            navcell3.appendChild(nextButton);
            navcell2.colSpan="5";
            caption.classList.add('captioncell');
            navrow.appendChild(navcell1);
            navrow.appendChild(navcell2);
            navrow.appendChild(navcell3);
            table.appendChild(navrow);

            // Create the table header row with day names
            var headerRow = document.createElement('tr');
            ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'].forEach(day => {
                var cell = document.createElement('th');
                cell.textContent = day;
                headerRow.appendChild(cell);
            });
            table.appendChild(headerRow);

            // Find the day of the week for the first day of the month
            var firstDayOfWeek = date.getDay();

            // Get the number of days in the current month
            var daysInMonth = new Date(year, month, 0).getDate();

            // Calculate the total number of cells needed in the table
            var totalCells = Math.ceil((firstDayOfWeek + daysInMonth) / 7) * 7;

            // Create the table rows for each day
            var currentDay = 1;
            for (var i = 0; i < totalCells; i++) {
                if (i % 7 === 0) {
                    var row = document.createElement('tr');
                    table.appendChild(row);
                }

                var cell = document.createElement('td');

                if (i >= firstDayOfWeek && currentDay <= daysInMonth) {
                    var currentDate = new Date(year, month - 1, currentDay + 1).toISOString().split('T')[0];
                    var eventsForCurrentDate = importantDates.filter(event => event.date === currentDate);

                    // Create markers for important dates
                    if (eventsForCurrentDate.length > 0) {
                        cell.classList.add('important-date');
                    }

                    // Check if the date is in the current month
                    if (currentMonth === today.getMonth() && currentDay === today.getDate() && year === today.getFullYear()) {
                        cell.classList.add('current-day');
                        cell.classList.add('current-month');
                    }

                    // Create a link for each date
                    cell.textContent = currentDay;
                    cell.classList.add('dateLink');
                    cell.dataset.date = currentDate;
                    currentDay++;
                }

                row.appendChild(cell);
            }

            // Add the table to the calendar
            calendar.appendChild(table);
            attachEventListenersToDates(); 
        }

        // Get the current date
        var currentDate = new Date();

        // Initial calendar
        createCalendar(currentDate.getFullYear(), currentDate.getMonth() + 1);

        // Function to navigate to previous month
        function prevMonth() {
            var currentMonth = currentDate.getMonth();
            var currentYear = currentDate.getFullYear();

            if (currentMonth === 0) {
                currentDate.setFullYear(currentYear - 1);
                currentDate.setMonth(11);
            } else {
                currentDate.setMonth(currentMonth - 1);
            }

            createCalendar(currentDate.getFullYear(), currentDate.getMonth() + 1);
        }

        // Function to navigate to next month
        function nextMonth() {
            var currentMonth = currentDate.getMonth();
            var currentYear = currentDate.getFullYear();

            if (currentMonth === 11) {
                currentDate.setFullYear(currentYear + 1);
                currentDate.setMonth(0);
            } else {
                currentDate.setMonth(currentMonth + 1);
            }

            createCalendar(currentDate.getFullYear(), currentDate.getMonth() + 1);
        }

        // Add navigation buttons to the container with 'navigation' class
        </script>

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