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
                            <h2>Blog Post</h2>
                            <ul>
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Blog Post</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Dashboard -->
        <div class="dashboard-area pt-100">
            <div class="container">

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="create-information">
                            <form method="POST">
                                <h3>Post a Blog</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Post Title:</label>
                                            <input type="text" name="txttitle" class="form-control" placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Post Content:</label>
                                            <textarea name="txtcontent" rows="8" class="form-control" placeholder="Enter here"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Upload Image:</label>
                                            <input type="file" name="txtimage" class="form-control">
                                        </div>
                                    </div>
                                    <!--<div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Upload Video:</label>
                                            <input type="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Upload File:</label>
                                            <input type="file" class="form-control">
                                        </div>
                                    </div>-->
                                </div>
                                <div class="text-left">
                                    <button type="submit" class="btn create-ac-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Dashboard -->

        <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->


        <!-- Start Script -->
        <?php include_once('scriptsLinks.php');?>
        <!-- End Script -->
    </body>
</html>