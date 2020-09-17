
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
                            <ul class="navbar-nav" style="width:100%; margin-left:35%;">
                                <li class="nav-item">
                                    <a href="homepage.php" class="nav-link">Home</a>
                                </li>&nbsp;
                                <li class="nav-item">
                                    <a href="blog.php" class="nav-link">Blogs</a>
                                </li>&nbsp;
                                <li class="nav-item">
                                    <a href="view_events.php" class="nav-link">Events</a>
                                </li>&nbsp;
                                <li class="nav-item">
                                    <a href="aluminiList.php" class="nav-link">Alumni</a>
                                </li>&nbsp;
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
                                            <a href="profileStudent.php" class="nav-link">Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="group_create.html" class="nav-link">Group</a>
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