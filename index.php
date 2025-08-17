<?php 
session_start();
require 'connect.php';
//require 'create.php';
if(isset($_GET['post_id_to_delete'])){
    $post_id_to_delete =$_GET['post_id_to_delete'];

    $query = "DELETE FROM posts WHERE id=$post_id_to_delete";
    mysqli_query($db,$query);
    $_SESSION['successMsg'] ='A post deleted successfully';
    header('location:index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS CDN Link in Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- JS CDN Link in Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    <!-- Internal CSS-->
    <style>
        body{
            padding : 50px;

        }
    </style>
</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Posts List</p>
                                </div>
                                <div class="col-md-6">
                                     <a href="createpost.php" class="btn btn-primary float-end">+ Add post</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php 
                                if(isset($_SESSION['successMsg'])) {
                                    echo "<div class='alert alert-success'>".$_SESSION['successMsg']."</div>"; 
                                    unset($_SESSION['successMsg']); 
                                }
                            ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query ="SELECT * FROM posts";
                                        $posts = mysqli_query($db,$query);

                                        foreach($posts as $post){
                                    ?>
                                            <tr>
                                                <td><?php echo $post['id'];?></td>
                                                <td><?php echo $post['title'];?></td>
                                                <td><?php echo $post['description'];?></td>
                                                <td>
                                                    <a href="editpost.php?postId=<?php echo $post['id'];?>"> Edit </a> | 
                                                    <a href="index.php?post_id_to_delete=<?php echo $post['id'];?>" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>