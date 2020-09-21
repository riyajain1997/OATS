<?php 
    include_once("DbConnection.php");
?>

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
            else{
                include_once('headerHod.php');
            }
        ?>
        <!-- End Navbar Area -->


<!-------------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- USER = STUDENT -->
<!-------------------------------------------------------------------------------------------------------------------------------------->        
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
                                $groupname_query="SELECT * FROM tblregister WHERE Uid='".$_SESSION['UserID']."' ";
                                $result_group=mysqli_query($con,$groupname_query) or die(mysqli_error($con));
                                $rowgroup=mysqli_fetch_array($result_group);

                                if(mysqli_num_rows($result_group)==1)
                                {
                                    $selgroupname="SELECT * FROM tblstudentgroup WHERE Deptid='".$rowgroup['Deptid']."' AND Courseid='".$rowgroup['Cousreid']."' AND IsAccpeted=1 ";
                                    $result=mysqli_query($con,$selgroupname) or die(mysqli_error($con));
                                    $row=mysqli_fetch_array($result);
                                    if(mysqli_num_rows($result)>0)
                                    {
                        ?>  
                                        <h2><?php echo $row['Sgname']; ?></h2>
                        <?php
                                    }
                                    else{
                        ?>
                                        <h2>Group Name</h2>
                        <?php
                                    }
                                }
                        ?>
                                <ul>
                                    <li>
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li>
                                        <i class="icofont-simple-right"></i>
                                    </li>
                                    <li>Group Details</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            <!-- Profile -->
            <div class="container" style="padding-bottom: 10px; padding-top: 85px;">
                <div class="section-title">
                    <?php
                        $seldept="SELECT * FROM tblregister WHERE Uid='".$_SESSION['UserID']."' ";

                        $result=mysqli_query($con,$seldept) or die(mysqli_error($con));
                        $row=mysqli_fetch_array($result);

                        if(mysqli_num_rows($result)==1)
                        {
                            $selname="SELECT d.DeptName as dept, c.CourseName as course FROM tbldepartment as d,tblcourse as c WHERE c.Deptid='".$row['Deptid']."' AND c.Courseid='".$row['Cousreid']."' AND c.Deptid=d.Deptid";

                            $resname=mysqli_query($con,$selname) or die(mysqli_error($con));
                            $rowselname=mysqli_fetch_array($resname);

                            if(mysqli_num_rows($resname)==1)
                            {
                                $selyear="SELECT * from tblgroupmember where LeaderMember='Leader'";
                                $resyear=mysqli_query($con,$selyear) or die(mysqli_error($con));
                                while($rowyear=mysqli_fetch_array($resyear))
                                {
                                    $selleader="SELECT * from tblregister where Uid='".$rowyear['Uid']."' AND PassYear='".$row['PassYear']."' ";
                                    $resleader=mysqli_query($con,$selleader) or die(mysqli_error($con));
                                    $rowleader=mysqli_fetch_array($resleader);

                                    if(mysqli_num_rows($resleader)==1)
                                    {
                                        $yearquery="SELECT * from tblstudentgroup where Sgid='".$rowyear['Sgid']."' ";
                                        $yearresult=mysqli_query($con,$yearquery) or die(mysqli_error($con));
                                        $yearrow=mysqli_fetch_array($yearresult);
                    ?>
                                        <h2>
                                            <?php 
                                                echo $rowselname['course'];
                                            ?>
                                            (
                                            <?php
                                                if($yearrow['Sgyear']==1)
                                                {
                                                    echo "1st Year";
                                                }
                                                elseif ($yearrow['Sgyear']==2) 
                                                {
                                                    echo "2nd Year";
                                                }
                                                elseif ($yearrow['Sgyear']==3) 
                                                {
                                                    echo "3rd Year";
                                                }
                                                else
                                                {
                                                    echo "4th Year";
                                                }
                                            ?>
                                            )
                                        </h2>
                                        <h4><?php echo $rowselname['dept'];?></h4>
                </div>
                <br>
                <a href="#" data-toggle="modal" data-target="#WorkDetails">Add Work Experience</a>

                <div class="row">
                    <?php 
                        $teamleader="SELECT * from tblgroupmember where Sgid='".$rowyear['Sgid']."' AND LeaderMember='Leader' ";
                        $teamresult=mysqli_query($con,$teamleader) or die(mysqli_error($con));
                        $rowteamleader=mysqli_fetch_array($teamresult);

                        if(mysqli_num_rows($teamresult)==1)
                        {
                    ?>
                            <div class="col-sm-6 col-lg-4">
                                <div class="profile-item wow fadeInUp" data-wow-delay=".3s">
                                    <img src="assets/img/dashboard/1.jpg" alt="Profile">
                                    <div class="profile-inner">
                                        <h3><?php echo $rowleader['Fname']." ".$rowleader['Lname'];?></h3>
                                        <span><b><a href="#">Team Leader</a></b></span>
                                        <span><b>Class:</b><?php echo $rowselname['course']; ?></span>
                                        <span><b>Contact:</b><?php echo $rowleader['Phone'];?></span>
                                    </div>
                                </div>
                            </div>

                        <?php
                            $member="SELECT * from tblgroupmember where Sgid='".$rowyear['Sgid']."' AND LeaderMember='Member' ";
                            $memberresult=mysqli_query($con,$member) or die(mysqli_error($con));
                            while($rowmember=mysqli_fetch_array($memberresult))
                            {
                        ?>
                                <div class="col-sm-6 col-lg-4">
                                    <?php
                                        $memberdetail="SELECT * from tblregister where Uid='".$rowmember['Uid']."' ";
                                        $resultdetail=mysqli_query($con,$memberdetail) or die(mysqli_error($con));
                                        $rowdetail=mysqli_fetch_array($resultdetail);

                                        if(mysqli_num_rows($resultdetail)==1)
                                        {
                                    ?>
                                            <div class="profile-item wow fadeInUp" data-wow-delay=".3s">
                                                <img src="assets/img/dashboard/1.jpg" alt="Profile">
                                                <div class="profile-inner">
                                                    <h3><?php echo $rowdetail['Fname']." ".$rowdetail['Lname']; ?></h3>
                                                    <span><b><a href="#">Team Member</a></b></span>
                                                    <span><b>Class:</b><?php echo $rowselname['course']; ?></span>
                                                    <span>
                                                        <b>Contact:</b><?php echo $rowdetail['Phone'];?>
                                                        <div style="float: right;">
                                                            <a href="#">
                                                                <i class='fas fa-trash-alt'></i>
                                                            </a>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                        else{}
                                    ?>
                                </div>
                    <?php
                            }
                        }
                        else
                        {
                    ?>
                            <div class="col-sm-6 col-lg-4">
                                <div class="profile-item wow fadeInUp" data-wow-delay=".3s">
                                    <img src="assets/img/dashboard/1.jpg" alt="Profile">
                                    <div class="profile-inner">
                                        <h3>Group Not Found..</h3>
                                        <h4>Placement Staff didnot Accepted the Group Request..</h4>
                                    </div>
                                </div>
                            </div>  
                    <?php
                        }
                    ?>
                </div>
            
                <?php
                                    }
                                    else{
                ?>
                                        <h2><?php echo $rowselname['course'];?></h2>
                                        <h4><?php echo $rowselname['dept'];?></h4>
                    <?php
                                    }
                                }
                            }
                        }
                    ?>
            </div>
            <!-- End Profile -->
        <?php 
            } 
            else if ($_SESSION['Type']=="Staff") 
            {
        ?>
<!---------------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- USER = STAFF -->
<!---------------------------------------------------------------------------------------------------------------------------------------->
                <!-- Page Title -->
                <div class="page-title-area" style= "height:350px;">
                    <div class="d-table">
                        <div class="d-table-cell">
                            <div class="container">
                                <div class="page-title-text">
                                <?php 
                                    $group=$_GET['groupid'];
                                    $groupname_query="SELECT * FROM tblstudentgroup WHERE Sgid=$group ";
                                    $result_group=mysqli_query($con,$groupname_query) or die(mysqli_error($con));
                                    $rowgroup=mysqli_fetch_array($result_group);

                                    if(mysqli_num_rows($result_group)==1)
                                    {
                            ?>  
                                            <h2><?php echo $rowgroup['Sgname']; ?></h2>
                            <?php
                                    }
                                    else{
                            ?>
                                            <h2>Group Name</h2>
                            <?php
                                    }
                            ?>
                                    <ul>
                                        <li>
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li>
                                            <i class="icofont-simple-right"></i>
                                        </li>
                                        <li>Group Details</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Title -->

                <!-- Profile -->
                <div class="container" style="padding-bottom: 10px; padding-top: 85px;">

                    <div class="section-title">
                        <?php
                            $seldept="SELECT * FROM tblstudentgroup WHERE Sgid=$group ";

                            $result=mysqli_query($con,$seldept) or die(mysqli_error($con));
                            $row=mysqli_fetch_array($result);

                            if(mysqli_num_rows($result)==1)
                            {
                                $selname="SELECT d.DeptName as dept, c.CourseName as course FROM tbldepartment as d,tblcourse as c WHERE c.Deptid='".$row['Deptid']."' AND c.Courseid='".$row['Courseid']."' AND c.Deptid=d.Deptid";

                                $resname=mysqli_query($con,$selname) or die(mysqli_error($con));
                                $rowselname=mysqli_fetch_array($resname);

                                if(mysqli_num_rows($resname)==1)
                                {
                        ?>
                                            <h2>
                                                <?php 
                                                    echo $rowselname['course'];
                                                ?>
                                                (
                                                <?php
                                                    if($row['Sgyear']==1)
                                                    {
                                                        echo "1st Year";
                                                    }
                                                    elseif ($row['Sgyear']==2) 
                                                    {
                                                        echo "2nd Year";
                                                    }
                                                    elseif ($row['Sgyear']==3) 
                                                    {
                                                        echo "3rd Year";
                                                    }
                                                    else
                                                    {
                                                        echo "4th Year";
                                                    }
                                                ?>
                                                )
                                            </h2>
                                            <h4><?php echo $rowselname['dept'];?></h4>
                        <?php
                                }
                            }
                        ?>
                    </div>

                    <br>
                    
                    <!-- <a href="#" data-toggle="modal" data-target="#WorkDetails">Delete Group</a> -->

                    <div class="row">
                        <?php 
                            $team="SELECT * from tblgroupmember where Sgid=$group AND IsActive=1 ORDER BY LeaderMember ";
                            $teamresult=mysqli_query($con,$team) or die(mysqli_error($con));
                            while($rowteam=mysqli_fetch_array($teamresult))
                            {
                                $mdetail="SELECT * from tblregister where Uid='".$rowteam['Uid']."' AND IsActive=1 ";
                                $teamdetail=mysqli_query($con,$mdetail) or die(mysqli_error($con));
                                $rowteamdetail=mysqli_fetch_array($teamdetail);

                                if(mysqli_num_rows($teamdetail)==1)
                                {

                                    $cdetail="SELECT * from tblcourse where Courseid='".$rowteamdetail['Cousreid']."' ";
                                    $resultcdetail=mysqli_query($con,$cdetail) or die(mysqli_error($con));
                                    $rowcdetail=mysqli_fetch_array($resultcdetail);

                                    if(mysqli_num_rows($resultcdetail)==1)
                                    {
                        ?>
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="profile-item wow fadeInUp" data-wow-delay=".3s">
                                                <img src="assets/img/dashboard/1.jpg" alt="Profile">
                                                <div class="profile-inner">
                                                    <h3><?php echo $rowteamdetail['Fname']." ".$rowteamdetail['Lname'];?></h3>
                                                    <span><b><a href="#"><?php echo $rowteam['LeaderMember']; ?></a></b></span>
                                                    <span><b>Class:</b><?php echo $rowcdetail['CourseName']; ?></span>
                                                    <span><b>Contact:</b><?php echo $rowteamdetail['Phone'];?></span>
                                                </div>
                                            </div>
                                        </div>
                        <?php
                                    }
                                }
                            }
                        ?>
                    </div>

                </div>
                <!-- End Profile -->
               
        <?php 
            } 
        ?>
<!---------------------------------------------------------------------------------------------------------------------------------------->
                                                <!-- END USER STAFF -->
<!---------------------------------------------------------------------------------------------------------------------------------------->
        <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->


        <!-- Start script -->
        <?php include_once('scriptsLinks.php');?>
        <!-- End Script -->
    </body>
</html>