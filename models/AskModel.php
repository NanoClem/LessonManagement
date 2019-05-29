<?php
  require_once('configs/config_bd.php');
  require_once('Model.php');


  /**
   * Model pour les donnees concernant les demandes
   */
  class AskModel extends Model {

    /**
     * CONSTRUCTEUR
     */
    public function __construct() {
      parent::__construct();
    }

    /**
     * DESCTRUCTEUR
     */
    public function __destruct() {
      parent::__destruct();
    }


    /**
     * Retourne les donnees des demandes effectuees par un user
     * #TODO : ameliorer en faisant 1 seule requete pour les demandes (methode IN())
     */
    public function getDataAsks($id_pers)
    {
      try {
        $query = $this->db->prepare("SELECT titre, etat 
                                     FROM demande D JOIN traite T ON D.id_dem = T.id_dem
                                     JOIN personne P ON T.id_etu = P.id_pers
                                     WHERE P.id_pers = :id");
        $query->bindValue(":id", $id_pers, PDO::PARAM_INT);
        $query->execute();
      }
      catch(Exception $e) {
        die('<div style="font-weight:bold; color:red">Erreur : '.$e->getMessage().'</div>');
      }

      return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * Recupere l'id de l'enseignant passe en parametre
     */
    public function getProfID($name, $surname)
    {
      try {
        $query = $this->db->prepare("SELECT id_pers FROM personne WHERE nom = :name AND prenom = :surname");
        $query->bindParam(':name', $name);
        $query->bindParam(':surname', $surname);
        $query->execute();
      }
      catch(Exception $e) {
        die('<div style="font-weight:bold; color:red">Erreur : '.$e->getMessage().'</div>');
      }
      
      return $query->fetch(PDO::FETCH_COLUMN);
    }


    /**
     * Ajoute une demande dans la BDD
     */
    public function addAsk($id_etu, $object, $decr, $profIdentity)
    {
      list($name, $surname) = explode(" ", $profIdentity, 2);  // nom et prenom separes individuellement de la chaine en parametre

      try {
        // RECUPERATION DE L'ID DU PROF
        $profID = $this->getProfID($name, $surname);

        // TABLE DEMANDE
        $queryDem = $this->db->prepare("INSERT INTO demande(titre, descr, etat) VALUES(:objet, :descr, 'en cours de validation')");
        $queryDem->bindParam(':objet', $object);
        $queryDem->bindParam(':descr', $descr);
        $queryDem->execute();

        // TABLE TRAITE
        $lastID = $this->db->lastInsertId();     // id de la demande venant d'etre inseree
        $queryTrait = $this->db->prepare("INSERT INTO traite(id_dem, id_etu, id_prof) VALUES(:dem, :etu, :prof)");
        $queryTrait->bindParam(':dem', $lastID);
        $queryTrait->bindParam(':etu', $id_etu);
        $queryTrait->bindParam(':prof', $profID);
        $queryTrait->execute();
      }
      catch(Exception $e) {
        die('<div style="font-weight:bold; color:red">Erreur : '.$e->getMessage().'</div>');
      }
    }


  }

?>