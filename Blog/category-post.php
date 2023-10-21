<?php include 'includes/header.php'; 

if(isset($_GET['id'])){
 $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    
$query= "SELECT * FROM posts WHERE category_id=$id ORDER BY date_time DESC";
$result = mysqli_query($connection, $query);
//$post = mysqli_fetch_assoc($result); 


}else{
    header('location: ' . ROOT_URL . 'blog.php');
    die();
}



?>
           <header class="category__title">
           <h2>
            <?php
    //fetch category from db
    $post_category = "SELECT * FROM categories WHERE id = $id ";
    $query_category = mysqli_query($connection, $post_category);
    $category = mysqli_fetch_assoc($query_category); 
     echo  $category_title = $category['title'];            
    ?>


    </h2>
</header>

<?php if(mysqli_num_rows($result) > 0) :?>

<section class="posts ">
    <div class="container posts__container">
       
       
       <?php while($post = mysqli_fetch_assoc($result)) : ?>
        <article class="post">
            <div class="post__thumbnail">
                <img src="./images/<?= $post['thumbnail'] ?>" alt="">
            </div>
            
            
            
            <div class="post__info">

                <h3 class="post__title">
                    <a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
                </h3>
                <p class="post__body"><?= substr( $post['body'], 0, 150) ?>. . .</p>
                <div class="post__author">
                   
                              <?php
    //fetch author from database
    $author_id = $post['author_id'];
    $post_author = "SELECT * FROM users WHERE id = $author_id";
    $query_author = mysqli_query($connection, $post_author);
    $author = mysqli_fetch_assoc($query_author);
   
    
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
<?php else: ?>
<did  class=" alert__message error lg" >
   
   <p>No post found for this post</p>
    
</did>

<?php endif ?>

<?php include 'includes/footer.php';   ?>
    
<!--    ==========================END OF FOOTER========================-->