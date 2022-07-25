<?php
include "controller/config.php";
session_start();
if(isset($_SESSION['username'])){
    header("Location:post.php");
}


?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN | Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div id="wrapper-admin" class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <img class="logo" src="images/news.jpg">
                    <h3 class="heading">Admin</h3>
                    <!-- Form Start -->
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="" required
                                autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="" required>
                        </div>
                        <input type="submit" name="login" class="btn btn-primary" value="login" />
                    </form>
                    <?php
                        if(isset($_POST['login'])){
                            $username =mysqli_real_escape_string($dbcon,$_POST['username']);
                            $password =mysqli_real_escape_string($dbcon,md5($_POST['password']));

                            $secectQry= "SELECT user_id, username,role FROM `user` WHERE username='{$username}' AND  password='{$password}'";
                            $results=mysqli_query($dbcon,$secectQry) or die("query failde");
                            if(mysqli_num_rows($results)>0){
                                foreach($results as $key => $result){
                                    session_start();
                                    $_SESSION['username'] =  $result['username'];
                                    $_SESSION['user_id'] =  $result['user_id'];
                                    $_SESSION['role'] =  $result['role'];
                                    header("Location:post.php");

                                }

                            }else{
                                echo'<div class="alert ">Username and password are not matched</div>';
                                // $_SESSION['mag'] = '<div class="alert alert-danger">Username and password are not matched</div>';
                                // echo $_SESSION['mag'];
                                // unset($_SESSION['mag']);
                            }
                        }
                    ?>
                    <!-- /Form  End -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>