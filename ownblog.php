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
                            <h2>My Blog</h2>
                            <ul>
                                <li>
                                    <a href="index.php">Blogs</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>My Blog</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Category -->
        <section class="category-area category-area-two pt-100 pb-70">
            <div class="container">
            	<div class="row">
                    <?php
                        $uid=$_SESSION['UserID'];
                        $select="SELECT * from tblblogs where Uid=$uid AND IsActive=1";
                        $res=mysqli_query($con,$select);
                        
                        //Data for user name on blogs
                        
                        //Data for user name on blogs


                        if($res->num_rows!=0)
                        {
                            while($data=$res->fetch_array()) 
                            {
                                /*$userid=$data['Uid'];*/
                                $bid=$data['Bid'];
                                $title=$data['Title'];
                                $cont=$data['Content'];
                                $file=$data['File'];
                                $date=$data['CreatedDate'];
                                $title=$data['Title'];

                                if($file=="" || !file_exists("Uploaded/Images/$file"))
                                {
                                    $file="blog1.JFIF";
                                }

                                #For printing user name
                                $select="SELECT * from tblregister where Uid=$uid";
                                $Execute_sel_User=mysqli_query($con,$select) or die(mysqli_error($con));
                                $fetch=mysqli_fetch_array($Execute_sel_User);
                                $uname=$fetch['Fname']." ".$fetch['Lname'];
                                #For printing user name
                    ?>
                    <div class="col-sm-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".3s">
                            <div class="blog-top">
                                <a href="blog-details.php?bid=<?php echo $bid; ?>&name=<?php echo $uname; ?>">
                                    <img src="Uploaded/Images/<?php echo $file; ?>" alt="Blog">
                                </a>
                                <span><?php echo $date; ?></span>
                            </div>
                            <div class="blog-bottom">
                                <h3>
                                    <a href="blog-details.php?bid=<?php echo $bid; ?>&name=<?php echo $uname; ?>"><?php echo $title; ?></a>
                                </h3>
                                <ul>
                                    <li>
                                        <img src="assets/img/home-1/blog/1.png" alt="Blog">
                                        <?php 
                                            /*$select="SELECT * from tblregister where Uid=$uid";
                                            $Execute_sel_User=mysqli_query($con,$select) or die(mysqli_error($con));
                                            $fetch=mysqli_fetch_array($Execute_sel_User);*/
                                            echo $fetch['Fname']." ".$fetch['Lname']; 
                                        ?>
                                    </li>
                                    <li>
                                        <a href="blog_post.php?bid=<?php echo $bid; ?>">Edit
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
        <!-- End Popular -->

        
    </body>
</html>