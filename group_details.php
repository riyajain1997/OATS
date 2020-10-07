<?php 
    include_once("DbConnection.php");
?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php include_once('cssLinks.php');?> 
        <title>Group Details</title>
    </head>
    <body>

        <!-- Start Navbar Area -->
        <?php 
            if($_SESSION['Type']=="Student")
            {
                include_once('headerStudent.php');
            }
            else if($_SESSION['Type']=="Alumni")
            {
                include_once('headerAlumni.php');
            }
            else if($_SESSION['Type']=="Staff")
            {
                include_once('headerHod.php');
            }
        ?>
        <!-- End Navbar Area -->

        <!-- Page Title -->
        <div class="page-title-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-text">
                            <h2>Group Name</h2>
                            <ul>
                                <li>
                                    <a href="index.html">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Group Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Profile -->
        <section class="profile-area profile-area-two pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="profile-item wow fadeInUp" data-wow-delay=".3s">
                            <img src="assets/img/home-1/profile/1.jpg" alt="Profile">
                            <div class="profile-inner">
                                <h3>Jerry Hudson</h3>
                                <span>Business Consultant</span>
                                <a href="candidate-details.html">View Profile
                                    <i class="icofont-swoosh-right"></i>
                                </a>
                                <div class="profile-heart">
                                    <a href="candidate-details.html">
                                        <i class="icofont-heart-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="profile-item wow fadeInUp" data-wow-delay=".4s">
                            <img src="assets/img/home-1/profile/2.jpg" alt="Profile">
                            <div class="profile-inner">
                                <h3>Jac Jacson</h3>
                                <span>Web Consultant</span>
                                <a href="candidate-details.html">View Profile
                                    <i class="icofont-swoosh-right"></i>
                                </a>
                                <div class="profile-heart">
                                    <a href="candidate-details.html">
                                        <i class="icofont-heart-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="profile-item wow fadeInUp" data-wow-delay=".5s">
                            <img src="assets/img/home-1/profile/3.jpg" alt="Profile">
                            <div class="profile-inner">
                                <h3>Tom Potter</h3>
                                <span>UX/UI Consultant</span>
                                <a href="candidate-details.html">View Profile
                                    <i class="icofont-swoosh-right"></i>
                                </a>
                                <div class="profile-heart">
                                    <a href="candidate-details.html">
                                        <i class="icofont-heart-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="profile-item wow fadeInUp" data-wow-delay=".6s">
                            <img src="assets/img/home-1/profile/4.jpg" alt="Profile">
                            <div class="profile-inner">
                                <h3>Shane Mac</h3>
                                <span>SEO Consultant </span>
                                <a href="candidate-details.html">View Profile
                                    <i class="icofont-swoosh-right"></i>
                                </a>
                                <div class="profile-heart">
                                    <a href="candidate-details.html">
                                        <i class="icofont-heart-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Profile -->

        <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->

       <!-- Start scripts -->
        <?php include_once('scriptsLinks.php');?>
        <!-- End scripts -->
        
    </body>
</html>