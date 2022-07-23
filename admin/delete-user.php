<?php
 include "controller/config.php";
 $user_id = $_GET['id'];


  $delete= "DELETE FROM `user` WHERE user_id ='{$user_id}'";
  $result= mysqli_query($dbcon,$delete);

  header("Location:users.php");




?>