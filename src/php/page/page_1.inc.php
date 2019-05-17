<?php
	require('../configs/session_configs.php');


	if( session_status() == PHP_SESSION_ACTIVE) {
		include("../views/navigation.html");
		include("../views/formulaire_demande.html");
	}
	else {
		header('Location: ../../../index.html');
	}	
?>