<?php
 include "controller/config.php";
 $post_id = $_GET['id'];

// only admin can see this page coditon
if($_SESSION['role'] =='0'){
  header("Location:post.php");
} 
  $selectQuery = "SELECT * FROM `post` WHERE post_id = {$post_id}";
  $select_Results = mysqli_query($dbcon,$selectQuery);
  foreach($select_Results as $key => $select_Result){
        $post_img = $select_Result['post_img'];

  }
  unlink("upload/{$post_img}");


  $delete= "DELETE FROM `post` WHERE post_id ='{$post_id}'";
  $result= mysqli_query($dbcon,$delete);

  header("Location:post.php");




?>