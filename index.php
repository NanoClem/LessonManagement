<?php
    require("controllers/MainController.php");
    require("controllers/LoginController.php");

    $router = new MainController();


    if( isset($_GET['page']) )
    {
        $page = $_GET['page'];

        //PAGE D'ACCUEIL
        if($page == "home") {
            $router->home();
        }

        //FORMULAIRE DES DEMANDES
        elseif($page == "demandes") {
            $router->askForm();
        }

        //CONSULTATION ETAT DES DEMANDES
        elseif($page == "etat") {
            $router->askState();
        }

        //INTERVENTIONS
        elseif($page == "interventions") {
            $router->intervForm();
        }

        //LISTE DES CONTACTS
        elseif($page == "contact") {
            $router->contacts();
        }

        //LOGIN
        elseif($page == "login") {
            $router->login();
        }
    }
    else {
        $router->home();
    }


?>