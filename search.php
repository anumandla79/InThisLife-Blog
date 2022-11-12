<!DOCTYPE html>
<html lang="en">
<head>
<?php include "database/home-header.php";  ?>
</head>
<body>
<!-- Navigation -->
 <?php include "database/home-navbar.php";  ?>
    
  <!-- Page Content -->
  <div style="background-color:#f4f4f2">
  <div class="container-fluid" >

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-6">
       <div style="background-color:#e8e8e8" class="p-4 m-4">
        
        <?php
        include "database/dbConnect.php";
        //global $connection;
        if(isset($_POST['submit'])){
             
             $search=escape($_POST['search']);
            
             $query="SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
             $query=mysqli_query($connection,$query);
            if(!$query){
                die("Query Failed.".mysqli_error($connection));
            }
            $count=mysqli_num_rows($query);
            if($count==0){
                echo "<h1>NO RESULT FOUND!</h1>";
            }else{
                ?>
                 <h1 class="p-2 text-center bg-dark" style="color:white"><small>Results for-<?php echo $search?></small></h1>

        <!-- Blog Post -->
         <?php
              
              while($row=mysqli_fetch_assoc($query)){
                  $post_title=$row['post_title'];
                  $post_author=$row['post_author'];
                  $post_date=$row['post_date'];
                  $post_tags=$row['post_tags'];
                  $post_content=substr($row['post_content'],0,100);
                  $post_image=$row['post_image'];
                  $post_author=$row['post_author'];
                  
            ?>
             
        <div class="post-card mb-4" >
         <a href="post.php?post_id=<?php echo $post_id?>"><img class="card-img-top"  src="images/<?php echo $post_image ?>" alt="Card image cap" ></a>
          
          <div class="card-body p-3 m-3" style="background-color:white; margin-bottom:200px">
          <a href="post.php?post_id=<?php echo $post_id?>" style="color:black"><h2 class="card-title" style="font-family: 'Zilla Slab', serif;"><?php echo $post_title?></h2></a>
            
            <p class="card-text"><?php echo $post_content ?></p>
            <a href="post.php?post_id=<?php echo $post_id?>" class="btn btn-dark" style="color:white">Read More &rarr;</a>
          </div>
          <div class="card-footer text-center text-muted">
            Posted on <?php echo $post_date ?> by
            <a href="author_posts.php?post_author=<?php echo $post_author ?>" style="color:black; font-family:'Zilla Slab'; font-size:20px"><?php echo $post_author ?></a>
            <br>
            <br>
          </div>
        </div>
            <hr>
             
        <?php
             
              }
              
    
                
                
                
            }
        
       
        
        }
        
        
        
        
        
        
        
        
        ?>
        
        
           
           
           
           
           
           
           
        
        
        

        

        <!-- Pagination -->
<!--
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>

      </div>
-->

      <!-- Sidebar Widgets Column -->
      </div>
      </div>
       <?php include "database/home-sidebar.php";  ?>
      

    
    
    <!-- /.row -->

  </div>
  <!-- /.container -->
</div>
</div>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Bharata Vibhavam 2020</p>
    </div>
    <!-- /.container -->
  </footer>
  
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

                
                
                
                
                
                
 
        
        
        
        
        
        
        
        
        
        
        

       