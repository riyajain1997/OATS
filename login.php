<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php include_once('csslinks.php');?>
        <title>Login</title>

        <!-- javascript validation start  -->
        <script type="text/javascript">
            function validate()
            {
                var email = document.forms["myform"]["email"].value;
                var pass = document.forms["myform"]["pass"].value;

                if(email == ""){
                    document.getElementById('emailspan').innerHTML =" ** Please fill the email";
                    return false;
                }else{
                    document.getElementById('emailspan').innerHTML ="";

                }
                if(email.indexOf('@') <= 0){
                    document.getElementById('emailspan').innerHTML =" ** @ Invalid Position";
                    return false;
                }
                if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.'))
                {
                    document.getElementById('emailspan').innerHTML =" ** . Invalid Position";
                    return false;
                }

                if(pass == ""){
                    document.getElementById('passspan').innerHTML =" ** Please fill the Password";
                    return false;
                }else{
                    document.getElementById('passspan').innerHTML ="";

                }
                
                return true;
            } 
        </script> 
        <!--javascript validation ends  -->

    </head>
    <body>

        <!-- Start Navbar Area -->
        <?php include_once('headerAlumni.php');?>
        <!-- End Navbar Area -->

        <!-- Page Title -->
        <div class="page-title-area" style= "height:320px;">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-text">
                            <h2>Login Into Your Account</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Login Form -->
        <div class="contact-form-area ptb-100">
            <div class="container-fluid">
                <div class="col-sm-12 col-lg-12">
                    <div class="form-group">
                        <span id="passspan" style="color: red"></span>
                    </div>
                </div>
                <form name="myform" method="POST" action="login.php">

                    <div class="col-sm-12 col-lg-12">
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Your Email">
                            <span id="emailspan" style="color: red"></span>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-12">
                        <div class="form-group">
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="Your Password">
                            <span id="passspan" style="color: red"></span>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="text-center">
                            <button type="submit" onclick=" return validate();" class="btn contact-btn">Submit</button>
                        </div>
                    </div>
                    <br>
                    <p class="col-md-12 col-lg-12 text-center" style="color:black;">Don't have an Account ? <a href="register.php">Signup Here</a></p>
                </form>
            </div>
        </div>
        <!-- End Login Form -->

        <!-- Start scripts -->
        <?php include_once('scriptsLinks.php');?>
        <!-- End scripts -->

    </body>
</html>