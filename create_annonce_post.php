<?php 
require('inc/connect.php');
require('inc/function.php');

// if(!empty($_SESSION['id'])){
//     header ("Location:index.php?action=dc");
// }

    if(isset($_POST['submit_annonce'])){
        
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $city = htmlspecialchars($_POST['city']);
        $category = htmlspecialchars($_POST['category']);
        $file= $_FILES['img_url'];
        $address = htmlspecialchars($_POST['address']);
        $price = htmlspecialchars($_POST['price']);
        $user_id = ($_SESSION['id']);
        $start_date = htmlspecialchars($_POST['start_date']);
        $end_date = htmlspecialchars($_POST['end_date']);

        if($file['size'] <= 1000000){

            $valid_ext = array('jpg','jpeg','gif','png');
            $check_ext = strtolower(substr(strrchr($file['name'], '.'),1));
            
            if(in_array($check_ext, $valid_ext)){

            $imgname = uniqid() . '_' . $file['name'];
            $upload_dir = "./assets/uploads/";
            $upload_name = $upload_dir . $imgname;
            $move_result = move_uploaded_file($file['tmp_name'], $upload_name);

        
                if($move_result){
                    $sth = $db->prepare("INSERT INTO annonces(title,description,city,category,image_url,address_article,price,author_article,start_date,end_date) VALUES (:title,:description,:city,:category,:img_url,:address,:price,:id,:start_date,:end_date)
                    ");
                    $sth->bindValue(':title',$title);
                    $sth->bindValue(':description',$description);
                    $sth->bindValue(':city',$city);
                    $sth->bindValue(':category',$category);
                    $sth->bindValue(':img_url',$imgname);
                    $sth->bindValue(':address',$address);
                    $sth->bindValue(':price',$price,PDO::PARAM_INT);
                    $sth->bindValue(':id',$user_id,PDO::PARAM_INT);
                    $sth->bindValue(':start_date',$start_date);
                    $sth->bindValue(':end_date',$end_date);

                    $sth->execute();
                    header("Location:index.php");

                }
            }
        }else{
            echo "vérifier le format ou le poid de votre photo";
            header("Location:profile.php");

        }
    }
     
        ?>