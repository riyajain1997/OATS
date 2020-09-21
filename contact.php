<!-- Start Database value Insertion-->
<?php include_once("DbConnection.php");
    
    if(isset($_REQUEST['submit']))
    { 
        if(isset($_SESSION['UserID']))
        { 
            $insert_query="insert into tblcontact values(null,'".$_SESSION['UserID']."','".$_REQUEST['name']."','".$_REQUEST['email']."','".$_REQUEST['phone_number']."','".$_REQUEST['msg_subject']."','".$_REQUEST['message']."',1)";
            $Execute_Q=mysqli_query($con,$insert_query) or die(mysqli_error($con));
            
            echo "<script type='text/javascript'>alert('Your Message send Successfully Done..');</script>";
        }
        else{
            $insert_query="insert into tblcontact values(null,0,'".$_REQUEST['name']."','".$_REQUEST['email']."','".$_REQUEST['phone_number']."','".$_REQUEST['msg_subject']."','".$_REQUEST['message']."',1)";
            $Execute_Q=mysqli_query($con,$insert_query) or die(mysqli_error($con));
            
            echo "<script type='text/javascript'>alert('Your Message send Successfully Done..');</script>";
        }
    }
 ?>
<!-- End Database value Insertion-->

<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php include 'cssLinks.php' ?>
        <title>Contact Us</title>

        <script type="text/javascript">
            function validate()
            {
                var name = document.forms["myform"]["name"].value;
                var phone = document.forms["myform"]["phone_number"].value;
                var email = document.forms["myform"]["email"].value;
                var subject = document.forms["myform"]["msg_subject"].value;
                var description = document.forms["myform"]["message"].value;


                if(name == "")
                {
                    document.getElementById('span_name').innerHTML =" ** Please fill the name";
                    return false;
                }else{
                    document.getElementById('span_name').innerHTML ="";
                }

                if(email == "")
                {
                    document.getElementById('span_email').innerHTML =" ** Please fill the email";
                    return false;
                }else{
                    document.getElementById('span_email').innerHTML ="";
                }

                if(email.indexOf('@') <= 0)
                {
                    document.getElementById('span_email').innerHTML =" ** @ Invalid Position";
                    return false;
                }

                if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.'))
                {
                    document.getElementById('span_email').innerHTML =" ** . Invalid Position";
                    return false;
                }

                if(phone == "")
                {
                    document.getElementById('span_phone').innerHTML =" ** Please fill the number";
                    return false;
                }else{
                    document.getElementById('span_phone').innerHTML ="";
                }

                if (phone.length!=10) 
                {
                    document.getElementById('span_phone').innerHTML =" ** Mobile number must be 10 digits only.";
                    return false;
                }

                if (isNaN(phone)) 
                {
                    document.getElementById('span_phone').innerHTML =" ** Digits only not characters";
                    return false;
                }

                if(subject == "")
                {
                    document.getElementById('span_subject').innerHTML =" ** Please fill the Subject";
                    return false;
                }else{
                    document.getElementById('span_subject').innerHTML ="";
                }

                if(description == "")
                {
                    document.getElementById('span_message').innerHTML =" ** Please fill the description";
                    return false;
                }else{
                    document.getElementById('span_message').innerHTML ="";
                }
             
                return true;
            }
        </script>

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
            else{
                include_once('header.php');
            }
        ?>
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
                <form method="POST" action="contact.php" name="myform">
                    <div class="row contact-wrap">
                        <div class="col-sm-6 col-lg-6">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Your Full Name">
                                <span id="span_name" style="color: red"></span>
                            </div>
                        </div>
    
                        <div class="col-sm-6 col-lg-6">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Your Email">
                                <span id="span_email" style="color: red"></span>
                            </div>
                        </div>
    
                        <div class="col-sm-6 col-lg-6">
                            <div class="form-group">
                                <input type="number" name="phone_number" id="phone_number" class="form-control" placeholder="Your Phone">
                                <span id="span_phone" style="color: red"></span>
                            </div>
                        </div>
    
                        <div class="col-sm-6 col-lg-6"> 
                            <div class="form-group">
                                <input type="text" name="msg_subject" id="msg_subject" class="form-control" placeholder="Subject">
                                <span id="span_subject" style="color: red"></span>
                            </div>
                        </div>
    
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <textarea name="message" class="form-control" id="message" cols="30" rows="8" placeholder="Description"></textarea>
                                <span id="span_message" style="color: red"></span>
                            </div>
                        </div>
    
                        <div class="col-md-12 col-lg-12">
                            <div class="text-center">
                                <button type="submit" name="submit" onclick=" return validate();" class="btn contact-btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Contact Form -->
        
        <!-- Footer -->
        <?php include "footer.php" ?>
        <!-- End Footer -->

        <!-- Start scripts -->
        <?php include "scriptsLinks.php" ?> 
        <!-- End scripts -->

    </body>
</html>