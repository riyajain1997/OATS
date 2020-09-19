<?php
    include_once("DbConnection.php");
?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
    <?php include_once('cssLinks.php');?>
        <title>Blogs</title>
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
                            <h2>Blog</h2>
                            <ul>
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Blog</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Blog -->
        <section class="blog-area pt-100">
            <div class="container">
                <div class="row">
                    <?php
                        $select="SELECT * from tblblogs where IsActive=1";
                        $res=mysqli_query($con,$select);
                        
                        if($res->num_rows!=0)
                        {
                            while($data=$res->fetch_array()) 
                            {
                                $bid=$data['Bid'];
                                $userid=$data['Uid'];
                                $title=$data['Title'];
                                $cont=$data['Content'];
                                $file=$data['File'];
                                $date=$data['CreatedDate'];
                                

                                if($file=="" || !file_exists("Uploaded/Images/$file"))
                                {
                                    $file="blog1.JFIF";
                                }

                                #For printing user name
                                $select="SELECT * from tblregister where Uid=$userid";
                                $Execute_sel_User=mysqli_query($con,$select) or die(mysqli_error($con));
                                $fetch=mysqli_fetch_array($Execute_sel_User);
                                $uname=$fetch['Fname']." ".$fetch['Lname'];
                                #For printing user name
                    ?>
                    <div class="col-sm-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".3s">
                            <div class="blog-top">
                                <a href="blog-details.php?bid=<?php echo $bid; ?>&name=<?php echo $uname ?>">
                                    <img src="Uploaded/Images/<?php echo $file; ?>" alt="Blog">
                                </a>
                                <span><?php echo $date; ?></span>
                            </div>
                            <div class="blog-bottom">
                                <h3>
                                    <a href="blog-details.php?bid=<?php echo $bid; ?>&name=<?php echo $uname ?>"><?php echo $title; ?></a>
                                </h3>
                                <ul>
                                    <li>
                                        <img src="assets/img/home-1/blog/1.png" alt="Blog">
                                        <?php
                                            /*$select="SELECT * from tblregister where Uid=$userid";
                                            $Execute_sel_User=mysqli_query($con,$select) or die(mysqli_error($con));
                                            $fetch=mysqli_fetch_array($Execute_sel_User);*/
                                            echo $fetch['Fname']." ".$fetch['Lname'];
                                        ?>
                                    </li>
                                    <li>
                                        <a href="blog-details.php?bid=<?php echo $bid; ?>&name=<?php echo $uname ?>">Read More
                                            <i class="icofont-simple-right"></i>
                                        </a>
                                    </li>
                                </ul>
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
        <!-- End Blog -->

        <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->

        <!-- Start scripts -->
        <?php include_once('scriptsLinks.php');?>
        <!-- End scripts -->

    </body>
</html>

        