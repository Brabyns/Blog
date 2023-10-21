<?php include 'includes/header.php'; 


// GET BACK DATA IF THEIR WAS AN ERROR
$title = $_SESSION['add-post-data']['title'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;
unset($_SESSION['add-post-data']);

// FETCH CATEGORY FROM DB

$category_query = "SELECT * FROM categories ORDER BY title";
$category_result = mysqli_query($connection, $category_query);



?>
    




<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Post</h2>
        
               
                <?php  if(isset($_SESSION['add-post'])) : ?>
        
        <div class="alert__message error">
            <p> 
            <?= $_SESSION['add-post'];
                unset($_SESSION['add-post']);
                ?>
            
            </p>
        </div>
        <?php endif ?>

        <form action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method="post">

            <input type="text" value="<?= $title ?>" name="title" placeholder="Title">
            <select name="category" id="">
                <option value="">Select Category</option>
                <?php while($category = mysqli_fetch_assoc($category_result)): ?>
                <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <?php endwhile ?>

            </select>
          
            <textarea name="body" id="" cols="30" rows="10" placeholder="Body"><?= $body ?></textarea>
              <?php  if(isset($_SESSION['user_is_admin'])) : ?>
              <div class="form__control inline">
                <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                <label for="is_featured" >Featured</label>
            </div>
            <?php endif ?>
            <div class="form__control">
                <label for="thumbnail">Add Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Add Post</button>
          
        </form>
    </div>
</section>







<?php include '../includes/footer.php';   ?>
    
<!--    ==========================END OF FOOTER========================-->