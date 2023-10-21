<?php include 'includes/header.php';  



//Fetch user from DB but not current user

$current_user_id = $_SESSION['user_id'];
$fetch_user = "SELECT * FROM users WHERE NOT id = $current_user_id";
$result  = mysqli_query($connection, $fetch_user);


?>
   
    

   


   
   
   <section class="dashboard">
   
     
   
                <?php  if(isset($_SESSION['add-user-success'])) : ?>
        
        <div class="alert__message success container">
            <p> 
            <?= $_SESSION['add-user-success'];
                unset($_SESSION['add-user-success']);
                ?>
            
            </p>
        </div>
        <?php endif ?>
        
        <?php  if(isset($_SESSION['edit-user-success'])) : ?>
        
        <div class="alert__message success container">
            <p> 
            <?= $_SESSION['edit-user-success'];
                unset($_SESSION['edit-user-success']);
                ?>
            
            </p>
        </div>
        <?php endif ?>
        
        
        
             
        
        <?php  if(isset( $_SESSION['delete_user'])) : ?>
        
        <div class="alert__message success container">
            <p> 
            <?=  $_SESSION['delete_user'];
                unset( $_SESSION['delete_user']);
                ?>
            
            </p>
        </div>
        <?php endif ?>
        
            <?php  if(isset($_SESSION['delete_user_error'])) : ?>

        <div class="alert__message error">
        <p> 
        <?= $_SESSION['delete_user_error'];
        unset($_SESSION['delete_user_error']);
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
                    <a href="index.php"><i class="uil uil-postcard"></i>
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
                    <a href="manage-user.php" class="active"><i class="uil uil-users-alt"></i>
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
                <?php endif  ?>
            </ul>
        </aside>
        <main>
            <h2>Manage Users</h2>
            
            <?php if(mysqli_num_rows($result) > 0): ?>
            <table>
                <thead>
                    <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Admin</th>
                    </tr>
                </thead>
                <tbody>
                   <?php while($user = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?= "{$user['first_name']}   {$user['last_name']}"    ?></td>
                        <td><?= "{$user['username']}" ?></td>
                        <td><a href="<?= ROOT_URL?>admin/edit-user.php?id=<?= $user['id'] ?>" class="btn sm">Edit</a></td>
                        <td><a href="<?= ROOT_URL?>admin/delete-user.php?id=<?= $user['id'] ?>" class="btn sm danger">Delete</a></td>
                        <td><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>
                        
                    </tr>                 
 <?php endwhile ?>          
   
                </tbody>
            </table>
            <?php else: ?>
            <div class="alert__message error"><?= "No User Found!!!" ?>  </div>
            
            <?php endif ?>
        </main>
        
        
    </div>
</section>






<?php include '../includes/footer.php';   ?>
    
<!--    ==========================END OF FOOTER========================-->