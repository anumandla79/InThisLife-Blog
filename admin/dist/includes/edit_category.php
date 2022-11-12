<form action=""method="post" >
                         <div class="form-group">
                           
                            <?php
                           if(isset($_GET['edit'])){
                               $editId=escape($_GET['edit']);
                               $query="SELECT * FROM categories WHERE id='$editId'";
                               $edit_query=mysqli_query($connection,$query);
                               if(!$edit_query){
                                   die("Query Failed.".mysqli_error($connection));
                               }
                               while($row=mysqli_fetch_assoc($edit_query)){
                                   $id=$row['id'];
                                   $category=$row['category'];
                               }
                           
                               ?>
                            
                            <label for="category" ><h1>Edit Category Info</h1></label> 
                           <input class="form-control" type="text" placeholder="Enter Category Id" name="updated_Category" value="<?php if(isset($category)) echo $category ?>">
                         </div>
                             <input class="btn btn-primary" type="submit" value="Update Category" name="editSubmit">
                         <?php    
                        }
                           ?>
 </form>
                       
                      
                    <?php
                    if(isset($_POST['editSubmit'])){
                        
                      $updated_category=escape($_POST['updated_Category']);
                        $query="UPDATE categories SET category='{$updated_category}' WHERE id='$id'";
                        $update_query=mysqli_query($connection,$query);
                        if(!$update_query){
                            die("Query Failed.".mysqli_error($connection));
                        }
                        header("Location:categories.php");
                       
                      
                    }
                    ?>