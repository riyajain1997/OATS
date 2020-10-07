<?php 
    include_once("DbConnection.php");
    $gid=$_GET['Gid'];
    
    if (isset($_GET['Gid'])) 
    {
        $update_request = "UPDATE tblstudentgroup SET IsAccepted=1 WHERE Sgid=$gid";
        $Exe_update_request=mysqli_query($con,$update_request)or die(mysqli_error($con));
        header("location:group_request.php");
    } 
    
?>
