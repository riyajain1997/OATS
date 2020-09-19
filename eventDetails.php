<?php 
    include_once("DbConnection.php");
    $eid = $_GET['Eid'];
?>

<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php include_once('cssLinks.php');?>
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
                            <h2>Event Details</h2>
                            <ul>
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Event Details</li>
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
                        $select = "SELECT * from tblevent where Eid=$eid AND IsActive=1";
                        $execute = mysqli_query($con,$select) or die(mysqli_error($con));
                        $fetch = mysqli_fetch_array($execute);

                        $eventName = $fetch['Ename'];
                        $eventLocation = $fetch['Location'];
                        $eventLink = $fetch['Elink'];
                        $eventDate = $fetch['Edate'];
                        $eventTime = $fetch['Etime'];
                        $eventDesc = $fetch['Edescription'];
                        $alumni = $fetch['AlumniUid'];
                        $dept = $fetch['Deptid'];
                        $host = $fetch['CreatedUid'];

                    ?>
                    <div class="col-lg-5">
                        <div class="single-profile-item">
                            <img src="assets/img/home-1/blog/4.jpg" alt="Profile">
                            <div class="single-profile-left">
                                <div class="single-profile-contact">
                                    <h3>Timing</h3>
                                    <ul>
                                        <li>
                                            <i class="icofont-ui-call"></i>
                                            <a href="tel:+07554332322">Date: <?php echo $eventDate;?></a>
                                        </li>
                                        <li>
                                            <i class="icofont-email"></i>
                                            <a href="mailto:hello@gable.com">Time: <?php echo $eventTime;?></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="single-profile-social">
                                    <h3>Event Link</h3>
                                    <ul>
                                        <li>
                                            <i class="icofont-facebook"></i>
                                            <a href="https://www.facebook.com" target="_blank"><?php echo $eventLink;?></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="single-profile-social">
                                    <h3>Alumni Invited</h3>
                                    <ul>
                                        <?php
                                            $alumniQry = "SELECT * from tblregister where Uid=$alumni AND IsActive=1";
                                            $exe = mysqli_query($con,$alumniQry) or die(mysqli_error($con));
                                            $select = mysqli_fetch_array($exe);
                                            $Fnm = $select['Fname'];
                                            $Lnm = $select['Lname'];
                                        ?>
                                        <li>
                                            <a href="https://www.facebook.com" target="_blank"><?php echo $Fnm;?> <?php echo $Lnm;?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="single-profile-item">
                            <div class="single-profile-right">
                                <div class="single-profile-name">
                                    <h2><?php echo $eventName;?></h2>
                                    <span><i class="icofont-location-pin"><?php echo $eventLocation;?></i></span><br></bt>
                                    <a href="#">
                                        Edit
                                    </a>
                                    <a href="#">
                                        Cancel Event
                                    </a>
                                </div>
                                <div class="single-profile-textarea">
                                    <div class="single-profile-heading">
                                        <span></span>
                                        <h3>Description</h3>
                                    </div>
                                    <div class="single-profile-paragraph">
                                        <p class="single-profile-p"><?php echo $eventDesc;?></p>
                                        
                                    </div>
                                    <div class="single-profile-heading">
                                        <span></span>
                                        <h3>For Department</h3>
                                    </div>
                                    <div class="single-profile-paragraph">
                                        <?php 
                                            $deptQry = "SELECT * from tbldepartment where Deptid=$dept";
                                            $dept_exe = mysqli_query($con,$deptQry) or die(mysqli_error($con));
                                            $select_dept = mysqli_fetch_array($dept_exe);
                                            $deptName = $select_dept['DeptName'];
                                        ?>
                                        <ul>
                                            <li><?php echo $deptName;?></li>
                                        </ul>
                                    </div>
                                    <div class="single-profile-heading">
                                        <span></span>
                                        <h3>Hosted By</h3>
                                    </div>
                                    <div class="single-profile-paragraph">
                                        <ul>
                                            <?php
                                                $hostnm = "SELECT * from tblregister where Uid=$host AND IsActive=1 ";
                                                $host_exe = mysqli_query($con,$hostnm) or die(mysqli_error($con));
                                                $select_host = mysqli_fetch_array($host_exe);
                                                $hostFnm = $select_host['Fname'];
                                                $hostLnm = $select_host['Lname'];
                                            ?>
                                            <li><?php echo $hostFnm;?> <?php echo $hostLnm;?></li>
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