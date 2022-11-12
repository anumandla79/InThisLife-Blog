<?php include "../../database/dbConnect.php";?>
  
   <?php include "includes/header.php"; ?>
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
                        if(isset($_GET['edit'])){
                       $post_id=$_GET['edit'];
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
      
      move_uploaded_file($post_image_temp,"../../images/$post_image");
      if($post_image==null){
          $query="SELECT * FROM posts WHERE post_id=$post_id";
          $img_query=mysqli_query($connection,$query);
          while($row=mysqli_fetch_assoc($img_query)){
              $post_image=$row['post_image'];
          }
      }
      $query="UPDATE posts SET post_category='$post_category',post_title='$post_title',post_author='$post_author',post_image='$post_image',post_content='$post_content',post_tags='$post_tags',post_status='$post_status' WHERE post_id=$post_id";
      $updatePost=mysqli_query($connection,$query);
      if(!$updatePost){
          die("Query Failed.".mysqli_error($connection));
      }
      
      echo "<h3>Post Updated Successfully.<h3>";
      
      
      
      
      
  }
}
  
  
  ?>
                   <?php
                   if(isset($_GET['edit'])){
                       $post_id=escape($_GET['edit']);
                       $query="SELECT * FROM posts WHERE post_id=$post_id";
                       $edit_query=mysqli_query($connection,$query);
                       if(!$edit_query){
                           die("Query Failed.".mysqli_error($connection));
                       }
                       while($row=mysqli_fetch_assoc($edit_query)){
                           $post_category=$row['post_category'];
                           $post_title=$row['post_title'];
                           $post_author=$row['post_author'];
                           $post_image=$row['post_image'];
                           $post_content=$row['post_content'];
                           $post_tags=$row['post_tags'];
                           $post_status=$row['post_status'];
                           
                                                      

                       }
                       
                   }
                   
                   
                   
                   ?>
                    
                    <h1 class="text-center">Edit Post Entry</h1>
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                       <label for="post_category ">Post Category...</label>
                       <select class="form-control" placeholder="choose category" name="post_category" required>
                       
                            <option value="<?php echo $post_category; ?>"><?php echo $post_category; ?></option>
                       
                       
                       <?php
                $query="SELECT * FROM categories";
                $query=mysqli_query($connection,$query);
                if(!$query){
                    die("Query Failed.".mysqli_error());
                }
          
        
                 while($row=mysqli_fetch_assoc($query)){
                                  
                     $category=$row['category'];
                     
               
                        if($post_category==$category){
//                           echo "<option value='$category'>$category</option>"; 
                        }else{
                          echo "<option value='$category'>$category</option>";
                        }
                     }
                               
                 ?>
                          
                        </select>
                    </div>
                    <div class="form-group">
                       <label for="post_title ">Post Title...</label>
                        <input type="text" class="form-control" value="<?php echo $post_title?>" name="post_title" required>
                    </div>
                    <div class="form-group">
                       <label for="post_author ">Post author...</label>
                        <input type="text" class="form-control" value="<?php  echo $post_author?>" name="post_author" required>
                    </div>
                    <div class="form-group">
                      <img width=100 class="img-responsive"src="../../images/<?php echo $post_image ?>" alt="post_img">
                       <label for="post_image ">Change Image</label>
                        <input type="file" class="form-control" value="../../images/<?php echo $post_image?> "  name="post_image" >
                    </div>
                    <div class="form-group">
                       <label for="post_content ">Post Content...</label>
                        <textarea name="post_content" rows="10" class="form-control" id='editor1' required><?php  echo $post_content?></textarea>
                        <script>
                            CKEDITOR.replace( 'editor1' );
                        </script>
                    </div>
                    <div class="form-group">
                       <label for="post_tags ">Post Tags...</label>
                        <input type="text" class="form-control" value="<?php  echo $post_tags?>" name="post_tags" required>
                    </div>
                    <div class="form-group">
                       <label for="post_status ">Post status...</label>
                        <select  class="form-control" value="" name="post_status">
                            <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
                            <?php
                            if($post_status=='published'){
                                echo "<option value='draft'>draft</option>";
                            }else{
                                echo "<option value='published'>published</option>";
                            }
                        
                        ?>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" value="Update post" name="publish_post">
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
