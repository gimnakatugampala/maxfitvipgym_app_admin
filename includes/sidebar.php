<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element text-center">
                        <img alt="image" class="rounded-circle w-50" src="../img/logo.jpeg"/>
                        <span class="block m-t-xs text-white font-bold">Maxfit VIP Gym</span>
                        <!-- <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">David Williams</span>
                            <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                        </a> -->
                        <!-- <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="/profile.html">Profile</a></li>
                            <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                            <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="login.html">Logout</a></li>
                        </ul> -->
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li <?php echo ($_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/dashboard/") ? 'class="active"' : '';   ?>>
                    <a href="../dashboard/"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                </li>
                <li <?php echo ($_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/admin/add_admin.php" || $_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/admin/") ? 'class="active"' : '';   ?>>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Manage Admin</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li <?php echo ($_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/admin/add_admin.php") ? 'class="active"' : '';   ?> ><a href="../admin/add_admin.php">Add Admin</a></li>
                        <li <?php echo ($_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/admin/") ? 'class="active"' : '';   ?> ><a href="../admin/">Admin List</a></li>
                    </ul>
                </li>
                <li <?php echo ($_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/workouts/" || $_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/workouts/add_workout.php") ? 'class="active"' : '';   ?> >
                    <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Manage Workout </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li <?php echo ($_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/workouts/") ? 'class="active"' : '';   ?> ><a href="../workouts">Workout List</a></li>
                        <li <?php echo ($_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/workouts/add_workout.php") ? 'class="active"' : '';   ?>><a href="../workouts/add_workout.php">Add Workout</a></li>
                    </ul>
                </li>

                <li <?php echo ($_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/workout-schedule/add-workout-schedule.php" || $_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/workout-schedule/" || $_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/workout-schedule/assign-workout-schedule.php") ? 'class="active"' : '';   ?>>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Workout Schedule</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li <?php echo ($_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/workout-schedule/add-workout-schedule.php") ? 'class="active"' : '';   ?> ><a href="../workout-schedule/add-workout-schedule.php">Add Workout Schedule</a></li>
                        <li <?php echo ($_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/workout-schedule/") ? 'class="active"' : '';   ?> ><a href="../workout-schedule/">Workout Schedule List</a></li>
                        <li <?php echo ($_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/workout-schedule/assign-workout-schedule.php") ? 'class="active"' : '';   ?>><a href="../workout-schedule/assign-workout-schedule.php">Assign Schedule</a></li>
                    </ul>
                </li>
                


                <li <?php echo ($_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/members/" || $_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/members/attendance.php") ? 'class="active"' : '';   ?>>
                <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Members</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                        <li <?php echo ($_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/members/") ? 'class="active"' : '';   ?> ><a href="../members/">Members List</a></li>
                        <li <?php echo ($_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/pending_members/") ? 'class="active"' : '';   ?> ><a href="../members/pending_members.php">Pending Members</a></li>
                        <li <?php echo ($_SERVER['REQUEST_URI'] == "/maxfit_gym_admin/members/attendance.php") ? 'class="active"' : '';   ?> ><a href="../members/attendance.php">Attendance</a></li>
                    </ul>
                </li>
           
        
            </ul>

        </div>
    </nav>