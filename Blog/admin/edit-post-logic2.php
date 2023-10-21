<?php
require 'config/database.php';

    if(isset($_GET['p_id'])){
    
    $the_post_id =  escape($_GET['p_id']);

    }


    $query = "SELECT * FROM project WHERE project_id = $the_post_id  ";
    $select_posts_by_id = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_posts_by_id)) {
        $project_id              = $row['project_id'];
        $project_title           = $row['title'];
        $project_category_id     = $row['project_category_id'];
        $project_content         = $row['content'];
        $project_date1           = $row['date_created'];
        $project_date2           = $row['date_expire'];
        $project_image           = $row['image'];
        $project_status          = $row['status'];
         $project_Goal          = $row['Goal'];

        
        
         }


    if(isset($_POST['update_post'])) {
        
        
        $project_title           =  escape($_POST['title']);
        $project_content          =  escape($_POST['content']);
//        $project_category_id  = escape($_POST['project_category']);

        $project_date2         =  escape($_POST['date_expire']);

        $project_status        =  escape($_POST['status']);
        $project_Goal           =  escape($_POST['Goal']);
        
        
            $file = $_FILES['image'];
            $fileName = $_FILES['image']['name'];
            $fileTmpName = $_FILES['image']['tmp_name'];
            $fileSize = $_FILES['image']['size'];
            $fileType = $_FILES['image']['type'];
            $fileErr = $_FILES['image']['error'];
        
        
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png', 'pdf');

            if(in_array($fileActualExt, $allowed)){
            if($fileErr === 0){
            if($fileSize < 10000000000000000000000){
            $fileNewName = uniqid('', true).".".$fileActualExt;
            $fieDestination = '../images/'.$fileNewName;

            move_uploaded_file($fileTmpName, $fieDestination);



            }else{
            echo"Your file is too large";
            }
            }else{
            echo"Thier was an error";
            }
            }else{
            echo "You Can not uploud this file";
            }

        
        
        
//        move_uploaded_file($project_image_temp, "../images/$project_image"); 
      
        if(empty($fileNewName)) {
        
        $query = "SELECT * FROM project WHERE project_id = $the_post_id ";
        $select_image = mysqli_query($connection,$query);
            
        while($row = mysqli_fetch_array($select_image)) {
            
           $fileNewName = $row['image'];
        
        }
        
        
}
        $project_title = mysqli_real_escape_string($connection, $project_title);

        
          $query = "UPDATE project SET ";
          $query .="title  = '{$project_title}', ";
          $query .="content = '{$project_content}', ";
          $query .="project_category_id = '{$project_category_id}', ";
          $query .="date_created   =  now(), ";
          $query .="project = 'project', ";
          $query .="date_expire = {$project_date2}, ";
          $query .="status = '{$project_status}', ";
          $query .="Goal = '{$project_Goal}', ";
          $query .="image  = '{$fileNewName}' ";
          $query .= "WHERE project_id = {$the_post_id} ";
        
        $update_post = mysqli_query($connection,$query);
        
        confirmQuery($update_post);
        
         echo " <a class='btn btn-primary' href='posts.php'>Edit More Event</a>";
        

    
    
    }



?>
   

   
   
 