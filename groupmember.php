<?php 
    include_once("DbConnection.php");
    $Gid=$_GET['Sgid'];

    if(isset($_REQUEST['membersubmit']))
    { 
        $insertmember="insert into tblgroupmember values(null,'$Gid','".$_REQUEST['memberdropdown']."','Member',1)";
        $Execute_Q=mysqli_query($con,$insertmember) or die(mysqli_error($con));

        if($Execute_Q)
        {
            header('location: groupmember.php?Sgid='.$Gid);
        }
        else
        {
            echo "error".mysqli_error($con);   
        }
    }

    if(isset($_REQUEST['deletesubmit']))
    { 
        $delete_groupmember = "DELETE FROM tblgroupmember WHERE Sgid='".$_GET['Sgid']."' ";
        $Exe_deletemember=mysqli_query($con,$delete_groupmember)or die(mysqli_error($con));
        $delete_group = "DELETE FROM tblstudentgroup WHERE Sgid='".$_GET['Sgid']."' ";
        $Exe_delete=mysqli_query($con,$delete_group)or die(mysqli_error($con));
        header('location: homepage.php');
    }
?>

<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php include_once('cssLinks.php');?>    
        <title>Group Members</title>
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
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="modal-content">
                        <!--Start Modal body -->
                        <div class="modal-body">
                            <div class="row">
                                <h5>Are you Sure!!! You want to Delete the Group? </h5>
                            </div>
                        </div>
                        <!--End Modal body -->
                        <!--Start Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" name="deletesubmit" class="btn btn-danger" style="width:100%;">Yes</button>
                        </div>
                        <!--End Modal footer -->
                    </div>
                </form>
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
            <div class="create-education create-education-two post-job-area pt-100">
                <div class="create-education-wrap container">
                    <div class="create-education-left">
                        <h3>Team Members</h3>
                    </div>
                    <div class="create-education-right">
                        <a href="#" data-toggle="modal" data-target="#EducationDetails">Add Member</a>
                    </div>

                    <!--Start Education popup -->
                    <div class="modal fade post-job-item" id="EducationDetails">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="" enctype="multipart/form-data" name="myform">
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
                                                    <label>Group Name: </label>
                                                    <?php
                                                        $namequery="SELECT * from tblstudentgroup where Sgid='$Gid' ";
                                                        $resultnamequery=mysqli_query($con,$namequery) or die(mysqli_error($con));
                                                        $rownamequery=mysqli_fetch_array($resultnamequery);

                                                        if(mysqli_num_rows($resultnamequery)==1)
                                                        {
                                                    ?>
                                                            <input type="text" name="gname" class="form-control" value="<?php echo $rownamequery['Sgname']; ?>" disabled>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Name: </label>
                                                    <div class="job-category-area">
                                                        <select name = "memberdropdown" >
                                                            <option style="font-size: 16px;" value="0" disabled selected>--Select--</option>
                                                            <?php
                                                                $selyear="SELECT * FROM tblregister WHERE Uid='".$_SESSION['UserID']."' ";

                                                                $result=mysqli_query($con,$selyear) or die(mysqli_error($con));
                                                                $row=mysqli_fetch_array($result);

                                                                if(mysqli_num_rows($result)==1)
                                                                {
                                                                    $selname="SELECT * FROM tblregister WHERE PassYear='".$row['PassYear']."' ";

                                                                    $resultname=mysqli_query($con,$selname) or die(mysqli_error($con));
                                                                    while($rowname=mysqli_fetch_array($resultname))
                                                                    {

                                                            ?>
                                                                        <option style="font-size: 16px;" value="<?php echo $rowname['Uid']; ?>" ><?php echo $rowname['Fname']." ".$rowname['Lname']; ?></option>
                                                            <?php
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Modal body -->
                                    <!--Start Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" name="membersubmit" class="btn btn-success" style="width:45%;">Save</button>
                                    </div>
                                    <!--End Modal footer -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--End education popup -->
                </div>

                <?php
                    $seldetail="SELECT * FROM tblgroupmember where Sgid='$Gid' ";
                    $resultdetail=mysqli_query($con,$seldetail) or die(mysqli_error($con));
                    while($rowdetail=mysqli_fetch_array($resultdetail))
                    {
                        $selmemname="SELECT * FROM tblregister where Uid='".$rowdetail['Uid']."' ";
                        $resultmemname=mysqli_query($con,$selmemname) or die(mysqli_error($con));
                        $rowmemname=mysqli_fetch_array($resultmemname);

                        if(mysqli_num_rows($resultmemname)>0)
                        {
                ?>
                            <div class="card" style="width:400px; margin-bottom:5px;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <small><?php echo $rowmemname['Fname']." ".$rowmemname['Lname']; ?></small><br>
                                            <small><?php echo $rowdetail['LeaderMember']; ?></small>
                                        </div>
                                        <div class="col-lg-2">
                                            <a href="groupmember_remove.php?Gmid=<?php echo $rowdetail['Gmid']; ?>&Gid=<?php echo $Gid; ?>">
                                                <i class='fas fa-trash-alt'></i>
                                            </a>
                                        </div>
                                    </div>                            
                                </div>
                            </div>
                <?php
                        }
                    }
                ?>

            </div>

            <div class="text-center">
                <a href="homepage.php" name="savedetail" class="btn create-ac-btn" style="width:200px;">Save</a>
                &nbsp;&nbsp;&nbsp;
                <button type="button" class="btn create-ac-btn" data-toggle="modal" data-target="#deletepopup" 
                style="width:200px;">Delete</button>
            </div>
            
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