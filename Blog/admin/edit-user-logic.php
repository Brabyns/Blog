<?php
require 'config/database.php';
//get sign up form data  if  sign up button was clicked
if(isset($_POST['submit'])){
   $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $lastname =  filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $id =  filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
   $user_role =  filter_var($_POST['user-role'], FILTER_SANITIZE_NUMBER_INT);
    
    
    //CHECK VALID INPUTS
    if(!$firstname || !$lastname){
        $_SESSION['edit-user'] = "Invalid Form inputs on edit page";
    }else{
        //UPDATE USER
        $query = "UPDATE users SET first_name='$firstname', last_name='$lastname', is_admin=$user_role WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);
        
        if(mysqli_errno($connection)){
            $_SESSION['edit-user'] = "Failed to Update User";
        }else{
            $_SESSION['edit-user-success'] = "User $firstname $lastname Updated Successfully";
            header('location:'. ROOT_URL . 'admin/manage-user.php');
            die();
        } 
    }}
else{
            header('location:' . ROOT_URL .'admin/manage-user.php');
            die();    
}


