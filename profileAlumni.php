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
                <!-- <form method="post"> -->
                    <div class="container" style="margin-top:80px;">
                        <div class="create-education create-education-two post-job-area pt-100">
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
                                        <div class="modal-content">
                                            <form method="post" action="" enctype="multipart/form-data" name="myform">
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
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
                                                    <div class="col-lg-6">
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
                                                    <div class="col-lg-6">
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
                                                    <div class="col-lg-6">
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
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Specialization</label>
                                                            <input type="text" name="txtspe" class="form-control" placeholder="MIT WPU">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Percentage(Out of 100)</label>
                                                            <input type="text" name="txtper" class="form-control" placeholder="85">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Passing Year</label>
                                                            <input type="date" name="txtpyear" class="form-control" placeholder="2021">
                                                        </div>
                                                    </div>  
                                                </div>
                                                </div>
                                                <!--End Modal body -->
                                                <!--Start Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" name="membersubmit" class="btn btn-success" style="width:45%;">Save</button>
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
                            $uid=$_SESSION['UserID'];
                            $select="SELECT c.Classid,e.Classid,c.ClassName,e.Specialization,e.Boardid,b.Boardid,b.BoardName,e.Universityid,u.Universityid,u.UniversityName from tbleducation AS e,tbuniversity AS u,tblclass AS c,tblboard AS b WHERE e.Classid=c.Classid AND e.Boardid=b.Boardid AND e.Universityid=u.Universityid
                            AND e.Uid=$uid";
                            $res=mysqli_query($con,$select);

                            if($res->num_rows>0)
                            {
                                while($data=$res->fetch_array()) 
                                {
                                    $class=$data['ClassName'];
                                    $spe=$data['Specialization'];
                                    $board=$data['BoardName'];
                                    $uni=$data['UniversityName'];
                                    /*$per=$data['Percentage'];
                                    $pyear=$data['Year'];*/
                        ?>
                                    <div class="card">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-10">
                                                    <h5><?php echo $class; ?>(<?php echo $spe; ?>)</h5>
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
                                            <small>Board/University : 
                                            <?php 
                                                if($board!=null)
                                                    {
                                                        echo $board;
                                                    }
                                                if($uni!=null)
                                                    {
                                                        echo $uni;
                                                    }
                                            ?>
                                            </small>
                                            <br>
                                            <!-- <small>Percentage : <?php echo $per; ?>%</small>
                                            <br>
                                            <small>Passing Year : <?php $pyear; ?></small> -->
                                            </small>
                                        </div>
                                    </div>
                                    <br>
                        <?php
                                }
                            }
                        ?>

                        </div>

                        <!-- <div class="text-center">
                            <a href="homepage.php" name="savedetail" class="btn create-ac-btn" style="width:200px;">Save</a>
                            &nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn create-ac-btn" data-toggle="modal" data-target="#deletepopup" 
                            style="width:200px;">Delete</button>
                        </div> -->
                
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