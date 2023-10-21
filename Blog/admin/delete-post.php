<?php
require 'config/database.php';

if(isset($_GET['id'])){
    
$id =  filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    
    
    //FETCH POST FROM DB
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
    
    
    //MAKE SURE YOU GOT ONLY ONE USER
    
    if(mysqli_num_rows($result) == 1){
        $thumbnail_name = $post['thumbnail'];
        $thumbnail_path = '../images/' .$thumbnail_name;
        
        
        //DELETE IMAGE IF AVAILABLE
        
        if($thumbnail_path){
            unlink($thumbnail_path);
        }
    }
    

    
    
  
    
    
    $delete = "DELETE FROM posts WHERE id=$id LIMIT 1";
    $delete_result = mysqli_query($connection, $delete);
    if(mysqli_errno($connection)){
    $_SESSION['delete_post_error'] = "Couldn't delete {$post['post']} Post";
    }else{
        $_SESSION['delete_post'] = "{$post['title']}  deleted successfully";
    }
    
}


 header('location:' . ROOT_URL .'admin/index.php');
            die(); 