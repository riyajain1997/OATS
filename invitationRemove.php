<?php
    include_once("DbConnection.php");
    $eid = $_GET['Eid'];
    if(isset($_GET['Eid']))
    {
        $updatevent = "UPDATE tblevent set IsAccepted=2 WHERE Eid=$eid";
        $Exe_decline_invite=mysqli_query($con,$updatevent)or die(mysqli_error($con));
        header("location:invitations.php");
    }
    
?>