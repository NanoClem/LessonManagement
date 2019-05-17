<?php
    require("../bdd/Database.php");
    require('../configs/session_configs.php');


    if( session_status() == PHP_SESSION_ACTIVE)
    {
        if( isset($_POST['titre']) && isset($_POST['description']) ) 
        {
            $db = new Database();

            /*=========================================
                TRAITEMENT TABLE DEMANDE
            ==========================================*/
            #TODO : pouvoir stocker un fichier (soit dans bdd, soit dans des dossiers du site)
            $dataDem = [
                "titre" => $_POST['titre'],
                "descr" => $_POST['description'],
                "etat"  => "en cours de validation"
            ];
    
            // INSERTION TABLE DEMANDE
            $sqlDem   = "INSERT INTO demande(titre, descr, etat) VALUES(:titre, :descr, :etat)";
            $db->insert($sqlDem, $dataDem);
            

            /*=========================================
                TRAITEMENT TABLE TRAITE
            ==========================================*/
            $dataTrait = [
                "id_pers" => $_SESSION['id_pers'],
                "id_dem"  => $db->getLastInsertID()
            ];

            // INSERTION TABLE TRAITE
            $sqlTrait = "INSERT INTO traite(id_dem, id_pers) VALUES(:id_dem, :id_pers)";
            $db->insert($sqlTrait, $dataTrait);
            
    
            /*=========================================
                REDIRECTION CONSULTATION DES DEMANDES
            ==========================================*/
            header("Location: ../views/menu.php?page=2");
        }
        else {
            header("Location: page/page_1.inc.php");
        }
    }
    else {
        header("Location: ../../index.html");
    }
    
?>