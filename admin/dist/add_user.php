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
                    <?php
  if(isset($_POST['add_user'])){
      $username=escape($_POST['username']);
      $user_firstName=escape($_POST['user_firstName']);
      $user_lastName=escape($_POST['user_lastName']);
      $user_image=escape($_FILES['user_image']['name']);
      $user_image_temp=escape($_FILES['user_image']['tmp_name']);
      $user_password=escape($_POST['user_password']);
      $user_email=escape($_POST['user_email']);
      $user_role=escape($_POST['user_role']);
      move_uploaded_file($user_image_temp,"../../images/$user_image");
      
//      $query="SELECT randSalt FROM users";
//      $query=mysqli_query($query);
//      $row=mysqli_fetch_assoc($query);
//      $randSalt=$row['randSalt'];
//      
//      $user_password=crypt($user_password,$randSalt);
      $user_password=password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>12));
    
      $query="INSERT INTO users(username,user_firstName,user_lastName,user_password,user_email,user_image,user_role) VALUES('$username','$user_firstName','$user_lastName','$user_password','$user_email','$user_image','$user_role')";
      $addUser=mysqli_query($connection,$query);
      if(!$addUser){
          die("Query Failed.".mysqli_error($connection));
      }else{
      
      echo "<h3>User added Successfully</h3>.";
      
      }
      
      
      
      
  }
  
  
  ?>
                    <h1 class="text-center">Add Users Info</h1>
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                       <label for="username">Username...</label>
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                    </div>
                    <div class="form-group">
                       <label for="user_firstName ">User firstName...</label>
                        <input type="text" class="form-control" placeholder="User firstName" name="user_firstName" required>
                    </div>
                    <div class="form-group">
                       <label for="user_lastName ">User lastName...</label>
                        <input type="text" class="form-control" placeholder="User lastName" name="user_lastName" required>
                    </div>
                    <div class="form-group">
                       <label for="user_password">User password...</label>
                        <input type="password" name="user_password" class="form-control" placeholder="User Password" required>
                    </div>
                    <div class="form-group">
                       <label for="user_email ">User email...</label>
                        <input type="email" name="user_email" class="form-control" placeholder="User email" required>
                    </div>
                    <div class="form-group">
                       <label for="user_image ">Choose Profile Picture</label>
                        <input type="file" class="form-control" placeholder="User Image..." name="user_image" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="user_role">User role...</label>
                        <select name="user_role" class="form-control" id="">
                            <option value="subcriber">subcriber</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary  " value="Add User" name="add_user">
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