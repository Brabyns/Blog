<?php
require 'config/database.php';

if(isset($_GET['id'])){
    
$id =  filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    
    
    //FETCH USER FROM DB
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
    
    
    //MAKE SURE YOU GOT ONLY ONE USER
    
    if(mysqli_num_rows($result) == 1){
        $avatar_name = $user['avatar'];
        $avatar_path = '../images/' .$avatar_name;
        
        
        //DELETE IMAGE IF AVAILABLE
        
        if($avatar_path){
            unlink($avatar_path);
        }
    }
    
    
    //DELETING ALL USER POST
    //fetch all thumbnails of user's posts and delete them
    $thumbnail_query = "SELECT thumbnail FROM posts WHERE author_id=$id";
    $thumbnail_result = mysqli_query($connection, $thumbnail_query);
    
    if(mysqli_num_rows($thumbnail_result) > 0){
        while($thumbnail = mysqli_fetch_assoc($thumbnail_result)){
            $thumbnail_path = '../images/' .$thumbnail['thumbnail'];
            //delete thumbnail from images folder if exixst
            
            if($thumbnail_path){
                unlink($thumbnail_path);
            }
        }
    }
    
    
    
    
  
    
    
    $delete = "DELETE FROM users WHERE id=$id";
    $delete_result = mysqli_query($connection, $delete);
    if(mysqli_errno($connection)){
        $_SESSION['delete_user_error'] = "Couldn't delete {$user['first_name']} {$user['last_name']}";
    }else{
        $_SESSION['delete_user'] = "{$user['first_name']} {$user['last_name']} deleted successfully";
    }
    
}


 header('location:' . ROOT_URL .'admin/manage-user.php');
            die();  