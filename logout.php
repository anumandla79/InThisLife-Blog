<?php include "database/dbConnect.php";
session_start();

$_SESSION['username']=null;
$_SESSION['user_firstName']=null;
$_SESSION['user_lastName']=null;
$_SESSION['user_email']=null;
$_SESSION['user_role']=null;

header("Location:index.php");
?>
