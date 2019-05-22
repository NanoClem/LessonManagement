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
     * Retourne les ID des demandes effectuees par un user
     */
    public function getAskIDs($id_pers)
    {
      try {
        $query = $this->db->prepare("SELECT id_dem FROM traite WHERE id_pers = :persID");
        $query->bindValue(":persID", $id_pers, PDO::PARAM_INT);
        $query->execute();
      }
      catch(Exception $e) {
        die('<div style="font-weight:bold; color:red">Erreur : '.$e->getMessage().'</div>');
      }

      return $query->fetch(PDO::FETCH_ASSOC);
    }


    /**
     * Retourne les donnees des demandes effectuees par un user
     * #TODO : ameliorer en faisant 1 seule requete pour les demandes (methode IN())
     */
    public function getAsks($id_pers)
    {
      try {
        $data = $this->getAskIDs($id_pers);   // ids des demandes
        $query = $this->db->prepare("SELECT titre, etat 
                                     FROM demande D JOIN traite T   ON D.id_dem = T.id_dem
                                     JOIN personne P ON T.id_pers = P.id_pers
                                     WHERE P.id_pers = :id");
        $query->bindValue(":id", $id_pers, PDO::PARAM_INT);
        $query->execute();
      }
      catch(Exception $e) {
        die('<div style="font-weight:bold; color:red">Erreur : '.$e->getMessage().'</div>');
      }

      return $query->fetchAll(PDO::FETCH_ASSOC);
    }


  }

?>