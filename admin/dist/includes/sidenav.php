
                   
<?php 
if($_SESSION['user_role']=='admin'){
    ?>
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                           
                            <a class="nav-link" href="index.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a
                            >
                            <div class="sb-sidenav-menu-heading">Blog</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="blog_users.php">View Users</a><a class="nav-link" href="add_user.php">Add User</a></nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Posts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="admin_posts.php" 
                                        >View Posts
                                        </a>
                                   
                                    <a class="nav-link collapsed" href="add_post.php"  >Add post
                                        
                                    </a>
                                    
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="profile.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                profile</a
                            ><a class="nav-link" href="comments.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                                Comments</a
                            >
                            <a class="nav-link" href="categories.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Categories</a
                            >
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['username'];?>
                    </div>
                </nav>
                
               <?php
}elseif($_SESSION['user_role']=='subscriber'){
    ?>
    
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link active" href="profile.php"><div class="sb-nav-link-icon"><i class="fas fa-file fa-2x"></i></div><h4>Profile</h4></a>
                        
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book-open fa-2x"></i></div>
                                <h4>Posts</h4>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down fa-2x"></i></div
                            ></a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="subscriber_posts.php" 
                                        >View my Posts
                                        </a>
                                   
                                    <a class="nav-link collapsed" href="add_post.php"  >Add post
                                        
                                    </a>
                                    
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['username'];?>
                    </div>
                </nav>
    
    <?php
}
?>