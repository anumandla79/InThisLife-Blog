
<html lang="en">
<head>
<?php include "database/dbConnect.php"; ?>
<?php include "database/home-header.php"; ?>
</head>

<body>
<!-- Navigation -->
 <?php include "database/home-navbar.php";  ?>
    


  <!-- Error check -->
  <?php
if(isset($_POST['register'])){
       
       
       $error=['username'=>'',
               'email'=>'',
               'password'=>''];
           
        $username=$_POST['username'];
       $email=$_POST['user_email'];
       $password=$_POST['user_password'];
       
       if(strlen($username)<=4){
           $error['username']='UserName needs to be longer.';
       }
       if(strlen($password)<=4){
           $error['password']='Password needs to be longer.';
       }
           
           
       

  
}
  
 
?>
                    <div class="container text-center">
                      
    <?php $msg="We Are Delighted."; ?>                  
              
                       <?php

 if(isset($_POST['register'])){  

    if(user_exists($_POST['username'],$_POST['user_email'])){
        
        $msg="username or email already existed.";
        
        
    }
     if(!empty($error['username']) || !empty($error['password'])){
         
     }
     
     else{
    
    
    
    
    
 
    $confirm=$_POST['confirm_password'];
    $user_password=$_POST['user_password'];
    if($confirm==$user_password){
    
    $username=$_POST['username']; 
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    
    
    
    $username=mysqli_real_escape_string($connection,$username);
    $user_email=mysqli_real_escape_string($connection,$user_email);
    $user_password=mysqli_real_escape_string($connection,$user_password);
     
        
//    $query="SELECT randSalt FROM users";
//    $query=mysqli_query($connection,$query);
//    if(!$query){
//        die("Query Failed.".mysqli_error($connection));
//    }
//        $row=mysqli_fetch_assoc($query);
//            $salt=$row['randSalt'];
//            
//        
//        
//    
//  
//    $user_password=crypt($user_password,$salt); 
      $user_password=password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>12));  

      
         
    $user_firstName=escape($_POST['user_firstName']); 
    $user_lastName=escape($_POST['user_lastName']); 
    $user_role='subscriber';
    
    $query="INSERT INTO users(username,user_firstName,user_lastName,user_email,user_password,user_role) VALUES('$username','$user_firstName','$user_lastName','$user_email','$user_password','$user_role')";
    $query=mysqli_query($connection,$query);
    if(!$query){
        die("Query Failed.".mysqli_error($connection));
    }
    $_SESSION['user_id']=mysqli_insert_id($connection);
    $_SESSION['username']=$username;
    $_SESSION['user_firstName']=$user_firstName;
    $_SESSION['user_lastName']=$user_lastName;
    $_SESSION['user_role']=$user_role;
        $msg="Registered Successfully.";
   header("Location:index.php");
    
    }else{
        $msg="Password Confirmation Failed.";
    }
    
}
    }


?>
                        <div class="row justify-content-center">

                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg m-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><?php echo $msg; ?></h3></div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                           <div class="form-group">
                                           <input class="form-control py-4" id="username" type="text" name="username" placeholder="Enter Username" required/>
                                           <p style="color:red"><?php echo isset($error['username'])? $error['username']: ' ' ?></p>
                                           </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><input class="form-control py-4" id="FirstName" name="user_firstName" type="text" placeholder="Enter first name" required /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><input class="form-control py-4" id="LastName" name="user_lastName" type="text" placeholder="Enter last name" required/></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><input class="form-control py-4" id="EmailAddress" name="user_email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" required /></div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <input class="form-control py-4" id="Password" name="user_password"  type="password" placeholder="Enter password" required />
                                                    <p style="color:red"><?php echo isset($error['password'])? $error['password']: ' ' ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><input class="form-control py-4" id="ConfirmPassword" name="confirm_password" type="password" placeholder="Confirm password" required /></div>
                                                </div>
                                            </div>
                                      
                                            <div class="form-group text-center">
                                              <button value="" class="btn btn-primary" name="register">REGISTER</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                     
                                        <div class="small"><a href="index.php">Have an account? Go to Home Page to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
