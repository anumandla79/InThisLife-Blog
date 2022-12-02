
        
        
    <div class="col-md-3">
         <!-- Login -->
         <?php
         
         if(isset($_SESSION['username'])){
             ?>
            <div class="card my-4">
         <form action="login.php" method="post">
          <h5 class="card-header">Logged in as</h5>
          <div class="card-body">
            <?php echo $_SESSION['user_firstName']." ".$_SESSION['user_lastName']; ?>
            </div>
    
         </form>
        </div>
    <?php 
         }else{
             ?>
             <div class="post-card my-4 p-3" style="background-color:#e8e8e8">
         <form action="login.php" method="post">
          <h5 class="post-card-header">Login</h5>
          <div class="post-card-body">
            <div class="form-group">
              <input name="username" type="text" class="form-control" placeholder="username">
              </div>
              <div class="input-group">
              <input type="password" name="password" class="form-control" placeholder="password">
              <span class="input-group-btn">
                <button class="btn btn-primary" name="login" type="submit">login</button>
              </span>
            </div>
          </div>
         </form>
        </div>
             
      <?php
         }
         ?>
         
        
        

        <!-- Search Widget -->
        <div class="post-card my-4 p-3" style="background-color:#e8e8e8">
         <form action="search.php" method="post">
          <h5 class="post-card-header">Search</h5>
          <div class="post-card-body">
            <div class="input-group">
              <input name="search" type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" name="submit" type="submit"><span class="fa fa-search"></span></button>
<!--                <span class="fa fa-search"></span>-->
              </span>
            </div>
          </div>
         </form>
        </div>

        <!-- Categories Widget -->
        
        
        
        
        
        
        
        <div class="post-card my-4 p-3" style="background-color:#e8e8e8">
          <h5 class="post-card-header">Explore</h5>
          <div class="post-card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li >
                   <?php
                      include "dbConnect.php";
                      global $connection;
                      $query="SELECT * FROM categories";
                      $query=mysqli_query($connection,$query);
                      if(!$query){
                          die("Query Failed.".mysqli_error($connection));
                      }
                      while($row=mysqli_fetch_assoc($query)){
                          $category=$row['category'];
                          echo "<a href='category_posts.php?category=$category' style='color:white' class='p-1 m-1 btn btn-dark'><strong>$category</strong></a><br> ";
                          
                      }
                      
                      
                      ?>
                    
                  
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!--- most viewed posts -->
        <div class="post-card my-4 p-3">
          <h5 class="post-card-header">Most Popular</h5>
          <div class="post-card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li >
                   <?php
                      include "dbConnect.php";
                      global $connection;
                      $query="SELECT * FROM posts where post_status='published' ORDER BY post_views DESC";
                      $query=mysqli_query($connection,$query);
                      if(!$query){
                          die("Query Failed.".mysqli_error($connection));
                      }
                      $i=0;
                      while($row=mysqli_fetch_assoc($query) and $i<10){
                          $i++;
                          $post_id=$row['post_id'];
                          $post_image=$row['post_image'];
                          $post_title=$row['post_title'];
//                          echo "<a href='post.php?post_id=$post_id'><img src='images/$post_image' width='20px' height=10px>$post_title</a><br> ";
                          ?>
                         
                         <a href="post.php?post_id=<?php echo $post_id?>">
                            <div class="media mb-4">
                             <img class="d-flex mr-3" src="images/<?php echo $post_image ?>" alt="" width="125px" height="75px">
          <div class="media-body">
           
            <h5 class="mt-0" style="font-family:'Zilla'; color:black"><?php echo $post_title?></h5>
          </div>
        </div>
                         </a>
          
                         <hr>
                          
                          
                    <?php      
                      }
                      
                      
                      ?>
                    
                  
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        
        <!--- most viewed posts -->
        <!-- Side Widget -->
        <div class="post-card my-4 p-3" style="background-color:#e8e8e8">
          <h5 class="post-card-header">Blog Info</h5>
          <div class="post-card-body">
           <?php 
              $query="SELECT * FROM users";
              $usersQuery=mysqli_query($connection,$query);
              $totalUsers=mysqli_num_rows($usersQuery);
              
              $query="SELECT * FROM posts where post_status='published'";
              $postsQuery=mysqli_query($connection,$query);
              $totalPosts=mysqli_num_rows($postsQuery);
              
              $query="SELECT SUM(post_views) AS totalViews FROM posts";
              $viewsQuery=mysqli_query($connection,$query);
                      ?>
                      
            <p>Total users:<?php echo $totalUsers?></p>
            <p>Total Blog posts:<?php echo $totalPosts?></p>
            
            
          </div>
        </div>

      </div>