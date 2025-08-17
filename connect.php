<?php

$db = mysqli_connect('localhost','root','','basic_php_crud');
if($db == false){
    die('Some Error: '.mysqli_connect_error($db));
}
?> 

<?php
// $db = mysqli_connect('localhost','root','','basic_php_crud');
// if($db == true){
//     echo "Database connected successfully";
// }else{
//     die('Some Error: '.mysqli_connect_error($db));
//}
//echo 'Server Name: ' . $_SERVER['SERVER_NAME'] . "<br>";
?> 