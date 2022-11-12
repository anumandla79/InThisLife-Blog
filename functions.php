<?php

//
//function online_users(){
//    
//global $connection;
//        
// $session=session_id();
//$time=time();
//$sec=30;
//$time_out=$time-$sec;
//    
//    $query="SELECT * FROM online_users WHERE session='$session'";
//    $query=mysqli_query($connection,$query);
//    if(!$query){
//        die("Query Failed.".mysqli_error($connection));
//    }
//$current_users=mysqli_num_rows($query);
//if($current_users==null){
//    $query="INSERT INTO online_users(session,time) VALUES('$session','$time')";
//    $query=mysqli_query($connection,$query);
//}else{
//    $query="UPDATE online_users SET time='$time' WHERE session='$session'";
//    $query=mysqli_query($connection,$query);
//   
//}
//    $query="SELECT * FROM online_users WHERE time>$time_out";
//    $query=mysqli_query($connection,$query);
//    $current_users=mysqli_num_rows($query);
//    return $current_users;
//        }
//
//        
//    


?>


<?php
function escape($string){
    global $connection;
    return mysqli_real_escape_string($connection,trim($string));
    
}
function user_exists($username,$email){     
    global $connection;
    $query="SELECT * FROM users WHERE username='$username' OR user_email='$email'";
    $query=mysqli_query($connection,$query);
    if(!$query){
        die("Query Failed.".mysqli_error($connection));
    }
   
    if(mysqli_num_rows($query)>0){
        return true;
    }else{
        return false;
    }
 }        

?>




