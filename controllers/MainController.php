<?php
    require("models/Database.php");
    require("LoginController.php");


    /**
     * Constitue le controller principal en tant que routeur
     * 
     * @author decoopmc
     * @version 1.0
     */
    class MainController
    {
        /**
         * Accès à la page d'accueil
         */
        public function home() {
            require("views/home.php");
        }

        /**
         * Accès au formulaire des demandes
         */
        public function askForm() {
            require("views/forms/form_ask.php");
        }

        /**
         * Accès au formulaire des interventions
         */
        public function intervForm() {
            require("views/forms/form_interv.php");
        }

        /**
         * Accès aux consultation de l'état des demandes
         */
        public function askState() {
            require("views/state.php");
        }

        /**
         * Accès aux contacts
         */
        public function contacts() {
            require("views/contact.php");
        }

        /**
         * Accès a la page de login
         */
        public function login() {
            require("views/login.php");
        }
    }

?>