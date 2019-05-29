
<?php $title = "Accueil"; ?>
<?php ob_start()  //donnees mises en tampon au lieu de l'envoie au navigateur ?>


    <link rel="stylesheet" type="text/css" href="public/css/form_style.css" />

    



<?php $content = ob_get_clean()  //lecture du tampon puis l'efface ?>


<!-- TEMPLATE -->
<?php require("views/templates/template.php"); ?>

