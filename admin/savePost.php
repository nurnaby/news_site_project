<?php
include "controller/config.php";
session_start();
if(isset($_POST['savePost'])){
    if(isset($_FILES['post_img'])){
        $errors = array();

        $file_name  = $_FILES['post_img']['name'];
        $file_size  = $_FILES['post_img']['size'];
        $file_tmp   = $_FILES['post_img']['tmp_name'];
        $file_type  = $_FILES['post_img']['type'];
        $file_ext   = strtolower(end(explode('.',$file_name)));
        $extensions = array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions)=== false){
            $errors [] = "This extension file not allowed, please choose a JPG or PNG file.";
        }
        if($file_size > 2097152){
            $errors [] = "File size must be 2mb or lower";
        }
        if(empty($errors)== true){
            move_uploaded_file($file_tmp,"upload/".$file_name);

        }else{
            print_r($errors);
            die();
        }

    }

    $title       = mysqli_real_escape_string($dbcon,$_POST['title']);
    $description = mysqli_real_escape_string($dbcon,$_POST['description']);
    $category    = mysqli_real_escape_string($dbcon,$_POST['category']);
    $post_date   = date("d M Y");
    $author      = $_SESSION['user_id'];
    
     $insertquery= "INSERT INTO post(title,description,category,post_date,author,post_img)     VALUES ('{$title}', '{$description}','{$category}','{$post_date}','{$author}','{$file_name}');";
     $insertquery .= "UPDATE category SET post = post+1 WHERE category_id = {$category}";
     if(mysqli_multi_query($dbcon,$insertquery)){
        header("Location:post.php");
     }else{
        echo "query failed";
     }

}





?>