<?php 
    require "connect.php";
    require "create.php";

    if(isset($_GET['postId'])){
        $post_id_to_update = $_GET['postId'];
        
        $post = mysqli_query($db,"SELECT * FROM posts WHERE id=$post_id_to_update");

        if(mysqli_num_rows($post) == 1){
            foreach($post as $row){
                $titleid = $row['id'];//table->name
                $title =$row['title'];
                $desc = $row['description'];
            }
        }
    }

    //Update post
    $titleError ='';
    $descError ='';
    if(isset($_POST['update_button'])){
        $postid = $_POST['post_id']; //form ->name
        $title = $_POST['title'];
        $desc = $_POST['description'];

        if(empty($title)){
            $titleError="The title field is required";
        }

        if(empty($desc)){
            $descError="The description field is required";
        }
        if(!empty($title) && !empty($desc)){
            $query="UPDATE posts SET title='$title', description='$desc' WHERE id=$postid";
            mysqli_query($db,$query);
            $_SESSION['successMsg'] ='A post created successfully';
            header('location:index.php');
        }    
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
                            <div class="col-md-6"><p>Posts Edition Form</p></div>
                            <div class="col-md-6"><a href="index.php" class="btn btn-secondary float-end"><< Back</a></div>
                        </div>
                        </div>
                        <form action="" method="POST">
                            <div class="card-body">
                                <input type="hidden" name="post_id" value="<?php echo $titleid ?>">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control"  placeholder="Title post" value="<?php echo $title; ?>">
                                    <span class="text-danger"><?php echo $titleError ?></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" placeholder="Description .."><?php echo $desc; ?></textarea>
                                    <span class="text-danger"><?php echo $descError ?></span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="update_button" class="btn btn-primary">Update</button>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
</body>
</html>