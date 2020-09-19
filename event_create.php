<?php 
    include_once("DbConnection.php");
?>

<!DOCTYPE html>
<html lang="zxx">

    <head>
    <?php include_once('cssLinks.php');?>
        <title>Create Event</title>
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
        <div class="page-title-area" style= "height:300px;">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-text">
                            <h2>Create Event</h2>
                            <ul>
                                <li>
                                    <a href="homepage.html">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Create Event</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Post A Job -->
            <div class="container" style="margin-top:100px;">
                <div class="post-job-item">
                    <form>
                        <div class="row">
                            <div>
                                <a href="#" style="background-color:green;">  
                                    <img src="#" class="avatar-img rounded" alt="..." style="width:100%;height:100%;">
                                </a>
                                <div class="media-body" style="float:right;">
                                    <input type="file" name="userpic" class="btn btn-sm dz-clickable" value="">
                                </div>
                            </div>
                            <br><br>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Event Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>For Department</label>
                                    <div class="job-category-area">
                                        <select name = "Departmentdropdown" class="form-control">
                                                <option style="font-size: 16px;" value="0" disabled selected>--Select--</option>
                                                <?php 
                                                    $select_sdept="SELECT * from tbldepartment";
                                                    $Execute_select_sdept=mysqli_query($con,$select_sdept)or die(mysqli_error($con));
                                                    while($fetch_sdept=mysqli_fetch_array($Execute_select_sdept))
                                                    {

                                                ?>
                                                        <option style="font-size: 14px;" value = "<?php echo $fetch_sdept['Deptid'];?>"><?php echo $fetch_sdept['DeptName'];?></option>
                                                <?php
                                                    }
                                                ?>
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="job-currency-area">
                                        <label>Time</label>
                                        <input type="time" class="form-control" >	
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Alumni Invited</label>
                                    <div class="job-category-area">
                                    <select name = "Alumnidropdown" class="form-control">
                                                <option style="font-size: 16px;" value="0" disabled selected>--Select--</option>
                                                <?php 
                                                    
                                                    $select_alumni="SELECT * from tblregister where Usertype='Alumni' ";
                                                    $Execute_select_alumni=mysqli_query($con,$select_alumni)or die(mysqli_error($con));
                                                    while($fetch_alumni=mysqli_fetch_array($Execute_select_alumni))
                                                    {

                                                ?>
                                                        <option style="font-size: 14px;" value = "<?php echo $fetch_alumni['Uid'];?>"><?php echo $fetch_alumni['Fname'];?> <?php echo $fetch_alumni['Lname'];?></option>
                                                <?php
                                                    
                                                    }
                                                ?>
                                        </select>	
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Hosted By</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="your_message" rows="8" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn create-ac-btn" style="width:500px;">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        <!-- End Post A Job -->

        <!-- Footer -->
       <?php include_once('footer.php');?>
        <!-- End Footer -->

        <!-- Start scripts -->
        <?php include_once('scriptsLinks.php');?>
        <!-- End scripts -->

    </body>

</html>