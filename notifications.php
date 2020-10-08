<?php
    include_once("DbConnection.php");
?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
    <?php include_once('cssLinks.php');?> 
        <title>Notifications</title>
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

        <!-- Faq -->
        <section class="container">
                <div class="row faq-wrap">
                    <div class="col-lg-12">
                        <div class="faq-head">
                            <br><br><br><br><br><br>
                            <center><h2>Notifications</h2></center>
                            <br><br>
                        </div>
                        <div class="faq-item">
                            <ul class="accordion">
                            <?php
                                $sel="SELECT e.Ename,e.Edate,e.Etime,e.Location,e.Elink,n.UpdatedDate from tblnotification AS n,tblevent AS e WHERE e.Eid=n.Eid AND e.IsAccepted=1";
                                $res=mysqli_query($con,$sel);

                                if($res->num_rows>0)
                                {
                                    while($data=$res->fetch_array()) 
                                    {
                                        $ename=$data['Ename'];   
                                        $date=$data['Edate'];
                                        $time=$data['Etime'];
                                        $loc=$data['Location'];
                                        $link=$data['Elink'];
                                        $udate=$data['UpdatedDate'];
                            ?>
                                        <li class="wow fadeInUp">
                                            <?php
                                                if($udate==0000-00-00 || $udate==null)
                                                {
                                            ?>
                                                    <a>New Event: <?php echo $ename; ?></a>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                                    <a>Updated Event: <?php echo $ename; ?></a>
                                            <?php
                                                }
                                            ?>
                                                <p>Event Name: <?php echo $ename; ?>
                                                <br>Date: <?php echo $date; ?>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                Time: <?php echo $time; ?>
                                                <br>Location: <?php echo $loc; ?>
                                                <br>Link: <?php echo $link; ?>
                                            </p>
                                        </li>
                            <?php
                                    }
                                }
                                if($res->num_rows==null)
                                {
                            ?>
                                    <a>No Result...!</a>
                            <?php
                                }
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
        </section>
        <!-- End Faq -->
        
        <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->

        <!-- Start scripts -->
        <?php include_once('scriptsLinks.php');?>
        <!-- End scripts -->

    </body>
</html>