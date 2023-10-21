<?php include 'includes/header.php';   ?>
    
<!--    ==========================END OF NAV========================-->
<?php
// GET BACK DATA IF THEIR WAS AN ERROR
$title = $_SESSION['add-category-data']['title'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;

unset($_SESSION['add-category-data']);

?>


<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Category</h2>
        
                      <?php  if(isset($_SESSION['add-category'])) : ?>
        
        <div class="alert__message error">
            <p> 
            <?= $_SESSION['add-category'];
                unset($_SESSION['add-category']);
                ?>
            
            </p>
        </div>
        <?php endif ?>


        <form action="<?=ROOT_URL?>admin/add-category-logic.php" enctype="multipart/form-data" method="post">

            <input type="text" name="title" value="<?= $title ?>" autocomplete="off" placeholder="Title">
        <textarea name="description" id="" cols="30"   rows="10" placeholder="Description"><?= $description ?></textarea>
            <button type="submit" name="submit" class="btn">Add category</button>
          
        </form>
    </div>
</section>



<?php include '../includes/footer.php';   ?>
    
<!--    ==========================END OF FOOTER========================-->