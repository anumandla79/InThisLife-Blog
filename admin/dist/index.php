

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
                    <h1 class="text-center">Welcome...<?php echo $_SESSION['user_firstName']." ".$_SESSION['user_lastName']; ?></h1>
                    <hr>
                           
                <!-- /.row -->
                
       
                <!-- /.row -->
                <?php 
                $query="SELECT * FROM posts";
                $postquery=mysqli_query($connection,$query);
                $post_count=mysqli_num_rows($postquery);
                        
                $query="SELECT * FROM comments";
                $commentquery=mysqli_query($connection,$query);
                $comment_count=mysqli_num_rows($commentquery);
                
                $query="SELECT * FROM users";
                $userquery=mysqli_query($connection,$query);
                $user_count=mysqli_num_rows($userquery);
                        
                $query="SELECT * FROM categories";
                $categoryquery=mysqli_query($connection,$query);
                $category_count=mysqli_num_rows($categoryquery);
                
                
                
                ?>
                
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel bg-primary ">
            <div class="panel-heading ">
                <div class="row">
                    <div class="col-xs-3 ">
                        <i class="fa fa-file fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='h2'><?php echo $post_count;?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="admin_posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel bg-success">
            <div class="panel-heading">
                <div class="row text-white">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='h2'><?php echo $comment_count;?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel bg-warning">
            <div class="panel-heading">
                <div class="row text-white">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='h2'><?php echo $user_count;?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="blog_users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel bg-danger">
            <div class="panel-heading">
                <div class="row text-white">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='h2'><?php echo $category_count;?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
                   <?php
                $query="SELECT * FROM posts WHERE post_status='published'";
                $active_posts=mysqli_query($connection,$query);
                $active_posts=mysqli_num_rows($active_posts); 
                        
                $query="SELECT * FROM posts WHERE post_status='draft'";
                $draft_posts=mysqli_query($connection,$query);
                $draft_posts=mysqli_num_rows($draft_posts); 
                        
                $query="SELECT * FROM comments WHERE comment_status='approved'";
                $comments=mysqli_query($connection,$query);
                $comments=mysqli_num_rows($comments); 
                        
                $query="SELECT * FROM comments WHERE comment_status='Unapproved'";
                $pending_comments=mysqli_query($connection,$query);
                $pending_comments=mysqli_num_rows($pending_comments); 
                        
                $query="SELECT * FROM users WHERE user_role='admin'";
                $admins=mysqli_query($connection,$query);
                $admins=mysqli_num_rows($admins); 
                        
                $query="SELECT * FROM users WHERE user_role='subscriber'";
                $subcribers=mysqli_query($connection,$query);
                $subcribers=mysqli_num_rows($subcribers); 
                   
                    ?>
                    
                    <div class="row">
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Blog Information', 'Count'],
          <?php  
            $dataInfo=['Published posts','Draft posts','approved comments','Unapproved comments','Admins','Subscribers','categories'];
            $countInfo=[$active_posts,$draft_posts,$comments,$pending_comments,$admins,$subcribers,$category_count];
            for($i=0;$i<7;$i++){
                echo "['$dataInfo[$i]'".","."$countInfo[$i]],";
            }
            
            
            ?>
        
        ]);

        var options = {
          chart: {
            title: 'Blog Statistics.',
            subtitle: 'Info:2020.',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>            
                        
                    </div>
                    
                    <div id="columnchart_material"  style="width: auto; height: 500px;"></div>
                    
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