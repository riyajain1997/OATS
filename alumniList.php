<?php 
    include_once("DbConnection.php");
?>

<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php include_once('cssLinks.php');?>
        <title>Alumini List</title>
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
        <div class="page-title-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-text">
                            <h2>Alumini List</h2>
                            <ul>
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Alumini List</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->
        <!-- <div class="container mt-5" >
            <div class="subscribe-item">
                <form class="newsletter-form" data-toggle="validator">
                    <input type="text" class="form-control" placeholder="Job Profile" name="jobProfile" required autocomplete="off">

                    <button class="btn subscribe-btn" type="submit">
                        Search
                    </button>

                </form>
            </div>
        </div>
         -->

         <!-- Profile -->
        <section class="profile-area profile-area-two pt-100">
            <div class="container">
                <div class="row">
                    <?php
                        $alumniList="SELECT * from tblregister where Usertype='Alumni' ";
                        $Execute_List_alumni=mysqli_query($con,$alumniList)or die(mysqli_error($con));
                        if($Execute_List_alumni->num_rows!=0)
                            {
                                while($row_AlumniList=$Execute_List_alumni->fetch_array())
                                {
                                    $Fnm = $row_AlumniList['Fname'];
                                    $Lnm = $row_AlumniList['Lname'];
                                
                    ?>
                    <div class="col-sm-6 col-lg-3">
                        <div class="profile-item wow fadeInUp" data-wow-delay=".3s">
                            <img src="assets/img/home-1/profile/1.jpg" alt="Profile">
                            <div class="profile-inner">
                                <h3><?php echo $Fnm; ?> <?php echo $Lnm; ?></h3>
                                <span>Business Consultant</span>
                                <!-- <a href="candidate-details.html">View Profile
                                    <i class="icofont-swoosh-right"></i>
                                </a>
                                <div class="profile-heart">
                                    <a href="candidate-details.html">
                                        <i class="icofont-heart-alt"></i>
                                    </a>
                                </div> -->
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