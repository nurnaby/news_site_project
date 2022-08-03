<?php include "include/header.php"; 
include "controller/config.php";
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form for show edit-->
                <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?php
                        if(isset($_GET['id'])){
                            $post_id = $_GET['id'];

                            $sql = "SELECT * FROM `post` WHERE post_id = '{$post_id}'";
                            $results = mysqli_query($dbcon,$sql);
                            foreach($results as $key => $result){
                    ?>
                    <div class="form-group">
                        <input type="hidden" name="post_id" class="form-control" value="1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTile">Title</label>
                        <input type="text" name="post_title" class="form-control" id="exampleInputUsername"
                            value="<?php echo $result['title'];?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="postdesc" class="form-control" required rows="5">
                        <?php echo $result['description'];?>
                </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCategory">Category</label>
                        <select class="form-control" name="category">
                            <?php
                                $selectQuery = "SELECT * FROM category";
                                $categorys = mysqli_query($dbcon,$selectQuery);
                                if(mysqli_num_rows($categorys)>0){
                                    foreach($categorys as $key => $category){         
                            ?>
                            <option value="<?php echo $category['category_id']?>">
                                <?php echo $category['category_name'];?></option>
                            <?php
                            }}
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Post image</label>
                        <input type="file" name="new-image">
                        <img src="upload/<?php echo $result['post_img'];?>" height="150px">
                        <input type="hidden" name="old-image" value="">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" />

                    <?php
                    }}
                    ?>
                </form>
                <!-- Form End -->
            </div>
        </div>
    </div>
</div>
<?php include "include/footer.php"; ?>