<?php 
    include_once('DbConnection.php'); 
?>

<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php include_once('cssLinks.php');?>
        <title>Index</title>
    </head>
    <body>

        <!-- Start Navbar Area -->
        <?php include_once('header.php');?>
        <!-- End Navbar Area -->

        <!-- Banner -->
        <div class="banner-area banner-img-one" style="height:650px;">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="banner-text">
                            <h1><span>O</span>nline <span>A</span>lumni <span>T</span>racking <span>S</span>ystem</h1>
                            <p>Best Way to Find, Connect & Communicate</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner -->

        <!-- Account -->
        <div class="account-area">
            <div class="container">
                <div class="row account-wrap">
                    <div class="col-sm-6 col-lg-4">
                        <div class="account-item">
                            <i class="flaticon-approved"></i>
                            <span>Register Your Account</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="account-item">
                            <i class="flaticon-cv"></i>
                            <span>Verified By The University</span>
                        </div>
                    </div>
                    <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
                        <div class="account-item account-last">
                            <i class="flaticon-customer-service"></i>
                            <span>Connect To Our Alumni</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Account -->

        <!-- Information At A Glance -->
        <section class="category-area ptb-100">
            <div class="container">
                <div class="section-title">
                    <h2>Information At A Glance</h2>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-lg-3 category-border-two">
                        <div class="category-item category-six">
                            <i class="fas fa-users"></i>
                            <a>Experienced Alumni</a>
                        </div>
                    </div>
                    <div class="col-sm-3 col-lg-3 category-border-two">
                        <div class="category-item category-seven">
                            <i class="fas fa-user-check"></i>
                            <a>Verified College Students</a>
                        </div>
                    </div>
                    <div class="col-sm-3 col-lg-3 category-border-two">
                        <div class="category-item category-eight">
                            <i class="fas fa-file-alt"></i>
                            <a>Informative Blogs & Events</a>
                        </div>
                    </div>
                    <div class="col-sm-3  col-lg-3 category-border-two">
                        <div class="category-item category-nine">
                            <i class="fas fa-calendar-check"></i>
                            <a>Up-to-date Informations</a>
                        </div>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <div class="category-item category-ten">
                            <i class="fas fa-shield-alt"></i>
                            <a>Data Security & Privacy</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Information At A Glance -->

        <!-- Trusted And Popular -->
        <div class="portal-area pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="portal-item">
                            <div class="row">
                                <div class="col-lg-7">
                                    <img src="assets/img/home-1/1.jpg" alt="Portal">
                                </div>
                                <div class="col-lg-5">
                                    <img src="assets/img/home-1/2.jpg" alt="Portal">
                                </div>
                            </div>
                            <div class="portal-trusted">
                                <span>100% Trusted</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portal-item portal-right">
                            <h2>Trusted & Popular</h2><br>
                            <p>Our technology and expertise help you to organize different events which add value to your 
                            constituents, build lifelong relationships and drive more engagement which your data secure.</p>
                            <div class="common-btn" style="float:right;">
                                <a class="login-btn" href="login.php">
                                    Login Now
                                    <i class="icofont-swoosh-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Trusted And Popular -->

        <!-- Counter -->
        <div class="counter-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-sm-3 col-lg-3">
                        <div class="counter-item">
                            <i class="flaticon-employee"></i>
                            <?php
                                $AlumniCount="Select count(*) as alumnicount from tblregister where Usertype='Alumni' AND IsActive=1";
                                $ExeAlumniCount=mysqli_query($con,$AlumniCount) or die(mysqli_error($con));
                                $FetchAlumniCount=mysqli_fetch_array($ExeAlumniCount);
                            ?>
                            <h3><span class="counter"><?php echo $FetchAlumniCount['alumnicount'];?></span></h3>
                            <p>Alumni Registered</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-3">
                        <div class="counter-item">
                            <i class="flaticon-enterprise"></i>
                            <?php
                                $StudentCount="Select count(*) as studentcount from tblregister where Usertype='Student' AND IsActive=1";
                                $ExeStudentCount=mysqli_query($con,$StudentCount) or die(mysqli_error($con));
                                $FetchStudentCount=mysqli_fetch_array($ExeStudentCount);
                            ?>
                            <h3><span class="counter"><?php echo $FetchStudentCount['studentcount'];?></span></h3>
                            <p>Students Registered</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-3">
                        <div class="counter-item">
                            <i class="flaticon-curriculum"></i>
                            <?php
                                $EventCount="Select count(*) as eventcount from tblevent";
                                $ExeEventCount=mysqli_query($con,$EventCount) or die(mysqli_error($con));
                                $FetchEventCount=mysqli_fetch_array($ExeEventCount);
                            ?>
                            <h3><span class="counter"><?php echo $FetchEventCount['eventcount'];?></span></h3>
                            <p>Events Occured</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-3">
                        <div class="counter-item">
                            <i class="flaticon-businessman-paper-of-the-application-for-a-job"></i>
                            <?php
                                $BlogCount="Select count(*) as blogcount from tblblogs";
                                $ExeBlogCount=mysqli_query($con,$BlogCount) or die(mysqli_error($con));
                                $FetchBlogCount=mysqli_fetch_array($ExeBlogCount);
                            ?>
                            <h3><span class="counter"><?php echo $FetchBlogCount['blogcount'];?></span></h3>
                            <p>Blogs Posted</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Counter -->

        <!-- Popular -->
        <div class="popular-area pt-100 pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="popular-item">
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <img src="assets/img/home-1/3.jpg" alt="Popular">
                                </div>
                                <div class="col-lg-5">
                                    <div class="practice-inner">
                                        <img src="assets/img/home-1/4.jpg" alt="Popular">
                                        <img src="assets/img/home-1/5.jpg" alt="Popular">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="popular-item popular-right">
                            <div class="section-title text-left">
                                <h2>Why We are Most Popular</h2>
                            </div>
                            <p>Online Alumni Tracking System helps the institutions to track old students and to 
                            track them for future endeavours. <br> 
                            It is also very helpful for the Students to get updated with latest information and news from 
                            the experienced alumnis about real world challenges. </p>
                            <div class="row popular-wrap">
                                <div class="col-sm-6 col-lg-6">
                                    <ul>
                                        <li>
                                            <i class="fas fa-user-graduate"></i>
                                            Experienced Alumnis
                                        </li>
                                        <li>
                                            <i class="far fa-newspaper"></i>
                                            Different Events
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <ul>
                                        <li>
                                            <i class="fas fa-toggle-on"></i>
                                            One Click Invites
                                        </li>
                                        <li>
                                            <i class="fas fa-mail-bulk"></i>
                                            Regular Updates
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Popular -->

        <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->

        <!-- Start scripts -->
        <?php include_once('scriptsLinks.php');?> 
        <!-- End scripts -->


    </body>
</html>