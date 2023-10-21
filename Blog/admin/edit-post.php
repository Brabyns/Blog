<?php include 'includes/header.php';  

//fetch category from database

$category_query = "SELECT * FROM  categories";
$categories = mysqli_query($connection, $category_query);


//fetch data from database
if(isset($_GET['id'])){
    $id =  filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    
    $select_post = "SELECT * FROM posts WHERE id = $id";
    $post_query = mysqli_query($connection, $select_post);
    $post = mysqli_fetch_assoc($post_query);
    $current_cat_id = $post['category_id'];
}else{
    header('location:' . ROOT_URL . 'admin/' );
    die();
    
}

?>
    




<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Post</h2>
        
        <?php  if(isset($_SESSION['edit-post'])) : ?>

        <div class="alert__message error">
        <p> 
        <?= $_SESSION['edit-post'];
        unset($_SESSION['edit-post']);
        ?>

        </p>
        </div>
        <?php endif ?>
        

        <form action="<?=ROOT_URL?>admin/edit-post-logic.php" enctype="multipart/form-data" method="post">

            <input type="hidden" name="id" value="<?=$post['id'] ?>" placeholder="Title">
            <input type="hidden" name="previous_thumbnail_name" value="<?=$post['thumbnail'] ?>" placeholder="Title">
            <input type="text" name="title" value="<?=$post['title'] ?>" placeholder="Title">
            
            <select name="category" id="">
                <?php while($category = mysqli_fetch_assoc($categories)){
                 $cat_id = $category['id'];
                 $cat_title = $category['title'];
    
                  if($current_cat_id == $cat_id){
                echo "<option selected value= '{$cat_id}'>$cat_title</option>";
                  }else{
                echo "<option  value='{$cat_id}'>$cat_title</option>"; 
                  }
    
}
                   
                ?>


            </select>
          
            <textarea name="body" id="" cols="30" rows="10" placeholder="Body"><?=$post['body'] ?></textarea>
            
            
            <select name="is_featured" id="">
                <option value=""><?= $post['is_featured'] ? 'Featured' : 'Not Featured' ?></option>
                <?php if($post['is_featured'] == 1) : ?>
                <option value="0">Not featured</option>
                 <?php else : ?> 
                <option value="1">Featured</option>
                  <?php endif ?>
            </select>

            <div class="form__control">
                <label for="thumbnail">Change Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
                 <div class="post__author-avatar">
                  <img src="../images/<?= $post['thumbnail'] ?>" >
                   </div>
                
            </div>
           

            
            <button type="submit" name="submit" class="btn">Update Post</button>
          
        </form>
    </div>
</section>








<?php include '../includes/footer.php';   ?>
    
<!--    ==========================END OF FOOTER========================-->