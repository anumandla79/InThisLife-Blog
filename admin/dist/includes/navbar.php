<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="../../index.php">In THis LiFe</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" data-target='#layoutSidenav' href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
           
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto">

<!--               <li class="nav-item"> <a class="nav-link" href=""><strong>Users online:<span class="onlineusers"></span></strong></a></li>-->
                <li class="nav-item"> <a class="nav-link" href="../../index.php"><strong>Home&nbsp;&nbsp;</strong></a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?php echo $_SESSION['username']; ?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                       
                        <a class="dropdown-item " href="../../logout.php"><i class="fas fa-fw fa-power-off"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </nav>