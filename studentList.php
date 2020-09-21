<?php 
    include_once("DbConnection.php");
?>

<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php include_once('cssLinks.php');?>
        <title>Student List</title>
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
                <?php
                        $StudentList="SELECT * from tblregister where Usertype='Student' ";
                        $Execute_List_student=mysqli_query($con,$StudentList)or die(mysqli_error($con));
                        if($Execute_List_student->num_rows!=0)
                            {
                                while($row_StudList=$Execute_List_student->fetch_array())
                                {
                                    $SFnm = $row_StudList['Fname'];
                                    $SLnm = $row_StudList['Lname'];
                                    $Sjoinyr = $row_StudList['JoinYear'];
                                    $Spassyr = $row_StudList['PassYear'];
                                    $Scourse = $row_StudList['Cousreid'];
                                    $Sdept = $row_StudList['Deptid'];

                                    
                                
                    ?>

                    <div class="col-sm-6 col-lg-3">
                        <div class="profile-item wow fadeInUp" data-wow-delay=".3s">
                            <img src="assets/img/home-1/profile/1.jpg" alt="Profile">
                            <div class="profile-inner">
                                <h3><?php echo $SFnm; ?> <?php echo $SLnm; ?></h3>
                                <span><?php echo $Sjoinyr; ?>-<?php echo $Spassyr; ?></span>
                                <?php 
                                    $stu_courseQry = "SELECT * from tblcourse where Courseid=$Scourse";
                                    $stu_course_exe = mysqli_query($con,$stu_courseQry) or die(mysqli_error($con));
                                    $stu_select_course = mysqli_fetch_array($stu_course_exe);
                                    $stu_courseName = $stu_select_course['CourseName'];
                                ?>
                                <span><?php echo $stu_courseName; ?></span>
                                <?php
                                     
                                    $stu_ddeptQry = "SELECT * from tbldepartment where Deptid=$Sdept";
                                    $stu_dept_exe = mysqli_query($con,$stu_ddeptQry) or die(mysqli_error($con));
                                    $stu_select_dept = mysqli_fetch_array($stu_dept_exe);
                                    $stu_deptName = $stu_select_dept['DeptName'];
                                
                                ?>
                                <span><?php echo $stu_deptName; ?></span>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    }
                    ?>
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