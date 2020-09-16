
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
                    <div class="col-sm-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".3s">
                            <div class="blog-top">
                                <a href="blog-details.php">
                                    <img src="assets/img/home-1/blog/1.jpg" alt="Blog">
                                </a>
                                <span>21 May, 2020</span>
                            </div>
                            <div class="blog-bottom">
                                <h3>
                                    <a href="blog-details.php">The next genaration IT will change the world</a>
                                </h3>
                                <ul>
                                    <li>
                                        <img src="assets/img/home-1/blog/1.png" alt="Blog">
                                        Aikin Ward
                                    </li>
                                    <li>
                                        <a href="blog_post.php">Edit
                                            <i class="icofont-simple-right"></i>
                                        </a>

                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        <!-- End Popular -->

      <!-- Footer -->
      <?php include_once('footer.php');?>
        <!-- End Footer -->

        <!-- Start scripts -->
        <?php include_once('scriptsLinks.php');?>
        <!-- End scripts -->

    </body>
</html>