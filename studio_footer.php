<!----footer-design------------->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="footer-in">
                        <p class="mb-0">&copy 2023 Team Helios . All Rights Reserved.</p>
                    </div>
                </div>
            </footer>
         <!-- Optional JavaScript -->
    <script>
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