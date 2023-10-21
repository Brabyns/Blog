<?php

$fetch_category = "SELECT * FROM categories";
$result  = mysqli_query($connection, $fetch_category);

?>

<section class="category__buttons">
    
    <div class="container category__buttons-container">
       <?php while($category = mysqli_fetch_assoc($result)) : ?>
        <a href="<?= ROOT_URL ?>category-post.php?id=<?= $category['id'] ?>" class="category__button"><?= "{$category['title']}" ?></a>
 <?php endwhile ?>
    </div>
       
</section>

<!--    ==========================   END OF CATEGORY BUTTONS  ========================       -->

<footer>
    <div class="footer__socials">
        <a href="" target="_blank"><i class="uil uil-youtube"></i></a>
        <a href="" target="_blank"><i class="uil uil-facebook-f"></i></a>
        <a href="" target="_blank"><i class="uil uil-twitter"></i></a>
        <a href="" target="_blank"><i class="uil uil-linkedin"></i></a>
        <a href="" target="_blank"><i class="uil uil-instagram-alt"></i></a>
    </div>
    <div class="container footer__container">
        <article>
            <h4>Support</h4>
            <ul>
                <li><a href="">Online Support</a></li>
                <li><a href="">Call Number</a></li>
                <li><a href="">Emails</a></li>
                <li><a href="">Social Support</a></li>
                <li><a href="">Location</a></li>
            </ul>
        </article>        
           <article>
            <h4>Categories</h4>
            <ul>
                <li><a href="">Art</a></li>
                <li><a href="">Wild Life</a></li>
                <li><a href="">Travel</a></li>
                <li><a href="">Food</a></li>
                <li><a href="">Science & Technology</a></li>
                <li><a href=""> Music</a></li>
            </ul>
        </article>        
           <article>
            <h4>Blog</h4>
            <ul>
                <li><a href="">safety</a></li>
                <li><a href="">Repair</a></li>
                <li><a href="">Recent</a></li>
                <li><a href="">Popular</a></li>
                <li><a href="">Categories</a></li>
            </ul>
        </article>    
               <article>
            <h4>Permalinks</h4>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Blog</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </article>
        
    </div>
    <div class="footer__copyright">
        <small>Copyright &copy; <a href="mailto:burabuyabz@gmail.com" target="_blank">Brabyns@Software</a></small>
    </div>
</footer>


<script src="<?= ROOT_URL?>js/main.js"></script>
</body>
</html>