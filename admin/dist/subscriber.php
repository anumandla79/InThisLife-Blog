

 <?php include "../../database/dbConnect.php";?>
  
   <?php include "includes/header.php"; ?>
   
 <?php
if(isset($_SESSION['user_role'])&& $_SESSION['user_role']=='subscriber'){
    
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