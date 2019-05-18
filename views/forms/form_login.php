
<?php $title = "Accueil"; ?>
<?php ob_start()  //donnees mises en tampon au lieu de l'envoie au navigateur ?>



    <link rel="stylesheet" type="text/css" href="public/css/login_style.css" />
    <?php require("views/navbars/home_navbar.php"); ?>

    <form class="box" method="post" name="formUSR" action="#">
        <h1>Login</h1>
        <input type="text" id="login" name="login" placeholder="Mail" size="50" required />
        <input type="password" id="passwd" name="passwd" placeholder="password" size="50" required />
        <input type="submit" value="Login" />
      </form>
    


<?php $content = ob_get_clean()  //lecture du tampon puis l'efface ?>


<!-- TEMPLATE -->
<?php require("views/templates/template.php"); ?>

