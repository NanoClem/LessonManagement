<?php
    require_once("models/AskModel.php");
    require_once("models/PersonModel.php");


    /**
     * Constitue le controller se chargeant des donnees a afficher
     * 
     * @author decoopmc
     * @version 1.0
     */
    class DisplayController
    {
        /**
         * Objet Model pour les demandes
         */
        private $display;

        /**
         * Objet Model pour les personnes
         */
        private $person;


        /**
         * CONSTRUCTEUR
         */
        public function __construct() {
            $this->ask    = new AskModel();
            $this->person = new PersonModel();
        }

        /**
         * DESTRUCTEUR
         */
        public function __destruct() {

        }

        /**
         * Recupere les donnees sur l'etat des demandes
         */
        public function getDataAskState() {
            $_SESSION['demandes'] = $this->ask->getAsks($_SESSION['id_pers']);
        }

        /**
         * Recupere les donnees des personnes a contacter (prof/interv)
         */
        public function getDataContacts() {
            $_SESSION['contacts'] = $this->person->getContacts();
        }
    }

?>