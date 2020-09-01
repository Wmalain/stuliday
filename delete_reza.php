<?php
    require('inc/connect.php');
    require('inc/function.php'); 
    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sth = $db->prepare("DELETE FROM reservations WHERE id_annonce = $id");
        $sth->execute();
        $sth2=$db->prepare("UPDATE annonces SET active = 1 WHERE id=$id");
        $sth2->execute();
        header("Location:profile.php");
    }