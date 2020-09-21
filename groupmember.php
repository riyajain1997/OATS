<?php 
    include_once("DbConnection.php");
?>

<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php include_once('cssLinks.php');?>    
        <title>Alumni Profile</title>
        <style>
            small {
                color: black;
            } 
        </style>
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

        <!--Start delete popup -->
        <div class="modal fade" id="deletepopup">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--Start Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <h5>Are you Sure!! You wanna Delete it? </h5>
                        </div>
                    </div>
                    <!--End Modal body -->
                    <!--Start Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" data-dismiss="modal" style="width:45%;">Delete</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-primary" data-dismiss="modal" style="width:45%;">Close</button>
                    </div>
                    <!--End Modal footer -->
                </div>
            </div>
        </div>
        <!--End delete popup -->

        <!-- Page Title -->
        <div class="page-title-area" style= "height:350px;">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-text">
                            <h2>Group Members</h2>
                            <ul>
                                <li>
                                    <a href="homepage.php">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Members</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Dashboard -->
        <div class="container" style="margin-top:80px;">
            <form>

                <div class="create-education create-education-two">
                    <div class="create-education-wrap container">
                        <div class="create-education-left">
                            <h3>Team Members</h3>
                        </div>
                        <div class="create-education-right">
                            <a href="#" data-toggle="modal" data-target="#EducationDetails">Add Member</a>
                        </div>
                        <!--Start Education popup -->
                        <div class="modal fade" id="EducationDetails">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!--Start Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Team Member</h4>
                                    </div>
                                    <!--End Modal Header -->
                                    <!--Start Modal body -->
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Name: </label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Group Name: </label>
                                                    <input type="text" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Modal body -->
                                    <!--Start Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" name="membersubmit" class="btn btn-success" data-dismiss="modal" style="width:45%;">Save</button>
                                    </div>
                                    <!--End Modal footer -->
                                </div>
                            </div>
                        </div>
                        <!--End education popup -->
                    </div>

                    <div class="card" style="width:400px;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10">
                                    <small>Name</small><br>
                                     <small>Leader/member</small>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" data-toggle="modal" data-target="#deletepopup">
                                        <i class='fas fa-trash-alt'></i>
                                    </a>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <br>
                
                </div>

                <div class="text-center">
                    <button type="submit" class="btn create-ac-btn" style="width:200px;">Save</button>
                </div>
            </form>
        </div>
        <!-- End Dashboard -->

        <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->


        <!-- Start scripts -->
        <?php include_once('scriptsLinks.php');?> 
        <!-- End scripts -->

    </body>
</html>