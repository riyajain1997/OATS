<?php 
    include_once("DbConnection.php");
?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php include_once('cssLinks.php');?>
        <title>HomePage</title>
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
            else{
                include_once('headerHod.php');
            }
        ?>
        <!-- End Navbar Area -->

        <!-- Banner -->
        <div class="banner-area banner-area-three" style="height:650px;">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="banner-text" style="margin-top:0px;">
                            <h1><span>O</span>nline <span>A</span>lumni <span>T</span>racking <span>S</span>ystem</h1>
                            <p>Best Way to Find, Connect & Communicate</p>
                        </div>
                        <div class="banner-img">
                            <img src="assets/img/home-3/banner.png" alt="Banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner -->

        <!-- Upcoming Events -->
        <section class="job-area ptb-100">
            <div class="container">
                <div class="section-title">
                    <h2>Upcoming Events</h2>
                    <a href="#">View All</a>
                </div>
                <div id="container">
                    <div class="row">
                        <div class="col-lg-6 mix web ui">
                            <div class="job-item">
                                <img src="assets/img/home-1/jobs/1.png" alt="Job">
                                <div class="job-inner align-items-center">
                                    <div class="job-inner-left">
                                        <h3>Event Name</h3>
                                        <a href="company-details.html">Department</a>
                                        <ul>
                                            <li>
                                                <i class="far fa-calendar-check"></i>
                                                Date: 03-09-2020
                                            </li>
                                            <li>
                                                <i class="far fa-clock"></i>
                                                Time: 11:00 a.m.
                                            </li>
                                            <li>
                                                <i class="icofont-location-pin"></i>
                                                Location: 210-27 Quadra, Market Street, Victoria Canada
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="job-inner-right">
                                        <ul>
                                            <li>
                                                <a href="create-account.html">More Details</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mix web ui">
                            <div class="job-item">
                                <img src="assets/img/home-1/jobs/2.png" alt="Job">
                                <div class="job-inner align-items-center">
                                    <div class="job-inner-left">
                                        <h3>Event Name</h3>
                                        <a href="company-details.html">Department</a>
                                        <ul>
                                            <li>
                                                <i class="far fa-calendar-check"></i>
                                                Date: 03-09-2020
                                            </li>
                                            <li>
                                                <i class="far fa-clock"></i>
                                                Time: 11:00 a.m.
                                            </li>
                                            <li>
                                                <i class="icofont-location-pin"></i>
                                                Location: 210-27 Quadra, Market Street, Victoria Canada
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="job-inner-right">
                                        <ul>
                                            <li>
                                                <a href="create-account.html">More Details</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Upcoming Events -->

        <!-- Counter -->
        <div class="counter-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-sm-3 col-lg-3">
                        <div class="counter-item">
                            <i class="flaticon-employee"></i>
                            <h3><span class="counter">14</span>k+</h3>
                            <p>Alumni Registered</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-3">
                        <div class="counter-item">
                            <i class="flaticon-enterprise"></i>
                            <h3><span class="counter">18</span>k+</h3>
                            <p>Students Registered</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-3">
                        <div class="counter-item">
                            <i class="flaticon-curriculum"></i>
                            <h3><span class="counter">9</span>k+</h3>
                            <p>Events Occured</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-3">
                        <div class="counter-item">
                            <i class="flaticon-businessman-paper-of-the-application-for-a-job"></i>
                            <h3><span class="counter">35</span>+</h3>
                            <p>Blogs Posted</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Counter -->

        <br><br><br><br>

        <!-- Blog -->
        <section class="container">
                <div class="section-title">
                    <h2>Recent Blogs</h2>
                    <a href="#">Read All</a>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="blog-item wow fadeInUp">
                            <div class="blog-top">
                                <a href="blog-details.html">
                                    <img src="assets/img/home-1/blog/1.jpg" alt="Blog">
                                </a>
                                <span>21 May, 2020</span>
                            </div>
                            <div class="blog-bottom">
                                <h3>
                                    <a href="blog-details.html">The next genaration IT will change the world</a>
                                </h3>
                                <ul>
                                    <li>
                                        <img src="assets/img/home-1/blog/1.png" alt="Blog">
                                        Aikin Ward
                                    </li>
                                    <li>
                                        <a href="blog-details.html">Read More
                                            <i class="icofont-simple-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="blog-item wow fadeInUp">
                            <div class="blog-top">
                                <a href="blog-details.html">
                                    <img src="assets/img/home-1/blog/1.jpg" alt="Blog">
                                </a>
                                <span>21 May, 2020</span>
                            </div>
                            <div class="blog-bottom">
                                <h3>
                                    <a href="blog-details.html">The next genaration IT will change the world</a>
                                </h3>
                                <ul>
                                    <li>
                                        <img src="assets/img/home-1/blog/1.png" alt="Blog">
                                        Aikin Ward
                                    </li>
                                    <li>
                                        <a href="blog-details.html">Read More
                                            <i class="icofont-simple-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="blog-item wow fadeInUp">
                            <div class="blog-top">
                                <a href="blog-details.html">
                                    <img src="assets/img/home-1/blog/1.jpg" alt="Blog">
                                </a>
                                <span>21 May, 2020</span>
                            </div>
                            <div class="blog-bottom">
                                <h3>
                                    <a href="blog-details.html">The next genaration IT will change the world</a>
                                </h3>
                                <ul>
                                    <li>
                                        <img src="assets/img/home-1/blog/1.png" alt="Blog">
                                        Aikin Ward
                                    </li>
                                    <li>
                                        <a href="blog-details.html">Read More
                                            <i class="icofont-simple-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- End Blog -->

        <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->

        <!-- Start scripts -->
        <?php include_once('scriptsLinks.php');?>
        <!-- End scripts -->

    </body>
</html>