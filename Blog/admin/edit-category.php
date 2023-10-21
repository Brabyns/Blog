<?php include 'includes/header.php';  

if(isset($_GET['id'])){
    $id =  filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM categories WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $category = mysqli_fetch_assoc($result);
}else{
    header("location :" .ROOT_URL .'admin/manage-category.php');
    die();
}

?>
    




<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Category</h2>
 
              
        <?php  if(isset($_SESSION['edit-category'])) : ?>

        <div class="alert__message error">
        <p> 
        <?= $_SESSION['edit-category'];
        unset($_SESSION['edit-category']);
        ?>

        </p>
        </div>
        <?php endif ?>
       
       
        <form action="<?= ROOT_URL?>admin/edit-category-logic.php" method="post">
<input type="hidden" value="<?= $category['id'] ?>" name="id" >
<input type="text" name="title" value="<?= $category['title'] ?>" placeholder="Title">
<textarea name="description" id="" cols="30" rows="10" placeholder="Description"><?= $category['description'] ?></textarea>
<button type="submit" name="submit" class="btn">Update category</button>
          
        </form>
    </div>
</section>






<?php include '../includes/footer.php';   ?>
    
<!--    ==========================END OF FOOTER========================-->