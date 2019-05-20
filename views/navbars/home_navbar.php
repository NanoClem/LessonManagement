
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#1C2331;">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse">

        <!-- PARTIE GAUCHE -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="navbar-brand" href="\?page=home"">Accueil</a>
            </li>
            <li>
                <a class="nav-link" href="\?page=demandes">Demander</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\?page=etat">Consulter les demandes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\?page=interventions">Interventions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\?page=contact">Messagerie</a>
            </li>
            <li class="nav-item">>

            </li>
        </ul>

        <!-- PARTIE DROITE -->
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?php if(session_status() == PHP_SESSION_ACTIVE): ?>
                        <a class="nav-link" href="\?page=deconnexion">Deconnexion</a>
                </li>
                <li class="nav-item">
                    <?php else: ?>
                        <a class="nav-link" href="\?page=connexion">Connexion</a>
                </li>
            </ul>
        </div>
    
        <?php endif; ?>
    </div>

</nav>