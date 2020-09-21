<?php 
    include_once("DbConnection.php");

    if(isset($_REQUEST['submit']))
    { 

        $insert_query="insert into tblstudentgroup values(null,'".$_REQUEST['Grp_name']."','".$_REQUEST['cid']."','".$_REQUEST['did']."','".$_REQUEST['year']."','".$_SESSION['UserID']."',0,1)";
        $Execute_Q=mysqli_query($con,$insert_query) or die(mysqli_error($con));
        $leader_query= mysqli_insert_id($con);

        if($Execute_Q)
        {
            if ($leader_query) 
            {
                $insert_leader="insert into tblgroupmember values(null,'$leader_query','".$_REQUEST['leaderdropdown']."','Leader',1)";
                $Execute_leader=mysqli_query($con,$insert_leader) or die(mysqli_error($con));

                header('location: groupmember.php?Sgid='.$leader_query);
            }
        }
        else{
            echo "error".mysqli_error($con);   
        } 
    }
?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
    <?php include_once('cssLinks.php');?>    
        <title>Create Group</title>
        <style>
            small {
                color: black;
            } 
        </style>

        <!-- javascript validation start  -->
        <script type="text/javascript">
            function validate()
            {
                var gname = document.forms["myform"]["Grp_name"].value;
                var leader = document.forms["myform"]["leaderdropdown"].value;
                var year = document.forms["myform"]["year"].value;


                if(gname == ""){
                    document.getElementById('groupspan').innerHTML =" ** Please fill the Group name";
                    return false;
                }else{
                    document.getElementById('groupspan').innerHTML ="";

                }

                if(leader == 0){
                    document.getElementById('leaderspan').innerHTML ="( ** Please enter correct name)";
                    return false;
                }else{
                    document.getElementById('leaderspan').innerHTML ="";

                }

                if(year == ""){
                    document.getElementById('yearspan').innerHTML =" ** Please fill the Year";
                    return false;
                }else{
                    document.getElementById('yearspan').innerHTML ="";

                }
                
                return true;
            } 
        </script> 
        <!--javascript validation ends  -->

    </head>
    <body>

        <!-- Start Navbar Area -->
        <?php include_once('headerStudent.php');?>   
        <!-- End Navbar Area -->

        <!-- Page Title -->
        <div class="page-title-area" style= "height:350px;">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-text">
                            <h2>Create Group</h2>
                            <ul>
                                <li>
                                    <a href="homepage.html">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Create Group</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Dashboard -->
        <div class="post-job-area pt-100" style="padding-bottom: 10px; padding-top: 85px;">
            <div class="container">
                <form class="form-group" method="post" action="" enctype="multipart/form-data" name="myform">
                    <!-- START DETAILS  -->
                    <div class="create-information post-job-item">
                        <h3>Fill the Details</h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Group Name</label>
                                    <input type="text" name="Grp_name" class="form-control" placeholder="">
                                    <span id="groupspan" style="color: red"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Team Leader</label>
                                    <?php
                                        $selleader="SELECT * FROM tblregister WHERE Uid='".$_SESSION['UserID']."' ";

                                        $result=mysqli_query($con,$selleader) or die(mysqli_error($con));
                                        $row=mysqli_fetch_array($result);

                                        if(mysqli_num_rows($result)==1)
                                        {
                                    ?>
                                            <input type="text" name="Grp_name" value="<?php echo $row['Fname']." ".$row['Lname']; ?>" class="form-control" disabled>
                                            <span id="leaderspan" style="color: red"></span>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Department</label> <br>
                                    <?php
                                        $seldept="SELECT * FROM tblregister WHERE Uid='".$_SESSION['UserID']."' ";

                                        $result=mysqli_query($con,$seldept) or die(mysqli_error($con));
                                        $row=mysqli_fetch_array($result);

                                        if(mysqli_num_rows($result)==1)
                                        {
                                            $seldeptname="SELECT * FROM tbldepartment WHERE Deptid='".$row['Deptid']."' ";

                                            $resultname=mysqli_query($con,$seldeptname) or die(mysqli_error($con));
                                            $rowname=mysqli_fetch_array($resultname);

                                            if(mysqli_num_rows($resultname)==1)
                                            {
                                    ?>
                                                <input type="text" name="dname" class="form-control"  value="<?php echo $rowname['DeptName'];?>" disabled readonly>
                                    <?php
                                            }
                                    ?>
                                            <input type="text" name="did" class="form-control" value="<?php echo $row['Deptid'];?>" hidden>
                                    <?php
                                        }

                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Course</label> <br>
                                    <?php
                                        $selcourse="SELECT * FROM tblregister WHERE Uid='".$_SESSION['UserID']."' ";

                                        $result=mysqli_query($con,$selcourse) or die(mysqli_error($con));
                                        $row=mysqli_fetch_array($result);

                                        if(mysqli_num_rows($result)==1)
                                        {
                                            $selcoursename="SELECT * FROM tblcourse WHERE Courseid='".$row['Cousreid']."' ";

                                            $resultname=mysqli_query($con,$selcoursename) or die(mysqli_error($con));
                                            $rowname=mysqli_fetch_array($resultname);

                                            if(mysqli_num_rows($resultname)==1)
                                            {
                                    ?>
                                                <input type="text" name="cname" class="form-control" value="<?php echo $rowname['CourseName'];?>" disabled readonly>
                                    <?php
                                            }
                                    ?> 
                                            <input type="text" name="cid" class="form-control" value="<?php echo $row['Cousreid'];?>" hidden>
                                    <?php
                                        }

                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="gender-area">
                                        <span>Year</span>
                                        <input type="radio" name="year" id="first" value="1">
                                        <label for="first">1st</label>
                                        <input type="radio" name="year" id="second" value="2">
                                        <label for="second">2nd</label>
                                        <input type="radio" name="year" id="third" value="3">
                                        <label for="third">3rd</label>
                                        <input type="radio" name="year" id="fourth" value="4">
                                        <label for="fourth">4th</label>
                                    </div>
                                    <span id="yearspan" style="color: red"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END DETAILS  -->

                    <div class="text-center">
                        <button type="submit" name="submit" onclick=" return validate();" class="btn create-ac-btn" style="width:400px;">Create</button>
                    </div>
                </form>
            </div>
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