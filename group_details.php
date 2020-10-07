<?php 
    include_once("DbConnection.php");
    $sgid=$_GET['Sgid'];
?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php include_once('cssLinks.php');?> 
        <title>Group Details</title>
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

        <!-- Page Title -->
        <div class="page-title-area" style= "height:350px;">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-text">
                            <?php
                                $selgroup="SELECT * FROM tblstudentgroup WHERE Sgid='$sgid' ";
                                $result_group=mysqli_query($con,$selgroup) or die(mysqli_error($con));
                                $rowgroup=mysqli_fetch_array($result_group);

                                if(mysqli_num_rows($result_group)==1)
                                {
                            ?>
                                        <h2><?php echo $rowgroup['Sgname'];?></h2>
                            <?php
                                }
                            ?>
                            <ul>
                                <li>
                                    <a href="index.html">Home</a>
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
        <section class="profile-area profile-area-two pt-100">
            <div class="container">
                <div class="row">
                    <?php 
                        $selgroupmember="SELECT * FROM tblgroupmember WHERE Sgid='$sgid' ";
                        $result_groupmember=mysqli_query($con,$selgroupmember) or die(mysqli_error($con));
                        while($rowgroupmember=mysqli_fetch_array($result_groupmember))
                        {
                            $detail="SELECT * from tblregister where Uid='".$rowgroupmember['Uid']."' AND IsActive=1 ";
                            $teamdetail=mysqli_query($con,$detail) or die(mysqli_error($con));
                            $rowteamdetail=mysqli_fetch_array($teamdetail);
                            if(mysqli_num_rows($teamdetail)==1)
                            {
                                $profile=$rowteamdetail['ProfilePic'];

                                if($profile=="" || !file_exists("Uploaded/Images/$profile"))
                                {
                                    $profile="no1.png";
                                }
                    ?>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="profile-item wow fadeInUp" data-wow-delay=".3s">
                                        <img src="Uploaded/Images/<?php echo $profile; ?>" alt="Profile">
                                        <div class="profile-inner">

                                            <h3><?php echo $rowteamdetail['Fname']." ".$rowteamdetail['Lname'];?></h3>
                                            <span><b><a href="#"><?php echo $rowgroupmember['LeaderMember'];?></a></b></span>

                                            <?php
                                                $cdetail="SELECT * from tblcourse where Courseid='".$rowteamdetail['Cousreid']."' ";
                                                $resultcdetail=mysqli_query($con,$cdetail) or die(mysqli_error($con));
                                                $rowcdetail=mysqli_fetch_array($resultcdetail);

                                                if(mysqli_num_rows($resultcdetail)==1)
                                                {
                                            ?>
                                                    <span><b>Class: </b><?php echo $rowcdetail['CourseName']; ?></span>
                                            <?php
                                                }
                                            ?>
                                                    <span><b>Contact: </b><?php echo $rowteamdetail['Phone']; ?></span>
                                            

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