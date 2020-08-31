<?php 
    $page='annonce';
    require('inc/connect.php');
    require('assets/head.php');
    require('inc/function.php');
    include('assets/nav.php');
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">    
                <h1 class="col-md-12 text-center bg-danger">Description annonces :</h1>
            </div>
        </div>
        <div class="row">
            <?php
            $id = $_GET['id'];
            displayannonce($id);
            ?>
        </div>
    </div>
</section>
<?php require('assets/footer.php'); ?>