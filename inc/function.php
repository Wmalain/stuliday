<?php 


    function random_images($h,$w){
        echo "https://loremflickr.com/$h/$w/house,cottage";
    }

    


    function shorten_text($text, $max = 60, $append = '&hellip;'){
        if (strlen($text)<=$max) return $text;
        $return = substr($text, 0, $max);
        if (strpos($text,' ') ===false) return $return . $append;
        return preg_replace('/\w+$/','',$return) .$append;
    }

    function displayAllUsers(){
        global $db;
        $sql = $db->query("SELECT * FROM users");
        $sql ->setFetchMode(PDO::FETCH_ASSOC);

        while($row = $sql->fetch()){
                ?>
            <div class="col-4">
                <div class="card p-3">
                    <h2>User n°<?=$row['id'];?></h2>
                    <p>Mail :<?= $row['email'];?></p>
                </div>
            </div>
            <?php
        
        
        }


    }



        Function displayAllannonce(){
            global $db;
            $sql = $db->query("SELECT * from annonces");
            $sql ->setFetchMode(PDO::FETCH_ASSOC);

            while($row = $sql ->fetch()){
                ?>
                <div class="col-6">
                    <div class="card p-3">
                        <h2 class="text-center">Titre </br> <?= $row['title'];?></h2>
                        <p class="text-center">Description </br><?= shorten_text($row['description']) ?> </p>
                        <p class="text-center">Ville </br> <?= $row['city'];?></p>
                        <p class="text-center">Categorie </br> <?= $row['category'];?></p>
                        <p class="text-center">prix </br> <?= $row['price']?></p>
                        <a class="nav-link text-center" href="oneannonce.php?id=<?= $row['id'] ?>">Voir l'annonce</a>

                    </div>
                </div>
            <?php
            }
        }
?>
<?php
        function displayAnnonce($id){

            global $db;
            $sql = $db->query("SELECT * FROM annonces WHERE id = $id");
            $sql ->setFetchMode(PDO::FETCH_ASSOC);

            while ($row = $sql->fetch()){
            ?>
            <div class="col-12 text-center">
                <h2 class="text-center">Titre </br> <?= $row['title']?></h2>
            </div>
            <div class="col-4 justify-center">
                <p class="text-center">Ville </br> <?= $row['city']?></p>
           </div>
            <div class="col-4 justify-center">
                <p class="text-center">Adresse </br> <?= $row['address_article']?></p>
            </div>
            <div class="col-4 text-center">
                <p class="text-center">Categorie </br> <?= $row['category']?></p>
            </div>
            <div class="col-12 text-center"> 
                <p> Description </br> <?= $row['description']?></p>
            </div>
            <div class="col-12 text-center">
             <img class="img-fluid"src="./assets/uploads/<?= $row['image_url'];?>"/>
            </div>
            <div class="col-4 text-center"> 
                <p> prix </br> <?= $row['price']?></p>
            </div>
            <div class="col-4 text-center"> 
                <p> Date d'entrée </br> <?= $row['start_date']?></p>
            </div>
            <div class="col-4 text-center"> 
                <p> Date de sortie </br> <?= $row['end_date']?></p>
            </div>
            <div class="col-12 text-center"> <a href="annonces.php">retour aux annonces</a>
            </div>
            <?php
            }
        }      
        ?>
<?php
        function myannonce($id){
            global $db;
            $sql = $db-> query("SELECT * FROM annonces WHERE author_article = $id");
            $sql ->setFetchMode(PDO::FETCH_ASSOC);          
            while ($row = $sql->fetch()) {
?>
            <div class="text-center">

                <div class="card p-1 m-2">
                    <h2>annonce n° <?= $row['id']?></h2>
                    <p> Description </br> <?= $row['description']?></p>
                    <a href="oneannonce.php?id=<?= $row['id']?>">voir annonces</a>
                    <a href="delete.php">supprimer l'annonce</a>
                    <a href="edit_annonces.php?id=<?= $row['id']?>">editer l'annonce</a>
                </div>
            </div>

<?php
            }
        }

        function delete($id){

            global $db;
            
            $sql = $db-> query("DELETE FROM annonces WHERE id = $id");  

            exec($sql);

        }
        ?>
        
<?php
        function modify($id){
            global $db;
            $sql = $db -> query("UPDATE * FROM users where id = $id");

            $lname = ($_POST['lastname']);
            $fname= ($_POST['firstname']);
            $email= ($_POST['email']);

        }

?>