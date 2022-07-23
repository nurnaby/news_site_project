<?php include "include/header.php"; 
      include "controller/config.php";
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Users</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-user.php">add user</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                             $selectQuery= "SELECT * FROM user ORDER BY user_id DESC";
                             $user_list=mysqli_query($dbcon,$selectQuery);
                             foreach($user_list as $key =>$user){
                        ?>

                        <tr>
                            <td class='id'><?php echo $user['user_id'];?></td>
                            <td><?php echo $user['first_name']." ".$user['last_name'];?></td>
                            <td><?php echo $user['username'];?></td>
                            <td><?php
                                    if($user['role']==1){
                                        echo "admin";
                                    }else{
                                        echo "nurmal";

                                    }
                              ?></td>
                            <td class='edit'><a href='update-user.php?id=<?php echo $user["user_id"];?>'><i
                                        class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-user.php?id=<?php echo $user["user_id"];?>'><i
                                        class='fa fa-trash-o'></i></a></td>
                        </tr>
                        <?php }?>



                    </tbody>
                </table>
                <ul class='pagination admin-pagination'>
                    <li class="active"><a>1</a></li>
                    <li><a>2</a></li>
                    <li><a>3</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include "include/footer.php"; ?>