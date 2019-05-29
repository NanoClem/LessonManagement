<?php
    require_once("models/AskModel.php");
    require_once("LoginController.php");


    /**
     * Controller gérant les actions des formulaires
     * 
     * @author decoopmc
     * @version 1.0
     */
    class FormController
    {
        /**
         * Objet Model pour les demandes
         */
        private $ask;

        /**
         * Controller des connexions utilisateur 
         */
        private $loginControl;


        /**
         * CONSTRUCTEUR DE CLASSE FormController
         */
        public function __construct() {
            $this->ask = new AskModel();
            $this->loginControl = new LoginController();
        }


        /**
         * DESTRUCTEUR DE CLASSE FormController
         */
        public function __destruct() {
        }


        /**
         * Actions d'envoi du formulaire des demandes
         */
        public function sendAsk() 
        {
            if($this->loginControl->isLoged()) {
                if( isset($_POST['objet']) && isset($_POST['prof']) && isset($_POST['descr']) ) 
                {
                    $this->ask->addAsk($_SESSION['id_pers'], $_POST['objet'], $_POST['descr'], $_POST['prof']);
                    unset($_POST);
                    header("Location: \?page=etat");
                    exit();
                }
                else {
                    header("Location: \?page=demandes");
                    exit();
                }
            }
            else {
                header("Location: \?page=connexion");
                exit();
            }
        }
    }

?>