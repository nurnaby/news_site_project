<?php
 include "controller/config.php";
 session_start();
 $user_id = $_GET['id'];
// only admin can see this page coditon
if($_SESSION['role'] =='0'){
  header("Location:post.php");
} 

  $delete= "DELETE FROM `user` WHERE user_id ='{$user_id}'";
  $result= mysqli_query($dbcon,$delete);

  header("Location:users.php");




?>