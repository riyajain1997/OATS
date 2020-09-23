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
    /*if(isset($_POST['btnwork']))
    {
        $insert="INSERT into tblwork(Designation,Organization,CurrentComp,JoinDate,LeavingDate,Experience)values('".$_POST['txtdes']."','".$_POST['txtorg']."','".$_POST['txtccomp']."','".$_POST['txtjdate']."','".$_POST['txtldate']."','".$_POST['your_message']."')";
    }*/
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

        <!--Start delete popup -->
        <div class="modal fade" id="deletepopup">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--Start Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <h5>Are you Sure!! You wanna Delete it? </h5>
                        </div>
                    </div>
                    <!--End Modal body -->
                    <!--Start Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" data-dismiss="modal" style="width:45%;">Delete</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-primary" data-dismiss="modal" style="width:45%;">Close</button>
                    </div>
                    <!--End Modal footer -->
                </div>
            </div>
        </div>
        <!--End delete popup -->

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
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="txtlname" value="<?php echo $lname; ?>" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="txtemail" value="<?php echo $email; ?>" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" name="txtphone" value="<?php echo $phone; ?>" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" name="txtdob" value="<?php echo $dob; ?>" class="form-control" placeholder="">
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
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>About</label>
                                <textarea id="your_message" name="your_message" class="form-control" rows="8" ><?php echo $about; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="btnsubmit" class="btn create-ac-btn" style="width:400px;">Save</button>
                    </div>
                </div>
                <?php
                ?>
            </form>
                <!-- {% comment %}END BASIC INFORMATION {% endcomment %}
        
                {% comment %}START EDUCATION DETAILS{% endcomment %} -->
            <form>
                <div class="create-education create-education-two">
                    <div class="create-education-wrap container">
                        <div class="create-education-left">
                            <h3>Education</h3>
                        </div>
                        <div class="create-education-right">
                            <a href="#" data-toggle="modal" data-target="#EducationDetails">Add Education</a>
                        </div>
                        <!--Start Education popup -->
                        <div class="modal fade" id="EducationDetails">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!--Start Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Education Details</h4>
                                    </div>
                                    <!--End Modal Header -->
                                    <!--Start Modal body -->
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Education</label>
                                                    <!-- <input type="text" class="form-control" placeholder="Under Graduate"> -->
                                                    <div class="job-category-area" >
                                                        <select name = "Departmentdropdown">
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
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Board</label>
                                                    <!-- <input type="text" class="form-control" placeholder="MIT-WPU"> -->
                                                    <select name = "Departmentdropdown">
                                                            <option style="font-size: 16px;" value="0" disabled selected>--Select--</option>
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
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>College</label>
                                                    <!-- <input type="text" class="form-control" placeholder="MIT-World Peace University"> -->
                                                    <select name = "Departmentdropdown">
                                                            <option style="font-size: 16px;" value="0" disabled selected>--Select--</option>
                                                            <?php 
                                                                $select_clg="SELECT * from tblcollege";
                                                                $Execute_select_clg=mysqli_query($con,$select_clg)or die(mysqli_error($con));
                                                                while($fetch_clg=mysqli_fetch_array($Execute_select_clg))
                                                                {

                                                                ?>  
                                                                <option style="font-size: 14px;" value = "<?php echo $fetch_clg['Collegeid'];?>"><?php echo $fetch_clg['CollegeName'];?></option>
                                                                <?php
                                                                }
                                                            ?>
                                                        </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Course</label>
                                                    <input type="text" class="form-control" placeholder="BSC">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Specialization</label>
                                                    <input type="text" class="form-control" placeholder="Computer Science">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Percentage(Out of 100)</label>
                                                    <input type="text" class="form-control" placeholder="85">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Passing Year</label>
                                                    <input type="month" class="form-control" placeholder="2021">
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                    <!--End Modal body -->
                                    <!--Start Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" data-dismiss="modal" style="width:45%;">Save</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:45%;">Close</button>
                                    </div>
                                    <!--End Modal footer -->
                                </div>
                            </div>
                        </div>
                        <!--End education popup -->
                    </div>

                    <div class="card" style="width:600px;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5>B.Sc.(Mathematics with Computer Science)</h5>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#">
                                        <i class='fas fa-edit'></i>
                                    </a>&times;
                                    <a href="#" data-toggle="modal" data-target="#deletepopup">
                                        <i class='fas fa-trash-alt'></i>
                                    </a>
                                </div>
                            </div>                            
                            <small>Board/University: MIT-WPU</small><br>
                            <small>Percentage: 85%</small><br>
                            <small>Passing Year: 2021</small>
                        </div>
                    </div>
                    <br>
                    
                    <div class="card" style="width:600px;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5>B.Sc.(Mathematics with Computer Science)</h5>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#">
                                        <i class='fas fa-edit'></i>
                                    </a>&times;
                                    <a href="#" data-toggle="modal" data-target="#deletepopup">
                                        <i class='fas fa-trash-alt'></i>
                                    </a>
                                </div>
                            </div>                            
                            <small>Board/University: MIT-WPU</small><br>
                            <small>Percentage: 85%</small><br>
                            <small>Passing Year: 2021</small>
                        </div>
                    </div>
                </div>
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
                    <form method="POST" name="workform">
                        <div class="modal fade" id="WorkDetails">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!--Start Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Work Details</h4>
                                    </div>
                                    <!--End Modal Header -->
                                    <!--Start Modal body -->
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Your Designation</label>
                                                    <input type="text" name="txtdes" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Your Organization</label>
                                                    <input type="text" name="txtorg" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Is this your current company?</label>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="txtccomp" id="yes" value="Yes">
                                                    <label for="yes">Yes</label>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="txtccomp" id="no" value="No">
                                                    <label for="no">No</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Started Working From</label>
                                                    <input type="month" name="txtjdate" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Worked Till</label>
                                                    <input type="month" name="txtldate" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Your Experience</label>
                                                    <textarea id="your_message" name="your_message" class="form-control" rows="4" style="height:150px;"></textarea>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <!--End Modal body -->
                                    <!--Start Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" name="btnwork" class="btn btn-success" data-dismiss="modal" style="width:45%;">Save</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:45%;">Close</button>
                                    </div>
                                    <!--End Modal footer -->
                                </div>
                            </div>
                        </div>
                    </form>
                        <!--End WorkDetails popup -->
                    </div> 

                    <div class="card">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5>Designation, Organization</h5>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#">
                                        <i class='fas fa-edit'></i>
                                    </a>&times;
                                    <a href="#" data-toggle="modal" data-target="#deletepopup">
                                        <i class='fas fa-trash-alt'></i>
                                    </a>
                                </div>
                            </div>                            
                            <small>Starting Date: dd-mm-yyyy</small>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <small>Worked Till: dd-mm-yyyy</small>
                            <br>
                            <small>About: 
                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                ------------------------------------------------------------------------------------
                            </small>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5>Designation, Organization</h5>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#">
                                        <i class='fas fa-edit'></i>
                                    </a>&times;
                                    <a href="#" data-toggle="modal" data-target="#deletepopup">
                                        <i class='fas fa-trash-alt'></i>
                                    </a>
                                </div>
                            </div>                            
                            <small>Starting Date: dd-mm-yyyy</small>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <small>Worked Till: dd-mm-yyyy</small>
                            <br>
                            <small>About: 
                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                ------------------------------------------------------------------------------------
                            </small>
                        </div>
                    </div> 
                </div>
            </form>
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
                        <div class="modal fade" id="AddSkills">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!--Start Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Skills</h4>
                                    </div>
                                    <!--End Modal Header -->
                                    <!--Start Modal body -->
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" placeholder="Javascript">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Modal body -->
                                    <!--Start Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" data-dismiss="modal" style="width:45%;">Save</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:45%;">Close</button>
                                    </div>
                                    <!--End Modal footer -->
                                </div>
                            </div>
                        </div>
                        <!--End add Skills popup -->
                    </div>

                    <!-- {% comment %} Start Div to display data {% endcomment %} -->
                    <div class="card" style="width:380px;">
                        <div class="container">    
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5>HTML</h5>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" data-toggle="modal" data-target="#deletepopup">
                                        <i class='fas fa-trash-alt'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    &times; 
                    <div class="card" style="width:380px;">
                        <div class="container">    
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5>Javascript</h5>
                                </div>
                                <div class="col-lg-2" data-toggle="modal" data-target="#deletepopup">
                                    <a href="#">
                                        <i class='fas fa-trash-alt'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- {% comment %} End Div to display data {% endcomment %} -->

                </div>
                <!-- {% comment %}END SKILLS{% endcomment %}

                {% comment %}START CHANGE PASSWORD{% endcomment %} -->
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
                                <input type="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Confirm New Password</label>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn create-ac-btn" style="width:400px;">Save</button>
                    </div>
                </div>
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