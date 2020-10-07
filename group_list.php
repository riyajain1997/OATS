<?php 
    include_once("DbConnection.php");
?>

<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php include_once('cssLinks.php');?> 
        <title>Own groups</title>
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
                            <h2>School of Mechanical Engineering</h2>
                            <ul>
                                <li>
                                    <a href="index.html">Thermodynamics</a>
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
                <center><h2 style="color:green;">As A Leader</h2></center>
            </div>
            <br><br>
            <div class="container">
                <div class="row">
                    <?php
                        $leader="SELECT * from tblstudentgroup where Uid='".$_SESSION['UserID']."' AND IsActive=1 ORDER BY IsAccepted Desc";
                        $result_leader=mysqli_query($con,$leader) or die(mysqli_error($con));
                        while($rowleader=mysqli_fetch_array($result_leader))
                        {
                    ?>
                            <div class="col-sm-6 col-lg-3">
                                <div class="companies-item wow fadeInUp">
                                    <img src="assets/logo.png" alt="Companies">
                                    <h3>
                                        <a href="company-details.html"><?php echo $rowleader['Sgname']; ?></a>
                                    </h3>
                                    <?php
                                        if($rowleader['IsAccepted']==1)
                                        {
                                    ?>
                                            <p style="color: green;">
                                                <i class="far fa-check-circle"></i>
                                                Approved
                                            </p>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                            <p style="color: red;">
                                                <i class="fas fa-times"></i>
                                                Not Approved
                                            </p>
                                    <?php
                                        }
                                    ?>
                                    
                                    <a class="companies-btn" href="group_details.php?Sgid=<?php echo $rowleader['Sgid']; ?>">View More<i class="icofont-swoosh-right"></i></a>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>

        <section class="companies-area companies-area-two pt-100" style="padding-bottom:0px; padding-top: 45px;">
            <div class="subscribe-item">
                <center><h2 style="color:green;">As A Member</h2></center>
            </div>
            <br><br>
            <div class="container">
                <div class="row">
                    <?php
                        $member="SELECT * from tblgroupmember where Uid='".$_SESSION['UserID']."' AND LeaderMember='Member' AND IsActive=1 ";
                        $result_member=mysqli_query($con,$member) or die(mysqli_error($con));
                        while($rowmember=mysqli_fetch_array($result_member))
                        {
                            $membergroup="SELECT * from tblstudentgroup where Sgid='".$rowmember['Sgid']."' AND IsActive=1 ";
                            $result_membergroup=mysqli_query($con,$membergroup) or die(mysqli_error($con)); 
                            $rowmembergroup=mysqli_fetch_array($result_membergroup);

                    ?>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="companies-item wow fadeInUp">
                                        <img src="assets/logo.png" alt="Companies">
                                        <h3>
                                            <a href="#"><?php echo $rowmembergroup['Sgname']; ?></a>
                                        </h3>
                                        <?php
                                            $membername="SELECT * from tblregister where Uid='".$rowmembergroup['Uid']."' AND IsActive=1 ";
                                            $result_membername=mysqli_query($con,$membername) or die(mysqli_error($con)); 
                                            $rowmembername=mysqli_fetch_array($result_membername);
                                        ?>
                                        <h6>
                                            <i class="fas fa-user-circle"></i>
                                            <?php echo $rowmembername['Fname']." ".$rowmembername['Lname']; ?>
                                        </h6>
                                        <?php
                                            if($rowmembergroup['IsAccepted']==1)
                                            {
                                        ?>
                                                <p style="color: green;">
                                                    <i class="far fa-check-circle"></i>
                                                    Approved
                                                </p>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                                <p style="color: red;">
                                                    <i class="fas fa-times"></i>
                                                    Not Approved
                                                </p>
                                        <?php
                                            }
                                        ?>
                                        <a class="companies-btn" href="group_details.php?Sgid=<?php echo $rowleader['Sgid']; ?>">View More<i class="icofont-swoosh-right"></i></a>
                                    </div>
                                </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>
        <!-- End Companies -->

        <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->

        <!-- Start scripts -->
        <?php include_once('scriptsLinks.php');?>
        <!-- End scripts -->


    </body>
</html>