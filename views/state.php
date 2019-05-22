
<?php $title = "Accueil"; ?>
<?php ob_start();  //donnees mises en tampon au lieu de l'envoie au navigateur ?>


    <link rel="stylesheet" type="text/css" href="public/css/tab_style.css" />
    <?php require("navbars/home_navbar.php"); ?>

    <!-- TABLEAU DES DEMANDES EFFECTUEES -->
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="my_thead">
                <tr>
                    <th scope="col">ETAT</th>
                    <th scope="col">OBJET DE LA DEMANDE</th>
                </tr>
            </thead>

            <tbody>
                <!-- AFFICHAGE DES ETATS DES DEMANDES -->
                <?php if( isset($_SESSION['demandes']) ): ?>
                    <?php foreach($_SESSION['demandes'] as $row): ?>
                        <tr>
                        <?php foreach($row as $data): ?>
                            <td class="my_td" style="text-indent:15%;"> 
                                <?= htmlspecialchars($data) ?> 
                            </td>
                        <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    <div class="table-responsive">



<?php $content = ob_get_clean();  //lecture du tampon puis l'efface ?>


<!-- TEMPLATE -->
<?php require("templates/template.php"); ?>

