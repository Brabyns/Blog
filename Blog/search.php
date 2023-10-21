<?php
include 'includes/header.php';  

if(isset($_GET['search']) && isset($_GET['submit'])){
    $search = filter_var($_GET['search'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $query = "SELECT * FROM posts WHERE title LIKE '%$search%' ORDER BY date_time DESC";
    $posts = mysqli_query($connection, $query);


}else{
    header('location: '. ROOT_URL . 'blog.php');
    die();
    
}

?>



<section class="posts section__extra-margin">
    <div class="container posts__container">
       
       
       <?php while($post = mysqli_fetch_assoc($posts)): ?>
        <article class="post">
            <div class="post__thumbnail">
                <img src="./images/<?= $post['thumbnail'] ?>" alt="">
            </div>
            
            
            
            <div class="post__info">
                         <?php
    //fetch category from db
    $category_id = $post['category_id'];
    $post_category = "SELECT * FROM categories WHERE id = $category_id";
    $query = mysqli_query($connection, $post_category);
    $category = mysqli_fetch_assoc($query); 
    $category_title = $category['title'];            
    ?>
               
                <a href="<?= ROOT_URL ?>category-post.php?id=<?= $category['id'] ?>" class="category__button"><?= $category_title ?></a>
                <h3 class="post__title">
                    <a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
                </h3>
                <p class="post__body"><?= substr( $post['body'], 0, 150) ?>. . .</p>
                <div class="post__author">
                   
                              <?php
    //fetch author from database
    $author_id = $post['author_id'];
    $post_author = "SELECT * FROM users WHERE id = $author_id";
    $query = mysqli_query($connection, $post_author);
    $author = mysqli_fetch_assoc($query);
   
    
    ?>
                   
                   
                   
                    <div class="post__author-avatar">
                        <img src="./images/<?= $author['avatar'] ?>" alt="">
                    </div>
                    <div class="post__author-info">
                        <h5>By: <?= $author['first_name'] ?>  <?= $author['last_name']  ?></h5>
                        <small>
                        <?=date("M d, Y - H:i", strtotime($post['date_time']))  ?>
                        </small>
                    </div>
                </div>
            </div>
        </article> 
          
          <?php endwhile ?>
           


 

    </div>
</section>

<?php


?>
<!--    ==========================   END OF POSTS  ========================       -->


<?php include 'includes/footer.php';   ?>
    
<!--    ==========================END OF FOOTER========================-->