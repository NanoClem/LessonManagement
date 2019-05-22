
<?php $title = "Contacts"; ?>
<?php ob_start()  //donnees mises en tampon au lieu de l'envoie au navigateur ?>


    <link rel="stylesheet" type="text/css" href="public/css/tab_style.css" />
    <?php require("navbars/home_navbar.php"); ?>

    <!-- TABLEAU DES ENSEIGNANTS/INTERVENANTS -->
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="my_th" scope="col">IDENTITE</th>
                    <th class="my_th" scope="col">MAIL</th>
                    <th class="my_th" scope="col">COURS</th>
                    <th class="my_th" scope="col">FONCTION</th>
                </tr>
            </thead>
            <tbody>
                <?php if( isset($_SESSION['contacts']) ): ?> 

                        <!-- AFFICHAGE DES CONTACTS -->
                        <?php foreach($_SESSION['contacts'] as $row): ?>
                            <tr>
                                <td class="my_td" style="text-indent:15%;"> 
                                    <?= htmlspecialchars( strtoupper($row['nom']) ); ?>
                                    <?= htmlspecialchars( $row['prenom'] ); ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars( $row['mail']); ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars( $row['libelle'] ); ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars( $row['statut'] ); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    
                <?php endif; ?>
            </tbody>
        </table>
    </div>



<?php $content = ob_get_clean()  //lecture du tampon puis l'efface ?>


<!-- TEMPLATE -->
<?php require("templates/template.php"); ?>