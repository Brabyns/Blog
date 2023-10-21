<?php
require 'config/database.php';
//get sign up form data  if  sign up button was clicked
if(isset($_POST['submit'])){
   $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $description =  filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $id =  filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

    
    
    //CHECK VALID INPUTS
    if(!$title || !$description){
        $_SESSION['edit-category'] = "Invalid Form inputs on edit page";
   
    }else{ 
        //UPDATE CATEGORY
$query = "UPDATE categories SET title='$title', description='$description' WHERE id=$id LIMIT 1";
$result = mysqli_query($connection, $query);
        
        if(mysqli_errno($connection)){
            $_SESSION['edit-category'] = "Couldn't Update Category";
        }else{
            $_SESSION['edit-category-success'] = "Category $title Updated Successfully";
            header('location:'. ROOT_URL . 'admin/manage-category.php');
            die();
        } 
    }
}


            header('location:' . ROOT_URL .'admin/manage-category.php');
            die();    

