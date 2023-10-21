<?php
session_start();
require 'config/database.php';
//get sign up form data  if  sign up button was clicked
if(isset($_POST['submit'])){
    //get data from form
$username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password =  filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);  
    if(!$username_email){
        $_SESSION['signin'] = "Username or Email Required";
    }elseif(!$password){
        $_SESSION['signin'] = "Password Required";
    }else{
        //fetch data from database
        $fetch_user_query = "SELECT * FROM users WHERE username = '$username_email' or email = '$username_email'";
        $fetch_user_result = mysqli_query($connection, $fetch_user_query);
        
        if(mysqli_num_rows($fetch_user_result) == 1){
           // CONVERT THE RECORD INTO ASSOC ARRAY
            $user_record = mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];
            //COMPARE FORM AND DATABASE PASSWORD
            if(password_verify($password, $db_password)){
                //SET SESSION FOR ACCESS CONTROL
                $_SESSION['user_id'] = $user_record['id'];
                $_SESSION['avatar'] = $user_record['avatar'];
                //SET SESSION IF USER IS ADMIN
                if($user_record['is_admin'] == 1){
                    $_SESSION['user_is_admin'] = true;
                }
                //log user in
                header('location:' . ROOT_URL .'admin/');
            }else{
               $_SESSION['signin'] = "Please check your password and try again"; 
            }
        }else{
            $_SESSION['signin'] = "User not found";
        }
    }
    
    //IF ANY PROBLEM REDIRECT TO SIGNIN PAGE WITH LOGIN DETAILS
    if(isset($_SESSION['signin'])){
        $_SESSION['signin-data'] = $_POST;
        header('location: '. ROOT_URL . 'signin.php');
        die();
    }
    
}else{
    header('location:'. ROOT_URL . 'signin.php');
    die();
}


?>