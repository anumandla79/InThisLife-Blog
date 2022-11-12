<?php include "../../database/dbConnect.php";


?>

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
                   
                    <div class="row">
                    
                    <div class="col-lg-12">
                    
                    <div class="col-xs-6">
                     <?php
                      if(isset($_POST['submit'])){
                          $category_name=escape($_POST['category']);
                          if($category_name=="" || empty($category_name)){
                              echo "This field must be filled.";
                          }else{
                              $query="INSERT INTO categories(category) VALUE('$category_name')";
                              $insertQuery=mysqli_query($connection,$query);
                              if(!$insertQuery){
                                  die("Query Failed.".mysqli_error($connection));
                              }
                              echo "Category added Successfully.";
                          }
                          
                          
                          
                      }
                        
                        
                    ?>
                    
                       <form action=""method="post" >
                         <div class="form-group">
                             <label for="category" ><h1>Add Category Info</h1></label>
                           <input class="form-control" type="text" placeholder="Enter Category Name" name="category" required>
                         </div>
                        
                              <input class="btn btn-primary" type="submit" value="Add Category" name="submit">
                           
                        
                           
                           
                           
                           
                       </form>
                       <?php
                       if(isset($_GET['edit'])){
                           $id=escape($_GET['edit']);
                           include "includes/edit_category.php";
                       }
                        
                        
                       ?>
                       
                    </div>
                    <div class="col-xs-6">
                      
       
                       <h1>Blog Categories Info.</h1>
                       <table class="table table-bordered ">
                           <thead>
                               <tr>
                                   <th>id</th>
                                   <th>category</th>
                                   <th>delete Cateogory</th>
                                   <th>Edit Cateogory</th>
                               </tr>
                           </thead>
                           <tbody>
            <?php
            $query="SELECT * FROM categories";
            $query=mysqli_query($connection,$query);
            if(!$query){
                die("Query Failed.".mysqli_error());
            }
          
            ?>
                              <?php
                               while($row=mysqli_fetch_assoc($query)){
                                   $id=$row['id'];
                                   $category=$row['category'];
                                   echo "<tr>";
                                   echo "<td>$id</td>";
                                   echo "<td>$category</td>";
                                   echo "<td><a <a onClick=\"javascript: return confirm('Are you sure, you want to delete');\" href='categories.php?delete={$id}'>Delete</a></td>";
                                   echo "<td><a href='categories.php?edit={$id}'>Edit</a></td>";
                                   echo "</tr>";
                               }
                               
                               ?>
                           </tbody>
                            <?php
                           if(isset($_GET['delete'])){
                               $delete=escape($_GET['delete']);
                               $query="DELETE FROM categories WHERE id={$delete}";
                               $delete_query=mysqli_query($connection,$query);
                               if(!$delete_query){
                                   die("Query Failed.".mysqli_error($connection));
                               }
                               header("Location:categories.php");
                               
                               
                           }
                           ?>
                           
                       </table>

                       
                        
                    </div>
                    </div>
                    </div>
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