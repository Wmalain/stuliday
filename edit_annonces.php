<?php 
    $page='editannonce';
    require('inc/connect.php');
    require('assets/head.php');
    require('inc/function.php');
    include('assets/nav.php');

    $userid = $_SESSION['id'];
    $id = $_GET['id'];
    $sql2 = $db->query("SELECT * FROM `annonces` WHERE id = $id LIMIT 1");
    $row = $sql2->fetch();
?>



<section class="container py-5">
    <div class="row justify-content-center">
        <h1 class='col-12'>Éditer de votre annonce</h1>
        <form action="edit_annonce_post.php" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="title_annonce">Titre de votre annonce</label>
                    <input type="text" class="form-control" name="title" id="title_annonce"  value="<?= $row[1];?>">
                
                </div>

                <div class="form-group col-md-6">
                <label for="start_date">Date de début de l'annonce</label>
                <input type="date" class="form-control" name="start_date" id="start_date" min = "<?= $today;?>" value="<?= $row[10];?>">
                </div>
                <div class="form-group col-md-6">
                <label for="end_date">Date de fin de l'annonce</label>
                <input type="date" class="form-control" name="end_date" id="end_date" max= "" value="<?= $row[11];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="address_annonce">Adresse complète</label>
                    <input type="text" class="form-control" name="address" id="address_annonce" placeholder="Adresse complète avec code postal inclus" class="col-md-12" value="<?= $row[6];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                        <label for="desc_annonce">Description de l'annonce</label>
                        <textarea class="form-control" name="description" rows="3" placeholder ="Description détaillée de l'annonce" id="desc_annonce" required > <?php echo $row[4]; ?> </textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="city_annonce">Ville</label>
                    <input type="text" class="form-control" name="city" id="city_annonce" placeholder="Adresse complète avec code postal inclus" class="col-md-12" value="<?= $row[3];?>">
                </div>
                <div class="form-group col-md-12">
                    <label for="type_announce">Type du logement</label>
                    <select id="type_announce" class="col-md-12" name="category">
                        <option value="Logement Entier">Logement Entier</option>
                        <option value="Chambre privée">Chambre privée</option>
                        <option value="Chambre d'hôtel">Chambre d'hôtel</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                        <label for="price_annonce">Prix par nuit (en €) </label>
                        <input type="number" class="form-control" id="price_annonce" name="price" min ="1" max="999" value="<?= $row[8];?>" required>
                </div>
                <div class="form-group">
                    <label for="img_url">Choisissez une photo de présentation</label>
                    <input type="file" name="img_url" id="img_url" accept=".png,.jpeg,.jpg,.gif">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            J'accepte les CGU
                        </label>
                    </div>
                </div>
            </div>
            <input type="hidden" name ="id" value="<?= $id; ?>"/>
            <input type="submit" class="btn btn-primary col-6 offset-md-3" name ="update-annonce" value="Editer votre annonce"/>
        </form>
        </div>
</section>