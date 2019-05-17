<?php 

    if( isset($_POST['login']) && isset($_POST['passwd']) ) 
    {
        require('../bdd/Database.php');
        
        //DONNEES DE CONNEXION
        $login  = $_POST['login'];
        $passwd = hash("md5", $_POST['passwd']);

        //TRAITEMENT BDD
        $db  = new Database();
        $sql = "SELECT id_pers, nom, prenom, statut FROM personne WHERE mail='$login' and mdp='$passwd'";
        $result = $db->select($sql);

        //TEST DE MATCHING DU COUPLE
        if(count($result) == 1) {                       // si le couple matche
            session_start();                            // nouvelle session
            foreach($result as $line) {
                foreach($line as $col => $data) {
                    $_SESSION[$col] = $data;            // donnees de la requête dans la session
                }
            }
            // TODO : montrer une page differente selon le statut de la personne
            header('Location: ../views/menu.php');      
        }
        else {
            header('Location: ../../../index.html');      // si aucun match : retour au login
        }
    }
    else {
        header('Location: ../../../index.html');        // si il n'y a pas de donnees POST : retour au login
    }
?>