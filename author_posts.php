<!DOCTYPE html>
<html lang="en">
<head>
<?php include "database/home-header.php";  ?>
</head>
<body>
<!-- Navigation -->
 <?php include "database/home-navbar.php";  ?>
    
  <!-- Page Content -->
  <div class="container" >

    <div class="row">

      <!-- Blog Entries Column -->

      <div class="col-md-8">

        <h1 class="my-4">Author posts-
         

        <!-- Blog Post -->
         <?php
           include "database/dbConnect.php";
          if(isset($_GET['post_author'])){
              $post_author=$_GET['post_author'];?>
               <small><?php echo $post_author;?></small>
        </h1>
             <?php
              $query="SELECT * FROM posts WHERE post_status='published'and post_author='$post_author'";
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
                  
            ?>
             
        <div class="card mb-4">
          <img class="card-img-top" src="images/<?php echo $post_image ?>" alt="Card image cap">
          <div class="card-body">
          
            <h2 class="card-title"><?php echo $post_title?></h2>
            <p class="card-text"><?php echo $post_content ?></p>
            <a href="post.php?post_id=<?php echo $post_id?>" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on <?php echo $post_date ?> by
            <a href="#"><?php echo $post_author ?></a>
          </div>
        </div>
             
        <?php
             
              }
              
          }
          ?> 
           
           
           
           
           
           
           
           
        
        
        

        

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>

      </div>

      <!-- Sidebar Widgets Column -->
       <?php include "database/home-sidebar.php";  ?>
      

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; In THis LiFe 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
