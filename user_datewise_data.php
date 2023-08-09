<?php require("user_header.php"); ?>

            <!------main-content-start----------->
            <div id="main-container" class="middle-section">
               <div class="bottom-section">
                <div class="profile-box">
                    <h5 style="color:red;">2023-07-24</h5>
                    <table id="datewisetbl">
                        <tr>
                            <td>Salary : </td>
                            <td>1750</td>
                            <td>Accomodation : </td>
                            <td>Hotel1</td>
                        </tr>
                    </table><br>
                    <h5 style="color:black;">Request</h5>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Costume</td>
                                <td>Costume</td>
                                <td>1200</td>
                                <td>3</td>
                                <td>3600</td>
                                <td>Apprroved</td>
                            </tr>
                            <tr>
                                <td>Costume</td>
                                <td>Costume</td>
                                <td>1200</td>
                                <td>3</td>
                                <td>3600</td>
                                <td>Apprroved</td>
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