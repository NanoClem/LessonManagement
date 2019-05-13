<?php
    require("../bdd/Database.php");


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
                "descr" => $_POST['description']
            ];
    
            // INSERTION TABLE DEMANDE
            $sqlDem   = "INSERT INTO demande(titre, desciption) VALUES(:titre, :descr)";
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
            header("Location: page/page_2.inc.php");
        }
        else {
            header("Location: page/page_1.inc.php");
        }
    }
    else {
        header("Location: ../../index.html");
    }
    
?>