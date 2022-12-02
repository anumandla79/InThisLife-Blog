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

        <h1 class="p-2 text-center bg-dark" style="color:white">
         

        <!-- Blog Post -->
         <?php
           include "database/dbConnect.php";
          if(isset($_GET['category'])){
              $post_category=$_GET['category'];?>
               <small><?php echo $post_category?></small>
        </h1>
             <?php
                   $query="SELECT * FROM posts WHERE post_status='published' and post_category='$post_category'";
          $page_query=mysqli_query($connection,$query);
          if(!$page_query){
              die("Query Failed.".mysqli_error($connection));
          }
          $posts=mysqli_num_rows($page_query);
          $per_page=3;
          $pages=ceil($posts/$per_page);
          
          
          if(isset($_GET['page'])){
              $page_no=$_GET['page'];
              $page=($per_page*$_GET['page'])-$per_page;
          }else{
              $page_no=1;
              $page=0;
          }
              
              
              
              
              $query="SELECT * FROM posts WHERE post_category='$post_category' LIMIT $page,$per_page";
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
          ?> 
           
           
           
           
           
           
           
           
        
        
        

        

        <!-- Pagination -->
      <ul class="pagination justify-content-center mb-4">
          <?php
          
          
          for($i=1;$i<=$pages;$i++){
              if($i==$page_no){
                  echo "<li class='page-item '>";
              echo "<a class='page-link bg-warning' href='category_posts.php?category=$post_category&page=$i'>$i</a>";
                  
              }else{
              echo "<li class='page-item'>";
              echo "<a class='page-link' href='category_posts.php?category=$post_category&page=$i'>$i</a>";
              }
          }
          
          ?>
          
      </ul>


      </div>

      <!-- Sidebar Widgets Column -->
      </div>
       <?php include "database/home-sidebar.php";  ?>
      

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
</div>
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
