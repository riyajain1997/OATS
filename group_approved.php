<?php 
    include_once("DbConnection.php");
?>

<!DOCTYPE html>
<html lang="zxx">
    <head>
    <?php include_once('cssLinks.php');?> 
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
            else if($_SESSION['Type']=="Staff")
            {
                include_once('headerHod.php');
            }
        ?>
        <!-- End Navbar Area -->
<!------------------------------------------------------------------------------------------------------------------------------>
                                                <!--START STUDENT -->
<!------------------------------------------------------------------------------------------------------------------------------>

<?php
    if($_SESSION['Type']=="Student")
    {
?>

        <!-- Page Title -->
        <div class="page-title-area" style= "height:350px;">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-text">
                            <?php
                                $selcourse="SELECT * FROM tblregister WHERE Uid='".$_SESSION['UserID']."' ";
                                $result_course=mysqli_query($con,$selcourse) or die(mysqli_error($con));
                                $rowcourse=mysqli_fetch_array($result_course);

                                if(mysqli_num_rows($result_course)==1)
                                {
                                    $selcoursename="SELECT * FROM tblcourse WHERE Courseid='".$rowcourse['Cousreid']."' ";
                                    $result=mysqli_query($con,$selcoursename) or die(mysqli_error($con));
                                    $row=mysqli_fetch_array($result);
                                    if(mysqli_num_rows($result)>0)
                                    {
                            ?>
                                        <h2><?php echo $row['CourseName'];?></h2>
                            <?php
                                    }
                                }
                            ?>
                            <ul>
                                <li>
                                    <a href="homepage.php">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Batch-2021</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Companies -->
        <section class="companies-area companies-area-two pt-100" style="padding-bottom:0px; padding-top: 45px;">
            <div class="subscribe-item">
                <center><h3>Approved and Verified Group</h3></center>
            </div>
            <br><br>
            <?php
                $userpass="SELECT * FROM tblregister WHERE IsActive=1 AND Uid='".$_SESSION['UserID']."' ";
                $result_userpass=mysqli_query($con,$userpass) or die(mysqli_error($con));
                $rowuserpass=mysqli_fetch_array($result_userpass);
                $passuser=$rowuserpass['PassYear'];
                $joinuser=$rowuserpass['JoinYear'];
            ?>
            <div class="container">
                <div class="row">
                    <?php
                        $groupdata="SELECT * FROM tblstudentgroup WHERE IsAccepted=1 AND IsActive=1";
                        $result_groupdata=mysqli_query($con,$groupdata) or die(mysqli_error($con));
                        while($rowgroupdata=mysqli_fetch_array($result_groupdata))
                        {
                            $seluser="SELECT * FROM tblregister WHERE Uid='".$rowgroupdata['Uid']."' AND PassYear=$passuser ";
                            $resultuser=mysqli_query($con,$seluser) or die(mysqli_error($con));
                            $rowuser=mysqli_fetch_array($resultuser);
                            if(mysqli_num_rows($resultuser)>0)
                            {
                                $selcoursename="SELECT * FROM tblcourse WHERE Courseid='".$rowuser['Cousreid']."' ";
                                $result=mysqli_query($con,$selcoursename) or die(mysqli_error($con));
                                $row=mysqli_fetch_array($result);
                                if(mysqli_num_rows($result)>0)
                                {
                    ?>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="companies-item wow fadeInUp">
                                        <img src="assets/logo.png" alt="Group">
                                        <h3><a href="#"><?php echo $rowgroupdata['Sgname']; ?></a></h3>
                                        <p>
                                            Course: <?php echo $row['CourseName']; ?><br> 
                                            Batch: <?php echo $joinuser."-".$passuser; ?>
                                        </p>
                                        <a class="btn btn-success" href="group_details.php?Sgid=<?php echo $rowgroupdata['Sgid']; ?>">View More</a> 
                                    </div>
                                </div>
                    <?php
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
        <!-- End Companies -->

<?php
    }
    else
    {
?>

<!------------------------------------------------------------------------------------------------------------------------------>
                                                <!-- END STUDENT -->

                                                <!-- START STAFF -->
<!------------------------------------------------------------------------------------------------------------------------------>        
        <!-- Page Title -->
        <div class="page-title-area" style= "height:350px;">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-text">
                            <?php
                                $seldept="SELECT * FROM tblregister WHERE Uid='".$_SESSION['UserID']."' ";
                                $result_dept=mysqli_query($con,$seldept) or die(mysqli_error($con));
                                $rowdept=mysqli_fetch_array($result_dept);

                                if(mysqli_num_rows($result_dept)==1)
                                {
                                    $seldeptname="SELECT * FROM tbldepartment WHERE Deptid='".$rowdept['Deptid']."' ";
                                    $result=mysqli_query($con,$seldeptname) or die(mysqli_error($con));
                                    $row=mysqli_fetch_array($result);
                                    if(mysqli_num_rows($result)>0)
                                    {
                            ?>
                                        <h2><?php echo $row['DeptName'];?></h2>
                            <?php
                                    }
                                }
                            ?>
                            <ul>
                                <li>
                                    <a href="homepage.php">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Group List</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Companies -->
        <section class="companies-area companies-area-two pt-100" style="padding-bottom:0px; padding-top: 45px;">
            <div class="subscribe-item">
                <center><h3>Approved and Verified Groups</h3></center>
            </div>
            <br><br>
            <div class="container">
                <div class="row">
                    <?php
                        $groupdata="SELECT * FROM tblstudentgroup WHERE IsAccepted=1 AND IsActive=1 AND Deptid='".$rowdept['Deptid']."' ";
                        $result_groupdata=mysqli_query($con,$groupdata) or die(mysqli_error($con));
                        while($rowgroupdata=mysqli_fetch_array($result_groupdata))
                        {
                            $selcoursename="SELECT * FROM tblcourse WHERE Courseid='".$rowgroupdata['Courseid']."' ";
                            $resultcourse=mysqli_query($con,$selcoursename) or die(mysqli_error($con));
                            $rowcourse=mysqli_fetch_array($resultcourse);
                            if(mysqli_num_rows($resultcourse)>0)
                            {
                    ?>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="companies-item wow fadeInUp">
                                        <img src="assets/logo.png" alt="Group">
                                        <h3><a href="#"><?php echo $rowgroupdata['Sgname']; ?></a></h3>
                                        <p>
                                            Course: <?php echo $rowcourse['CourseName']; ?><br>
                                            <?php
                                                if($rowgroupdata['Sgyear']==1)
                                                {
                                                    echo "1st Year";
                                                }
                                                elseif ($rowgroupdata['Sgyear']==2) 
                                                {
                                                    echo "2nd Year";
                                                }
                                                elseif ($rowgroupdata['Sgyear']==3) 
                                                {
                                                    echo "3rd Year";
                                                }
                                                else
                                                {
                                                    echo "4th Year";
                                                }
                                                $selbatch="SELECT * FROM tblregister WHERE Uid='".$rowgroupdata['Uid']."' ";
                                                $resultbatch=mysqli_query($con,$selbatch) or die(mysqli_error($con));
                                                $rowbatch=mysqli_fetch_array($resultbatch);
                                                if(mysqli_num_rows($resultbatch)>0)
                                                {
                                            ?>
                                                   <br> 
                                                   Batch: 
                                            <?php
                                                    echo $rowbatch['JoinYear']."-".$rowbatch['PassYear'];
                                                }
                                            ?>
                                        </p>
                                        <a class="btn btn-success" href="group_details.php?Sgid=<?php echo $rowgroupdata['Sgid']; ?>">View More</a>
                                        <a class="btn btn-danger" href="group_decline.php?Gid=<?php echo $rowgroupdata['Sgid']; ?>">Delete</a> 
                                    </div>
                                </div>

                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
        <!-- End Companies -->

<!------------------------------------------------------------------------------------------------------------------------------>
                                                <!--END STAFF -->
<!------------------------------------------------------------------------------------------------------------------------------>

<?php
    }
?>
        <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->

        <!-- Start scripts -->
        <?php include_once('scriptsLinks.php');?>
        <!-- End scripts -->
    </body>
</html>