<?php
    $page='index';
    require ('inc/connect.php');
    require ('inc/function.php');
?>
<?php
require('assets/head.php');
include('assets/nav.php'); 
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron jumbotron-fluid col-md-12 text-center my-4">
                    <h1 class="display-4">Bienvenue sur Stuliday !</h1>
                    <hr class="my-4">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="<?= random_images(2000,600); ?>" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src=" <?= random_images(2001,600); ?>" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?= random_images(1999,600); ?>" alt="Third slide">
                        </div>
                    </div>
                </div>
              
                </div>
        </div>
    </div>
</section>
<?php require('assets/footer.php'); ?>