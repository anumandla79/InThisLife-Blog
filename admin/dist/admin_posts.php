<?php include "../../database/dbConnect.php";?>
   <?php include "includes/header.php"; ?>
     
 <?php
if(isset($_SESSION['user_role'])&& $_SESSION['user_role']=='admin'){
    
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
                    <h1 class="text-center">Welcome... Nikhil Anumandla</h1>
                    <hr>
                    <?php
                    if(isset($_GET['delete'])){
                        $delete_id=escape($_GET['delete']);
                        $query="DELETE FROM posts WHERE post_id=$delete_id";
                        $delete_post_query=mysqli_query($connection,$query);
                        if(!$delete_post_query){
                            die("Query Failed.".mysqli_error($connection));
                        }
                        header("Location:admin_posts.php");
                    }
                    
                    ?>
                    <?php
                        if(isset($_POST['checkBoxArray'])){
                            foreach($_POST['checkBoxArray'] as $checkBoxValue){
                                $bulkOptions=escape($_POST['bulkOptions']);
                                switch ($bulkOptions){
                                case 'draft':
                                $query="UPDATE posts SET post_status='draft' WHERE post_id=$checkBoxValue";
                                $query=mysqli_query($connection,$query);
                                if(!$query){
                                    die("Query Failed.".mysqli_error($connection));
                                }
                                break;
                                case 'publish':
                                $query="UPDATE posts SET post_status='published' WHERE post_id=$checkBoxValue";
                                $query=mysqli_query($connection,$query);
                                if(!$query){
                                    die("Query Failed.".mysqli_error($connection));
                                }
                                        break;
                                case 'delete':
                                $query="DELETE FROM posts WHERE post_id=$checkBoxValue";
                                $query=mysqli_query($connection,$query);
                                if(!$query){
                                    die("Query Failed.".mysqli_error($connection));
                                }
                                        break;
                                case 'none':
                                echo "Select Appropriate Change Option.";
                                break;  
                                        
                                case 'clone':
                                        $query="SELECT * FROM posts WHERE post_id=$checkBoxValue";
                                        $query=mysqli_query($connection,$query);
                                if(!$query){
                                    die("Query Failed.".mysqli_error($connection));
                                }
                                        while($row=mysqli_fetch_assoc($query)){
                                            
                                            $post_category=escape($row['post_category']);
                                            $post_title=escape($row['post_title']);
                                            $post_author=escape($row['post_author']);
                                            $post_date=escape($row['post_date']);
                                            $post_image=escape($row['post_image']);
                                            $post_content=escape($row['post_content']);
                                            $post_tags=escape($row['post_tags']);
                                            $post_status=escape($row['post_status']);
                                            $post_comment_count=escape($row['post_comment_count']);
                                        }
                                            
                                            $query="INSERT INTO posts(post_category,post_title,post_author,post_date,post_image,post_content,post_tags,post_status,post_comment_count) VALUES('$post_category','$post_title','$post_author',now(),'$post_image','$post_content','$post_tags','$post_status','$post_comment_count')";
                                            $query=mysqli_query($connection,$query);
                                            if(!$query){
                                                die("Query Failed.".mysqli_error($connection));
                                            }
                                        
                                        
                                        
                                }
                            }
                        }
                        
                        ?>
                    <?php
                        
                        
                    ?>
                    <form action="" method="post">
                    <table class="table table-bordered table-hover">
                       <div class="col-xs-4 ">
                           <select name="bulkOptions" id="bulkOptions" class="form-control">
                               <option value="none">Select Options</option>
                               <option value="draft">Draft</option>
                               <option value="publish">Publish</option>
                               <option value="delete">Delete</option>
                               <option value="clone">Clone</option>
                           </select>
                           
                        </div>
                           <div class="col-xs-4">
                              <input type="submit" value="Apply" name="apply" class="btn btn-success">
                           <a href="add_post.php" class="btn btn-primary">Add new</a>  
                           </div>
                       <br>
                       <br>
                       <hr>
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAll" name="selectAll"></th>
                                <th>post_id</th>
                                <th>post category</th>
                                <th>post title</th>
                                <th>post author</th>
                                <th>post date</th>
                                <th>post_image</th>
                                <th>post_content</th>
                                <th>post tags</th>
                                <th>post status</th>
                                <th>post comment count</th>
                                <th>Publish</th>
                                <th>delete post</th>
                                <th>edit post</th>
                                <th>post views</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $query="SELECT * FROM posts ORDER BY post_id DESC";
                            $query=mysqli_query($connection,$query);
                            if(!$query){
                                die("Query Failed.".mysqli_error($connection));
                            }
                            while($row=mysqli_fetch_assoc($query)){
                                $post_id=$row['post_id'];
                                $post_category=$row['post_category'];
                                $post_title=$row['post_title'];
                                $post_author=$row['post_author'];
                                $post_date=$row['post_date'];
                                $post_image=$row['post_image'];
                                $post_content=$row['post_content'];
                                $post_tags=$row['post_tags'];
                                $post_views=$row['post_views'];
                                $post_status=$row['post_status'];
                                
                                $comments_query="SELECT * FROM comments WHERE comment_post_id=$post_id";
                                $comments_query=mysqli_query($connection,$comments_query);
                                if(!$query){
                                    die('Query Failed.'.mysqli_error($connection));
                                }
                                $post_comment_count=mysqli_num_rows($comments_query);
                                echo "<tr>";
                                ?>
                                
                                <td><input type="checkbox" class="checkBoxArray" name="checkBoxArray[]" value="<?php echo $post_id ;?>"></td>
                                
                                <?php
                                echo "<td>$post_id</td>";
                                echo "<td>$post_category</td>";
                                echo "<td><a href='../../post.php?post_id=$post_id'>$post_title</a></td>";
                                echo "<td>$post_author</td>";
                                echo "<td>$post_date<span class='far fa-clock'> <span></td>";
                                echo "<td><img width=100 src=../../images/$post_image alt=$post_image></td>";
                                echo "<td>$post_content</td>";
                                echo "<td>$post_tags</td>";
                                
                                echo "<td>$post_status</td>";
                                echo "<td><a href='post_comments.php?post_id=$post_id'>$post_comment_count&nbsp;&nbsp;<span class='fas fa-calculator'> <span></a></td>";
                                echo "<td><a class='btn btn-primary' href='admin_posts.php?post_id=$post_id&status=published'>Publish</a></td>";
                              
                                echo "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure, you want to delete');\" href='admin_posts.php?delete=$post_id'>Delete</a></td>";
                                echo "<td><a class='btn btn-info' href='edit_post.php?edit=$post_id'>Edit</a></td>";
                                echo "<td><a onClick=\"javascript: return confirm('Are you sure, you want to reset views?');\" href='admin_posts.php?reset=$post_id'>$post_views<span class='far fa-eye'> <span></a></td>";
                                echo "</tr>";
                                
                            }
                            
                            
                            
                           ?> 
                        </tbody>
                    </table>
                    </form>
                    <?php
                    if(isset($_GET['status'])){
                        $post_id=escape($_GET['post_id']);
                        $post_status=escape($_GET['status']);
                        $query="UPDATE posts SET post_status='$post_status' WHERE post_id=$post_id";
                        $query=mysqli_query($connection,$query);
                        if(!$query){
                            die("Query Failed.".mysqli_error($connection));
                            
                        }
                        header("Location:admin_posts.php");
                        
                        
                    }
                    if(isset($_GET['reset'])){
                        $post_id=escape($_GET['reset']);
                        $query="UPDATE posts SET post_views=0 WHERE post_id=$post_id";
                        $query=mysqli_query($connection,$query);
                        if(!$query){
                            die("Query Failed.".mysqli_error($connection));
                            
                        }
                        header("Location:admin_posts.php");
                        
                        
                    }
                        
                        
                    ?>
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