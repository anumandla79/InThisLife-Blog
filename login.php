<?php include "database/dbConnect.php"?>
<?php session_start();?>
<?php

if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $username=mysqli_real_escape_string($connection,$username);
    $password=mysqli_real_escape_string($connection,$password);
     
    
    $query="SELECT * FROM users WHERE username='$username'";
    $query=mysqli_query($connection,$query);
    if(!$query){
        die("Query Failed.".mysqli_error($connection));
    }
    if($row=mysqli_fetch_assoc($query)){
        $db_user_id=$row['user_id'];
        $db_username=$row['username'];
        $db_user_password=$row['user_password'];
        $db_user_firstName=$row['user_firstName'];
        $db_user_lastName=$row['user_lastName'];
        $db_user_image=$row['user_image'];
        $db_user_email=$row['user_email'];
        $db_user_role=$row['user_role'];
//        $password=crypt($password,$db_user_password);
            if(password_verify($password,$db_user_password)){
                $_SESSION['user_id']=$db_user_id;
                $_SESSION['username']=$db_username;
                $_SESSION['user_firstName']=$db_user_firstName;
                $_SESSION['user_lastName']=$db_user_lastName;
                $_SESSION['user_image']=$db_user_image;
                $_SESSION['user_email']=$db_user_email;
                $_SESSION['user_role']=$db_user_role;
                header("Location:index.php");
                
            }else{
                
                header("Location:index.php");
            }
            
            
    }else{
      
        header("Location:index.php");
    }
    
    
    
    
    
}




?>