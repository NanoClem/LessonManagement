<?php
    require_once("LoginController.php");


    /**
     * Constitue le controller principal en tant que routeur
     * 
     * @author decoopmc
     * @version 1.0
     */
    class MainController
    {
        /**
         * Gestions des connexions et autorisations de consultation
         */
        private $loginControl;


        /**
         * CONSTRUCTEUR DE CLASSE MainController
         */
        public function __construct() {
            $this->loginControl = new LoginController();
        }

        /**
         * DESTRUCTEUR DE CLASSE MainController
         */
        public function __destruct() {
        }

        
        /**
         * Accès à la page d'accueil
         */
        public function home() {
            require("views/home.php");
        }

        /**
         * Accès au formulaire des demandes
         */
        public function getAskForm() {
            require("views/forms/form_ask.php");
        }

        /**
         * Accès au formulaire des interventions
         */
        public function getIntervForm() {
            require("views/forms/form_interv.php");
        }

        /**
         * Accès aux consultation de l'état des demandes
         */
        public function getAskState() {
            require("views/state.php");
        }

        /**
         * Accès aux contacts
         */
        public function getContacts() {
            require("views/contact.php");
        }

        /**
         * Accès a la page de login
         */
        public function getLogin() {
            require("views/forms/form_login.php");
        }
    }

?>