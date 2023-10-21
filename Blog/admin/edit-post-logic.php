<?php

require 'config/database.php';
//make sure edit post button was clicked

if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];
    
    //set is featured to 0 if it was unchecked
 //    $is_featured = $is_featured == 1 ?: 0;
    
    
    
    //check and validate input
    if(!$title){
        $_SESSION['edit-post'] = "Couldn't update title. Invalid form data on edit post page.";
        
    }elseif(!$category){
        $_SESSION['edit-post'] = "Couldn't update category. Invalid form data on edit post page.";
    }elseif(!$body){
        $_SESSION['edit-post'] = "Couldn't update body. Invalid form data on edit post page.";
    }else{
        //delete existing thumbnail if new thumbnail is available
        if($thumbnail['name']){
            $previous_thumbnail_path = '../images/' . $previous_thumbnail_name;
            
            if($previous_thumbnail_path){
                unlink($previous_thumbnail_path);
            }
            
            //WORK ON NEW THUMBNAIL
            
            //rename image
            
            $time = time();
            $thumbnail_name = $time . $thumbnail['name'];
            $thumbnail_tmp_name = $thumbnail['tmp_name'];
            $thumbnail_destination_path = '../images/' . $thumbnail_name;
            
            
            //make sure file is an image
            $allowed_file = ['png', 'jpg', 'jpeg'];
            $extension = explode('.', $thumbnail_name);
            $extension = end($extension);
            
            
            if(in_array($extension, $allowed_file)){
                //make sure avatar is not too large (2mb+)
                if($thumbnail['size'] < 2000000){
                    
                    //upload thumbnail
                    move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
                    
                }else{
                    
                  $_SESSION['edit-post'] = "Couldn't update thumbnail. File is too big should be less than 2mb.";  
                }
            }else{
        $_SESSION['edit-post'] = "Couldn't update post. thumbnail should be png, jpg or jpeg.";   
            }
        }

        
        
        
        
        
    }
    

    
    
    if(isset($_SESSION['edit-post'])){
        //reirect to manage form page if it was invalid
        header('location: '. ROOT_URL . 'admin/');
        die();
    }else{
        //set is featured for all post to zero if is faetured for this post is 1
        
        if($is_featured == 1){
            $zero_all_is_featured_query = "UPDATE posts SET is_featured=0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
        }
        
        //set thumbnail name if a new one was uploaded, else keep old thumbnail name
        if(empty($thumbnail_name)){
            $thumbnail_name = $previous_thumbnail_name;
        }
        
        //$thumbnail_name = $thumbnail_name ?? $previous_thumbnail_name;
        
        
//       $query = "UPDATE posts SET title='$title', body='$body', thumbnail='$thumbnail_name', category_id=$category, is_featured=$is_featured WHERE id=$id LIMIT 1";
        
$query = "UPDATE posts SET ";
$query .= "title = '{$title}', ";
$query .= "body = '{$body}', ";
$query .= "thumbnail = '{$thumbnail_name}', ";
$query .= "category_id = '{$category}', ";
$query .= "is_featured = '{$is_featured}' ";
$query .= "WHERE id = {$id} LIMIT 1";

        
        
        $result = mysqli_query($connection, $query);
        
    }
    
    if(!mysqli_errno($connection)){
        $_SESSION['edit-post-success'] = "$title post has been updated successfully";
    }
    
    
}


header('location: ' . ROOT_URL . 'admin/');
die();