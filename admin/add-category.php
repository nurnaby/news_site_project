<?php include "include/header.php"; 
      include "controller/config.php";
      // only admin can see this page coditon
        if($_SESSION['role'] =='0'){
            header("Location:post.php");
        } 
        // insert category 
      if(isset($_POST['categorySave'])){
        $catAdd =mysqli_real_escape_string($dbcon,$_POST['catAdd']);
        // $catAdd =mysqli_real_escape_string($dbcon,$_POST['catAdd']); 

        $insertQry= "INSERT INTO category(category_name) VALUES ('{$catAdd}')";
        $insertQry_result=mysqli_query($dbcon,$insertQry);
        $mag="user insert suceesfly";

        header("Location:category.php");
      }
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <form action="" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="catAdd" class="form-control" placeholder="Category Name" required>
                    </div>
                    <input type="submit" name="categorySave" class="btn btn-primary" value="Save" required />
                </form>
                <!-- /Form End -->
            </div>
        </div>
    </div>
</div>
<?php include "include/footer.php"; ?>