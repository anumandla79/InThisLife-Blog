<?php include "../../database/dbConnect.php";?>
   <?php include "includes/header.php"; ?>
    <body class="sb-nav-fixed">
        <?php include "includes/navbar.php";?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include "includes/sidenav.php";?>
            </div>
            <div id="layoutSidenav_content">
       
                    <div class="container-fluid">

                    
                    <hr>
                    <?php
if(isset($_POST['update_user'])){
      $user_id=escape($_SESSION['user_id']);
      $username=escape($_POST['username']);
      $user_firstName=escape($_POST['user_firstName']);
      $user_lastName=escape($_POST['user_lastName']);
  
        $user_image=escape($_FILES['user_image']['name']);
      $user_image_temp=escape($_FILES['user_image']['tmp_name']);
    
      
      $user_password=escape($_POST['user_password']);
      $user_email=escape($_POST['user_email']);
      $user_role=escape($_POST['user_role']);
      
          
//    $query="SELECT randSalt FROM users";
//    $query=mysqli_query($connection,$query);
//    if(!$query){
//        die("Query Failed.".mysqli_error($connection));
//    }
//    $row=mysqli_fetch_assoc($query);
//    $salt=$row['randSalt'];
//    $hash_password=crypt($user_password,$salt);
    if(empty($user_password)){
          $query="SELECT * FROM users WHERE user_id='$user_id'";
          $query=mysqli_query($connection,$query);
          $row=mysqli_fetch_assoc($query);
          $hash_password=$row['user_password'];
      }else{
      
      
      $hash_password=password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>12));
      }
      
      move_uploaded_file($user_image_temp,"../../images/$user_image");
      if($user_image==null){
          $query="SELECT * FROM users WHERE user_id=$user_id";
          $img_query=mysqli_query($connection,$query);
          while($row=mysqli_fetch_assoc($img_query)){
              $user_image=$row['user_image'];
          }
      }
    
      $query="UPDATE users SET username='$username',user_firstName='$user_firstName',user_lastName='$user_lastName',user_password='$hash_password',user_email='$user_email',user_image='$user_image',user_role='$user_role' WHERE user_id='$user_id'";
      $updateUser=mysqli_query($connection,$query);
      if(!$updateUser){
          die("Query Failed.".mysqli_error($connection));
      }
      header("Location:profile.php");
      
      
      
      
  }
  ?>
    <?php
         
         if(isset($_SESSION['user_id'])){
             $user_id=$_SESSION['user_id'];
             
             $query="SELECT * FROM users WHERE user_id=$user_id";
             $query=mysqli_query($connection,$query);
             if(!$query){
                 die("Query Failed.".mysqli_error($connection));
                 
             }
             if($row=mysqli_fetch_assoc($query)){
                 $username=$row['username'];
                 $user_firstName=$row['user_firstName'];
                 $user_lastName=$row['user_lastName'];
                 //$user_password=$row['user_password'];
                 $user_email=$row['user_email'];
                 $user_image=$row['user_image'];
                 $user_role=$row['user_role'];
                 
                 
                 
             }
             
             
             
         }
                   
                   
                   
         ?>          
                                           <br>                                
                    <h3 class="text-center mt-5"><i><strong>Welcome<?php echo ' '.$_SESSION['user_firstName'].' '.$_SESSION['user_lastName'];?></strong></i></h3>
                    <div class="text-center">
                    <img src="../../images/<?php echo $user_image;?>" style="border-radius:50%;" width="200" height="200" alt="profile_pic">
                    </div>
                    <h3 class="text-center"><i><strong><?php echo $_SESSION['username'];?></strong></i></h3>
                    <?php
//if(isset($_SESSION['user_role'])&& $_SESSION['user_role']=='admin'){
//    echo "<div class='text-center'>
//                   <a href='index.php'><button class='btn btn-primary'>Dashboard</button></a>
//    
//</div>";
//    
//    
//
//}elseif($_SESSION['user_role']=='subscriber'){
//    
//    echo "<div class='text-center'>
//                   <a href='subscriber.php'><button class='btn btn-primary'>Dashboard</button></a>
//    
//</div>";
//        
//    
//}

?>
                    <hr>
                    
                    
                    
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                       <label for="username">Username...</label>
                        <input type="text" class="form-control" value="<?php echo $username ?>" name="username" required>
                    </div>
                    <div class="form-group">
                       <label for="user_firstName ">User firstName...</label>
                        <input type="text" class="form-control" value="<?php echo $user_firstName ?>" name="user_firstName" required>
                    </div>
                    <div class="form-group">
                       <label for="user_lastName ">User lastName...</label>
                        <input type="text" class="form-control" value="<?php echo $user_lastName ?>" name="user_lastName" required>
                    </div>
                    <div class="form-group">
                       <label for="user_password">Set new password...</label>
                        <input type="password" name="user_password" class="form-control" value="">
                    </div>
                    <div class="form-group">
                       <label for="user_email ">User email...</label>
                        <input type="email" name="user_email" class="form-control" value="<?php echo $user_email ?>" required>
                    </div>
                    <div class="form-group">
                       <label for="user_image ">Choose Profile Picture</label>
                        <input type="file" class="form-control" value="<?php echo $user_image; ?>" name="user_image">
                    </div>
                    
                    <div class="form-group">
                        <label for="user_role">User role...</label>
                        <select name="user_role" value="" class="form-control" id="">
                           <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>
                           <?php
                            if($user_role=='admin'){
                               echo "<option value='subcriber'>subcriber</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary  " value="Update" name="update_user">
                    </div>
     
                   
                  
                    </form>

        
                    </div>
                
                <?php include "includes/footer.php"; ?>
                
                </div>
                </div>
          
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        
    </body>
</html>
