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

    
  }

?>