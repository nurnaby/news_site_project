<?php include "include/header.php";
include "controller/config.php";
// only admin can see this page coditon
if($_SESSION['role'] =='0'){
    header("Location:post.php");
 } 
//  insert user 
if(isset($_POST['save'])){

     $first_name =mysqli_real_escape_string($dbcon,$_POST['first_name']);
     $last_name =mysqli_real_escape_string($dbcon,$_POST['last_name']);
     $username =mysqli_real_escape_string($dbcon,$_POST['username']);
     $password =mysqli_real_escape_string($dbcon,md5($_POST['password']));
     $role =mysqli_real_escape_string($dbcon,$_POST['role']);

     $secectQry= "SELECT username FROM `user` WHERE username='{$username}'";
     $result=mysqli_query($dbcon,$secectQry) or die("query faelde");
     if(mysqli_num_rows($result)>0){
        $mag="user allrady exsist !";
     }else{
        $insertQry= "INSERT INTO user(first_name,last_name,username,password,role) VALUES ('{$first_name}','{$last_name}','{$username}','{$password}','{$role}')";
        $insertQry_result=mysqli_query($dbcon,$insertQry);
        $mag="user insert suceesfly";

        header("Location:users.php");


     }

}



?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add User</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <?php
                if(isset($mag)){
                    echo "<h3 style='color:red;'> $mag</h3>";
                }
                
                
                ?>
                <!-- <h3 style="color:red ;"><?php echo $mag?></h3> -->
                <!-- Form Start -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required
                            autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role">
                            <option value="0">Normal User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                </form>
                <!-- Form End-->
            </div>
        </div>
    </div>
</div>
<?php include "include/footer.php"; ?>