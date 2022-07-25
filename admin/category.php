<?php include "include/header.php";
include "controller/config.php";
// only admin can see this page coditon
if($_SESSION['role'] =='0'){
    header("Location:post.php");
 }  
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                        $selectQuery= "SELECT * FROM category ORDER BY category_id DESC";
                        $category_list=mysqli_query($dbcon,$selectQuery);
                        foreach($category_list as $key =>$category){
                        ?>
                        <tr>
                            <td class='id'><?php echo $category['category_id']?></td>
                            <td><?php echo $category['category_name']?></td>
                            <td><?php echo $category['post']?></td>
                            <td class='edit'><a href='update-category.php'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-category.php'><i class='fa fa-trash-o'></i></a></td>
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