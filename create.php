<?php  
    session_start();
    require "connect.php";
    $title = '';
    $desc='';
    $titleError = '';
    $descError = '';

    if(isset($_POST['create_button'])){
        $title = $_POST['title'];
        $desc  = $_POST['description'];

        if(empty($title)){
            $titleError="The title field is required";
        }

        if(empty($desc)){
            $descError="The description field is required";
        }

        if(!empty($title) && !empty($desc)){
            $query = "INSERT INTO posts(title,description) VALUES ('$title','$desc')";
            mysqli_query($db,$query);

            $_SESSION['successMsg'] ='A post created successfully';
            header('location:index.php');
            //exit;
        }
    
    }   
?>