<!DOCTYPE html>
<html lang="zxx">
    <head>
    <?php include_once('cssLinks.php');?>    
        <title>Create Group</title>
        <style>
            small {
                color: black;
            } 
        </style>
    </head>
    <body>

        <!-- Start Navbar Area -->
    <?php include_once('headerStudent.php');?>   
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
                            <h2>Create Group</h2>
                            <ul>
                                <li>
                                    <a href="homepage.html">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Create Group</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Dashboard -->
        <div class="container" style="margin-top:80px;">
            <form class="form-group" method="post" action="group_create">
                
                <!-- START DETAILS  -->
                <div class="create-information">
                    <h3>Fill the Details</h3>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Group Name</label>
                                <input type="text" name="Grp_name" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Department</label> <br>
                                <select placeholder="Select Department" class="form-control" name="Grp_dept">
                                    <option value="#">School of science</option>
                                    <option value="#">School of science</option>
                                    <option value="#">School of science</option>
                                    <option value="#">School of science</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">

                                <label>Course</label> <br>
                                <select placeholder="Select Course" class="form-control" name="Grp_course">
                                    <option value="#">  MCA</option>
                                    <option value="#">  MCA</option>
                                    <option value="#">  MCA</option>
                                </select>

                                

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="gender-area">
                                    <span>Year</span>
                                    <input type="radio" name="year" id="first" value="first">
                                    <label for="first">1st</label>
                                    <input type="radio" name="year" id="second" value="second">
                                    <label for="second">2nd</label>
                                    <input type="radio" name="year" id="third" value="third">
                                    <label for="third">3rd</label>
                                    <input type="radio" name="year" id="fourth" value="fourth">
                                    <label for="fourth">4th</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Team Leader</label>
                                <input type="text" name="Grp_leader" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END DETAILS  -->

                <!-- START TEAM MEMBERS -->
                <div class="create-skills"> 
                    <div class="create-skills-wrap">
                        <div class="create-skills-left">
                            <h4>Team Members</h4>
                        </div>
                        <div class="create-skills-right">
                            <a href="#" data-toggle="modal" data-target="#members">Add Member</a>
                        </div>
                        <!--Start Add MEMBERS popup -->
                        <div class="modal fade" id="members">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!--Start Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Members</h4>
                                    </div>
                                    <!--End Modal Header -->
                                    <!--Start Modal body -->
                                    <div class="modal-body">
                                        <form class="form-group" method="post" action="add_member">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" name="memberName" placeholder="Abhilasha">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <!--End Modal body -->
                                            <!--Start Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" data-dismiss="modal" style="width:45%;">Save</button>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:45%;">Close</button>
                                            </div>

                                        </form>
                                    <!--End Modal footer -->
                                </div>
                            </div>
                        </div>
                        <!--End add MEMBERS popup -->
                    </div>

                    <!-- Start Div to display data  -->
                    <div class="card" style="width:380px;">
                        <div class="container">    
                            <div class="row">
                                <div class="col-lg-10">
                                    <small>Student Name</small>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" data-toggle="modal" data-target="#deletepopup">
                                        <i class='fas fa-trash-alt'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    &times; 
                    <div class="card" style="width:380px;">
                        <div class="container">    
                            <div class="row">
                                <div class="col-lg-10">
                                    <small>Student Name</small>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" data-toggle="modal" data-target="#deletepopup">
                                        <i class='fas fa-trash-alt'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Div to display data  -->

                </div>
                <!-- END TEAM MEMBERS -->

                <div class="text-center">
                    <button type="submit" class="btn create-ac-btn" style="width:400px;">Save</button>
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