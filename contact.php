
<html lang="en">
<head>
<?php include "database/dbConnect.php"; ?>
<?php include "database/home-header.php";  ?>
</head>
<body>
<!-- Navigation -->
 <?php include "database/home-navbar.php";  ?>
    


  <!-- Page Content -->
 

                    <div class="container ">
                       <?php

if(isset($_POST['submit'])){
   $to="inthislife.blogger@gmail.com";
    $header="From:".$_POST['email'];
    $subject=$_POST['subject'];
    $msg=$_POST['msg'];
    mail($to,$subject,$msg,$header);
    
    
    
}


?>
                   <div class="row justify-content-center">
                    <div class='col-md-7'>
                     <div class="card m-4 shadow-lg rounded-lg mt-5">
                        <h4 class="text-center card-header">Message us</h4>

                        <form action="" method='post' class='form-group card-body '>
                           <div >
                            <label for="email">Your Email</label>
                            <input class='form-control' type="email" name='email'>
                           </div>
                           <div >
                            <label for="subject">Subject</label>
                            <input class='form-control' type="subject" name='subject'>
                           </div>
                           <div >
                            <label for="msg">Message</label>
                            <textarea class='form-control' name="msg" id="" rows="5"></textarea>
                           </div>
                           <br>
                           <div class="text-center">
                              <input type="submit" name="submit" class="btn btn-primary " value="submit">
                           </div>
                            
                            
                            
                            
                            
                        </form>
                         
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
