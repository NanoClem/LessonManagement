
<?php $title = "Accueil"; ?>
<?php ob_start()  //donnees mises en tampon au lieu de l'envoie au navigateur ?>


    <link rel="stylesheet" type="text/css" href="public/css/tab_style.css" />
    <?php require("navbars/home_navbar.php"); ?>

    <!-- TABLEAU DES DEMANDES EFFECTUEES -->
    <table class="table table-hover">
        <thead class="my_thead">
            <tr>
                <th scope="col">Etat</th>
                <th scope="col">Objet de la demande</th>
            </tr>
        </thead>

        <tbody>
            
        </tbody>
    </table>



<?php $content = ob_get_clean()  //lecture du tampon puis l'efface ?>


<!-- TEMPLATE -->
<?php require("templates/template.php"); ?>

