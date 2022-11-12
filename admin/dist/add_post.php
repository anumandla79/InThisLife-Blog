<?php include "../../database/dbConnect.php";?>
  
   <?php include "includes/header.php"; ?>
 <?php
if(isset($_SESSION['user_role'])){
    
?>
    <body class="sb-nav-fixed">
        <?php include "includes/navbar.php";?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include "includes/sidenav.php";?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <?php
  if(isset($_POST['publish_post'])){
      $post_category=escape($_POST['post_category']);
      $post_title=escape($_POST['post_title']);
      $post_author=escape($_POST['post_author']);
      $post_image=escape($_FILES['post_image']['name']);
      $post_image_temp=escape($_FILES['post_image']['tmp_name']);
      $post_content=escape($_POST['post_content']);
      $post_tags=escape($_POST['post_tags']);
      $post_status=escape($_POST['post_status']);
      $post_date=date('d-m-y');      
      //$post_comment_count=4;
      move_uploaded_file($post_image_temp,"../../images/$post_image");
    
      $query="INSERT INTO posts(post_category,post_title,post_author,post_date,post_image,post_content,post_tags,post_status) VALUES('$post_category','$post_title','$post_author',now(),'$post_image','$post_content','$post_tags','$post_status')";
      $addPost=mysqli_query($connection,$query);
      if(!$addPost){
          die("Query Failed.".mysqli_error($connection));
      }
      $post_id=mysqli_insert_id($connection);
      echo "Post Published Successfully.<a href='../../post.php?post_id=$post_id'>View post.</a>";

      
      
      
      
      
  }
  
  
  ?>
                    <h1 class="text-center">Add Post Entry</h1>
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                       <label for="post_category ">Post Category...</label>
                         <select class="form-control" placeholder="choose category" name="post_category" required>
                             <option value="Temples">Select Category</option>
                       <?php
                $query="SELECT * FROM categories";
                $query=mysqli_query($connection,$query);
                if(!$query){
                    die("Query Failed.".mysqli_error());
                }
          
        
                 while($row=mysqli_fetch_assoc($query)){
                                  
                     $category=$row['category'];
               
                        
                          echo "<option value='$category'>$category</option>";
                              
                     }
                               
                 ?>
                          
                        </select>
                    </div>
                    <div class="form-group">
                       <label for="post_title ">Post Title...</label>
                        <input type="text" class="form-control" placeholder="" name="post_title" required>
                    </div>
                    <div class="form-group">
                       <label for="post_author ">Post author...</label>
                        <input type="text" class="form-control" value="<?php echo $_SESSION['username']?>" name="post_author"  readonly>
                    </div>
                    <div class="form-group">
                       <label for="post_image ">Choose Image</label>
                        <input type="file" class="form-control" placeholder="Post Image..." name="post_image" required>
                    </div>
                    <div class="form-group">
                       <label for="post_content ">Post Content...</label>
                        <textarea  id="editor1" name="post_content" class="form-control" placeholder="" required></textarea>
                        <script>
                            CKEDITOR.replace( 'editor1' );
                        </script>
                    </div>
                    <div class="form-group">
                       <label for="post_tags ">Post Tags...</label>
                        <input type="text" class="form-control" placeholder="" name="post_tags" required>
                    </div>
                    <div class="form-group">
                       <label for="post_status ">Post status...</label>
                        <select class='form-control'name="post_status" id="">
                           <option value="draft">select</option>
                            <option value="published">Publish</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" value="Publish post" name="publish_post">
                    </div>
                    
                    
                    
                    </form>
                    </div>
                </main>
                <?php include "includes/footer.php"; ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
<?php
}
else{
    header("Location:../../index.php");
}
?>