<?php
    require_once("LoginController.php");
    require_once("DisplayController.php");
    require_once("NavbarController.php");
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
         * Gestion de l'affichage des barres de menu
         */
        private $navbarControl;


        /**
         * CONSTRUCTEUR DE CLASSE MainController
         */
        public function __construct() {
            $this->loginControl   = new LoginController();
            $this->displayControl = new DisplayController();
            $this->navbarControl = new NavbarController(); 
        }

        /**
         * DESTRUCTEUR DE CLASSE MainController
         */
        public function __destruct() {
        }

        /**
         * Accès à la page d'accueil
         */
        public function home() 
        {
            if( $this->loginControl->isLoged() ) {
                $this->navbarControl->getNavbar();
                require("views/home.php");
            }
            else {
                $this->navbarControl->getLogoutNavbar();
                require("views/home.php");
            }
            
        }

        /**
         * Accès a la page de login
         */
        public function getLogin() {
            $this->navbarControl->getLogoutNavbar();
            require("views/forms/form_login.php");
        }

        /**
         * Accès au formulaire des demandes
         */
        public function getAskForm() 
        {
            if( $this->loginControl->isLoged() ) {
                $this->navbarControl->getNavbar();
                $this->displayControl->getProfs();            // sauvegarde $_SESSION des profs
                require("views/forms/form_ask.php");
            } 
            else {
                $this->getLogin();
            } 
        }

        /**
         * Accès au formulaire des interventions
         */
        public function getIntervForm() 
        {
            if($this->loginControl->isLoged()) {
                $this->navbarControl->getNavbar();
                require("views/forms/form_interv.php");
            } 
            else {
                $this->getLogin();
            } 
        }

        /**
         * Accès aux consultation de l'état des demandes
         */
        public function getAskState()
        {
            if($this->loginControl->isLoged()) {
                $this->navbarControl->getNavbar();
                $this->displayControl->getAskState();     // sauvegarde $_SESSION des etats
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
                $this->navbarControl->getNavbar();
                $this->displayControl->getContacts();     // sauvegarde $_SESSION des contacts
                require("views/contact.php");
            }
            else {
                $this->getLogin();
            }
        }
    }

?>