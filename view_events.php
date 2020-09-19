<?php 
    include_once("DbConnection.php");
?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php include_once('cssLinks.php');?>
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

        <!-- Banner -->
        <div class="banner-area banner-area-two banner-img-two">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="banner-text">
                            <h1>Attend the <span>Upcoming </span> events </h1>
                            <p>Career and Future guidance by well qualified alumni</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner -->

        <!-- Start Upcoming event -->
        <section class="job-area ptb-100">
            <div class="container">
                <div class="section-title">
                    <h2>Upcoming Events</h2>
                </div>
                <div id="container">
                    <div class="row">
                        <?php
                            $eventSelectQuery = "SELECT * from tblevent where IsActive=1 and IsAccepted=1";
                            $result_event = mysqli_query($con,$eventSelectQuery);
                            if($result_event->num_rows!=0)
                            {
                                while($row_event=$result_event->fetch_array())
                                {
                                    $eventId = $row_event['Eid'];
                                    $eventName = $row_event['Ename'];
                                    $eventDate = $row_event['Edate'];
                                    $eventTime = $row_event['Etime'];
                                    $isactive = $row_event['IsActive'];
                               
                        ?>
                        <div class="col-lg-6 mix ui ux">
                            <div class="job-item">
                                <img src="assets/img/home-1/jobs/2.png" alt="Job">
                                <div class="job-inner align-items-center">
                                    <div class="job-inner-left">
                                        <h3><?php echo $eventName; ?></h3>
                                        <ul>
                                            <li>
                                                <?php echo $eventDate; ?>
                                            </li>
                                            <li>
                                                <?php echo $eventTime; ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="job-inner-right">
                                        <ul>
                                            <li>
                                                <a href="eventDetails.php?Eid=<?php echo $eventId; ?>">Details</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                    }
                    ?>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Upcoming event -->      

        <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->

        <!-- Start script -->
        <?php include_once('scriptsLinks.php');?>
        <!-- End script -->

    </body>
</html>