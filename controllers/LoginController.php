<?php
    require_once("models/PersonModel.php");


    /**
     * Controller gérant la sécurité des connexions
     * 
     * @author decoopmc
     * @version 1.0
     */
    class LoginController
    {

        /**
         * Objet PersonModel pour la requete sur la table "personne"
         */
        private $person;


        /**
         * CONSTRUCTEUR DE CLASSE LoginController
         */
        public function __construct() {
            $this->person = new PersonModel();
        }


        /**
         * DESTRUCTEUR DE CLASSE LoginController
         */
        public function __destruct() {
        }


        /**
         * Verifie si un visiteur est connecte
         */
        public function isLoged() 
        {
            session_start();
            $ret = false;
            if( session_status() == PHP_SESSION_ACTIVE && !empty($_SESSION)) {
                $ret = true;
            }

            return $ret;
        }


        /**
         * Connexion d'un utilisateur enregistre
         */
        public function login() 
        {
            if( isset($_POST['login']) && isset($_POST['passwd']) ) 
            {
                $data = $this->person->getConnexionData($_POST['login']);        // recuperation des donnees depuis le Model
                if( !empty($data) && $data['mdp'] == md5($_POST['passwd']) ) 
                {
                    session_start();                    // nouvelle session;
                    foreach($data as $col => $row) {
                        $_SESSION[$col] = $row;         // donnees de session
                    }
                    header("Location: \?page=demandes");
                    exit();
                }
                else {
                    header("Location: \?page=connexion");
                    exit();
                }
            }
        }


        /**
         * Deconnexion
         */
        public function logout() 
        {
            session_start();
            session_unset();         // suppression des champs de la session
            session_destroy();        // destruction de la session courrante
            header("Location: \?page=home");
            exit();
        }
    }

?>