
<?php $title = "Accueil"; ?>
<?php ob_start()  //donnees mises en tampon au lieu de l'envoie au navigateur ?>


    <link rel="stylesheet" type="text/css" href="public/css/form_style.css" />
    <?php require("views/navbars/home_navbar.php"); ?>


    <form class="my_form form-horizontal" method="post" action="\?page=send_demande">

        <!-- OBJET -->
        <div class="form-group">
            <label class="control-label col-sm-2" for="demande">Objet de la demande:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="objet" id="objet" placeholder="Pourquoi ?" required>
            </div>
        </div>

        <!-- DESCRIPTION -->
        <div class="form-group">
            <label class="control-label col-sm-2" for="description">Description:</label>
            <div class="col-sm-10"> 
                <textarea class="form-control" name="descr" id="descr" rows="3" placeholder="Detaillez la raison et le contexte de votre demande" required></textarea>
            </div>
        </div>

        <!-- BOUTON D'ENVOI-->
        <div class="form-group">
            <div class="col-sm-10"> 
                <button type="submit" class="btn btn-dark">Envoyer</button>
            </div>
        </div>

    </form>
    



<?php $content = ob_get_clean()  //lecture du tampon puis l'efface ?>


<!-- TEMPLATE -->
<?php require("views/templates/template.php"); ?>

