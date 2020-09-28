<?php
   include_once("DbConnection.php");
   $eid=$_GET['Eid'];
   if(isset($_GET['Eid']))
   {
       $updateevent = "UPDATE tblevent set IsAccepted=1 WHERE Eid=$eid";
       $Exe_accept_invite = mysqli_query($con,$updateevent) or die(mysqli_error($con));
       header("location:invitations.php");
   }
?>