<?php 
    include_once('DbConnection.php');

    if(isset($_POST['submit']))
    {
        $first=$_POST['fname'];
        $last=$_POST['lname'];
        $phone=$_POST['phone'];
        $dob=$_POST['dob'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $conpass=$_POST['conpass'];
        $gen=$_POST['gender'];
        $user=$_POST['user'];

        $sel="SELECT * FROM tblregister 
			WHERE Email='".$_REQUEST['email']."' or Phone='".$_REQUEST['phone']."' ";

        $result=mysqli_query($con,$sel) or die(mysqli_error($con));
        $row=mysqli_fetch_array($result);

        if(mysqli_num_rows($result)>0)
        {
            echo '<script type="text/javascript" id="error">alert("Registration Unsuccessful... \n Email Address or Mobile number is already in use. \n Please Register Again..");</script>';
        }

        else{

            if($user=="Student")
            {
                $Sprn=$_POST['Sprn'];
                $Sdepart=$_POST['Departmentdropdown'];
                $Scourse=$_POST['Coursedropdown'];
                $joinyear=$_POST['joinyear'];
                $passyear=$_POST['passyear'];

                $checkStud = "SELECT * FROM tblstudent
                    WHERE StudentPrn ='".$_REQUEST['Sprn']."' and StudentPassYear = '".$_REQUEST['passyear']."' ";
                
                $resultStudCheck = mysqli_query($con,$checkStud) or die(mysqli_error($con));
                $row = mysqli_fetch_array($resultStudCheck);

                if(mysqli_num_rows($resultStudCheck)>0)
                {

                    $query_student="insert into tblregister(PrnEmpno,Fname,Lname,Email,Password,Gender,Dob,Phone,Usertype,JoinYear,PassYear,Cousreid,Deptid,Desigid,About,IsActive)values($Sprn,'$first','$last','$email','$pass','$gen','$dob',$phone,'$user',$joinyear,$passyear,$Scourse,$Sdepart,0,null,1)"; 
                    $runstudent=mysqli_query($con,$query_student);

                    if($runstudent)
                    {
                        echo '<script type="text/javascript">alert("Data inserted successfully... Go to login Page...");</script>';
                    }
                    else
                    {
                        echo "error".mysqli_error($con);
                    }
                }
                else{
                    echo '<script type="text/javascript" id="error">alert("Student not present in our college \n Please Register Again..");</script>';
                }

            }
            else if($user=="Alumni")
            {
                $aprn=$_POST['Aprn'];
                $acourse=$_POST['ACoursedrop'];
                $apass=$_POST['Apassyear'];
                $adesig=$_POST['Adesignation'];
                $aorgan=$_POST['Aorganisation'];

                $checkAlumni = "SELECT * FROM tblstudent
                    WHERE StudentPrn ='".$_REQUEST['Aprn']."' and StudentPassYear = '".$_REQUEST['Apassyear']."' ";
                
                $resultAlumniCheck = mysqli_query($con,$checkAlumni) or die(mysqli_error($con));
                $row = mysqli_fetch_array($resultAlumniCheck);

                if(mysqli_num_rows($resultAlumniCheck)>0)
                {
                    $query_alumni="insert into tblregister(PrnEmpno,Fname,Lname,Email,Password,Gender,Dob,Phone,Usertype,JoinYear,PassYear,Cousreid,Deptid,Desigid,About,IsActive)values($aprn,'$first','$last','$email','$pass','$gen',$dob,$phone,'$user',0,$apass,$acourse,0,$acourse,null,1)"; 
                    $runalumni=mysqli_query($con,$query_alumni);

                    if($runalumni)
                    {
                        echo '<script type="text/javascript">alert("Data inserted successfully... Go to login Page...");</script>';
                    }
                    else
                    {
                        echo "error".mysqli_error($con);
                    }
                }

                else{
                    echo '<script type="text/javascript" id="error">alert("Alumni is not from our college \n Please Register Again..");</script>';
                }

            }
            else
            {
                $empno=$_POST['Empno'];
                $desig=$_POST['Sdesigdrop'];
                $depart=$_POST['Sdepart'];

                $checkStaff = "SELECT * FROM tblstaff
                    WHERE EmpNo ='".$_REQUEST['Empno']."' and Desigid = '".$_REQUEST['Sdesigdrop']."' ";
                
                $resultStaffCheck = mysqli_query($con,$checkStaff) or die(mysqli_error($con));
                $row = mysqli_fetch_array($resultStaffCheck);

                if(mysqli_num_rows($resultStaffCheck)>0)
                {
                    $query_staff="insert into tblregister(PrnEmpno,Fname,Lname,Email,Password,Gender,Dob,Phone,Usertype,JoinYear,PassYear,Cousreid,Deptid,Desigid,About,IsActive)values($empno,'$first','$last','$email','$pass','$gen',$dob,$phone,'$user',0,0,0,$depart,$desig,null,1)"; 
                    $runstaff=mysqli_query($con,$query_staff);

                    if($runstaff)
                    {
                        echo '<script type="text/javascript">alert("Data inserted successfully... Go to login Page...");</script>';
                    }
                    else
                    {
                        echo "error".mysqli_error($con);
                    }
                }

                else{
                    echo '<script type="text/javascript" id="error">alert("Only HOD can login....\n Please try again");</script>';
                }

            }

        }
    }
?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
    	<?php include_once('cssLinks.php');?>
        <title>Register</title>
        <script>
            function student(checked)
            {
                if(checked==true)
                {
                    $("#studentform").fadeIn();
                    $("#alumniform").fadeOut();
                    $("#staffform").fadeOut();
                }                                               
            }

            function alumni(checked)
            {
                if(checked==true)
                {
                    $("#alumniform").fadeIn();
                    $("#studentform").fadeOut();
                    $("#staffform").fadeOut();
                }
                                                    
            }

            function staff(checked)
            {
                if(checked==true)
                {
                    $("#staffform").fadeIn();
                    $("#studentform").fadeOut();
                    $("#alumniform").fadeOut();
                }
                                                    
            }
        </script>

        <!-- javascript validation start  -->
        <script type="text/javascript">
            function validate()
            {
                var fname = document.forms["myform"]["fname"].value;
                var lname = document.forms["myform"]["lname"].value;
                var phone = document.forms["myform"]["phone"].value;
                var dob = document.forms["myform"]["dob"].value;
                var email = document.forms["myform"]["email"].value;
                var pass = document.forms["myform"]["pass"].value;
                var conpass = document.forms["myform"]["conpass"].value;
                var gen = document.forms["myform"]["gender"].value;
                var user = document.forms["myform"]["user"].value;

                if(fname == ""){
                    document.getElementById('fnamespan').innerHTML =" ** Please Enter your First Name";
                    return false;
                }else{
                    document.getElementById('fnamespan').innerHTML ="";

                }
                
                if(lname == ""){
                    document.getElementById('lnamespan').innerHTML =" ** Please Enter your Last Name";
                    return false;
                }else{
                    document.getElementById('lnamespan').innerHTML ="";

                }

                if(phone == "")
                {
                    document.getElementById('phonespan').innerHTML =" ** Please Enter Mobile Number";
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

                if(dob == ""){
                    document.getElementById('dobspan').innerHTML =" ** Please Enter your DOB";
                    return false;
                }else{
                    document.getElementById('dobspan').innerHTML ="";

                }

                if(email == ""){
                    document.getElementById('emailspan').innerHTML =" ** Please fill the email";
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

                if(pass == ""){
                    document.getElementById('passspan').innerHTML =" ** Please Enter your Password";
                    return false;
                }else{
                    document.getElementById('passspan').innerHTML ="";

                }

                if(conpass == ""){
                    document.getElementById('conpassspan').innerHTML =" ** Please Enter your Password Again";
                    return false;
                }else{
                    document.getElementById('conpassspan').innerHTML ="";

                }

                if(pass != conpass){
                    document.getElementById('conpassspan').innerHTML =" ** Password Not Matching";
                    return false;
                }else{
                    document.getElementById('conpassspan').innerHTML ="";

                }

                if(gen == ""){
                    document.getElementById('genderspan').innerHTML =" ** Please Enter Correct Option";
                    return false;
                }else{
                    document.getElementById('genderspan').innerHTML ="";

                }

                if(user == ""){
                    document.getElementById('userspan').innerHTML =" ** Please Enter Correct Option";
                    return false;
                }else{
                    document.getElementById('userspan').innerHTML ="";

                }
                
                return true;
            } 
        </script> 
        <!--javascript validation ends  -->

    </head>
    <body>

        <!-- Start Navbar Area -->
        <?php include_once('header.php');?>
        <!-- End Navbar Area -->

        <!-- Page Title -->
        <div class="page-title-area" style= "height:320px;">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-text">
                            <h2>Create Account</h2>
                            <ul>
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Create Account</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Create Account -->
            <div class="container">
                <div class="create-photo">
                <br><br><br>
                    <form name="myform" method="POST" action="register.php"> 
            
                        <div class="create-information">
                            <h3>Basic Information</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="fname" id="fname" class="form-control">
                                        <span id="fnamespan" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lname" id="lname" class="form-control">
                                        <span id="lnamespan" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Contact</label>
                                        <input type="number" name="phone" id="phone" class="form-control">
                                        <span id="phonespan" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="date" name="dob" id="dob" class="form-control">
                                        <span id="dobspan" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Your Email</label>
                                        <input type="email" name="email" id="email" class="form-control">
                                        <span id="emailspan" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="pass" id="pass" class="form-control">
                                        <span id="passspan" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="conpass" id="conpass" class="form-control">
                                        <span id="conpassspan" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="gender-area">
                                            <span>Gender</span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="gender" value="Male">
                                            <label for="male">Male</label>
                                            <input type="radio" name="gender" value="Female">
                                            <label for="female">Female</label>
                                            <span id="genderspan" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="gender-area">
                                            <span>You are ?</span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="user" value="Student" onclick="student(this.checked)">
                                            <label for="student">Student</label>
                                            <input type="radio" name="user" value="Alumni" onclick="alumni(this.checked)">
                                            <label for="alumni">Alumni</label>
                                            <input type="radio" name="user" value="Staff" onclick="staff(this.checked)">
                                            <label for="staff">Staff</label>
                                            <span id="userspan" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>          
                            </div>
                        </div>

                        <div class="create-information" id="studentform" style="display: none;">
                            <h3>Student Information</h3>
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Prn No:</label>
                                        <input type="number" name="Sprn" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select name = "Departmentdropdown" class="form-control">
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
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Course</label>
                                        <select name = "Coursedropdown" class="form-control">
                                            <option style="font-size: 16px;" value="0" disabled selected>--Select--</option>
                                            <?php 
                                                $select_scourse="SELECT * from tblcourse";
                                                $Execute_select_scourse=mysqli_query($con,$select_scourse)or die(mysqli_error($con));
                                                while($fetch_scourse=mysqli_fetch_array($Execute_select_scourse))
                                                {
                                            ?>
                                                    <option style="font-size: 14px;" value = "<?php echo $fetch_scourse['Courseid'];?>"><?php echo $fetch_scourse['CourseName'];?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Joining Year</label>
                                        <input type="number" min="1950" max="2050" name="joinyear" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Passing Year</label>
                                        <input type="number" min="1950" max="2050" name="passyear" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="create-information" id="alumniform" style="display: none;">
                            <h3>Alumni Information</h3>
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Prn No:</label>
                                        <input type="text" name="Aprn" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Course</label>
                                        <select name = "ACoursedrop" class="form-control">
                                            <option style="font-size: 16px;" value="0" disabled selected>--Select--</option>
                                            <?php 
                                                $select_acourse="SELECT * from tblcourse";
                                                $Execute_select_acourse=mysqli_query($con,$select_acourse)or die(mysqli_error($con));
                                                while($fetch_acourse=mysqli_fetch_array($Execute_select_acourse))
                                                {
                                            ?>
                                                    <option style="font-size: 14px;" value = "<?php echo $fetch_acourse['Courseid'];?>"><?php echo $fetch_acourse['CourseName'];?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Passout Year</label>
                                        <input type="number" min="1950" max="2050" name="Apassyear" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" name="Adesignation" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Organisation</label>
                                        <input type="text" name="Aorganisation" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="create-information" id="staffform" style="display: none;">
                            <h3>Placement Staff Information</h3>
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Emp No:</label>
                                        <input type="text" name="Empno" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <select name = "Sdesigdrop" class="form-control">
                                            <option style="font-size: 16px;" value="0" disabled selected>--Select--</option>
                                            <?php 
                                                $select_desig="SELECT * from tbldesignation";
                                                $Execute_select_desig=mysqli_query($con,$select_desig)or die(mysqli_error($con));
                                                while($fetch_desig=mysqli_fetch_array($Execute_select_desig))
                                                {

                                            ?>
                                                    <option style="font-size: 14px;" value = "<?php echo $fetch_desig['Desigid'];?>"><?php echo $fetch_desig['DesigName'];?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select name = "Sdepart" class="form-control">
                                            <option style="font-size: 16px;" value="0" disabled selected>--Select--</option>
                                            <?php 
                                                $select_dept="SELECT * from tbldepartment";
                                                $Execute_select_dept=mysqli_query($con,$select_dept)or die(mysqli_error($con));
                                                while($fetch_dept=mysqli_fetch_array($Execute_select_dept))
                                                {

                                            ?>
                                                    <option style="font-size: 14px;" value = "<?php echo $fetch_dept['Deptid'];?>"><?php echo $fetch_dept['DeptName'];?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="submit" name="submit" class="btn btn-success" style="width:200px;" onclick="return validate();">
                        </div>
                        <br>
                        <p class="col-md-12 col-lg-12 text-center" style="color:black;">Already have an Account ? <a href="login.php"><u>SignIn Here</u></a></p>
                    </form>
                </div>
            </div>
        <!-- End Create Account -->

        <!-- Start scripts -->
        <?php include_once('scriptsLinks.php');?>
        <!-- End scripts -->

    </body>
</html>