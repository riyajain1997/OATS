<?php 
    include_once("DbConnection.php");
?>s
<div class="navbar-area fixed-top">

<!-- Menu For Mobile Device -->
<div class="mobile-nav">
    <a href="index.html" class="logo">
        <img src="assets/img/logo.png" alt="Logo">
    </a>
</div>

<!-- Menu For Desktop Device -->
<div class="main-nav">
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="index.html">
                <img src="assets/img/logo.png" alt="Logo">
            </a>
            <div class="collapse navbar-collapse mean-menu">
                <ul class="navbar-nav" style="width:100%; margin-left:25%;">
                    <li class="nav-item">
                        <a href="homepage.php" class="nav-link dropdown-toggle">Home </i></a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="#" class="nav-link dropdown-toggle">Blogs <i class="icofont-simple-down"></i></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="blog.php" class="nav-link">View</a>
                            </li>
                            <li class="nav-item">
                                <a href="blog_post.php?bid=0" class="nav-link">Post a Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="ownblog.php" class="nav-link">Own Blogs</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="view_events.php" class="nav-link dropdown-toggle">Events </a>
                        
                    </li>
                    <li class="nav-item">
                        <a href="invitations.php" class="nav-link dropdown-toggle">Invitations</a>
                        
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link dropdown-toggle">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="notifications.php" class="nav-link">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link dropdown-toggle active">Hi,&nbsp;<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']; ?><i class="icofont-simple-down"></i></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="profileAlumni.php" class="nav-link">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="logout.php" class="nav-link">Logout</a>
                            </li>
                        </ul>
                </ul>
            </div>
        </nav>
    </div>
</div>
</div>