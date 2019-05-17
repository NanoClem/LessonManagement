<?php
    require('../configs/session_configs.php');


    if( session_status() == PHP_SESSION_ACTIVE) {
          include("../views/templates/navigation.html");
          include("../views/etat_demandes.html");
          include("../views/templates/footer.html");
    }
    else {
		  header('Location: ../../../index.html');
	}
?>