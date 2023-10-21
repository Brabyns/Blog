<?php include 'includes/header.php'; 
$author = $_SESSION['user_id'];
//  *************************  COUNT NUMBER OF ROWS  *************************** -->
$per_page = 5;
if($_GET['page']){
    $page = $_GET['page'];
}else{
    $page = "";
}  

if($page =="" || $page == 1){
    
    $page_1 = 0;
}else{
    $page_1 = ($page * $per_page) - $per_page;
}



  if(isset($_SESSION['user_is_admin'])){
$query = "SELECT * FROM posts";
$result_count = mysqli_query($connection, $query);
$post_count = mysqli_num_rows($result_count);
$post_count = ceil($post_count / $per_page);      

$select_post = "SELECT *  FROM posts ORDER BY date_time DESC LIMIT $page_1, 8 ";
 
  }else{ 
$query = "SELECT * FROM posts WHERE author_id = $author";
$result_count = mysqli_query($connection, $query);
$post_count = mysqli_num_rows($result_count);
$post_count = ceil($post_count / $per_page);      
      
$select_post = "SELECT * FROM posts  WHERE author_id = $author ORDER BY date_time DESC LIMIT $page_1, 8";      
     
  }


$post_result = mysqli_query($connection, $select_post);






?>
    

   

   
   
   <section class="dashboard">
   
                   <?php  if(isset($_SESSION['add-post-success'])) : ?>
        
        <div class="alert__message success container">
            <p> 
            <?= $_SESSION['add-post-success'];
                unset($_SESSION['add-post-success']);
                ?>
            
            </p>
        </div>
        <?php endif ?>
   
                    <?php  if(isset($_SESSION['edit-post-success'])) : ?>
        
        <div class="alert__message success container">
            <p> 
            <?= $_SESSION['edit-post-success'];
                unset($_SESSION['edit-post-success']);
                ?>
            
            </p>
        </div>
        <?php endif ?>
        
        
        <?php  if(isset($_SESSION['delete_post'])) : ?>
        
        <div class="alert__message success container">
            <p> 
            <?= $_SESSION['delete_post'];
                unset($_SESSION['delete_post']);
                ?>
            
            </p>
        </div>
        <?php endif ?>
        
        <?php  if(isset($_SESSION['delete_post_error'])) : ?>
        
        <div class="alert__message error container">
            <p> 
            <?= $_SESSION['delete_post_error'];
                unset($_SESSION['delete_post_error']);
                ?>
            
            </p>
        </div>
        <?php endif ?>
   
   <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right-b"></i></button>
   <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-left-b"></i></button>
    <div class="container dashboard__container">
      
        <aside>
            <ul>
                <li>
                    <a href="add-post.php"><i class="uil uil-pen"></i>
                    <h5>Add Post</h5>
                    </a>
                </li>         
                          <li>
                    <a href="index.php" class="active"><i class="uil uil-postcard"></i>
                    <h5>Manage Posts</h5>
                    </a>
                </li>   
                     <?php  if(isset($_SESSION['user_is_admin'])) : ?>  
                              <li>
                    <a href="add-user.php"><i class="uil uil-user-plus"></i>
                    <h5>Add Users</h5>
                    </a>
                </li>      
                             <li>
                    <a href="manage-user.php" ><i class="uil uil-users-alt"></i>
                    <h5>Manage Users</h5>
                    </a>
                </li>     
                              <li>
                    <a href="add-category.php"><i class="uil uil-edit"></i>
                    <h5>Add Category</h5>
                    </a>
                </li>                              <li>
                    <a href="manage-category.php" ><i class="uil uil-list-ui-alt"></i>
                    <h5>Manage Category</h5>
                    </a>
                </li>
                <?php endif ?>
            </ul>
        </aside>
        <main>
            <h2>Manage Posts</h2>
            
                <?php if(mysqli_num_rows($post_result) > 0 ): ?>
            <table>
                <thead>
                    <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
              
                    </tr>
                </thead>
                <tbody>

                    
                
                   <?php while($post = mysqli_fetch_assoc($post_result)): ?>
                   
                    <tr>
                        <td><?= $post['title'] ?></td>
<!--  *************************  GET CATEGORY TITLE  *************************** -->
                        <?php
                        $category_id = $post['category_id'];                         
                        $select_category = "SELECT * FROM categories WHERE id = $category_id";
                        $category_result = mysqli_query($connection, $select_category);
                        $category = mysqli_fetch_assoc($category_result);
                       
                        
                        ?>
                        
                        
                        <td><?= $category['title'] ?></td>
                        <td><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $post['id'] ?>" class="btn sm">Edit</a></td>
                        <td><a href="<?= ROOT_URL ?>admin/delete-post.php?id=<?= $post['id'] ?>" class="btn sm danger">Delete</a></td>

                    </tr>                         
          <?php endwhile; ?>
                </tbody>
            </table>
            
            <?php else: ?>
            <div class="alert__message error"><?= "No Posts Found!!!" ?>  </div>
            <?php endif ?> 
            
            
        </main>
        
        
    </div>
    
    
    
    
    
  
    
    
 <div class="pag_con">   
 <div class="pagination">
 
  <a href="#">&laquo;</a>
 <?php
    for($i=1; $i<=$post_count; $i++){
        
        if($i == $page){
          echo "<a href='index.php?page={$i}' class='active'>{$i}</a>";   
        }else{
            
          echo "<a href='index.php?page={$i}' >{$i}</a>";
        }
        
        
        
    }
    ?>
<a href="#">&raquo;</a>
</div>
</div>
</section>









<?php include '../includes/footer.php';   ?>
    
<!--    ==========================END OF FOOTER========================-->