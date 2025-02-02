<?php 
    include_once("DbConnection.php");
    $Eid=$_GET['Eid'];
    

    if(isset($_POST['eventSubmit']))
    {
        
        $uid=$_SESSION['UserID'];
        $eventName = $_POST['eventName'];
        $Department = $_POST['Departmentdropdown'];
        $eventDate = $_POST['eventDate'];
        $eventTime  = $_POST['eventTime'];
        $eventLocation = $_POST['eventLocation'];
        $eventLink = $_POST['eventLink'];
        $Alumnidropdown = $_POST['Alumnidropdown'];
        $eventDesc = $_POST['eventDesc'];

        // $image = $_FILES['eventLogo']['name'];
        // $tmp_img=$_FILES['eventLogo']['tmp_img'];
        // $path="assets/img/eventLOGO/".$image;
        // move_uploaded_file($tmp_img,$path);

        if($Eid>0)
        {
            $update="UPDATE tblevent set Ename='".$_POST['eventName']."',Location='".$_POST['eventLocation']."',Elink='".$_POST['eventLink']."',
            Edate='".$_POST['eventDate']."', Etime ='".$_POST['eventTime']."',Edescription='".$_POST['eventDesc']."',CreatedUid ='".$_SESSION['UserID']."',AlumniUid='".$_POST['Alumnidropdown']."',Deptid='".$_POST['Departmentdropdown']."' WHERE Eid=$Eid";
            $exe=mysqli_query($con,$update);

            if($exe)
            {
                echo '<script type="text/javascript">alert("Event updated successfully...");</script>';
                /*header("Location:blog.php");*/
            }
            else
            {
                echo "error".mysqli_error($con);
            }

            /*For inserting Eid with updated date into notification table*/ 
            $insert="INSERT into tblnotification(Eid,UpdatedDate,IsActive)values($Eid,now(),1)";
            $exe=mysqli_query($con,$insert);
            /*For inserting Eid with updated date into notification table*/
        }
        
        elseif($Eid==0){

            $event_query = "Insert into tblevent(Ename,Location,Elink,Edate,Etime,Edescription,CreatedUid,AlumniUid,Deptid,IsAccepted,IsActive) values
            ('$eventName','$eventLocation','$eventLink','$eventDate','$eventTime','$eventDesc',$uid,$Alumnidropdown,$Department,0,1)";
            $execute_event=mysqli_query($con,$event_query);
            
            if($execute_event)
            {
                echo '<script type="text/javascript">alert("Event created successfully...");</script>';
            }
            else
            {
                echo "error".mysqli_error($con);
            }

            /*For inserting Eid into notification table*/
            $sel="SELECT Eid from tblevent WHERE IsAccepted=1 ORDER BY Eid DESC LIMIT 1";
            $exe=mysqli_query($con,$sel);
            $data=mysqli_fetch_array($exe);
            $eid=$data['Eid'];

            $insert="INSERT into tblnotification(Eid,IsActive)values($eid,1)";
            $res=mysqli_query($con,$insert);
            /*For inserting Eid into notification table*/
        }
    }
?>

