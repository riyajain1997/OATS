<?php
    include_once("DbConnection.php");
    $Bid=$_GET['bid'];
    $name=$_GET['name'];
?>
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
                            <h2>Blog Details</h2>
                            <ul>
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Blog Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Blog Details -->
        <div class="blog-details-area ptb-100">
            <div class="container">
                <div class="row">
                    <?php
                        $select="SELECT * from tblblogs where Bid=$Bid AND IsActive=1";
                        $exe=mysqli_query($con,$select)or die(mysqli_error($con));
                        $fetch=mysqli_fetch_array($exe);

                        $title=$fetch['Title'];
                        $cont=$fetch['Content'];
                        $file=$fetch['File'];
                        $date=$fetch['CreatedDate'];

                        if($file=="" || !file_exists("Uploaded/Images/$file"))
                        {
                            $file="blog1.JFIF"; 
                        }
                    ?>
                    <div class="col-lg-8">
                        <div class="blog-details-item">
                            <div class="blog-details-img">
                                <img src="Uploaded/Images/<?php echo $file; ?>" alt="Blog Details"> 
                                <h3><?php echo $title; ?></h3>
                                <br>
                                <h2>Description</h2>
                                <p><?php echo $cont; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-details-item">
                            <div class="single-resume-category">
                                <h3>Brief</h3>
                                <ul>
                                    <li>
                                        <a href="#"><b>Date:</b><?php echo $date; ?></a>
                                    </li>
                                    <li>
                                        <a href="#"><b>Created By:</b> <?php echo $name; ?></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <?php
                    ?>
                </div>
            </div>
        </div>
        <!-- End Blog Details

        <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->


        <!-- Start script -->
        <?php include_once('scriptsLinks.php');?>
        <!-- End script -->
    </body>
</html>