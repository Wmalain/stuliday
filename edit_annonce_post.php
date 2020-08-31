<?php 
require('inc/connect.php');
require('inc/function.php');

// if(!empty($_SESSION['id'])){
//     header ("Location:index.php?action=dc");
// }

    if(isset($_POST['update-annonce'])){
        var_dump($_POST);
        $title = ($_POST['title']);
        $description = ($_POST['description']);
        $city = ($_POST['city']);
        $category = ($_POST['category']);
        $file= $_FILES['img_url'];
        $address_article = ($_POST['address']);
        $price = ($_POST['price']);
        $user_id = ($_SESSION['id']);
        $start_date = ($_POST['start_date']);
        $end_date = ($_POST['end_date']);
        $id = ($_POST['id']);

        if($file['size'] <= 1000000){

            $valid_ext = array('jpg','jpeg','gif','png');
            $check_ext = strtolower(substr(strrchr($file['name'], '.'),1));
            
            if(in_array($check_ext, $valid_ext)){

            $imgname = uniqid() . '_' . $file['name'];
            $upload_dir = "./assets/uploads/";
            $upload_name = $upload_dir . $imgname;
            $move_result = move_uploaded_file($file['tmp_name'], $upload_name);

        
                if($move_result){
                    $sth = $db->prepare("UPDATE annonces SET title=:title,description=:description,city=:city,category=:category,image_url=:img_url,address_article=:address,price=:price,author_article=:id,start_date=:start_date,end_date=:end_date WHERE id=$id");
                    $sth->bindValue(':title',$title);
                    $sth->bindValue(':description',$description);
                    $sth->bindValue(':city',$city);
                    $sth->bindValue(':category',$category);
                    $sth->bindValue(':img_url',$imgname);
                    $sth->bindValue(':address',$address_article);
                    $sth->bindValue(':price',$price,PDO::PARAM_INT);
                    $sth->bindValue(':id',$user_id,PDO::PARAM_INT);
                    $sth->bindValue(':start_date',$start_date);
                    $sth->bindValue(':end_date',$end_date);

                    $sth->execute();
                    echo "validation";
                    header("Location:profile.php");


                }
            }
        }
    }
     
        ?>