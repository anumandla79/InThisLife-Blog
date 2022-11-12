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
                    <table class="table table-bordered table-hover"  >
                        <thead>
                            <tr>
                                <th>user_id</th>
                                <th>username</th>
                                <th>user_firstName</th>
                                <th>user_lastName</th>
                                <th>user_email</th>
                                <th>user_profile_pic</th>
                                <th>user_role</th>
                                <th class="text-center" colspan="2">Change Role</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                           $query="SELECT * FROM users ORDER BY user_id DESC";
                            $user_query=mysqli_query($connection,$query);
                            if(!$user_query){
                                die("Query Failed.".mysqli_error($connection));
                            }
                           while($row=mysqli_fetch_assoc($user_query)){
                               $user_id=$row['user_id'];
                               $username=$row['username'];
                               $user_firstName=$row['user_firstName'];
                               $user_lastName=$row['user_lastName'];
                               $user_email=$row['user_email'];
                               $user_image=$row['user_image'];
                               $user_role=$row['user_role'];
                               
                         
                               
                        
                               
                            echo "<tr>";
                                echo "<td>$user_id</td>";
                                echo "<td>$username</td>";  
                                echo "<td>$user_firstName</td>";
                                echo "<td>$user_lastName</td>";
                               echo "<td>$user_email</td>";
                                echo "<td><img width=100 height=50 src=../../images/$user_image alt=$user_image></td>";
                                echo "<td>$user_role</td>";
                               echo "<td><a class='btn btn-primary' href='blog_users.php?role=admin&user_id=$user_id'>admin</a></td>";
                               echo "<td><a class='btn btn-success' href='blog_users.php?role=subscriber&user_id=$user_id'>subscriber</a></td>";
                               echo "<td><a class='btn btn-info' href='edit_user.php?edit=$user_id'>Edit</a></td>";
                               echo "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure, you want to delete');\" href='blog_users.php?delete=$user_id'>Delete</a></td>";
                                
                                
                                //status approval------
                               
                               
                               
                               
                               
                               //-----------------
                               
                            
                            
                           }
                            ?>
                           <?php 
                            if(isset($_GET['role'])){
                                $role=escape($_GET['role']);
                                $user_id=escape($_GET['user_id']);
                                $query="UPDATE users SET user_role='$role' WHERE user_id='$user_id'";
                                $query=mysqli_query($connection,$query);
                                if(!$query){
                                die("Query Failed.".mysqli_error($connection));
                                }
                                header("Location:blog_users.php");
                            }
                            
                            
                            
                            ?>
                            <?php
                            if(isset($_GET['delete'])){
                                   $user_id=escape($_GET['delete']);
                                   
                                   $query="DELETE FROM users WHERE user_id=$user_id";
                                   $query=mysqli_query($connection,$query);
                                   if(!$query){
                                       die("Query Failed.".mysqli_error($connection));
                                   }
                                   header("Location:blog_users.php");
    
                                   
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