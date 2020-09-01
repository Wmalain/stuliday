<?php

    require('inc/connect.php');
    require('inc/function.php');


    $id_user = $_SESSION['id'];
    $id_annonce = $_GET['id'];


    reza($id_annonce, $id_user);

    header("Location:profile.php");




?>




