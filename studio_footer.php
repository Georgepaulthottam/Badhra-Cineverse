<!----footer-design------------->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="footer-in">
                        <p class="mb-0">&copy 2023 Team Helios . All Rights Reserved.</p>
                    </div>
                </div>
            </footer>
         <!-- Optional JavaScript -->
    <!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>


	<script type="text/javascript">
		$(document).ready(function () {
			$(".xp-menubar").on('click', function () {
				$("#sidebar").toggleClass('active');
				$("#content").toggleClass('active');
			});

			$('.xp-menubar,.body-overlay').on('click', function () {
				$("#sidebar,.body-overlay").toggleClass('show-nav');
			});

		});\
	//for logout popup
const LogoutBtn = document.getElementById("LogoutBtn");
const overlay = document.getElementById('overlay');
const customConfirm = document.getElementById('custom-confirm');
const yesButton = document.getElementById('yes-button');
const noButton = document.getElementById('no-button');

LogoutBtn.addEventListener("click", () => {
    overlay.style.display = 'block';
    customConfirm.style.display = 'block';
});

    yesButton.addEventListener('click', function()
	 {
        // Perform logout action here
        window.location.href = "login.php";
    });

    noButton.addEventListener('click', function() 
	{
		overlay.style.display = 'none';
    customConfirm.style.display = 'none';
    });

  </script>
    </body>
</html>