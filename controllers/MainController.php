<?php
    require_once("LoginController.php");
    require_once("DisplayController.php");
    require_once("models/PersonModel.php");


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
         * Gestion de l'affichage des donnees
         */
        private $displayControl;


        /**
         * CONSTRUCTEUR DE CLASSE MainController
         */
        public function __construct() {
            $this->loginControl   = new LoginController();
            $this->displayControl = new DisplayController(); 
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
            session_start();
            require("views/home.php");
        }

        /**
         * Accès a la page de login
         */
        public function getLogin() {
            require("views/forms/form_login.php");
        }

        /**
         * Accès au formulaire des demandes
         */
        public function getAskForm() 
        {
            if($this->loginControl->isLoged()) : require("views/forms/form_ask.php");
            else : $this->getLogin();
            endif;
        }

        /**
         * Accès au formulaire des interventions
         */
        public function getIntervForm() 
        {
            if($this->loginControl->isLoged()) : require("views/forms/form_interv.php");
            else : $this->getLogin();
            endif;
        }

        /**
         * Accès aux consultation de l'état des demandes
         */
        public function getAskState()
        {
            if($this->loginControl->isLoged()) {
                $this->displayControl->getAskState();     // sauvegarde $_SESSION des donnees
                require("views/state.php");
            }
            else {
                $this->getLogin();
            }
        }

        /**
         * Accès aux contacts
         */
        public function getContacts()
        {
            if($this->loginControl->isLoged()) {
                $this->displayControl->getContacts();     // sauvegarde $_SESSION des donnees
                require("views/contact.php");
            }
            else {
                $this->getLogin();
            }
        }
    }

?>