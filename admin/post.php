<?php include "include/header.php"; 
    include "controller/config.php";
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Posts</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-post.php">add post</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Author</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                             $limit= 3;
                             
                             if(isset($_GET['page'])){
                                $page =$_GET['page'];
                             }else{
                                $page =1;

                             }
                             $offset = ($page-1)*$limit;

                             $selectQuery= "SELECT post.post_id,post.title,post.description,post.category,post.post_date,category.category_name,user.username FROM post 
                             LEFT JOIN category ON post.category = category.category_id
                             LEFT JOIN user ON post.author = user.user_id ORDER BY post_id DESC Limit {$offset},{$limit}";
                             $post_list=mysqli_query($dbcon,$selectQuery);
                             
                                 foreach($post_list as $key =>$post){
                             
                        ?>
                        <tr>
                            <td class='id'><?php echo $post['post_id'];?></td>
                            <td><?php echo $post['title'];?></td>
                            <td><?php echo $post['category_name'];?></td>
                            <td><?php echo $post['post_date'];?></td>
                            <td><?php echo $post['username'];?></td>
                            <td class='edit'><a href='update-post.php?id=<?php echo $post['post_id'];?>'><i
                                        class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-post.php?id=<?php echo $post['post_id'];?>'><i
                                        class='fa fa-trash-o'></i></a></td>
                        </tr>
                        <?php } ?>


                    </tbody>
                </table>
                <?php
                $sql ="SELECT * FROM `post` ";
                $sql_result = mysqli_query($dbcon,$sql) or die('query failed');
                if(mysqli_num_rows($sql_result)>0){
                    $totalRecordes = mysqli_num_rows($sql_result);
                   
                    $totalPage= ceil($totalRecordes/$limit);
                    echo "<ul class='pagination admin-pagination'>";
                    if($page>1){

                        echo '<li><a href="post.php?page='.($page-1).'">prev</a></li>';
                    }
                    for($i=1; $i<=$totalPage; $i++){
                        if($i==$page){
                            $active = "active";
                            
                        }else{
                            $active = "";
                        }
                        echo '<li class="'.$active.'"><a href="post.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    if($totalPage>$page){

                        echo '<li><a href="post.php?page='.($page+1).'">Next</a></li>';
                    }
                    echo "</ul>";

                }
                
                
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "include/footer.php"; ?>