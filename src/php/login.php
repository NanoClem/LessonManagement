<?php 
    require("src/bdd/Database.php");


    public function tryConnect($login, $passwd)
    {
        if( isset($_POST['login']) && isset($_POST['passwd']) ) 
        {
            //DONNEES DE CONNEXION
            $login  = $_POST['login'];
            $passwd = hash("md5", $_POST['passwd']);

            //TRAITEMENT BDD
            $db  = new Database();
            $sql = "SELECT id_pers FROM personne WHERE mail='$login' and "; 
        }
    }

?>