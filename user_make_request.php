<?php
session_start();
$user=$_SESSION['user'];
require 'connection.php';
if(isset($_POST['submit'])){
    $name=$_POST['itemname'];
    $number=$_POST['number'];
    $details=$_POST['details'];
    $price=$_POST['cost'];

    $quer=("INSERT INTO `cart`(`name`, `username`, `number`, `details`, `price`, `status`) 
    VALUES ('$name','$user',$number,'$details',$price,'requested')");
    $conquer=mysqli_query($conn,$quer);
    echo "<script>alert('order submitted successfuly')</script>";  

}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">


    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/user.css" />
    <script type="text/javascript" src="main.js"></script>
</head>

<body>



    <div class="wrapper">

        <div class="body-overlay"></div>

        <!-------sidebar--design------------>

        <div id="sidebar">
            <div class="sidebar-header">
                <h3><img src="img/logo.png" class="img-fluid" /><span>BadhraCineverse</span></h3>
            </div>
            <ul class="list-unstyled component m-0">
                <li class="active">
                    <a href="#" class="dashboard"><i class="material-icons">dashboard</i>Dashboard </a>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">aspect_ratio</i>Layouts
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                        <li><a href="#">layout 1</a></li>
                        <li><a href="#">layout 2</a></li>
                        <li><a href="#">layout 3</a></li>
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">aspect_ratio</i>Layouts
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                        <li><a href="#">layout 1</a></li>
                        <li><a href="#">layout 2</a></li>
                        <li><a href="#">layout 3</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">equalizer</i>charts
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu3">
                        <li><a href="#">Pages 1</a></li>
                        <li><a href="#">Pages 2</a></li>
                        <li><a href="#">Pages 3</a></li>
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">extension</i>UI Element
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu4">
                        <li><a href="#">Pages 1</a></li>
                        <li><a href="#">Pages 2</a></li>
                        <li><a href="#">Pages 3</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">border_color</i>forms
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
                            <div class="xp-searchbar">
                                <form>
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit" id="button-addon2">Go
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
                                                <li><a href="#">
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
                        <h4 class="page-title">Request Details</h4>
                        <ol class="breadcrumb">

                        </ol>
                    </div>


                </div>
            </div>
            <!------top-navbar-end----------->


            <!------main-content-start----------->
            <div class="main-content">
                <section id="view-request">
                    <div class="profile-box">
                        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Make Request
                        </h3>
                        <div class="attendence" style="overflow-x:auto;">
    
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <form action="" method="POST">
                                        <tr>
                                            <th>Item Name</th>
                                            <th>:</th>
                                            <th><input type="text" id="itemname" name="itemname"></th>
                                        </tr>
                                        <tr>
                                            <th>Item Description:</th>
                                            <th>:</th>
                                            <th><input type="text" id="details" name="details"></th>
                                        </tr>
                                        <tr>
                                            <th>Price:</th>
                                            <th>:</th>
                                            <th><input type="text" id="cost" name="cost"></th>
                                        </tr>
                                        <tr>
                                            <th>Quantity:</th>
                                            <th>:</th>
                                            <th><input type="text" id="number" name="number"></th>
                                        </tr>
                                        <tr>
                                            <th colspan="3"><input type="submit" id="submit" name="submit" value="Make Request" class="punch-in-btn"></th>
                                        </tr>
                                    </form>
                                </tbody>
    
    
                            </table>
    
                        </div>
                </section>
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

        });

    </script>





</body>

</html>