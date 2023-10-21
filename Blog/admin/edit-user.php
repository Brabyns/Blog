<?php include 'includes/header.php';  



if(isset($_GET['id'])){
    $id =  filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
}else{
    header("location :" .ROOT_URL .'admin/manage-user.php');
    die();
}



?>
    




<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit User</h2>
        
        
        <?php  if(isset($_SESSION['edit-user'])) : ?>

        <div class="alert__message error">
        <p> 
        <?= $_SESSION['edit-user'];
        unset($_SESSION['edit-user']);
        ?>

        </p>
        </div>
        <?php endif ?>

        <form action="<?=ROOT_URL?>admin/edit-user-logic.php" enctype="multipart/form-data" method="post">
            <input type="hidden" value="<?= $user['id'] ?>" name="id" >
            <input type="text" value="<?= $user['first_name'] ?>" name="firstname" autocomplete="off" placeholder="First Name">
            <input type="text" value="<?= $user['last_name'] ?>" name="lastname" autocomplete="off" placeholder="Last Name">


         
            <select name="user-role" id="">
                <option value=""><?= $user['is_admin'] ? 'Admin' : 'Author' ?></option>
                <?php if($user['is_admin'] == 1) : ?>
                <option value="0">Author</option>
                 <?php else : ?> 
                <option value="1">Admin</option>
                  <?php endif ?>
            </select>
      

            <button type="submit" name="submit" class="btn">Update User</button>
          
        </form>
    </div>
</section>





<?php include '../includes/footer.php';   ?>
    
<!--    ==========================END OF FOOTER========================-->