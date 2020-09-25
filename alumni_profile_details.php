<?php 
    include_once("DbConnection.php");
?>

<!DOCTYPE html>
<html lang="zxx">
    <head>
    <?php include_once('cssLinks.php');?>

        <title>Alumni Profile description</title>
    </head>
    <body>

        <!-- Preloader -->
        <div class="loader">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="spinner">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Preloader -->

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

        <!-- Page Title -->
        <div class="page-title-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-text">
                            <h2>Alumni Details</h2>
                            <ul>
                                <li>
                                    <a href="homepage.php">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Alumni Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Candidate Details -->
        <div class="single-profile-area pt-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="single-profile-item">
                            <img src="assets/img/single-profile/2.jpg" alt="Profile">
                            <div class="single-profile-left">
                                <div class="single-profile-contact">
                                    <h3>Contact Info</h3>
                                    <ul>
                                        <li>
                                            <i class="icofont-ui-call"></i>
                                            <a href="tel:+07554332322">Call : +07 554 332 322</a>
                                        </li>
                                        <li>
                                            <i class="icofont-email"></i>
                                            <a href="mailto:hello@gable.com">hello@gable.com</a>
                                        </li>
                                        <li>
                                            <i class="icofont-location-pin"></i>
                                            4th Floor, 408 No Chamber
                                        </li>
                                    </ul>
                                </div>
                                <div class="single-profile-social">
                                    <h3>Social Links</h3>
                                    <ul>
                                        <li>
                                            <i class="icofont-facebook"></i>
                                            <a href="https://www.facebook.com" target="_blank">https://www.facebook.com</a>
                                        </li>
                                        <li>
                                            <i class="icofont-instagram"></i>
                                            <a href="https://www.instagram.com" target="_blank">https://www.instagram.com</a>
                                        </li>
                                        <li>
                                            <i class="icofont-linkedin"></i>
                                            <a href="https://www.linkedin.com" target="_blank">https://www.linkedin.com</a>
                                        </li>
                                        <li>
                                            <i class="icofont-twitter"></i>
                                            <a href="https://www.twitter.com" target="_blank">https://www.twitter.com</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="single-profile-skills">
                                    <h3>My Skills</h3>
                                    <div class="skill">
                                        <p>Frontend Design</p>
                                        <div class="skill-bar skill1 wow slideInLeft animated">
                                            <span class="skill-count1">70%</span>
                                        </div>
                                    </div>
                                    <div class="skill">
                                        <p>Software Development</p>
                                        <div class="skill-bar skill1 skill2 wow slideInLeft animated">
                                            <span class="skill-count1">90%</span>
                                        </div>
                                    </div>
                                    <div class="skill">
                                        <p>UIUX Design</p>
                                        <div class="skill-bar skill1 skill3 wow slideInLeft animated">
                                            <span class="skill-count1">75%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="single-profile-item">
                            <div class="single-profile-right">
                                <div class="single-profile-name">
                                    <h2>Jac Jacson</h2>
                                    <span>Web Consultant</span>
                                    <p>Bachelor of Business Administation university of Gable</p>
                                    <a href="#">
                                        View CV
                                        <i class="icofont-eye-alt"></i>
                                    </a>
                                    <a href="#">
                                        Download CV
                                        <i class="icofont-download"></i>
                                    </a>
                                </div>
                                <div class="single-profile-textarea">
                                    <div class="single-profile-heading">
                                        <span></span>
                                        <h3>Description</h3>
                                    </div>
                                    <div class="single-profile-paragraph">
                                        <p class="single-profile-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
                                        <p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                    </div>
                                    <div class="single-profile-heading">
                                        <span></span>
                                        <h3>Education</h3>
                                    </div>
                                    <div class="single-profile-paragraph">
                                        <ul>
                                            <li>PHD degree in Criminal Law at University of Gable Internatinal (2006)</li>
                                            <li>Master of Family Law  at University of Gable International  (2002)</li>
                                            <li>MBBS LLB (Hon’s) in  at University of Gable International (2002)</li>
                                            <li>Higher Secondary Certificate at Gable International collage  (1991)</li>
                                        </ul>
                                    </div>
                                    <div class="single-profile-heading">
                                        <span></span>
                                        <h3>Research</h3>
                                    </div>
                                    <div class="single-profile-paragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra</p>
                                    </div>
                                    <div class="single-profile-heading">
                                        <span></span>
                                        <h3>Work Experiences</h3>
                                    </div>
                                    <div class="single-profile-paragraph">
                                        <ul>
                                            <li>Hand On experience with Wordpress</li>
                                            <li> Better knowledge of front-end technologies, including HTML5, CSS3, JavaScript, jQuery</li>
                                            <li>Belief – believing in yourself and those around you</li>
                                            <li>Experience designing and developing responsive design websites</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Candidate Details -->

        <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->


        <!-- Start script -->
        <?php include_once('scriptsLinks.php');?> 
        <!-- End script -->

    </body>
</html>