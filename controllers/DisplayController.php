<?php
    require_once("models/PersonModel.php");


    /**
     * Constitue le controller se chargeant d'afficher les données
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
         * CONSTRUCTEUR
         */
        public function __construct() {
            $this->ask = new AskModel();
        }

        /**
         * DESTRUCTEUR
         */
        public function __destruct() {

        }

        /**
         * Affiche les donnees sur l'etat des demandes
         */
        public function displayAskState() 
        {
            print_r( $this->ask->getAsk($_SESSION['id_pers']) );
        }
    }

?>