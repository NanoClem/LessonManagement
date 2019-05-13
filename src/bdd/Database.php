<?php
  require('config_bd.php');


  class Database {

    private $PDO_BDD;


    /**
     * CONSTRUCTEUR DE CLASSE Database
     * Construit l'objet PDO et le connecte a la BDD
     */
    public function __construct() {
      $this->connect();
    }


    /**
     * DESTRUCTEUR DE CLASSE Database
     * Deconnecte de la BDD l'objet PDO
     */
    public function __destruct() {
      $this->disconnect();
    }


    /**
     * CONNEXION A LA BASE DE DONNEES
     * Nouvel objet PDO avec gestion d'erreurs
     */
    private function connect() {
      try {
        $this->PDO_BDD = new PDO('mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        $this->PDO_BDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // rapport d'erreurs : emet des exceptions
        $this->PDO_BDD->exec("SET NAMES 'utf8'");                                  // codage utilise
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
    public function disconnect()
    {
      $this->PDO_BDD = null;
    }


    /**
     * SELECTIONNE LES DONNEES ISSUES DE LA REQUETE
     * @param $sql : requete sql de selection
     * @return : renvoie le resultat sous forme de tableau associatif
     */
    public function select($sql, $fetchMode = PDO::FETCH_ASSOC) {
      try {
        $query = $this->PDO_BDD->prepare($sql);   // preparation de la requete (contre les injections)
        $query->execute();                        // execution de la requete
      }
      catch(Exception $e) {
        die('<div style="font-weight:bold; color:red">Erreur : '.$e->getMessage().'</div>');
      }

      return $query->fetchAll($fetchMode);  // chaque ligne est un tableau indexe
    }


    /**
     * INSERTION DE DONNEES DANS LA BDD
     * @param $sql  : requete sql d'insertion
     * @param $data : tableau associatif des donnees a inserer
     */
    public function insert($sql, $data) {
      try {
        $query = $this->PDO_BDD->prepare($sql);   // preparation de la requete (contre les injections)
        $query->execute($data);                   // execution de la requete
      }
      catch(Exception $e) {
        die('<div style="font-weight:bold; color:red">Erreur : '.$e->getMessage().'</div>');
      }
    }


    /**
     * RECUPERATION DE LA DERNIERE LIGNE INSEREE
     * @return : id de la derniere ligne insérée
     */
    public function getLastInsertID() {
      return $this->PDO_BDD->lastInsertId();
    }


    /**
     * AFFICHE UNE REQUETE SQL SOUS FORME DE TABLEAU HTML
     * @param sql : tableau associatif resultant d'une precedente requete
     */
    public function printQuery($sql) {

      // EXECUTION DE LA REQUETE
      $dataTab = $this->select($sql);

      // AFFICHAGE DES RESULTATS
      echo '<table style="text-align:left; border-collapse:separate;  border-spacing:8px 8px;">
              <tr>
                <th>ID</th> <th>Nom</th> <th>Type</th> <th>Description / Unite</th>
              </tr>';
        foreach($dataTab as $line) {
          echo '<tr>';
            foreach($line as $data)
              echo '<td>'.$data.'</td>';
          echo '</tr>';
        }
      echo '</table>';
    }
  }

?>
