<?php
/* il faut recuperer l'id de la demande correspondate (id_dem) afin d'ajouter la nouvelle ligne d'intervention
*/
	require('Database.php');
	
	$db = new Database();
	
	$data = [
		if (isset ($_POST['nb_heures'])) 'nb_heures' => $_POST['nb_heures'];,
		if (isset ($_POST['nature'])) 'nature' => $_POST['nature']; /*,
		'id_dem' => ??? */
		];
	
	$query = "INSERT INTO intervention(nb_heures, nature) VALUES (:nb_heures, :nb_values)"; //ajouter id_dem
	
	$db->insert($query, $data);
	
	
	
	
	
	header("Location: ./gestion_batiment.php?page=3");  //redirige la page //ou est ce qu'on redirige la page ?
?>