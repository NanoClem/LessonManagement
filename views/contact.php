
<?php $title = "Contacts"; ?>
<?php ob_start()  //donnees mises en tampon au lieu de l'envoie au navigateur ?>


    <link rel="stylesheet" type="text/css" href="public/css/tab_style.css" />
    <?php require("navbars/home_navbar.php"); ?>

    <!-- TABLEAU DES ENSEIGNANTS/INTERVENANTS -->
    <table class="table table-hover">
        <thead>
            <tr>
            <th class="my_th" scope="col">Identité</th>
            <th class="my_th" scope="col">fonction</th>
            <th class="my_th" scope="col">Mail</th>
            </tr>
        </thead>
        <tbody>
            <!-- <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>

            <tr>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr> -->
        </tbody>
    </table>



<?php $content = ob_get_clean()  //lecture du tampon puis l'efface ?>


<!-- TEMPLATE -->
<?php require("templates/template.php"); ?>