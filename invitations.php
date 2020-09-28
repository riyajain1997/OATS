<?php
     include_once("DbConnection.php");
     $userid=$_SESSION['UserID'];
    
?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
    <?php include_once('cssLinks.php');?> 
    </head>
    <body>
        <!-- Start Navbar Area -->
        <?php include_once('headerAlumni.php');?> 
        <!-- End Navbar Area -->

        <!-- Page Title -->
        <div class="page-title-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-text">
                            <h2>Invitations</h2>
                            <ul>
                                <li>
                                    <a href="homepage.php">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Invitations</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Start Upcoming event -->
        <section class="job-area ptb-100">
            <div class="container">
                <div class="section-title">
                    <h2>Invitations</h2>
                </div>
                <div id="container">
                    <div class="row">
                    <?php
                        $selectInvitation = "SELECT * FROM tblevent AS e, tbldepartment As d WHERE e.Deptid=d.Deptid AND AlumniUid=$userid AND IsActive=1 AND IsAccepted!=2";
                        $exe_Invitation = mysqli_query($con,$selectInvitation) or die(mysqli_error($con));
                        if($exe_Invitation->num_rows != 0)
                        {
                            while($row_invite=$exe_Invitation->fetch_array())
                            {   
                                $eid = $row_invite['Eid'];
                                $Ename = $row_invite['Ename'];
                                $Date = $row_invite['Edate'];
                                $Time = $row_invite['Etime'];
                                $deptName = $row_invite['DeptName'];
                                $IsAccepted=$row_invite['IsAccepted'];
                                
                    ?>
                        <div class="col-lg-6 mix ui ux">
                            <div class="job-item">
                                <img src="assets/img/home-1/jobs/2.png" alt="Job">
                                <div class="job-inner align-items-center">
                                    <div class="job-inner-left">
                                        <h3><?php echo $Ename; ?></h3>
                                        <ul>
                                            <li>
                                                Organised By: <br> <?php echo $deptName; ?>
                                                
                                            </li>
                                            <li>
                                                Date: <?php echo $Date; ?>
                                            </li>
                                            <li>
                                                Time: <?php echo $Time; ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php 
                                        if($IsAccepted == 0)
                                        {
                                    ?>
                                    <div class="job-inner-right">
                                        
                                            <ul>
                                                <li>
                                                    <a href="invitationAccept.php?Eid=<?php echo $eid; ?>">Accept</a>
                                                </li>
                                                <li>
                                                    <a href="invitationRemove.php?Eid=<?php echo $eid; ?>" >Decline</a>
                                                </li>
                                            </ul>     
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <?php
                            }
                        }
                        ?>
                    </div>
                    <br><br><br>
                </div>
            </div>
        </section>
        <!-- End Upcoming event -->

        <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->

        <!-- Start scripts -->
        <?php include_once('scriptsLinks.php');?>
        <!-- End scripts -->
    </body>
<!-- Copied from https://templates.hibootstrap.com/gable/default/index-2.html by Cyotek WebCopy 1.7.0.600, Sunday, April 26, 2020, 3:31:55 PM -->
</html>