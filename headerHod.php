
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
                        <a class="navbar-brand" href="index.php">
                            <img src="assets/img/logo.png" alt="Logo">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" >
                            <ul class="navbar-nav" style="width:100%; margin-left:20%;">
                                <li class="nav-item">
                                    <a href="homepage.php" class="nav-link">Home</a>
                                </li>&nbsp;
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">Blogs <i class="icofont-simple-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="blog.php" class="nav-link">View Blogs</a>
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
                                    <a href="view_events.php" class="nav-link">Events</a>
                                    <ul class="dropdown-menu">
                                    <li class="nav-item">
                                            <a href="view_events.php?Eid=0" class="nav-link">View Event</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="event_create.php?Eid=0" class="nav-link">Create Event</a>
                                        </li>
                                    </ul>
                                </li>&nbsp;
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">Student <i class="icofont-simple-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="studentList.php" class="nav-link">Student List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="group_approved.php" class="nav-link">Approved Groups</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="group_request.php" class="nav-link">Group Request</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">Alumni <i class="icofont-simple-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="alumniList.php" class="nav-link">Alumni List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">Invitations Sent</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="contact.php" class="nav-link">Contact</a>
                                </li>&nbsp;
                                <li class="nav-item">
                                    <a href="notifications.php" class="nav-link">Notification</a>
                                </li>&nbsp;
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle right active">Hi,&nbsp;<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']; ?><i class="icofont-simple-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="profileHod.php" class="nav-link">Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="logout.php" class="nav-link">Logout</a>
                                        </li>
                                    </ul>
                                </li>&nbsp;
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>