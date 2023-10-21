<?php include 'includes/header.php';   ?>
    
<!--    ==========================END OF NAV========================-->

<?php
// GET BACK DATA IF THEIR WAS AN ERROR
$firstname = $_SESSION['user-data']['firstname'] ?? null;
$lastname = $_SESSION['user-data']['lastname'] ?? null;
$username = $_SESSION['user-data']['username'] ?? null;
$email = $_SESSION['user-data']['email'] ?? null;
$password = $_SESSION['user-data']['password'] ?? null;
$repassword = $_SESSION['user-data']['repassword'] ?? null;
unset($_SESSION['user-data']);

?>



<section class="form__section">
    <div class="container form__section-container">
        <h2>Add User</h2>

        
        
                <?php  if(isset($_SESSION['add-user'])) : ?>
        
        <div class="alert__message error">
            <p> 
            <?= $_SESSION['add-user'];
                unset($_SESSION['add-user']);
                ?>
            
            </p>
        </div>
        <?php endif ?>
        <form action="<?=ROOT_URL?>admin/add-user-logic.php" enctype="multipart/form-data" method="post">
            <input type="text" value="<?= $firstname?>" autocomplete="off" name="firstname" placeholder="First Name">
            <input type="text" value="<?= $lastname?>" autocomplete="off" name="lastname" placeholder="Last Name">
            <input type="text" value="<?= $username?>" autocomplete="off" name="username" placeholder="Username">
            <input type="email" value="<?= $email?>"  autocomplete="off"name="email" placeholder="Email">
            
            <select name="user-role">
                <option value="0">Select User Role</option>
                <option value="0">Author</option>
                <option value="1">Admin</option>

            </select>
            
            <input type="password" value="<?= $password?>" name="password" placeholder="Create Password">
            <input type="password" value="<?= $repassword?>" name="repassword" placeholder="Confirm Password">

         

      
            <div class="form__control">
                <label for="avatar">Add Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Add User</button>
          
        </form>
    </div>
</section>








<?php //include '../includes/footer.php';   ?>
    
<!--    ==========================END OF FOOTER========================-->