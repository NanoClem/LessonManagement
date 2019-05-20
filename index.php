<?php
    require_once("controllers/MainController.php");
    require_once("controllers/FormController.php");
    $router = new MainController();
    $formManager = new FormController();


    if( isset($_GET['page']) ) :

        $page = $_GET['page'];

        if($page == "home") : $router->home();                         // PAGE D'ACCUEIL
        elseif($page == "demandes") : $router->getAskForm();           // FORMULAIRE DES DEMANDES
        elseif($page == "etat") : $router->getAskState();              // CONSULTATION ETAT DES DEMANDES
        elseif($page == "interventions") : $router->getIntervForm();   // INTERVENTIONS
        elseif($page == "contact") : $router->getContacts();           // LISTE DES CONTACTS     
        elseif($page == "login") : $router->getLogin();                // LOGIN

        elseif($page == "send_demande") : $formManager->sendAsk();  // ENVOI D'UNE DEMANDE
        
        endif;

    else :
        $router->home();

    endif;
?>