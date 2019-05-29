<?php

    /**
     * Controller gérant l'affichage des barres de menu selon le statut
     * de l'utilisateur connecte ('etu', 'prof', 'interv')
     * 
     * @author decoopmc
     * @version 1.0
     */
    class NavbarController
    {
        /**
         * CONSTRUCTEUR DE CLASSE NavbarController
         */
        public function __construct() {

        }

        /**
         * DESTRUCTEUR DE CLASSE NavbarController
         */
        public function __destruct() {
        }


        /**
         * Affiche la barre de menu hors connexion
         */
        public function getLogoutNavbar() {
            require("views/navbars/logout_navbar.php");
        }


        /**
         * Affiche la barre de menu en fonction du statut
         */
        public function getNavbar()
        {
            if( isset($_SESSION['statut']) ) :

                $st = $_SESSION['statut'];
                if($st == "etu")        : require("views/navbars/etu_navbar.php");
                elseif($st == "prof")   : require("views/navbars/prof_navbar.php");
                elseif($st == "interv") : require("views/navbars/interv_navbar.php");
                endif;

            endif;
        }


    }

?>