<?php 
    $page ='delete';
    require('inc/connect.php'); 
    require('assets/head.php');
    require ('inc/function.php');
   
    $userid = $_SESSION['id'];

    delete($userid);
    header("Location:profile.php");

?>