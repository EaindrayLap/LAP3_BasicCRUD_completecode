<?php  
    require "connect.php";
    require "create.php"; 
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
                            <div class="col-md-6"><p>Posts Creation Form</p></div>
                            <div class="col-md-6"><a href="index.php" class="btn btn-secondary float-end"><< Back</a></div>
                        </div>
                        </div>
                        <form action="createpost.php" method="POST">
                            <div class="card-body">
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
                                <button type="submit" name="create_button" class="btn btn-primary">Create</button>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
</body>
</html>