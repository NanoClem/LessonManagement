<?php>
require("Database.php");
$dataAct = [
	if(isset($_POST['titre']){
	'titre' => 	$_POST['titre']
	};,
	if(isset($_POST['description']){
	'description' => $_POST['description']
	};
	];
$db = new Database();
$query = "INSERT INTO demande(titre, description) VALUES(:titre, :description)";
$db->insert($query,$dataAct);