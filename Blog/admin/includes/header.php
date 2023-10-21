<?php
require '../includes/header.php';

//CHECK LOGIN STATUS

if(!isset($_SESSION['user_id'])){
    header('location: '.ROOT_URL . 'signin.php');
    die();
}


