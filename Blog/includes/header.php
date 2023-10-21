<?php
require 'config/database.php';

//FETCH USER INFO FROM DB
if(isset($_SESSION['user_id'])){
  $id = filter_var($_SESSION['user_id'], FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT * FROM users WHERE id = {$id}";
  $result = mysqli_query($connection, $query);
  $avatar = mysqli_fetch_assoc($result);
    


   
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
<!--   ======================== W3 SCHOOL CSS STYLE=============== -->    
<!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
<!--   ======================== CUSTOM CSS STYLE=============== -->
    <link rel="stylesheet" href="<?= ROOT_URL?>css/style.css">
<!--   ======================== ICONSCOUT CDN ==========================  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<!--    ===============================GOOGLE FONTS MONTSERRAT=================================-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>
<body>
    <nav>
        <div class="container nav__container">
            <a href="<?= ROOT_URL?>" class="nav__log">LOGO</a>
           <ul class="nav__items">
               <li><a href="<?= ROOT_URL?>blog.php">Blog</a></li>
               <li><a href="<?= ROOT_URL?>about.php">About</a></li>
               <li><a href="<?= ROOT_URL?>services.php">Services</a></li>
               <li><a href="<?= ROOT_URL?>contact.php">Contact</a></li>
               <?php if(isset($_SESSION['user_id'])) :  ?>

               <li class="nav__profile">
                   <div class="avatar">

                       <img src="<?= ROOT_URL . 'images/' .  $avatar['avatar'] ?>" alt="">
                       
                   </div>
                   <ul>
                       <li><a href="<?= ROOT_URL?>admin/">Dashboard</a></li>
                       <li><a href="<?= ROOT_URL?>logout.php">Logout</a></li>
                   </ul>
               </li>
               
                  <?php else : ?>            
            
               <li><a href="<?= ROOT_URL?>signin.php">Signin</a></li>
              <?php endif ?>
  
           </ul>
           <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
           <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
           
            
        </div>
    </nav>
    
 