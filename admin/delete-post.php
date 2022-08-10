<?php
// only admin can see this page coditon
if($_SESSION['role'] =='0'){
  header("Location:post.php");
} 
 include "controller/config.php";

  $post_id = $_GET['id'];
  $cat_id = $_GET['catid'];

  $selectQuery = "SELECT * FROM `post` WHERE post_id = {$post_id}";
    $select_Results = mysqli_query($dbcon,$selectQuery);
    foreach($select_Results as $key => $select_Result){
          $post_img = $select_Result['post_img'];
  
    }
    unlink("upload/{$post_img}");

  $delete = "DELETE FROM `post` WHERE post_id = {$post_id};";
  $delete .= "UPDATE category SET post = post-1 WHERE category_id = {$cat_id}";
  if(mysqli_multi_query($dbcon,$delete)){
    header("Location:post.php");
  }else{
    echo "query failed";
  }





?>