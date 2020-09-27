<?php 
    include_once("DbConnection.php");
    $Uid = $_GET['Uid'];
?>

<!DOCTYPE html>
<html lang="zxx">
    <head>
    <?php include_once('cssLinks.php');?>

        <title>Alumni Profile description</title>
    </head>
    <body>

        <!-- Preloader -->
        <!-- <div class="loader">
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
        </div> -->
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
                    <?php
                        $select_alumni_details = "SELECT * FROM tblregister  WHERE Uid=$Uid  AND IsActive=1 ";
                        $exe_Alumni_details = mysqli_query($con,$select_alumni_details) or die(mysqli_error($con));
                        $fetch_alumni_details = mysqli_fetch_array($exe_Alumni_details);

                        $Fname = $fetch_alumni_details['Fname'];
                        $Lname = $fetch_alumni_details['Lname'];
                        $contact = $fetch_alumni_details['Phone'];
                        $Email = $fetch_alumni_details['Email'];
                        $About = $fetch_alumni_details['About']
                        // $dept = $fetch_alumni_details['DeptName'];

                    ?>
                    <div class="col-lg-5">
                        <div class="single-profile-item">
                            <img src="assets/img/home-1/profile/1.jpg" alt="Profile">
                            <div class="single-profile-left">
                                <div class="single-profile-contact">
                                    <h3>Contact Info</h3>
                                    <ul>
                                        <li>
                                            <i class="icofont-ui-call"></i>
                                            <a href="tel:+07554332322">Call : <?php echo $contact; ?></a>
                                        </li>
                                        <li>
                                            <i class="icofont-email"></i>
                                            <a href="mailto:hello@gable.com"><?php echo $Email; ?></a>
                                        </li>
                                        <!-- <li>
                                            <i class="icofont-location-pin"></i>
                                            4th Floor, 408 No Chamber
                                        </li> -->
                                    </ul>
                                </div>
                                
                                <div class="single-profile-skills">
                                    <h3>My Skills</h3>
                                    <div class="skill">
                                        <p>Frontend Design</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="single-profile-item">
                            <div class="single-profile-right">
                                <div class="single-profile-name">
                                    <h2><?php echo $Fname; ?> <?php echo $Lname; ?></h2>
                                    <span>Web Consultant</span>
                                    <p></p>
                                    <!-- <a href="#">
                                        View CV
                                        <i class="icofont-eye-alt"></i>
                                    </a>
                                    <a href="#">
                                        Download CV
                                        <i class="icofont-download"></i>
                                    </a> -->
                                </div>
                                <div class="single-profile-textarea">
                                    <div class="single-profile-heading">
                                        <span></span>
                                        <h3>Description</h3>
                                    </div>
                                    <div class="single-profile-paragraph">
                                        <p class="single-profile-p"><?php echo $About; ?></p>
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