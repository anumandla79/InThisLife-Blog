<!DOCTYPE html>

<html lang="en">
<head>
<?php include "database/home-header.php";  ?>
</head>
<body>
<!-- Navigation -->
 <?php include "database/home-navbar.php";  ?>
    

   <div style="background-color:#f4f4f2">  
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8 mt-0">
      <div style="background-color:#e8e8e8" class="p-4"> 
<!--
      <?php 
      if(isset($_POST['liked'])){
          echo "<h1>HEY it works</h1>";
      }
          
      
      
      
       ?>
-->
         <?php
          if(isset($_GET['post_id'])){
              $post_id=$_GET['post_id'];
              include "database/dbConnect.php";
              
              $query="UPDATE posts SET post_views=post_views+1 WHERE post_id=$post_id";
              $views_count_query=mysqli_query($connection,$query);
              if(!$views_count_query){
              die("Query Failed.".mysqli_error($connection));
                  
              }
              
              $query="SELECT * FROM posts WHERE post_id=$post_id";
              $query=mysqli_query($connection,$query);
              if(!$query){
                  die("Query Failed.".mysqli_error($connection));
              }
              while($row=mysqli_fetch_assoc($query)){
                  $post_id=$row['post_id'];
                  $post_title=$row['post_title'];
                  $post_author=$row['post_author'];
                  $post_date=$row['post_date'];
                  $post_tags=$row['post_tags'];
                  $post_content=$row['post_content'];
                  $post_image=$row['post_image'];
                  $post_author=$row['post_author'];
                  $post_image=$row['post_image'];
                
              
            ?>

        <!-- Title -->
        <h1 class="pt-4"><?php echo $post_title ?></h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#"><?php echo $post_author ?></a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on <?php echo $post_date ." on ".time() ?></p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="images/<?php echo $post_image ?>" alt="post_img">

        <hr>

        <!-- Post Content -->
        <p class="lead"><?php echo $post_content ?></p>

        
        <?php
                  
              }
          }
          ?>
             
                  
        <a class="like btn btn-primary h4" href="#"><span class='far fa-thumbs-up'></span>Like</a>
                   

                  
                
            
           
          
          
               
<!--          <a class="btn btn-primary h4 like" href="#"><span class='far fa-thumbs-up'></span>Like</a>-->
          
<!--
          <?php
            $query="SELECT * FROM posts WHERE post_id='$post_id'";
            $query=mysqli_query($connection,$query);
            if(!$query){
                die("Query Failed.".mysqli_error($connection));
                
            }
          $row=mysqli_fetch_assoc($query);
          $post_likes=$row['post_likes'];
          
          
          ?>
-->
          
          <p class='float-right h5'><?php echo $post_likes; ?>&nbsp;Likes <span class='fas fa-heart fa-red' style="color:red"></span></p>
          <hr>
          <?php
          if(isset($_POST['comment_submit'])){
              if(isset($_SESSION['username'])){
                  $comment_user=$_SESSION['username'];
                  $comment_email=$_SESSION['user_email'];
              }else{
                  $comment_user=$_POST['comment_user'];
                  $comment_email=$_POST['comment_email'];
              }
              $comment_post_id=$_GET['post_id'];
              $comment_content=$_POST['comment_content'];
              $comment_date=date('d-m-y');
              
            
              $query="INSERT INTO comments(comment_post_id,comment_user,comment_email,comment_content,comment_date) VALUES('$comment_post_id','$comment_user','$comment_email','$comment_content',now())";
              $comment_query=mysqli_query($connection,$query);
              if(!$comment_query){
                  die("Query Failed.".mysqli_error($connection));
              }              
              echo  "Your Comment will be Updated Soon!";
          }
          
          
          
          ?>

        <!-- Comments Form -->
        <?php 
        if(isset($_SESSION['username'])){ ?>
             <div class="post-card">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form method="post">
             <div class="form-group">
              <textarea class="form-control" rows="3" name="comment_content" required></textarea>
              </div>
              <button name="comment_submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
              <?php
        }else{
            ?>
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form method="post">
             <div class="form-group">
                <input type="text" name="comment_user" class="form-control" placeholder="your name" required>
              </div>
              <div class="form-group">
                <input type="email" name="comment_email" class="form-control" placeholder="your email" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" rows="3" name="comment_content" required></textarea>
              </div>
              <button name="comment_submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
        
        <?php
        }
        ?>
        

        <!-- Single Comment -->
        <?php
        $post_id=$_GET['post_id'];
        $query="SELECT * FROM comments WHERE comment_post_id=$post_id ORDER BY comment_id DESC";
        $query=mysqli_query($connection,$query);
        if(!$query){
            die("Query Failed.".mysqli_error($connection));
        }
        while($row=mysqli_fetch_assoc($query)){
            $commenter=$row['comment_user'];
            $comment=$row['comment_content'];
            $status=$row['comment_status'];
           
            if($status=='approved'){
                
                
            ?>
            <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
           
            <h5 class="mt-0"><?php echo $commenter?></h5>
            <?php echo $comment?>
          </div>
        </div>
        <?php
            
        }
        }
        
    
        ?>
        
        

      </div>
</div>
      <!-- Sidebar Widgets Column -->
       <?php include "database/home-sidebar.php";  ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
</div>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Bharata Vibhavam 2020</p>
    </div>
    
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- /.container -->
  </footer>
  
  
</body>

</html>
  
<script>
    
      $(document).ready(function(){
          var post_id=<?php echo $post_id; ?>;
          
              
          
          $(".like").click(function(){
            var username=<?php echo $_SESSION['username'];?>
             $.ajax({
                 url:"post.php?post_id=<?php echo $post_id;?>&post_id=<?php echo $post_id?>&user_id=2",
                 type:"GET",
                 
             })
              
            
              
               
          });
         
      });
    </script>

  <!-- Bootstrap core JavaScript -->
