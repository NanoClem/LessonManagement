<?php
    
    if( session_status() == PHP_SESSION_ACTIVE)
    {
        require("../bdd/Database.php");

        $db  = new Database();
        $sql = "SELECT id_dem FROM traite WHERE id_pers =".$_SESSION['id_pers'];

        $res = $db->select($sql);
        
        print_r($res);

    }
    


?>