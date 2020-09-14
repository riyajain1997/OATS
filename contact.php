<!DOCTYPE html>
<html lang="zxx">
    <head>
    <?php include_once('cssLinks.php');?>
        <title>Contact Us</title>
    </head>
    <body>

        <!-- Start Navbar Area -->
        <?php include_once('headerAlumni.php');?>
        <!-- End Navbar Area -->

        <!-- Page Title -->
        <div class="page-title-area" style= "height:350px;">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-text">
                            <h2>Contact</h2>
                            <ul>
                                <li>
                                    <a href="homepage.html">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <br><br><br><br><br><br><br>

        <!-- Jobseeker -->
        <div class="container">
            <div class="row job-wrap">
                <div class="col-sm-6 col-lg-6">
                    <div class="jobseeker-item">
                        <div class="jobseeker-icon">
                            <i class="icofont-location-pin"></i>
                        </div>
                        <div class="jobseeker-inner">
                            <span>Address</span>
                            <h3> MIT-World Peace University</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="jobseeker-item">
                        <div class="jobseeker-icon">
                            <i class="icofont-ui-call"></i>
                        </div>
                        <div class="jobseeker-inner">
                            <span>Phone No.</span>
                            <h3>+91 7766889900</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="jobseeker-item">
                        <div class="jobseeker-icon">
                            <i class="icofont-ui-email"></i>
                        </div>
                        <div class="jobseeker-inner">
                            <span>Email</span>
                            <h3>alumni@gmail.com</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="jobseeker-item">
                        <div class="jobseeker-icon">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <div class="jobseeker-inner">
                            <span>Website</span>
                            <h3>www.gablealumni.com</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Jobseeker -->

        <!-- Contact Form -->
        <div class="contact-form-area ptb-100">
            <div class="container-fluid">
                <center><h4>Contact Form</h4></center>
                <br><br>
                <form id="contactForm">
                    <div class="row contact-wrap">
                        <div class="col-sm-6 col-lg-6">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Your Full Name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
    
                        <div class="col-sm-6 col-lg-6">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Your Email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
    
                        <div class="col-sm-6 col-lg-6">
                            <div class="form-group">
                                <input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Your Phone">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
    
                        <div class="col-sm-6 col-lg-6"> 
                            <div class="form-group">
                                <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Subject">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
    
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Description"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
    
                        <div class="col-md-12 col-lg-12">
                            <div class="text-center">
                                <button type="submit" class="btn contact-btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Contact Form -->
        
        <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->

        <!-- Start scripts -->
        <?php include_once('scriptsLinks.php');?>
        <!-- End scripts -->

    </body>
</html>