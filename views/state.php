
<?php $title = "Accueil"; ?>
<?php ob_start()  //donnees mises en tampon au lieu de l'envoie au navigateur ?>



    <?php require("navbars/home_navbar.php"); ?>

    <!-- TABLEAU DES DEMANDES EFFECTUEES -->
    <table class="table table-hover" style="margin-top:50px;">
        <thead>
            <tr>
                <th scope="col">Etat</th>
                <th scope="col">Objet de la demande</th>
            </tr>
        </thead>

        <tbody>
            <!-- CONTENU DE LA TABLE -->
        </tbody>
    </table>



<?php $content = ob_get_clean()  //lecture du tampon puis l'efface ?>


<!-- TEMPLATE -->
<?php require("templates/template.php"); ?>

