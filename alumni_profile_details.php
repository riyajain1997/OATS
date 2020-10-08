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
                        $About = $fetch_alumni_details['About'];

                    ?>
                    <div class="col-lg-5">
                        <div class="single-profile-item">
                            <img src="Uploaded/Images/no1.png" alt="Profile">
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

                                    <?php 
                                        $select = "SELECT * FROM tbluserskill AS u, tblskill AS s WHERE u.Uid=$Uid AND u.Skillid=s.Skillid AND IsActive=1";
                                        $exe_userSkill=mysqli_query($con,$select) or die(mysqli_error($con));
                                        if($exe_userSkill->num_rows!=0)
                                        {
                                            while($row_userSkill=$exe_userSkill->fetch_array())
                                            {
                                                $skillName = $row_userSkill['SkillName'];
                                            
                                    ?>
                                    
                                    <div class="skill">
                                        <p><?php echo $skillName; ?></p>
                                    </div>
                                    <?php 
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="single-profile-item">
                            <div class="single-profile-right">
                                <div class="single-profile-name">
                                    <h2><?php echo $Fname; ?> <?php echo $Lname; ?></h2>
                                    <!-- <span>Web Consultant</span> -->
                                    <p></p>
                                    
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
                                        
                                        <!-- Start Display Education Details -->

                                        <?php
                                            $seleducation="SELECT * From tbleducation WHERE Uid=$Uid ORDER BY Classid";
                                            $resulteducation=mysqli_query($con,$seleducation) or die(mysqli_error($con));
                                            if(mysqli_num_rows($resulteducation)>0)
                                            {
                                                while($roweducation=mysqli_fetch_array($resulteducation))
                                                {
                                                    if ($roweducation['Classid']==1 || $roweducation['Classid']==2) 
                                                    {
                                        ?>
                                                        <div style="color: gray; font-size: 20px;">
                                                            <div>
                                                                <div class="row">
                                                                    <div class="col-lg-11">
                                                            <?php
                                                                $class="SELECT * From tblclass WHERE Classid='".$roweducation['Classid']."' ";
                                                                $resultclass=mysqli_query($con,$class) or die(mysqli_error($con));
                                                                $rowclass=mysqli_fetch_array($resultclass);
                                                                if(mysqli_num_rows($resultclass)>0)
                                                                {
                                                            ?>
                                                                        <span><?php echo $rowclass['ClassName']; ?></span>
                                                            <?php
                                                                }
                                                            ?>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                                $board="SELECT * From tblboard AS b, tbleducation AS e WHERE b.Boardid='".$roweducation['Boardid']."' AND b.Boardid=e.Boardid AND e.Uid=$Uid ";
                                                                $resultboard=mysqli_query($con,$board) or die(mysqli_error($con));
                                                                $rowboard=mysqli_fetch_array($resultboard);
                                                                if(mysqli_num_rows($resultboard)>0)
                                                                {
                                                            ?>
                                                                        <small>Board: <?php echo $rowboard['BoardName']; ?> </small><br>
                                                            <?php
                                                                }
                                                            ?>                            
                                                                
                                                                <small>Specialization: <?php echo $roweducation['Specialization']; ?></small><br>
                                                                <small>Percentage: <?php echo $roweducation['Percentage']; ?></small><br>
                                                                <small>Passout: <?php echo $roweducation['Year']; ?> </small><br>
                                                            </div>
                                                        </div>
                                                        <br>
                                        <?php
                                                    }
                                                    else
                                                    {
                                        ?>
                                                        <div style="color: gray;font-size: 20px;">
                                                            <div >
                                                                <div class="row">
                                                                    <div class="col-lg-11">
                                                            <?php
                                                                $class="SELECT * From tblclass WHERE Classid='".$roweducation['Classid']."' ";
                                                                $resultclass=mysqli_query($con,$class) or die(mysqli_error($con));
                                                                $rowclass=mysqli_fetch_array($resultclass);
                                                                if(mysqli_num_rows($resultclass)>0)
                                                                {
                                                                    $course="SELECT * From tblcourse WHERE Courseid='".$roweducation['Courseid']."' ";
                                                                    $resultcourse=mysqli_query($con,$course) or die(mysqli_error($con));
                                                                    $rowcourse=mysqli_fetch_array($resultcourse);
                                                                    if(mysqli_num_rows($resultcourse)>0)
                                                                    {

                                                            ?>
                                                                        <span><?php echo $rowclass['ClassName']; ?>(<?php echo $rowcourse['CourseName']; ?>)</span>
                                                            <?php
                                                                    }
                                                                }
                                                            ?>
                                                                    </div>
                                                                </div> 
                                                            <?php
                                                                $college="SELECT * From tblcollege WHERE Collegeid='".$roweducation['Collegeid']."' ";
                                                                $resultcollege=mysqli_query($con,$college) or die(mysqli_error($con));
                                                                $rowcollege=mysqli_fetch_array($resultcollege);
                                                                if(mysqli_num_rows($resultcollege)>0)
                                                                {
                                                            ?>
                                                                    <small>College: <?php echo $rowcollege['CollegeName']; ?></small><br>
                                                            <?php
                                                                }

                                                                $university="SELECT * From tbuniversity WHERE Universityid='".$roweducation['Universityid']."' ";
                                                                $resultuni=mysqli_query($con,$university) or die(mysqli_error($con));
                                                                $rowuni=mysqli_fetch_array($resultuni);
                                                                if(mysqli_num_rows($resultuni)>0)
                                                                {
                                                            ?>                               
                                                                    <small>University: <?php echo $rowuni['UniversityName']; ?></small><br>
                                                            <?php
                                                                }
                                                            ?>
                                                                <small>Percentage: <?php echo $roweducation['Percentage']; ?></small><br>
                                                                <small>Passout: <?php echo $roweducation['Year']; ?> </small><br>
                                                            </div>
                                                        </div>
                                                        <br>
                                        <?php
                                                    }
                                                }
                                            }
                                        ?>

                                    <!-- End Display Education Details -->

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