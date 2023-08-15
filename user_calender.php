<?php 
require("user_header.php"); 
?>
            <!------main-content-start----------->
            <div id="main-container" class="middle-section">
                <div id="calendar" style="overflow-x:auto;"></div>
                <div class="popup" id="dateDetailsPopup">
                <div class="popup-content" id="popupContent">
                <!-- Salary and request details will be displayed here -->
            </div>
    </div>
            </div>

            <!------main-content-end----------->


<br><br><br>
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
        require "connection.php"; 
        //$conn = mysqli_connect('localhost', 'root', '', 'bhadra') or die(mysqli_error());

        // Function to fetch events from the database
        function getEventsFromDatabase() {
            // Replace 'calendar_events' with your actual table name
            $query = "SELECT DATE(date) AS extracted_date FROM `absent_dates`";
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
                    fetchDateDetails(selectedDate);
                });
            });
            function fetchDateDetails(selectedDate) {
                var absent=false;
                // Send a request to the PHP backend to retrieve salary and request details
                fetch(`get_date_details.php?date=${selectedDate}`)
                    .then(response => response.json())
                    .then(data => {
                    for(var i=0;i<importantDates.length;i++){
                        
                        if(importantDates[i].extracted_date===selectedDate){
                            absent=true;
                        }
                    }
                        console.log(absent);
                        if (absent===true) {
                popupContent.innerHTML = `<p style="color:red">You were Absent on ${selectedDate}</p>`;
            } else {
                // Display salary and request details in the popup
                
                popupContent.innerHTML = `
                    <h5>Details for ${selectedDate}</h5>
                    <table>
                    <tr><td>Salary:</td><td> 1000</td></tr>
                    <tr><td><a href="user_view_request.php">Requests:</td><td> ${data.details1}</a></td></tr>
                    <tr><td><a style="color:green" href="user_view_request.php?status=approvrd">Accepted:</td><td> ${data.details2}</a></td></tr>
                    <tr><td><a  style="color:red" href="user_view_request.php?status=rejected">Rejected:</td><td> ${data.details3}</a></td></tr>
                    </table>
                    <a style="color:red; margin-left:35%;" href="user_datewise_data.php?date=${selectedDate}">View More</a>
                `;

                //add salary and accomodation as below
                // <h4>Details for ${selectedDate}</h4>
                // <p>Salary: ${data.details4.salary}</p>
                // <p>Accomodation: ${data.details5.accomodation}</p>
                // <p style="color:green">Accepted: ${data.detail2}</p>
                // <p style="color:red">Rejected: ${data.detail2}</p>
                // <a style="color:red; margin-left:35%;" href="details_page.html?date=${selectedDate}">View More</a>
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
            navrow.classList.add('navrow');
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
                    var eventsForCurrentDate = importantDates.filter(event => event.extracted_date === currentDate);

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