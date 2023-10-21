<?php
require 'config/database.php';

if(isset($_GET['id'])){
    
$id =  filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
// update category to uncategorized 
    
    $update_query = "UPDATE posts SET category_id=8 WHERE category_id=$id";
    $update_result = mysqli_query($connection, $update_query);
    
    if(!mysqli_errno($connection)){
    
        
        //FETCH USER FROM DB
    $query = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $category = mysqli_fetch_assoc($result);
    
    
    
    //MAKE SURE YOU GOT ONLY ONE USER
    
    if(mysqli_num_rows($result) == 1){

    //DELETING CATEGORY

    
    $delete = "DELETE FROM categories WHERE id=$id";
    $delete_result = mysqli_query($connection, $delete);
    if(mysqli_errno($connection)){
        $_SESSION['delete_category_error'] = "Couldn't delete {$category['title']}";
    }else{
        $_SESSION['delete_category'] = "{$category['title']} deleted successfully";
    }
    
}    
        
    }
    



 header('location:' . ROOT_URL .'admin/manage-category.php');
            die();     
    }
 