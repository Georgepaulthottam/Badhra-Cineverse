<?php require("user_header.php"); ?>

        <!------main-content-start----------->
        <div id="main-container" class="middle-section">
            <div class="top-section">
                <div class="profile-box">
                    <h4>Allowance Rates</h4>
                    <table class="table table-striped table-hover">
                        <tr>
                            <td>DA</td>
                            <td>10%</td>
                        </tr>
                        <tr>
                            <td>EA</td>
                            <td>10%</td>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <td>5%</td>
                        </tr>
                    </table>
                </div>
                <div class="profile-box">
                <h4>Todays Salary</h4>
                    <table class="table table-striped table-hover">
                        <tr>
                            <td>Bata</td>
                            <td>First</td>
                        </tr>
                        <tr>
                            <td>Basic pay</td>
                            <td>10000</td>
                        </tr>
                        <tr>
                            <td>Final salary</td>
                            <td>8000</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="top-section">
               <div class="profile-box" style="overflow-x:auto;">
                    <h4>Salary list</h4>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Bata</th>
                                <th>Salary</th>
                                <th>EA</th>
                                <th>Tax</th>
                                <th>DA</th>
                                <th>Final Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2023-08-02</td>
                                <td>Second</td>
                                <td>1000</td>
                                <td>200</td>
                                <td>300</td>
                                <td>100</td>
                                <td>800</td>
                            <tr>
                               <td>2023-08-02</td>
                               <td>Second</td>
                                <td>1000</td>
                                <td>200</td>
                                <td>300</td>
                                <td>100</td>
                                <td>800</td>
                            </tr>
                        </tbody>
                    </table>
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