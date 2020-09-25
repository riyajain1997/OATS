<?php 
    include_once("DbConnection.php");
    $gmid=$_GET['Gmid'];
    $gid=$_GET['Gid'];
    /*Start database delete board button(SHOW MENU)*/
    if (isset($_GET['Gmid'])) 
    {
        $delete_team_member = "DELETE FROM tblgroupmember WHERE Gmid=$gmid ";
        $Exe_delete_team_member=mysqli_query($con,$delete_team_member)or die(mysqli_error($con));
        header("location:groupmember.php?Sgid=$gid");
    } 
    /*End database delete board button(SHOW MENU)*/
?>