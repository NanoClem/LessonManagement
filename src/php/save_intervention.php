<?php
	require('../bdd/Database.php');


	if( isset($_POST['nb_heures']) && isset($_POST['nature']) ) 
    {
        // DONNEES A INSERER
        $data = [
            "heures" => $_POST['nb_heures'],
			"nature" => $_POST['nature']
			//"id_dem" => "id de la demande concernee"
        ];
        
        // TRAITEMENT BDD : TODO insérer l'id de la demande concernée par l'intervention
        $db = new Database();
        $sql = "INSERT INTO intervention(nb_heures, nature) VALUES(:heures, :nature)";
        $db->insert($sql, $data);

        // REDIRECTION VERS LA CONSULTATION DES DEMANDES
        header("Location: page/page_2.inc.php");
    }
    else {
        header("Location: page/page_2.inc.php");
    }
?>