<!DOCTYPE html>
<html lang="zxx">

    <head>
    <?php include_once('cssLinks.php');?>
        <title>Create Event</title>

        <!-- javascript validation start  -->

    <script type="text/javascript">
        function validate()
            {
                var EventName = document.forms["myForm"]["eventName"].value;
                var Department = document.forms["myForm"]["Departmentdropdown"].value;
                var eventDate = document.forms["myForm"]["eventDate"].value;
                var eventTime = document.forms["myForm"]["eventTime"].value;
                var eventLocation = document.forms["myForm"]["eventLocation"].value;
                var eventLink = document.forms["myForm"]["eventLink"].value;
                var Alumnidropdown = document.forms["myForm"]["Alumnidropdown"].value;
                var eventDesc = document.forms["myForm"]["eventDesc"].value;
                alert($Department);
                if(EventName == ""){
                    document.getElementById('span_eventName').innerHTML =" ** Please fill Event name";
                    return false;
                }else{
                    document.getElementById('span_eventName').innerHTML ="";

                }

                if(Department == ""){
                    document.getElementById('span_eventDept').innerHTML =" ** Please fill Department";
                    return false;
                }else{
                    document.getElementById('span_eventDept').innerHTML ="";

                }

                if(eventDate == ""){
                    document.getElementById('span_eventDate').innerHTML =" ** Please fill Event Date";
                    return false;
                }else{
                    document.getElementById('span_eventDate').innerHTML ="";

                }


                if(eventTime == ""){
                    document.getElementById('span_eventTime').innerHTML =" ** Please fill Event Time";
                    return false;
                }else{
                    document.getElementById('span_eventTime').innerHTML ="";

                }

                if(eventLocation == ""){
                    document.getElementById('span_eventLoc').innerHTML =" ** Please fill Event Location";
                    return false;
                }else{
                    document.getElementById('span_eventLoc').innerHTML ="";

                }
                
                if(eventLink == ""){
                    document.getElementById('span_eventLink').innerHTML =" ** Please fill Event Link";
                    return false;
                }else{
                    document.getElementById('span_eventLink').innerHTML ="";

                }

                if(Alumnidropdown == ""){
                    document.getElementById('span_eventAlumni').innerHTML =" ** Please fill Alumni Name";
                    return false;
                }else{
                    document.getElementById('span_eventAlumni').innerHTML ="";

                }

                if(eventDesc == ""){
                    document.getElementById('span_eventDesc').innerHTML =" ** Please fill Event Description";
                    return false;
                }else{
                    document.getElementById('span_eventDesc').innerHTML ="";

                }
                
                
                return true;
            } 
    </script> 
          <!--javascript validation ends  -->

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

                <!-- Filling input box -->
                <?php
                    if($Eid>0)
                    {
                        $update_event = "SELECT * FROM tblevent where Eid=$Eid AND IsActive=1";
                        $exe = mysqli_query($con,$update_event) or die(mysqli_error($con));
                        $fetch_event = mysqli_fetch_array($exe);

                        $eventName = $fetch_event['Ename'];
                        $eventLocation = $fetch_event['Location'];
                        $eventLink = $fetch_event['Elink'];
                        $eventDate = $fetch_event['Edate'];
                        $eventTime = $fetch_event['Etime'];
                        $eventDesc = $fetch_event['Edescription'];
                        $alumni = $fetch_event['AlumniUid'];
                        $dept = $fetch_event['Deptid'];
                        $host = $fetch_event['CreatedUid'];

                    
                ?>

                <!-- ----------------------Update Data --------------------- -->

                <div class="post-job-item">
                    <form method="POST" name="myForm" enctype="multipart/form-data">
                        <div class="row">
                            <!-- <div>
                                <a href="#" style="background-color:green;">  
                                    <img src="#" class="avatar-img rounded" alt="..." style="width:100%;height:100%;">
                                </a>
                                <div class="media-body" style="float:right;">
                                    <input type="file" name="eventLogo" name="eventLogo" class="btn btn-sm dz-clickable" value="">
                                </div>
                            </div> -->
                            <br><br>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Event Name</label>
                                    <input type="text" name="eventName" value="<?php echo $eventName; ?>" class="form-control">
                                    <span id="span_eventName" style="color: red"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>For Department</label>
                                    <div class="job-category-area">
                                        <select name = "Departmentdropdown" class="form-control">
                                                <?php 
                                                    $select_sdept="SELECT * from tbldepartment";
                                                    $Execute_select_sdept=mysqli_query($con,$select_sdept)or die(mysqli_error($con));
                                                    while($fetch_sdept=mysqli_fetch_array($Execute_select_sdept))
                                                    {

                                                ?>
                                                        <option style="font-size: 14px;" value = "<?php echo $fetch_sdept['Deptid'];?>" 
                                                        <?php if($fetch_sdept['Deptid'] == $dept){echo("selected");}?>>
                                                        <?php echo $fetch_sdept['DeptName'];?>
                                                    </option>
                                                <?php
                                                    }
                                                ?>
                                        </select>
                                        <span id="span_eventDept" style="color: red"></span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="eventDate" value="<?php echo $eventDate; ?>" class="form-control">
                                    <span id="span_eventDate" style="color: red"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="job-currency-area">
                                        <label>Time</label>
                                        <input type="time" name="eventTime" value="<?php echo $eventTime; ?>" class="form-control" >	
                                        <span id="span_eventTime" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" name="eventLocation" value="<?php echo $eventLocation; ?>" class="form-control">
                                    <span id="span_eventLoc" style="color: red"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" name="eventLink" value="<?php echo $eventLink; ?>" class="form-control">
                                    <span id="span_eventLink" style="color: red"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Alumni Invited</label>
                                    <div class="job-category-area">
                                    <select name = "Alumnidropdown" class="form-control">
                                                
                                                <?php 
                                                    
                                                    $select_alumni="SELECT * from tblregister where Usertype='Alumni' ";
                                                    $Execute_select_alumni=mysqli_query($con,$select_alumni)or die(mysqli_error($con));
                                                    while($fetch_alumni=mysqli_fetch_array($Execute_select_alumni))
                                                    {

                                                ?>
                                                        <option style="font-size: 14px;" value = "<?php echo $fetch_alumni['Uid'];?>" <?php if($fetch_alumni['Uid'] == $alumni){echo("selected");}?>><?php echo $fetch_alumni['Fname'];?> <?php echo $fetch_alumni['Lname'];?></option>
                                                <?php
                                                    
                                                    }
                                                ?>
                                        </select>	
                                        <span id="span_eventAlumni" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Hosted By</label>
                                    <?php
                                                $hostnm = "SELECT * from tblregister where Uid=$host AND IsActive=1 ";
                                                $host_exe = mysqli_query($con,$hostnm) or die(mysqli_error($con));
                                                $select_host = mysqli_fetch_array($host_exe);
                                                $hostFnm = $select_host['Fname'];
                                                $hostLnm = $select_host['Lname'];
                                            ?>
                                    <input type="text" name="eventHost" value="<?php echo $hostFnm; ?> <?php echo $hostLnm; ?>" class="form-control">
                                    <span id="span_eventHost" style="color: red"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="your_message" rows="8" name="eventDesc" class="form-control"><?php echo $eventDesc; ?></textarea>
                                    <span id="span_eventDesc" style="color: red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="eventSubmit" class="btn create-ac-btn" onclick="return validate();" style="width:500px;">Create</button>
                        </div>
                    </form>
                </div>

                <?php
                    }
                    else
                    {
                ?>

                <!-- ---------------- Insert Data --------------------------- -->

                <div class="post-job-item">
                    <form method="POST" name="myForm">
                        <div class="row">
                            <!-- <div>
                                <a href="#" style="background-color:green;">  
                                    <img src="#" class="avatar-img rounded" alt="..." style="width:100%;height:100%;">
                                </a>
                                <div class="media-body" style="float:right;">
                                    <input type="file" name="eventLogo" name="eventLogo" class="btn btn-sm dz-clickable" value="">
                                </div>
                            </div> -->
                            <br><br>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Event Name</label>
                                    <input type="text" name="eventName" class="form-control">
                                    <span id="span_eventName" style="color: red"></span>
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
                                        <span id="span_eventDept" style="color: red"></span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="eventDate" class="form-control">
                                    <span id="span_eventDate" style="color: red"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="job-currency-area">
                                        <label>Time</label>
                                        <input type="time" name="eventTime" class="form-control" >	
                                        <span id="span_eventTime" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" name="eventLocation" class="form-control">
                                    <span id="span_eventLoc" style="color: red"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" name="eventLink" class="form-control">
                                    <span id="span_eventLink" style="color: red"></span>
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
                                        <span id="span_eventAlumni" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Hosted By</label>
                                    <input type="text" name="eventHost" class="form-control">
                                    <span id="span_eventHost" style="color: red"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="your_message" rows="8" name="eventDesc" class="form-control"></textarea>
                                    <span id="span_eventDesc" style="color: red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="eventSubmit" class="btn create-ac-btn" onclick="return validate();" style="width:500px;">Create</button>
                        </div>
                    </form>
                </div>

                <?php
                    }
                ?>
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