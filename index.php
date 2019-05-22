<?php
    require_once("controllers/MainController.php");
    require_once("controllers/FormController.php");

    $router = new MainController();
    $formManager  = new FormController();
    $loginManager = new LoginController(); 


    if( isset($_GET['page']) ) :

        $page = $_GET['page'];

        if($page == "home") : $router->home();                         // PAGE D'ACCUEIL
        elseif($page == "demandes") : $router->getAskForm();           // FORMULAIRE DES DEMANDES
        elseif($page == "etat") : $router->getAskState();              // CONSULTATION ETAT DES DEMANDES
        elseif($page == "interventions") : $router->getIntervForm();   // INTERVENTIONS
        elseif($page == "contact") : $router->getContacts();           // LISTE DES CONTACTS     
        elseif($page == "connexion") : $router->getLogin();            // LOGIN

        elseif($page == "send_login") : $loginManager->login();     // CONNEXION USER
        elseif($page == "deconnexion") : $loginManager->logout();   // DECONNEXION USER 

        elseif($page == "send_demande") : $formManager->sendAsk();  // ENVOI D'UNE DEMANDE
        
        
        endif;

    else :
        $router->home();

    endif;
?>