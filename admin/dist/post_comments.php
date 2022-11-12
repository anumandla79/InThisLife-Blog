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
                    <h1 class="text-center" id='title'> Welcome... Nikhil Anumandla</h1>
                    <table class="table table-bordered table-hover"  >
                        <thead>
                            <tr>
                                <th>comment id</th>
                                <th>comment post_id</th>
                                <th>comment title</th>
                                <th>comment user</th>
                                <th>comment email</th>
                                <th>comment content</th>
                                <th>comment status</th>
                                <th>comment date</th>
                                <th>Approve</th>
                                <th>Unapprove</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                         $post_id=$_GET['post_id'];
                           $query="SELECT * FROM comments WHERE comment_post_id='$post_id'";
                            $comment_query=mysqli_query($connection,$query);
                            if(!$comment_query){
                                die("Query Failed.".mysqli_error($connection));
                            }
                           while($row=mysqli_fetch_assoc($comment_query)){
                               $comment_id=$row['comment_id'];
                               $comment_post_id=$row['comment_post_id'];
                               $comment_user=$row['comment_user'];
                               $comment_email=$row['comment_email'];
                               $comment_content=$row['comment_content'];
                               $comment_status=$row['comment_status'];
                               $comment_date=$row['comment_date'];
                               
                        
                               
                            echo "<tr>";
                                echo "<td>$comment_id</td>";
                                echo "<td>$comment_post_id</td>";
                               
                                $query="SELECT * FROM posts WHERE post_id=$comment_post_id";
                                $titlequery=mysqli_query($connection,$query);
                               if(!$titlequery){
                                   die("Query Failed.".mysqli_error($connection));
                               }
                               if($row=mysqli_fetch_assoc($titlequery)){
                                   $comment_title=$row['post_title'];
                               }
                               
                               echo "<td><a href='../../post.php?post_id=$comment_post_id'>$comment_title</a></td>";
                               // echo "<td>$comment_title</td>";
                                echo "<td>$comment_user</td>";
                                echo "<td>$comment_email</td>";
                                echo "<td>$comment_content</td>";
                                echo "<td>$comment_status</td>";
                                echo "<td>$comment_date</td>";
                                //status approval------
                               
                               
                               
                               
                               
                               //-----------------
                               echo "<td><a href='post_comments.php?comment_id=$comment_id&status=approved&comment_post_id=$comment_post_id'>approve</a></td>";
                               echo "<td><a href='post_comments.php?comment_id=$comment_id&status=Unapproved&comment_post_id=$comment_post_id'>Unapproved</a></td>";
                               echo "<td><a href='post_comments.php?delete=$comment_id&comment_post_id=$comment_post_id'>delete</a></td>";
                            echo "</tr>";
                            
                            
                           }
                            ?>
                            <?php
                            if(isset($_GET['status'])){
                                   $status=escape($_GET['status']);
                                   $comment_id=escape($_GET['comment_id']);
                                    $comment_post_id=escape($_GET['comment_post_id']);
                                   $query="UPDATE comments SET comment_status='$status' WHERE comment_id=$comment_id";
                                   $query=mysqli_query($connection,$query);
                                   if(!$query){
                                       die("Query Failed.".mysqli_error($connection));
                                   }
                                   header("Location:post_comments.php?post_id=$comment_post_id");
    
                                   
                               }
                               
                            
                            
                            ?>
                            <?php
                            if(isset($_GET['delete'])){
                                   $comment_id=escape($_GET['delete']);
                                   $comment_post_id=escape($_GET['comment_post_id']);
                                   $query="DELETE FROM comments WHERE comment_id=$comment_id";
                                   $query=mysqli_query($connection,$query);
                                   if(!$query){
                                       die("Query Failed.".mysqli_error($connection));
                                   }
                                   header("Location:post_comments.php?post_id=$comment_post_id");
    
                                   
                               }
                               
                            
                            
                            ?>
                        </tbody>
                    </table>
                   
                    
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