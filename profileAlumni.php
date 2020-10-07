<?php
    include_once("DbConnection.php");

    /*Basic Information*/
    if(isset($_POST['btnsubmit']))
    {
        $update="UPDATE tblregister set Fname='".$_POST['txtfname']."',Lname='".$_POST['txtlname']."',Phone='".$_POST['txtphone']."',Email='".$_POST['txtemail']."',Dob='".$_POST['txtdob']."',Gender='".$_POST['gender']."',About='".$_POST['your_message']."',ProfilePic='".$_POST['userpic']."' WHERE Uid='".$_SESSION['UserID']."'";
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
    /*Basic Information*/
    if(isset($_POST['membersubmit']))
    {
        $userid=$_SESSION['UserID'];
        $class=$_POST['ddclass'];
        $board=$_POST['ddboard'];
        $college=$_POST['ddcollege'];
        $university=$_POST['dduniversity'];
        $course=$_POST['ddcourse'];
        $spec=$_POST['txtspe'];
        $per=$_POST['txtper'];
        $pyear=$_POST['txtpyear'];
        $is=1;
        
        $edu="INSERT into tbleducation(Classid,Boardid,Universityid,Collegeid,Courseid,Specialization,Percentage,Year,IsActive,Uid)
        values($class,$board,$university,$college,$course,'$spec',$per,'$pyear',$is,$userid)";
        $exe=mysqli_query($con,$edu);

        if($exe)
        {
            echo '<script type="text/javascript">alert("Data inserted successfully...");</script>';
        }
        else
        {
            echo "error".mysqli_error($con);
        }
    }
    if(isset($_POST['btnwork']))
    {
        $userid=$_SESSION['UserID'];
        $insert="INSERT into tblwork(Designation,Oragnisation,CurrentComp,JoinDate,LeavingDate,Experience,Uid,IsActive)
        values('".$_POST['dddes']."','".$_POST['txtorg']."','".$_POST['comp']."','".$_POST['txtsyear']."',
        '".$_POST['txtlyear']."','".$_POST['your_message']."',$userid,1)";
        $exe=mysqli_query($con,$insert);

        if($exe)
        {
            echo '<script type="text/javascript">alert("Data inserted successfully...");</script>';
        }
        else
        {
            echo "error".mysqli_error($con);
        }
    }
    if(isset($_POST['btnskill']))
    {
        $userid=$_SESSION['UserID'];
        $insert="INSERT into tbluserskill(Skillid,Uid,IsActive)
        values('".$_POST['ddskill']."',$userid,1)";
        $exe=mysqli_query($con,$insert);

        if($exe)
        {
            echo '<script type="text/javascript">alert("Data inserted successfully...");</script>';
        }
        else
        {
            echo "error".mysqli_error($con);
        }
    }
    if(isset($_POST['btnpwd']))
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
        <title>Alumni Profile</title>
        <style>
            small {
                color: black;
            } 
        </style>

        <!-- javascript validation start  -->
        <script type="text/javascript">
            function validate()
            {
                var fname = document.forms["myform"]["txtfname"].value;
                var lname = document.forms["myform"]["txtlname"].value;
                var email = document.forms["myform"]["txtemail"].value;
                var phone = document.forms["myform"]["txtphone"].value;
                var dob = document.forms["myform"]["txtdob"].value;
                var gen = document.forms["myform"]["gender"].value;
                var msg = document.forms["myform"]["your_message"].value;

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
                if(email == ""){
                    document.getElementById('emailspan').innerHTML =" ** Please enter your email";
                    return false;
                }else{
                    document.getElementById('emailspan').innerHTML ="";

                }
                if(email.indexOf('@') <= 0){
                    document.getElementById('emailspan').innerHTML =" ** @ Invalid Position";
                    return false;
                }
                if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.'))
                {
                    document.getElementById('emailspan').innerHTML =" ** . Invalid Position";
                    return false;
                }
                if(phone == ""){
                    document.getElementById('phonespan').innerHTML =" ** Please enter phone number";
                    return false;
                }else{
                    document.getElementById('phonespan').innerHTML ="";

                }
                if (phone.length!=10) {
                    document.getElementById('phonespan').innerHTML =" ** Mobile number must be 10 digits only.";
                    return false;
                }
                if (isNaN(phone)) {
                    document.getElementById('phonespan').innerHTML =" ** User must write digits only not characters.";
                    return false;
                }
                if(dob == 0){
                    document.getElementById('dobspan').innerHTML =" ** Please enter your DOB";
                    return false;
                }else{
                    document.getElementById('dobspan').innerHTML ="";

                }
                if(gen == 0){
                    document.getElementById('genspan').innerHTML =" ** Please select gender";
                    return false;
                }else{
                    document.getElementById('genspan').innerHTML ="";

                }
                if(msg == ""){
                    document.getElementById('msgspan').innerHTML =" ** Please enter your message";
                    return false;
                }else{
                    document.getElementById('msgspan').innerHTML ="";

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
            function validateEduPop()
            {
                var clas = document.forms["edupopform"]["ddclass"].value;
                var spe = document.forms["edupopform"]["txtspe"].value;
                var per = document.forms["edupopform"]["txtper"].value;
                var pyear = document.forms["edupopform"]["txtpyear"].value;

                if(clas == ""){
                    document.getElementById('eduspan').innerHTML =" ** Please enter current password";
                    return false;
                }else{
                    document.getElementById('eduspan').innerHTML ="";

                }
                if(spe == ""){
                    document.getElementById('spespan').innerHTML =" ** Please enter current password";
                    return false;
                }else{
                    document.getElementById('spespan').innerHTML ="";

                }
                if(per == ""){
                    document.getElementById('perspan').innerHTML =" ** Please enter current password";
                    return false;
                }else{
                    document.getElementById('perspan').innerHTML ="";

                }
                if(pyear == ""){
                    document.getElementById('datespan').innerHTML =" ** Please enter current password";
                    return false;
                }else{
                    document.getElementById('datespan').innerHTML ="";

                }
                return true;
            } 
        </script> 
        <!--javascript validation ends  -->

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
        <div class="page-title-area" style= "height:350px;">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-text">
                            <h2>Profile</h2>
                            <ul>
                                <li>
                                    <a href="homepage.php">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Dashboard -->
        <div class="container" style="margin-top:80px;">
            <?php
                $uid=$_SESSION['UserID'];
                $select="SELECT * from tblregister WHERE Uid=$uid";
                $exe=mysqli_query($con,$select);
                $fetch=mysqli_fetch_array($exe);
                $fname=$fetch['Fname'];
                $lname=$fetch['Lname'];
                $email=$fetch['Email'];
                $phone=$fetch['Phone'];
                $dob=$fetch['Dob'];
                $gender=$fetch['Gender'];
                $about=$fetch['About'];
                $profile=$fetch['ProfilePic'];
                /*$dept=$fetch['Deptid'];
                $course=$fetch['Cousreid'];
                $jyear=$fetch['JoinYear'];
                $pyear=$fetch['PassYear'];*/

                if($profile=="" || !file_exists("Uploaded/Images/$profile"))
                {
                    $profile="blog1.JFIF";
                }
            ?>
            <form method="POST" name="myform">
                <!-- {% comment %}START BASIC INFORMATION {% endcomment %} -->
                <div class="create-information">
                    <h3>Basic Information</h3>
                    <div class="create-information-btn">
                        <a href="#">  
                            <img src="Uploaded/Images/<?php echo $profile; ?>" class="avatar-img rounded" alt="...">
                        </a>
                        <div class="media-body" style="float:right; margin-right:40%;">
                            <input type="file" name="userpic" class="btn btn-sm dz-clickable">
                            <?php
                                if($profile!="blog1.JFIF")
                                {
                            ?>
                            <p style="color:red;"><?php echo $profile; ?></p>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="txtfname" value="<?php echo $fname; ?>" class="form-control" placeholder="">
                                <span id="fnamespan" style="color: red"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="txtlname" value="<?php echo $lname; ?>" class="form-control" placeholder="">
                                <span id="lnamespan" style="color: red"></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="txtemail" value="<?php echo $email; ?>" class="form-control" placeholder="">
                                <span id="emailspan" style="color: red"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" name="txtphone" value="<?php echo $phone; ?>" class="form-control" placeholder="">
                                <span id="phonespan" style="color: red"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" name="txtdob" value="<?php echo $dob; ?>" class="form-control" placeholder="">
                                <span id="dobspan" style="color: red"></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="gender-area">
                                    <span>Gender</span>
                                    <?php
                                        if($gender=="Male")
                                        {
                                    ?>
                                    <input type="radio" name="gender" value="Male" id="male" checked="true">
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                    <input type="radio" name="gender" id="male" value="Male">
                                    <?php
                                        }
                                    ?>
                                    <label for="male">Male</label>
                                    <?php
                                        if($gender=="Female")
                                        {
                                    ?>
                                    <input type="radio" name="gender" id="female" value="Female" checked="true">
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                    <input type="radio" name="gender" id="female" value="Female">
                                    <?php
                                        }
                                    ?>
                                    <label for="female">Female</label>
                                    <?php
                                        if($gender=="Others")
                                        {
                                    ?>
                                    <input type="radio" name="gender" id="others" value="Others" checked="true">
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                    <input type="radio" name="gender" id="others" value="Others">
                                    <?php
                                        }
                                    ?>
                                    <label for="others">Others</label>
                                </div>
                                <span id="genspan" style="color: red"></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>About</label>
                                <textarea id="your_message" name="your_message" class="form-control" rows="8" ><?php echo $about; ?></textarea>
                                <span id="msgspan" style="color: red"></span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="btnsubmit" class="btn create-ac-btn" style="width:400px;" onclick="return validate();">Save</button>
                    </div>
                </div>
                <?php
                ?>
            </form>
                <!-- {% comment %}END BASIC INFORMATION {% endcomment %}
        
                {% comment %}START EDUCATION DETAILS{% endcomment %} -->
                <!-- <form method="post"> -->

                <div class="create-education create-education-two">
                    <div class="create-education-wrap container">
                        <div class="create-education-left">
                            <h3>Education Details</h3>
                        </div>
                        <div class="create-education-right">
                            <a href="#" data-toggle="modal" data-target="#EducationDetails">Add Education</a>
                        </div>

                        <!--Start Education popup -->
                        <div class="modal fade post-job-item" id="EducationDetails">
                            <div class="modal-dialog">
                                <div class="modal-content" style="width:100%;">
                                    <form method="post" action="" enctype="multipart/form-data" name="edupopform">
                                        <!--Start Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Education Details</h4>
                                        </div>
                                        <!--End Modal Header -->
                                        <!--Start Modal body -->
                                        <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Education</label>
                                                    <!-- <input type="text" class="form-control" placeholder="Under Graduate"> -->
                                                    <div class="job-category-area" >
                                                        <select name="ddclass">
                                                            <option style="font-size: 16px;" value="0" disabled selected>--Select--</option>
                                                            <?php 
                                                                $select_class="SELECT * from tblclass";
                                                                $Execute_select_class=mysqli_query($con,$select_class)or die(mysqli_error($con));
                                                                while($fetch_class=mysqli_fetch_array($Execute_select_class))
                                                                {

                                                                ?>  
                                                                <option style="font-size: 14px;" value = "<?php echo $fetch_class['Classid'];?>"><?php echo $fetch_class['ClassName'];?></option>
                                                                <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <span id="eduspan" style="color: red"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Board</label>
                                                    <!-- <input type="text" class="form-control" placeholder="Under Graduate"> -->
                                                    <div class="job-category-area">
                                                        <select name="ddboard">
                                                            <option style="font-size: 16px;" value="0" selected>--Select--</option>
                                                            <?php 
                                                                $select_board="SELECT * from tblboard";
                                                                $Execute_select_board=mysqli_query($con,$select_board)or die(mysqli_error($con));
                                                                while($fetch_board=mysqli_fetch_array($Execute_select_board))
                                                                {

                                                                ?>  
                                                                <option style="font-size: 14px;" value = "<?php echo $fetch_board['Boardid'];?>"><?php echo $fetch_board['BoardName'];?></option>
                                                                <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>College</label>
                                                    <!-- <input type="text" class="form-control" placeholder="Under Graduate"> -->
                                                    <div class="job-category-area" >
                                                        <select name="ddcollege">
                                                            <option style="font-size: 16px;" value="0" selected>--Select--</option>
                                                            <?php 
                                                                $select_college="SELECT * from tblcollege";
                                                                $Execute_select_college=mysqli_query($con,$select_college)or die(mysqli_error($con));
                                                                while($fetch_college=mysqli_fetch_array($Execute_select_college))
                                                                {

                                                                ?>  
                                                                <option style="font-size: 14px;" value = "<?php echo $fetch_college['Collegeid'];?>"><?php echo $fetch_college['CollegeName'];?></option>
                                                                <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>University</label>
                                                    <!-- <input type="text" class="form-control" placeholder="Under Graduate"> -->
                                                    <div class="job-category-area" >
                                                        <select name="dduniversity">
                                                            <option style="font-size: 16px;" value="0" selected>--Select--</option>
                                                            <?php 
                                                                $select_uni="SELECT * from tbuniversity";
                                                                $Execute_select_uni=mysqli_query($con,$select_uni)or die(mysqli_error($con));
                                                                while($fetch_uni=mysqli_fetch_array($Execute_select_uni))
                                                                {

                                                                ?>  
                                                                <option style="font-size: 14px;" value = "<?php echo $fetch_uni['Universityid'];?>"><?php echo $fetch_uni['UniversityName'];?></option>
                                                                <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Course</label>
                                                    <!-- <input type="text" class="form-control" placeholder="Under Graduate"> -->
                                                    <div class="job-category-area" >
                                                        <select name="ddcourse">
                                                            <option style="font-size: 16px;" value="0" selected>--Select--</option>
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
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Specialization</label>
                                                    <input type="text" name="txtspe" class="form-control" placeholder="MIT WPU">
                                                    <span id="spespan" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Percentage(Out of 100)</label>
                                                    <input type="text" name="txtper" class="form-control" placeholder="85">
                                                    <span id="perspan" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Passing Year</label>
                                                    <input type="date" name="txtpyear" class="form-control" placeholder="2021">
                                                    <span id="datespan" style="color: red"></span>
                                                </div>
                                            </div>  
                                        </div>
                                        </div>
                                        <!--End Modal body -->
                                        <!--Start Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" name="membersubmit" class="btn btn-success" style="width:45%;" 
                                            onclick="return validateEduPop();">Save</button>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:45%;">Close</button>
                                        </div>
                                        <!--End Modal footer -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--End education popup -->
                    </div>
                    <?php
                        $seleducation="SELECT * From tbleducation WHERE Uid='".$_SESSION['UserID']."' ORDER BY Classid";
                        $resulteducation=mysqli_query($con,$seleducation) or die(mysqli_error($con));
                        if(mysqli_num_rows($resulteducation)>0)
                        {
                            while($roweducation=mysqli_fetch_array($resulteducation))
                            {
                                if ($roweducation['Classid']==1 || $roweducation['Classid']==2) 
                                {
                    ?>
                                    <div class="card" style="width:60%;">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-11">
                                        <?php
                                            $class="SELECT * From tblclass WHERE Classid='".$roweducation['Classid']."' ";
                                            $resultclass=mysqli_query($con,$class) or die(mysqli_error($con));
                                            $rowclass=mysqli_fetch_array($resultclass);
                                            if(mysqli_num_rows($resultclass)>0)
                                            {
                                        ?>
                                                    <h5><?php echo $rowclass['ClassName']; ?></h5>
                                        <?php
                                            }
                                        ?>
                                                </div>
                                                <div class="col-lg-1">
                                                    <a href="education_delete.php?eduid=<?php echo $roweducation['Educationid'];?> ">
                                                        <i class='fas fa-trash-alt'></i>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php
                                            $board="SELECT * From tblboard WHERE Boardid='".$roweducation['Boardid']."' ";
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
                                    <div class="card" style="width:60%;">
                                        <div class="container">
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
                                                    <h5><?php echo $rowclass['ClassName']; ?>(<?php echo $rowcourse['CourseName']; ?>)</h5>
                                        <?php
                                                }
                                            }
                                        ?>
                                                </div>
                                                <div class="col-lg-1">
                                                    <a href="education_delete.php?eduid=<?php echo $roweducation['Educationid']; ?>">
                                                        <i class='fas fa-trash-alt'></i>
                                                    </a>
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
                                
                </div>                
                <!-- </form> -->

                <!-- {% comment %}END EDUCATION DETAILS{% endcomment %}

                {% comment %}START WORK EXPERIENCE DETAILS{% endcomment %} -->
                <div class="create-education create-education-two">
                    <div class="create-education-wrap">
                        <div class="create-education-left">
                            <h3>Work Experience</h3>
                        </div>
                        <div class="create-education-right">
                            <a href="#" data-toggle="modal" data-target="#WorkDetails">Add Work Experience</a>
                        </div>
                        <!--Start WorkDetails popup -->
                        <div class="modal fade post-job-item" id="WorkDetails">
                            <div class="modal-dialog">
                                <div class="modal-content" style="width:100%;">
                                    <form method="post" action="" enctype="multipart/form-data" name="workform">
                                        <!--Start Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Work Experience</h4>
                                        </div>
                                        <!--End Modal Header -->
                                        <!--Start Modal body -->
                                        <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Your Designation</label>
                                                    <!-- <input type="text" class="form-control" placeholder="Under Graduate"> -->
                                                    <div class="job-category-area" >
                                                        <select name="dddes">
                                                            <option style="font-size: 16px;" value="0" disabled selected>--Select--</option>
                                                            <?php 
                                                                $select_des="SELECT * from tbldesignation";
                                                                $Execute_select_des=mysqli_query($con,$select_des)or die(mysqli_error($con));
                                                                while($fetch_des=mysqli_fetch_array($Execute_select_des))
                                                                {

                                                                ?>  
                                                                <option style="font-size: 14px;" value = "<?php echo $fetch_des['Desigid'];?>"><?php echo $fetch_des['DesigName'];?></option>
                                                                <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Specialization</label>
                                                    <input type="text" name="txtorg" class="form-control" placeholder="MIT WPU">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Is this your current company?</label>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <!-- <input type="text" name="txtspe" class="form-control" placeholder="MIT WPU"> -->
                                                    <input type="radio" name="comp" value="Yes" id="yes">
                                                    <label>Yes</label>&nbsp;&nbsp;
                                                    <input type="radio" name="comp" value="No" id="no">
                                                    <label>No</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Started Working From</label>
                                                    <input type="date" name="txtsyear" class="form-control">
                                                </div>
                                            </div>  
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Worked Till</label>
                                                    <input type="date" name="txtlyear" class="form-control">
                                                </div>
                                            </div>  
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Your Experience</label>
                                                    <textarea id="your_message" name="your_message" class="form-control" rows="8" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!--End Modal body -->
                                        <!--Start Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" name="btnwork" class="btn btn-success" style="width:45%;">Save</button>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:45%;">Close</button>
                                        </div>
                                        <!--End Modal footer -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--End WorkDetails popup -->
                    </div> 

                    <?php
                        $sel="SELECT d.DesigName,w.Oragnisation,w.JoinDate,w.LeavingDate,w.Experience from tblwork AS w,tbldesignation AS d WHERE w.Designation=d.Desigid AND w.IsActive=1";
                        $exe=mysqli_query($con,$sel);

                        if($exe->num_rows>0)
                        {
                            while($data=$exe->fetch_array())
                            {
                                $des=$data['DesigName'];
                                $org=$data['Oragnisation'];
                                $sdate=$data['JoinDate'];
                                $ldate=$data['LeavingDate'];
                                $exp=$data['Experience'];
                    ?>
                    <div class="card">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5><?php echo $des; ?>, <?php echo $org; ?></h5>
                                </div>
                                <!-- <div class="col-lg-2">
                                    <a href="#">
                                        <i class='fas fa-edit'></i>
                                    </a>&times;
                                    <a href="#" data-toggle="modal" data-target="#deletepopup">
                                        <i class='fas fa-trash-alt'></i>
                                    </a>
                                </div> -->
                            </div>                            
                            <small>Starting Date: <?php echo $sdate; ?></small>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <small>Worked Till: <?php echo $ldate; ?></small>
                            <br>
                            <small>About: <?php echo $exp; ?>
                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                ------------------------------------------------------------------------------------
                            </small>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <!-- {% comment %}END WORK EXPERIENCE DETAILS{% endcomment %}

                {% comment %}START SKILLS{% endcomment %} -->
                <div class="create-skills"> 
                    <div class="create-skills-wrap">
                        <div class="create-skills-left">
                            <h3>Skill</h3>
                        </div>
                        <div class="create-skills-right">
                            <a href="#" data-toggle="modal" data-target="#AddSkills">Add Skill</a>
                        </div>
                        <!--Start Add skills popup -->
                    <form method="post" name="skillform">
                        <div class="modal fade post-job-item" id="AddSkills">
                            <div class="modal-dialog">
                                <div class="modal-content" style="width:100%;">
                                    <form method="post" action="" enctype="multipart/form-data" name="workform">
                                        <!--Start Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Skill</h4>
                                        </div>
                                        <!--End Modal Header -->
                                        <!--Start Modal body -->
                                        <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Skill</label>
                                                    <!-- <input type="text" class="form-control" placeholder="Under Graduate"> -->
                                                    <div class="job-category-area" >
                                                        <select name="ddskill">
                                                            <option style="font-size: 16px;" value="0" disabled selected>--Select--</option>
                                                            <?php 
                                                                $select_skill="SELECT * from tblskill";
                                                                $Execute_select_skill=mysqli_query($con,$select_skill)
                                                                or die(mysqli_error($con));
                                                                while($fetch_skill=mysqli_fetch_array($Execute_select_skill))
                                                                {

                                                                ?>  
                                                                <option style="font-size: 14px;" value = "<?php echo $fetch_skill['Skillid'];?>"><?php echo $fetch_skill['SkillName'];?></option>
                                                                <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!--End Modal body -->
                                        <!--Start Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" name="btnskill" class="btn btn-success" style="width:45%;">Save</button>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:45%;">Close</button>
                                        </div>
                                        <!--End Modal footer -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--End add Skills popup -->
                    </div>

                    <!-- {% comment %} Start Div to display data {% endcomment %} -->
                    <?php
                        $sel="SELECT s.SkillName from tbluserskill AS us,tblskill AS s WHERE s.Skillid=us.Skillid AND us.IsActive=1";
                        $res=mysqli_query($con,$sel);

                        if($res->num_rows>0)
                        {
                            while($data=$res->fetch_array())
                            {
                                $sname=$data['SkillName'];
                    ?>
                    <div class="card" style="width:380px;">
                        <div class="container">    
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5><?php echo $sname; ?></h5>
                                </div>
                                <!-- <div class="col-lg-2">
                                    <a href="#" data-toggle="modal" data-target="#deletepopup">
                                        <i class='fas fa-trash-alt'></i>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php
                        }
                    }
                    ?>
                    <!-- {% comment %} End Div to display data {% endcomment %} -->

                </div>
                <!-- {% comment %}END SKILLS{% endcomment %}

                {% comment %}START CHANGE PASSWORD{% endcomment %} -->
            <form method="post" name="pwdform" enctype="multipart/form-data">
                <div class="create-skills">
                    <div class="create-skills-wrap">
                        <div class="create-skills-left">
                            <h3>Change Password</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Old Password</label>
                                <input type="password" name="txtpwd" class="form-control">
                                <span id="pwdspan" style="color: red"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="txtnpwd" class="form-control">
                                <span id="npwdspan" style="color: red"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Confirm New Password</label>
                                <input type="password" name="txtcnfpwd" class="form-control">
                                <span id="cnfpwdspan" style="color: red"></span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="btnpwd" class="btn create-ac-btn" style="width:400px;" onclick="return validatePwd();">Save</button>
                    </div>
                </div>
            </form>
                <!-- {% comment %}END CHANGE PASSWORD{% endcomment %} -->
            </form>
        </div>
        <!-- End Dashboard -->

        <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->


        <!-- Start scripts -->
        <?php include_once('scriptsLinks.php');?> 
        <!-- End scripts -->

    </body>
</html>