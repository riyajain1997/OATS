<?php 
    include_once("DbConnection.php");
    $gid=$_GET['Gid'];
    
    if (isset($_GET['Gid'])) 
    {
        $delete_request = "DELETE FROM tblstudentgroup WHERE Sgid=$gid ";
        $Exe_delete_request=mysqli_query($con,$delete_request)or die(mysqli_error($con));
        header("location:group_request.php");
    } 
    
?>
