<?php 
    include_once("DbConnection.php");
    $eduid=$_GET['eduid'];

    /*Start database delete board button(SHOW MENU)*/
    if (isset($_GET['eduid'])) 
    {
        $delete_education = "DELETE FROM tbleducation WHERE Educationid=$eduid ";
        $Exe_education=mysqli_query($con,$delete_education)or die(mysqli_error($con));
        header("location:profileAlumni.php");
    } 
    /*End database delete board button(SHOW MENU)*/
?>