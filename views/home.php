
<?php $title = "Accueil"; ?>
<?php ob_start()  //donnees mises en tampon au lieu de l'envoie au navigateur ?>



    <?php require("navbars/home_navbar.php"); ?>

    <div class="jumbotron text-center" style="margin-bottom:0; background-color:#80cbc4;">
        <h1>ASKIT</h1>
        <p>Contactez un expert pour mieux avancer dans vos projets</p> 
    </div>



<?php $content = ob_get_clean()  //lecture du tampon puis l'efface ?>


<!-- TEMPLATE -->
<?php require("templates/template.php"); ?>

