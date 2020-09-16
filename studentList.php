<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php include_once('cssLinks.php');?>
        <title>Student List</title>
        <!-- {% comment %} <style>
            small {
                color: black;
            } 
        </style> {% endcomment %} -->
    </head>
    <body>

        <!-- Page Title -->
        <div class="page-title-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-text">
                            <h2>Student List</h2>
                            <ul>
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Student List</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->
        <div class="container mt-5" >
            <div class="subscribe-item">
                <form class="newsletter-form input-group" data-toggle="validator">

                    <input type="text" class="form-control col-sm-4" placeholder="Department" name="jobProfile" required autocomplete="off">
                    <input type="text" class="form-control col-sm-4" placeholder="Course" name="Course" required autocomplete="off">
                    <input type="text" class="form-control col-sm-2" placeholder="year" name="year" required autocomplete="off">

                    <button class="btn subscribe-btn" type="submit">
                        Search
                    </button> 

                </form>
            </div>
        </div>
        

         <!-- Profile -->
        <section class="profile-area profile-area-two pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="profile-item wow fadeInUp" data-wow-delay=".3s">
                            <img src="assets/img/home-1/profile/1.jpg" alt="Profile">
                            <div class="profile-inner">
                                <h3>Jerry Hudson</h3>
                                <span>2015</span>
                                <span>MCA,Science</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="profile-item wow fadeInUp" data-wow-delay=".4s">
                            <img src="assets/img/home-1/profile/2.jpg" alt="Profile">
                            <div class="profile-inner">
                                <h3>Jac Jacson</h3>
                                <span>2017</span>
                                <span>MBA,Management</span>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="profile-item wow fadeInUp" data-wow-delay=".5s">
                            <img src="assets/img/home-1/profile/3.jpg" alt="Profile">
                            <div class="profile-inner">
                                <h3>Tom Potter</h3>
                                <span>2019</span>
                                <span>BCA,Science</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="profile-item wow fadeInUp" data-wow-delay=".6s">
                            <img src="assets/img/home-1/profile/4.jpg" alt="Profile">
                            <div class="profile-inner">
                                <h3>Shane Mac</h3>
                                <span>2016</span>
                                <span>BBA,Management</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="profile-item wow fadeInUp" data-wow-delay=".3s">
                            <img src="assets/img/home-1/profile/5.jpg" alt="Profile">
                            <div class="profile-inner">
                                <h3>Liam Noah</h3>
                                <span>2015</span>
                                <span>MCA,Science</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="profile-item wow fadeInUp" data-wow-delay=".4s">
                            <img src="assets/img/home-1/profile/6.jpg" alt="Profile">
                            <div class="profile-inner">
                                <h3>William James</h3>
                                <span>2009</span>
                                <span>B.com,Management</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="profile-item wow fadeInUp" data-wow-delay=".5s">
                            <img src="assets/img/home-1/profile/7.jpg" alt="Profile">
                            <div class="profile-inner">
                                <h3>Lucas Mason</h3>
                                <span>2016</span>
                                <span>BBA,Management</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="profile-item wow fadeInUp" data-wow-delay=".6s">
                            <img src="assets/img/home-1/profile/8.jpg" alt="Profile">
                            <div class="profile-inner">
                                <h3>Daniel Henry</h3>
                                <span>2019</span>
                                <span>MBA,Management</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Profile -->

        <!-- Start Navbar Area -->
        <?php include_once('headerStudent.php');?>
        <!-- End Navbar Area -->
     <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->


        <!-- Start scripts -->
        <?php include_once('scriptsLinks.php');?> 
        <!-- End scripts -->

    </body>
</html>