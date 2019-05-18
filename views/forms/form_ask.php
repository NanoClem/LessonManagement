
<?php $title = "Accueil"; ?>
<?php ob_start()  //donnees mises en tampon au lieu de l'envoie au navigateur ?>



    <?php require("views/navbars/home_navbar.php"); ?>


    <form class="form-horizontal" style="margin-top:50px; margin-left:15px;" method="post" action="#">

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

