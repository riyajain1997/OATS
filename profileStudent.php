<?php
    include_once("DbConnection.php");

    if(isset($_POST['btnsubmit']))
    {
        $update="UPDATE tblregister set Fname='".$_POST['txtfname']."',Lname='".$_POST['txtlname']."',Phone='".$_POST['txtphone']."',PrnEmpno='".$_POST['txtprnno']."',Deptid='".$_POST['Departmentdropdown']."',Cousreid='".$_POST['Coursedropdown']."',JoinYear='".$_POST['txtjyear']."',PassYear='".$_POST['txtpyear']."' WHERE Uid='".$_SESSION['UserID']."'";
        $exe=mysqli_query($con,$update);

        if($exe)
        {
            echo '<script type="text/javascript">alert("Profile updated successfully...");</script>';
            /*header("Location:blog.php");*/
        }
        else
        {
            echo "error".mysqli_error($con);
        }
    }

    if(isset($_POST['btncngpwd']))
    {
        $pwd=$_POST['txtpwd'];
        $npwd=$_POST['txtnpwd'];
        $cnfpwd=$_POST['txtcnfpwd'];

        $select="SELECT * from tblregister WHERE Uid='".$_SESSION['UserID']."'";
        $exe=mysqli_query($con,$select);
        $data=mysqli_fetch_array($exe);

        $pwd1=$data['Password'];
        if($pwd1==$pwd)
        {
            if($npwd==$cnfpwd)
            {
                $update="UPDATE tblregister set Password=$npwd WHERE Uid='".$_SESSION['UserID']."'";
                $exe=mysqli_query($con,$update);
                
                echo '<script type="text/javascript">alert("Password changed successfully");</script>';          
            }
            else
            {
                echo '<script type="text/javascript">alert("Invalid New or Confirm Password!...");</script>';       
            }
        }
        else
        {
            echo '<script type="text/javascript">alert("Invalid Current Password!...");</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php include_once('cssLinks.php');?>

        <!-- javascript validation start  -->
        <script type="text/javascript">
            function validate()
            {
                var fname = document.forms["myform"]["txtfname"].value;
                var lname = document.forms["myform"]["txtlname"].value;
                var phone = document.forms["myform"]["txtphone"].value;
                var prnno = document.forms["myform"]["txtprnno"].value;
                var dept = document.forms["myform"]["Departmentdropdown"].value;
                var course = document.forms["myform"]["Coursedropdown"].value;
                var jyear = document.forms["myform"]["txtjyear"].value;
                var pyear = document.forms["myform"]["txtpyear"].value;

                if(fname == ""){
                    document.getElementById('fnamespan').innerHTML =" ** Please enter first name";
                    return false;
                }else{
                    document.getElementById('fnamespan').innerHTML ="";

                }
                if(lname == ""){
                    document.getElementById('lnamespan').innerHTML =" ** Please enter last name";
                    return false;
                }else{
                    document.getElementById('lnamespan').innerHTML ="";

                }
                if(phone == ""){
                    document.getElementById('phonespan').innerHTML =" ** Please enter phone number";
                    return false;
                }else{
                    document.getElementById('phonespan').innerHTML ="";

                }
                if(prnno == ""){
                    document.getElementById('prnspan').innerHTML =" ** Please enter employee number";
                    return false;
                }else{
                    document.getElementById('prnspan').innerHTML ="";

                }
                if(dept == 0){
                    document.getElementById('deptspan').innerHTML =" ** Please select department";
                    return false;
                }else{
                    document.getElementById('deptspan').innerHTML ="";

                }
                if(course == 0){
                    document.getElementById('coursespan').innerHTML =" ** Please select course";
                    return false;
                }else{
                    document.getElementById('coursespan').innerHTML ="";

                }
                if(jyear == ""){
                    document.getElementById('jyearspan').innerHTML =" ** Please enter joining year";
                    return false;
                }else{
                    document.getElementById('jyearspan').innerHTML ="";

                }
                if(pyear == ""){
                    document.getElementById('pyearspan').innerHTML =" ** Please enter passing year";
                    return false;
                }else{
                    document.getElementById('pyearspan').innerHTML ="";

                }
                return true;
            }

            function validatePwd()
            {
                var pwd = document.forms["pwdform"]["txtpwd"].value;
                var npwd = document.forms["pwdform"]["txtnpwd"].value;
                var cnfpwd = document.forms["pwdform"]["txtcnfpwd"].value;

                if(pwd == ""){
                    document.getElementById('pwdspan').innerHTML =" ** Please enter current password";
                    return false;
                }else{
                    document.getElementById('pwdspan').innerHTML ="";

                }
                if(npwd == ""){
                    document.getElementById('npwdspan').innerHTML =" ** Please enter new password";
                    return false;
                }else{
                    document.getElementById('npwdspan').innerHTML ="";

                }
                if(cnfpwd == ""){
                    document.getElementById('cnfpwdspan').innerHTML =" ** Please enter confirm password";
                    return false;
                }else{
                    document.getElementById('cnfpwdspan').innerHTML ="";

                }
                return true;
            } 
        </script> 
        <!--javascript validation ends  -->
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
                            <h2>Student Profile</h2>
                            <ul>
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Student Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Dashboard -->
        <div class="dashboard-area pt-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="dashboard-img">
                            <img src="assets/img/dashboard/1.jpg" alt="Dashboard">
                            <h3>Aikin Ward</h3>
                            <p>UX/UI Designer</p>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="dashboard-nav">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">My Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Change Password</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="create-information">
                            <?php
                                $uid=$_SESSION['UserID'];
                                $select="SELECT * from tblregister WHERE Uid=$uid";
                                $exe=mysqli_query($con,$select);
                                $fetch=mysqli_fetch_array($exe);

                                $fname=$fetch['Fname'];
                                $lname=$fetch['Lname'];
                                $phone=$fetch['Phone'];
                                $prnno=$fetch['PrnEmpno'];
                                $dept=$fetch['Deptid'];
                                $course=$fetch['Cousreid'];
                                $jyear=$fetch['JoinYear'];
                                $pyear=$fetch['PassYear'];
                            ?>
                            <form method="POST" name="myform" enctype="multipart/form-data">
                                <h3>Basic Information</h3>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>First Name:</label>
                                            <input type="text" name="txtfname" value="<?php echo $fname; ?>" class="form-control" placeholder="Aikin">
                                            <span id="fnamespan" style="color: red"></span>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Last Name:</label>
                                            <input type="text" name="txtlname" value="<?php echo $lname; ?>" class="form-control" placeholder="Ward">
                                            <span id="lnamespan" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Contact:</label>
                                            <input type="text" name="txtphone" value="<?php echo $phone; ?>" class="form-control" placeholder="7800045231">
                                            <span id="phonespan" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>PRN No:</label>
                                            <input type="text" name="txtprnno" value="<?php echo $prnno; ?>" class="form-control" placeholder="1042895673">
                                            <span id="prnspan" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Department</label>
                                            <div class="job-category-area">
                                                <select name = "Departmentdropdown" class="form-control">

                                                        <?php 
                                                            $deptQry = "SELECT * from tbldepartment where Deptid=$dept";
                                                            $dept_exe = mysqli_query($con,$deptQry) or die(mysqli_error($con));
                                                            $select_dept = mysqli_fetch_array($dept_exe);
                                                            $deptName = $select_dept['DeptName'];
                                                        ?>

                                                        <option style="font-size: 16px;" value="<?php echo $dept; ?>" disabled selected><?php echo $deptName; ?></option>
                                                        <?php 
                                                            $select_sdept="SELECT * from tbldepartment";
                                                            $Execute_select_sdept=mysqli_query($con,$select_sdept)or die(mysqli_error($con));
                                                            while($fetch_sdept=mysqli_fetch_array($Execute_select_sdept))
                                                            {

                                                        ?>
                                                                <option style="font-size: 14px;" value = "<?php echo $fetch_sdept['Deptid'];?>"><?php echo $fetch_sdept['DeptName'];?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                </select>
                                                <span id="deptspan" style="color: red"></span>
                                            </div>
                                            
                                        </div>
                                    </div>



                                    <!-- <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Department:</label>
                                            <div class="job-category-area">
                                                    <select name="Departmentdropdown">
                                                        <option style="font-size: 16px;" value="0" disabled selected>--Select--</option>
                                                        <?php 
                                                            $select_sdept="SELECT * from tbldepartment";
                                                            $Execute_select_sdept=mysqli_query($con,$select_sdept)or die(mysqli_error($con));
                                                            while($fetch_sdept=mysqli_fetch_array($Execute_select_sdept))
                                                            {

                                                        ?>
                                                                <option style="font-size: 14px;" value = "<?php echo $fetch_sdept['Deptid'];?>"><?php echo $fetch_sdept['DeptName'];?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                    <span id="deptspan" style="color: red"></span>
                                                </div>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Course:</label>
                                            <div class="job-category-area">
                                                    <select name="Coursedropdown">
                                                        <option style="font-size: 16px;" value="0" disabled selected>--Select--</option>
                                                        <?php 
                                                            $select_course="SELECT * from tblcourse";
                                                            $Execute_select_course=mysqli_query($con,$select_course)or die(mysqli_error($con));
                                                            while($fetch_course=mysqli_fetch_array($Execute_select_course))
                                                            {

                                                        ?>
                                                                <option style="font-size: 14px;" value = "<?php echo $fetch_course['Courseid'];?>"><?php echo $fetch_course['CourseName'];?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                    <span id="coursespan" style="color: red"></span>
                                                </div>
                                        </div>
                                        </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Joining Year:</label>
                                            <input type="text" name="txtjyear" value="<?php echo $jyear; ?>" class="form-control" 
                                            placeholder="2018">
                                            <span id="jyearspan" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Passing Year:</label>
                                            <input type="text" name="txtpyear" value="<?php echo $pyear; ?>" class="form-control" placeholder="2021">
                                            <span id="pyearspan" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-left">
                                    <button type="submit" name="btnsubmit" class="btn create-ac-btn" onclick="return validate();">Save</button>
                                </div>
                            </form>
                            <?php
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="change-password-area">
                            <h2>Change Your Password</h2>
                            <form method="POST" name="pwdform" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Current Password:</label>
                                    <input type="password" name="txtpwd" class="form-control">
                                    <span id="pwdspan" style="color: red"></span>
                                </div>
                                <div class="form-group">
                                    <label>New Password:</label>
                                    <input type="password" name="txtnpwd" class="form-control">
                                    <span id="npwdspan" style="color: red"></span>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password:</label>
                                    <input type="password" name="txtcnfpwd" class="form-control">
                                    <span id="cnfpwdspan" style="color: red"></span>
                                </div>
                                <div class="text-left">
                                    <button type="submit" name="btncngpwd" class="btn change-pass-btn" onclick="return validatePwd();">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="dashboard-saved-job">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="job-item wow fadeInUp" data-wow-delay=".3s">
                                        <img src="assets/img/home-1/jobs/1.png" alt="Job">
                                        <div class="job-inner align-items-center">
                                            <div class="job-inner-left">
                                                <h3>UI/UX Designer</h3>
                                                <a href="company-details.html">Winbrans.com</a>
                                                <ul>
                                                    <li>
                                                        <i class="icofont-money-bag"></i>
                                                        $20k - $25k
                                                    </li>
                                                    <li>
                                                        <i class="icofont-location-pin"></i>
                                                        Location 210-27 Quadra, Market Street, Victoria Canada
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="job-inner-right">
                                                <ul>
                                                    <li>
                                                        <a href="create-account.html">Apply</a>
                                                    </li>
                                                    <li>
                                                        <span>Full Time</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="job-item wow fadeInUp" data-wow-delay=".4s">
                                        <img src="assets/img/home-1/jobs/2.png" alt="Job">
                                        <div class="job-inner align-items-center">
                                            <div class="job-inner-left">
                                                <h3>Android Developer</h3>
                                                <a href="company-details.html">Infiniza.com</a>
                                                <ul>
                                                    <li>
                                                        <i class="icofont-money-bag"></i>
                                                        $20k - $25k
                                                    </li>
                                                    <li>
                                                        <i class="icofont-location-pin"></i>
                                                        Location 210-27 Quadra, Market Street, Victoria Canada
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="job-inner-right">
                                                <ul>
                                                    <li>
                                                        <a href="create-account.html">Apply</a>
                                                    </li>
                                                    <li>
                                                        <span>Part Time</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="job-item wow fadeInUp" data-wow-delay=".3s">
                                        <img src="assets/img/home-1/jobs/3.png" alt="Job">
                                        <div class="job-inner align-items-center">
                                            <div class="job-inner-left">
                                                <h3>Senior Manager</h3>
                                                <a href="company-details.html">Glovibo.com</a>
                                                <ul>
                                                    <li>
                                                        <i class="icofont-money-bag"></i>
                                                        $20k - $25k
                                                    </li>
                                                    <li>
                                                        <i class="icofont-location-pin"></i>
                                                        Location 210-27 Quadra, Market Street, Victoria Canada
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="job-inner-right">
                                                <ul>
                                                    <li>
                                                        <a href="create-account.html">Apply</a>
                                                    </li>
                                                    <li>
                                                        <span>Intern</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="job-item wow fadeInUp" data-wow-delay=".4s">
                                        <img src="assets/img/home-1/jobs/4.png" alt="Job">
                                        <div class="job-inner align-items-center">
                                            <div class="job-inner-left">
                                                <h3>Product Designer</h3>
                                                <a href="company-details.html">Bizotic.com</a>
                                                <ul>
                                                    <li>
                                                        <i class="icofont-money-bag"></i>
                                                        $20k - $25k
                                                    </li>
                                                    <li>
                                                        <i class="icofont-location-pin"></i>
                                                        Location 210-27 Quadra, Market Street, Victoria Canada
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="job-inner-right">
                                                <ul>
                                                    <li>
                                                        <a href="create-account.html">Apply</a>
                                                    </li>
                                                    <li>
                                                        <span>Part Time</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-logout" role="tabpanel" aria-labelledby="pills-logout-tab">
                        <div class="login-area dashboard-logout-area">
                            <div class="login-wrap">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="jobseeker-item">
                                            <div class="jobseeker-icon">
                                                <i class="flaticon-job-search"></i>
                                            </div>
                                            <div class="jobseeker-inner">
                                                <span>Candidate</span>
                                                <h3>Login as a Candidate</h3>
                                            </div>
                                            <a href="login.html">Get Started
                                                <i class="icofont-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="jobseeker-item">
                                            <div class="jobseeker-icon">
                                                <i class="flaticon-recruitment"></i>
                                            </div>
                                            <div class="jobseeker-inner">
                                                <span>Employer</span>
                                                <h3>Login as a Employer</h3>
                                            </div>
                                            <a href="login.html">Get Started
                                                <i class="icofont-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username, Phone Number or Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password">
                                </div>
                            </form>

                            <div class="login-sign-in">
                                <a href="#">Forgot Password?</a>
                                <ul>
                                    <li>Don’t Have Account ?</li>
                                    <li>
                                        <a href="create-account.html">Sign Up Here</a>
                                    </li>
                                </ul>
                                <div class="text-center">
                                    <button type="submit" class="btn login-btn">Sign In</button>
                                </div>
                            </div>

                            <div class="login-social">
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class="icofont-facebook"></i>
                                    Login With Facebook
                                </a>
                                <a class="login-google" href="https://mail.google.com/" target="_blank">
                                    <i class="icofont-google-plus"></i>
                                    Login With Google
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Dashboard -->

        <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->


        <!-- Start Script -->
        <?php include_once('scriptsLinks.php');?> 
        <!-- End Script -->
    </body>
</html>