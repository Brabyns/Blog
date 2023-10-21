<?php include 'includes/header.php';  
//fetch featured post from db

$select_featured = "SELECT * FROM posts WHERE is_featured=1";
$featured_query = mysqli_query($connection, $select_featured);
$featured = mysqli_fetch_assoc($featured_query);

?>


<?php if(mysqli_num_rows($featured_query) == 1): ?>
<section class="featured">
   <div class="container featured__container">
       <div class="post__thumbnail">
           <img src="./images/<?= $featured['thumbnail'] ?>" alt="">
       </div>
       <div class="post__info">
          <?php
    //fetch category from db
    $category_id = $featured['category_id'];
    $featured_category = "SELECT * FROM categories WHERE id = $category_id";
    $query = mysqli_query($connection, $featured_category);
    $category = mysqli_fetch_assoc($query); 
    $category_title = $category['title'];            
    ?>
          
          
           <a href="<?= ROOT_URL ?>category-post.php?id=<?= $category['id'] ?>" class="category__button"><?= $category_title ?></a>
           <h2 class="post__title"><a href="<?= ROOT_URL ?>post.php?id=<?= $featured['id']?>"><?= $featured['title'] ?></a></h2>
           <p class="post__body"><?= substr( $featured['body'], 0, 300) ?>. . .</p>
           <?php
    //fetch author from database
    $author_id = $featured['author_id'];
    $featured_author = "SELECT * FROM users WHERE id = $author_id";
    $query = mysqli_query($connection, $featured_author);
    $author = mysqli_fetch_assoc($query);
    $avatar =  $author['avatar'];
    $firstname = $author['first_name'];
    $lastname =  $author['last_name'];   
    
    ?>
           
           <div class="post__author">
               <div class="post__author-avatar">
                  <img src="./images/<?= $avatar ?>" >
                   
               </div>
               <div class="post__author-info">
                   <h5>By:   <?= $firstname ?> <?= $lastname ?></h5>
                   <small>
                   <?=date("M d, Y - H:i", strtotime($featured['date_time']))  ?>
                   
                   </small>
               </div>
           </div>
       </div>
   </div>
    
</section>

<?php endif ?>

<!--    ==========================   END OF FEATURED  ========================       -->
<?php
    //FETCH ALL POSTS FROM DATABASE
$select_post = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 9";
$post_query = mysqli_query($connection, $select_post);
 
    
    
    ?>



<section class="posts  <?= $featured ? '' : 'section__extra-margin' ?>">
    <div class="container posts__container">
       
       
       <?php while($post = mysqli_fetch_assoc($post_query)): ?>
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
<!--    ==========================   END OF POSTS  ========================       -->


<?php include 'includes/footer.php';   ?>
    
<!--    ==========================END OF FOOTER========================-->
