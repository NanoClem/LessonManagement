<?php
  require_once('configs/config_bd.php');


  /**
   * Model parent de tous les autres models de l'application
   */
  class Model {

    /**
     * Objet PDO pour les requetes sql
     */
    protected $db;


    /**
     * CONSTRUCTEUR
     */
    public function __construct() {
        $this->connect();
    }


    /**
     * DESTRUCTEUR
     * Coupe la connexion de la BDD avec l'objet PDO
     */
    public function __destruct() {
        $this->disconnect();
    }


    /**
     * CONNEXION A LA BASE DE DONNEES
     * Instancie l'objet PDO avec gestion d'erreurs
     */
    private function connect() {
        try {
          $this->db = new PDO('mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_DATABASE, DB_USERNAME, DB_PASSWORD);
          $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // rapport d'erreurs : emet des exceptions
          $this->db->exec("SET NAMES 'utf8'");                                  // codage utilise
        }
        catch(Exception $e) {
          echo 'Erreur : '.$e->getMessag().'<br/>';
          echo 'N° : '.$e->getCode();
          exit();
        }
    }

    
    /**
     * FERMER LA CONNEXION
     */
    public function disconnect() {
        $this->db = null;
    }


  }

?>