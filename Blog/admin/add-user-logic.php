<?php
//session_start();
require 'config/database.php';
//get sign up form data  if  sign up button was clicked
if(isset($_POST['submit'])){
   $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $lastname =  filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $username =  filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $email =  filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
   $user_role =  filter_var($_POST['user-role'], FILTER_SANITIZE_NUMBER_INT);
   $password =  filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $repassword =  filter_var($_POST['repassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $avatar = $_FILES['avatar'];
   if(!$firstname){
       $_SESSION['add-user'] = "Please Enter First name";
   }else if(!$lastname){
       $_SESSION['add-user'] = "Please Enter Last name";
       
   }else if(!$username){
       $_SESSION['add-user'] = "Please Enter  Username";
       
   }else if(!$email){
       $_SESSION['add-user'] = "Please Enter a Valid email";
       
   }else if(strlen($password) < 8 || strlen($repassword) < 8){
       $_SESSION['add-user'] = "Password should be 8+ Characters";

       
   }else if(!$avatar['name']){
       $_SESSION['add-user'] = "Please Add an Avatar";
       
   }else{
       //check if password match
       if($password !== $repassword){
          $_SESSION['add-user'] = "Passwords do not match";  
       }else{
           //hash password
           $hashed_password = password_hash($password, PASSWORD_DEFAULT);
         
           // confirm if user exists
           $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email ='$email'";
           $user_check_result = mysqli_query($connection, $user_check_query);
           if(mysqli_num_rows($user_check_result) > 0){
                     $_SESSION['add-user'] = "Username or email aready Exists";
           }else{
               //WORK ON AVATAR
               $time = time();
               $avatar_name = $time . $avatar['name'];
               $avatar_temp_name =  $avatar['tmp_name'];
               $avatar_destination_path = '../images/' . $avatar_name;
               
               //MAKE SURE FILE IS AN IMAGE
               $allowed_files = ['png', 'jpg', 'jpeg'];
               $extention = explode('.', $avatar_name);
               $extention = end($extention);
               if(in_array($extention, $allowed_files)){
                     if($avatar['size'] < 1000000){
                   //UPLOAD AVATAR
                   move_uploaded_file($avatar_temp_name, $avatar_destination_path);
                   
               }else{
                   $_SESSION['add-user'] = "File size too big. Should be less than 1mb";
               }  
               
           
           }else{
               $_SESSION['add-user'] = "File should be png, jpg or jpeg"; 
           }
       }
   }
   }
    
    //REDIRECT BACK TO SIGNUP IF THERE IS ANY ERROR
    
    if(isset($_SESSION['add-user'])){
        //PASS FORM BACK TO SIGNUP PAGE
        $_SESSION['user-data']  = $_POST;
        header('location:'. ROOT_URL . 'admin/add-user.php');
        die();
    }else{
        //INSERT NEW USER TO DB
      //  $insert_user_query = "INSERT INTO users SET first_name='$firstname' , last_name='$lastname', username='$username', email='$email', password='$hashed_password', avatar='$avatar_name', is_admin=$user_role";
        $insert_user_query = "INSERT INTO users (first_name, last_name, username , email, password, avatar, is_admin) VALUES('{$firstname}', '{$lastname}', '{$username}', '{$email}',  '{$hashed_password}', '{$avatar_name}', {$user_role})";
        
        $user_query = mysqli_query($connection, $insert_user_query); 
        if(!mysqli_errno($connection)){
            //REDIRECT TO LOGIN PAGE WITH SUCCESS MESSAGE
            $_SESSION['add-user-success'] = "New User $firstname $lastname  Added Successfully.";
              header('location:'. ROOT_URL . 'admin/manage-user.php');
        }
    }
   
}else{
    // if button wasn't clicked, bounce back to signup page
    
    header('location:'. ROOT_URL . 'admin/add-user.php');
    die();
}

?>
