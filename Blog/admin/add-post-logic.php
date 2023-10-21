<?php
//session_start();
require 'config/database.php';
//get sign up form data  if  sign up button was clicked
if(isset($_POST['submit'])){
   $author_id = $_SESSION['user_id'];
   $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $category =  filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
   $body =  filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $is_featured =  filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
   $thumbnail = $_FILES['thumbnail'];
    
    
    //SET IS FEATURED TO 0
    
    $is_featured = $is_featured == 1 ?: 0;
    
    //VALIDATE FORM DATA
    
    if(!$title){
        $_SESSION['add-post'] = "Enter post title";
        
    }elseif(!$category){
        $_SESSION['add-post'] = "Select post category";
        
    }elseif(!$body){
        $_SESSION['add-post'] = "Enter post body";
    }elseif(!$thumbnail['name']){
        $_SESSION['add-post'] = "Enter post thumbnail";
    }else{
        // WORK ON THE THUMBNAIL
        //rename the thumbnail
               $time = time();
               $thumbnail_name = $time . $thumbnail['name'];
               $thumbnail_temp_name =  $thumbnail['tmp_name'];
               $thumbnail_destination_path = '../images/' . $thumbnail_name;
               
               //MAKE SURE FILE IS AN IMAGE
               $allowed_files = ['png', 'jpg', 'jpeg'];
               $extention = explode('.', $thumbnail_name);
               $extention = end($extention);
               if(in_array($extention, $allowed_files)){
                     if($thumbnail['size'] < 2000000){
                   //UPLOAD THUMBNAIL
                   move_uploaded_file($thumbnail_temp_name, $thumbnail_destination_path);
                   
               }else{
                   $_SESSION['add-post'] = "File size too big. Should be less than 1mb";
               }  
               
           
           }else{
               $_SESSION['add-post'] = "File should be png, jpg or jpeg"; 
           }
    }
    
    //CHECK IF THERE IS ANY ERRO (RETURN BACK TO ADD POST WITH FORM DATA )
    
    if(isset($_SESSION['add-post'])){
        $_SESSION['add-post-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-post.php');
        die();
    }else{
        //set is_featured to 0 if is_featured for this post is 1
if($is_featured == 1){
    $zero_all_is_featured_query = "UPDATE posts SET is_featured=0";
    $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
}
    //insert post to db
        
        $post_query = "INSERT INTO  posts(title, body, thumbnail, category_id, author_id, is_featured ) VALUES('{$title}', '{$body}', '{$thumbnail_name}', {$category}, {$author_id}, {$is_featured} )";
        
        
        
        
        $post_result = mysqli_query($connection, $post_query);
        
            if(!mysqli_errno($connection)){
            //REDIRECT TO MANAGE POST PAGE WITH SUCCESS MESSAGE
            $_SESSION['add-post-success'] = "New Post $title  Added Successfully.";
              header('location:'. ROOT_URL . 'admin/index.php');
        }
    
    }
    
    
}else{
    // if button wasn't clicked, bounce back to manage post page
    
    header('location:'. ROOT_URL . 'admin/index.php');
    die();
}