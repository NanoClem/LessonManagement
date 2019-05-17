
<?php require("../configs/session_configs.php"); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <!-- ACCUEIL -->
  <a class="navbar-brand" href="accueil.php">Accueil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">

      <!-- FORMULAIRE DE DEMANDE -->
      <a class="nav-item nav-link" href="formulaire_demande.php">Demander</a>

      <!-- ETAT DES DEMANDES -->
      <a class="nav-item nav-link" href="etat_demandes.php">Consulter les demandes</a>

      <!-- MESSAGERIE -->
      <a class="nav-item nav-link" href="contact.php">Messagerie</a>
      
      <!-- DECONNEXION -->
      <?php if(session_status() == PHP_SESSION_ACTIVE): ?>
        <a class="nav-item nav-link" href="../php/logout.php">Deconnexion</a>
        
	    <!-- CONNEXION -->
	    <?php else: ?>
        <a class="nav-item nav-link" href="../../index.html">Connexion</a>
      
      <?php endif; ?>
    </div>
  </div>
  
</nav>
