 <div >
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
   
    <div class="container" >
      <a class="navbar-brand" href="index.php" ><img src="images/inthislifelogo1.png" alt="logo" width="35px" height="35px" class="m-1 pb-1">In THis LiFe</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <?php
            if(isset($_SESSION['user_role'])){
                if($_SESSION['user_role']=='admin'){
          ?>
          
          <li class="nav-item active">
            <a class="nav-link" href="admin/dist/">Admin</a>
          </li>
          <?php
            }
            
            if($_SESSION['user_role']=='subscriber'){
                ?>
                <li class="nav-item active">
            <a class="nav-link" href="admin/dist/profile.php">Profile</a>
          </li>
            
          
          <?php
            }
            } else{?>
               
           <?php
            ?>
                <li class="nav-item active">
            <a class="nav-link" href="register.php">Sign Up</a>
          </li>
            
                
                <?php
            }
            if(isset($_SESSION['username']) && isset($_GET['post_id']) && $_SESSION['user_role']=='admin'){
                $post_id=$_GET['post_id'];
                ?>
            
            
           
          <li class="nav-item">
            <a class="nav-link" href="admin/dist/edit_post.php?edit=<?php echo $post_id ?>" >Edit post</a>
          </li>
          <?php
            }elseif(isset($_SESSION['username'])){
                ?>
                <li class="nav-item">
            <a class="nav-link" href="logout.php" >Logout</a>
          </li>
                
                
            <?php    
                
                
            }
           ?>
        </ul>
      </div>
    </div>
  </nav>
  </div>
  <br>
  <br>
  <br>
  <div class="display-3 text-center m-0" style="background-color:#f4f4f2;padding:25px"  ><h3><i>Explore&nbsp;&nbsp;&nbsp;   Experience&nbsp;&nbsp;&nbsp;    Enchance</i></h3></div>
 