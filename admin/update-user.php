<?php include "include/header.php"; 
    include "controller/config.php";
    if(isset($_POST['uaserUdate'])){
        
        $user_id =mysqli_real_escape_string($dbcon,$_POST['user_id']);
         $first_name =mysqli_real_escape_string($dbcon,$_POST['first_name']);
        
        $last_name =mysqli_real_escape_string($dbcon,$_POST['last_name']);
        $username =mysqli_real_escape_string($dbcon,$_POST['username']);
        
        $role =mysqli_real_escape_string($dbcon,$_POST['role']);

       
        $updatequery= "UPDATE user SET first_name='{$first_name}',last_name='{$last_name}',username='{$username}',role='{$role}' WHERE user_id ='{$user_id}'";
        $issubmit=mysqli_query($dbcon,$updatequery);
        if($issubmit){

            header("Location:users.php");
        }
    }
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Modify User Details</h1>
            </div>
            <div class="col-md-offset-4 col-md-4">
                <?php
                            $user_id = $_GET['id'];
                             $selectQuery= "SELECT * FROM user WHERE user_id ={$user_id}";
                             $user_list=mysqli_query($dbcon,$selectQuery);
                             foreach($user_list as $key =>$user){
                        ?>
                <!-- Form Start -->
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="user_id" class="form-control" value="<?php echo $user['user_id'];?>"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control"
                            value="<?php echo $user['first_name'];?>" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control"
                            value="<?php echo $user['last_name'];?>" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $user['username'];?>"
                            placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                            <?php
                                if($user['role']==1){
                                    echo "<option value='0'>normal User</option>
                                    <option value='1' selected>Admin</option>";
                                }else{
                                    echo "<option value='0' selected >normal User</option>
                                    <option value='1'>Admin</option>";
                                }
                            ?>

                        </select>
                    </div>
                    <input type="submit" name="uaserUdate" class="btn btn-primary" value="Update" required />
                </form>
                <?php }?>
                <!-- /Form -->
            </div>
        </div>
    </div>
</div>
<?php include "include/footer.php"; ?>