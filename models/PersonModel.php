<?php
  require_once('configs/config_bd.php');
  require_once('Model.php');


  /**
   * Model pour les donnees concernant les personnes
   */
  class PersonModel extends Model {

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
     * Selectionne les donnees de connexion d'une personne
     */
    public function getConnexionData($login) 
    {
      try {
        $query = $this->db->prepare("SELECT id_pers, nom, prenom, mail, mdp, statut FROM personne WHERE mail = :login");
        $query->bindValue(':login', $login, PDO::PARAM_STR);
        $query->execute();
      } 
      catch(Exception $e) {
        die('<div style="font-weight:bold; color:red">Erreur : '.$e->getMessage().'</div>');
      }
      
      return $query->fetch(PDO::FETCH_ASSOC);
    }


    /**
     * Selectionne les donnees de contact d'une personne
     */
    public function getContacts()
    {
      try {
        $query = $this->db->prepare("SELECT nom, prenom, mail, statut, libelle 
                                    FROM personne P JOIN mat_to_pers M ON P.id_pers = M.id_pers
                                                    JOIN matiere Mat on M.id_mat = Mat.id_mat
                                    WHERE statut = 'prof' OR statut = 'interv' ");
        $query->execute();
      }
      catch(Exception $e) {
        die('<div style="font-weight:bold; color:red">Erreur : '.$e->getMessage().'</div>');
      }

      return $query->fetchAll(PDO::FETCH_ASSOC);
    }

  }

?>