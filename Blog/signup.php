
<?php
//session_start();
require 'config/database.php';

// GET BACK DATA IF THEIR WAS AN ERROR
$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$password = $_SESSION['signup-data']['password'] ?? null;
$repassword = $_SESSION['signup-data']['repassword'] ?? null;
unset($_SESSION['signup-data']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
<!--   ======================== CUSTOM CSS STYLE=============== -->
    <link rel="stylesheet" href="./css/style.css">
<!--   ======================== ICONSCOUT CDN ==========================  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<!--    ===============================GOOGLE FONTS MONTSERRAT=================================-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>



<section class="form__section">
    <div class="container form__section-container">
        <h2>Sign Up</h2>
        
        <?php  if(isset($_SESSION['signup'])) : ?>
        
        <div class="alert__message error">
            <p> 
            <?= $_SESSION['signup'];
                unset($_SESSION['signup']);
                ?>
            
            </p>
        </div>
        <?php endif ?>
        <form action="<?= ROOT_URL?>signup_logic.php" enctype="multipart/form-data" method="post">
            <input type="text" name="firstname" autocomplete="off" value="<?= $firstname?>" placeholder="First Name">
            <input type="text" name="lastname" autocomplete="off" value="<?= $lastname?>" placeholder="Last Name">
            <input type="text" name="username" autocomplete="off" value="<?= $username?>" placeholder="Username">
            <input type="email" name="email" autocomplete="off" value="<?= $email?>" placeholder="Email">
            <input type="password" name="password" value="<?= $password?>" placeholder="Create Password">
            <input type="password" name="repassword" value="<?= $repassword?>" placeholder="Confirm Password">
            <div class="form__control">
                <label for="avatar">User Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Sign Up</button>
            <small>Already have an account? <a href="signin.php">Sign In</a></small>
        </form>
    </div>
</section>















</body>
</html>