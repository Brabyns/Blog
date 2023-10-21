<?php include 'includes/header.php';  
    //FETCH ALL POSTS FROM DATABASE

if(isset($_GET['id'])){
 $post_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT); 
    
$select_post = "SELECT * FROM posts WHERE id = $post_id";
$post_query = mysqli_query($connection, $select_post);
$post = mysqli_fetch_assoc($post_query); 
$author_id = $post['author_id'];    
}else{
    header('location: ' . ROOT_URL . 'blog.php');
    die();
}



?>

<section class="singlepost">
    <div class="container singlepost__container">
        <h2><?= $post['title'] ?></h2>
                                      <?php
    //fetch author from database
    $author_id = $post['author_id'];
    $post_author = "SELECT * FROM users WHERE id = $author_id";
    $query = mysqli_query($connection, $post_author);
    $author = mysqli_fetch_assoc($query);
   
    
    ?>   
           
           
           
           
            <div class="post__author">
                <div class="post__author-avatar">
                        <img src="./images/<?= $author['avatar'] ?> " alt="">
                    </div>
                    <div class="post__author-info">
                        <h5>By:  <?= $author['first_name'] ?>  <?= $author['last_name']  ?></h5>
                        <small>
                            <?=date("M d, Y - H:i", strtotime($post['date_time']))  ?>
                        </small>
                    </div>
                </div>
                <div class="singlepost__thumbnail">
                    <img src="./images/<?= $post['thumbnail'] ?>" alt="">
                    <p><?= $post['body'] ?></p>                    
             
                </div>
            </div>
            
            
    <div class="container  singlepost__container section__extra-margin">

          <textarea name="body" id="" cols="30" rows="10" placeholder="Comment on this post"></textarea>  
     </div>
     <div class="container">   
      <button type="submit" name="submit" class="btn">Submit</button>
          </div>
          
   
</section>






<?php include 'includes/footer.php';   ?>
    
<!--    ==========================END OF FOOTER========================-->