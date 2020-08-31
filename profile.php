<?php 
    $page ='profile';
    require('inc/connect.php'); 
    require('assets/head.php');
    require ('inc/function.php');
    include('assets/nav.php');
   
    $userid = $_SESSION['id'];
    $sql = $db->query("SELECT COUNT(*) FROM `annonces` WHERE author_article = $userid");
    $compteur = $sql->fetchColumn();

    $sql2 = $db->query("SELECT * FROM `users` WHERE id = $userid");
    $row = $sql2->fetch();

    if (isset($_POST['submit_update']) && isset($_POST['email'])){
        $user_email = htmlspecialchars($_POST['email']);
        $lname = htmlspecialchars($_POST['lastname']);
        $fname = htmlspecialchars($_POST['firstname']);

        if($sql = $db->query("SELECT * FROM users WHERE id = '$userid'")){
            $mail_verif = $sql->rowCount();
            if($mail_verif == 0){
                $message = "<div class ='alert alert-danger'> Il y a déja un compte possédant cet e-mail </div>";
            }else{
                $sth = $db->prepare("UPDATE users SET email=:email,lastname=:lname,firstname=:fname WHERE id =$userid ");
                $sth ->bindValue(":email", $user_email);
                $sth ->bindValue(':lname', $lname);
                $sth ->bindValue(":fname", $fname);
                $sth ->execute();
                header('location:profile.php');
            }
        }
    }

?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="py-4">Mon profil :</h2>
            </div>
            <div class="col-md-8">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail">Nom</label>
                        <input type="text" class="form-control" name="lastname" id="exampleInputEmail"
                            aria-describedby="emailHelp" placeholder="Nom" value="<?= $row[4];?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Prénom</label>
                        <input type="text" name="firstname" class="form-control" id="exampleInputPassword"
                            placeholder="Prénom" value="<?= $row[3];?>">
                    </div>
                 
                    <div class="form-group">
                        <label for="exampleInputEmail">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail"
                            aria-describedby="emailHelp" value="<?= $row[1];?>">
                    </div>
                    <input type="submit" name="submit_update" class="btn btn-info" value="Mettre à jour">
                </form>
            </div>
            <div class="col-md-4">
                <a href="create_annonce.php" class="btn btn-primary mb-3">Publier une nouvelle annonce</a>
                <a  class="btn btn-primary mb-3 <?php  if($compteur < 1){ echo 'disabled'; } ?>"
                    data-toggle="modal" data-target="#listingAnnonces">Voir mes annonces  <span class="badge badge-primary badge-pill"><?php echo $compteur; ?></span>
                    </a>
                <a href="#" class="btn btn-primary mb-3 <?php  if($compt < 1){ echo 'disabled'; } ?>"
                    data-toggle="modal" data-target="#listingResa">Voir mes réservations <span class="badge badge-primary badge-pill">5</span></a>
            </div>
            <div class="col-md-12 text-center pt-5 my-2">
                <a class="btn btn-info back" href="annonces.php">Retour aux annonces</a>
            </div>
        </div>
    </div>
</section>





<div class="modal fade" id="listingAnnonces" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog listings" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mes annonces</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?= myannonce($userid); ?>
            </div>
        </div>
    </div>
</div>


<?php require('assets/footer.php'); ?>