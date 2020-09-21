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
                    <a href="view_events.php">View All</a>
                </div>
                <div id="container">
                    <div class="row">

                        <?php
                            $eventSelectQuery = "SELECT * from tblevent where IsActive=1 and IsAccepted=1 ORDER BY Eid DESC LIMIT 2";
                            $result_event = mysqli_query($con,$eventSelectQuery);
                            if($result_event->num_rows!=0)
                            {
                                while($row_event=$result_event->fetch_array())
                                {
                                    $eventId = $row_event['Eid'];
                                    $eventName = $row_event['Ename'];
                                    $eventDate = $row_event['Edate'];
                                    $eventTime = $row_event['Etime'];
                                    $eventLocation = $row_event['Location'];
                                    $dept = $row_event['Deptid'];
                                    
                               
                        ?>

                        <div class="col-lg-6 mix web ui">
                            <div class="job-item">
                                <img src="assets/img/home-1/jobs/2.png" alt="Job">
                                <div class="job-inner align-items-center">
                                    <div class="job-inner-left">
                                        <h3><?php echo $eventName; ?></h3>

                                        <?php 
                                            $deptQry = "SELECT * from tbldepartment where Deptid=$dept";
                                            $dept_exe = mysqli_query($con,$deptQry) or die(mysqli_error($con));
                                            $select_dept = mysqli_fetch_array($dept_exe);
                                            $deptName = $select_dept['DeptName'];
                                        ?>
                                        <a href="company-details.html"><?php echo $deptName?></a>
                                        <ul>
                                            <li>
                                                <i class="far fa-calendar-check"></i>
                                                Date: <?php echo $eventDate; ?>
                                            </li>
                                            <li>
                                                <i class="far fa-clock"></i>
                                                Time: <?php echo $eventTime; ?>
                                            </li>
                                            <li>
                                                <i class="icofont-location-pin"></i>
                                                Location: <?php echo $eventLocation; ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="job-inner-right">
                                        <ul>
                                            <li>
                                                <a href="eventDetails.php?Eid=<?php echo $eventId; ?>">More Details</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php 
                                }
                            }
                        ?>
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

        <br><br><br><br>

        <!-- Blog -->
        <section class="container">
                <div class="section-title">
                    <h2>Recent Blogs</h2>
                    <a href="#">Read All</a>
                </div>
                <br>
                <div class="row">
                    <?php
                        $select="SELECT * from tblblogs ORDER BY Bid DESC LIMIT 3";
                        $res=mysqli_query($con,$select);

                        if($res->num_rows!=0)
                        {
                            while($data=$res->fetch_array())
                            {
                                $bid=$data['Bid'];
                                $userid=$data['Uid'];
                                $title=$data['Title'];
                                $cont=$data['Content'];
                                $date=$data['CreatedDate'];
                                $file=$data['File'];

                                if($file=="" || !file_exists("Uploaded/Images/$file"))
                                {
                                    $file="blog1.JFIF";
                                }

                                #For printing user name
                                $select="SELECT * from tblregister where Uid=$userid";
                                $Execute_sel_User=mysqli_query($con,$select) or die(mysqli_error($con));
                                $fetch=mysqli_fetch_array($Execute_sel_User);
                                $uname=$fetch['Fname']." ".$fetch['Lname'];
                                #For printing user name
                    ?>
                        <div class="col-sm-6 col-lg-4">
                            <div class="blog-item wow fadeInUp">
                                <div class="blog-top">
                                    <a href="blog-details.php?bid=<?php echo $bid; ?>&name=<?php echo $uname ?>">
                                        <img src="Uploaded/Images/<?php echo $file; ?>" alt="Blog">
                                    </a>
                                    <span><?php echo $date; ?></span>
                                </div>
                                <div class="blog-bottom">
                                    <h3>
                                        <a href="blog-details.php?bid=<?php echo $bid; ?>&name=<?php echo $uname ?>"><?php echo $title; ?></a>
                                    </h3>
                                    <ul>
                                        <li>
                                            <img src="assets/img/home-1/blog/1.png" alt="Blog">
                                            <?php
                                                echo $fetch['Fname']." ".$fetch['Lname'];
                                            ?>
                                        </li>
                                        <li>
                                            <a href="blog-details.php?bid=<?php echo $bid; ?>&name=<?php echo $uname ?>">Read More
                                                <i class="icofont-simple-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php
                            }
                        }
                    ?>
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