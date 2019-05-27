<?php 
// récuperer le fichier de config principal
require 'assets/config/bootstrap.php';
?>
    <?php 
    $page_title = 'Réseau';
    // header
    include 'assets/inc/header.php';
    ?>

    <div class="container border mt-4 p-4">
    <h1>Bienvenue sur la boutique !  <?php if(isConnected()) {
        print_r(getUserInfo('pseudo'));
    }?></h1>
    </div>



    <?php
    if (isConnected()) {
        print_r($_SESSION['user']);
    }
    ?>

<?php 
// fin de page 
include 'assets/inc/footer.php';
?>