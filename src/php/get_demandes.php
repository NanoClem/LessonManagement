<?php
    
    if( session_status() == PHP_SESSION_ACTIVE)
    {
        require("../bdd/Database.php");

        $db  = new Database();

        $sql  = "SELECT id_dem FROM traite WHERE id_pers =".$_SESSION['id_pers'];
        $res = $db->select($sql, PDO::FETCH_COLUMN);
         

        foreach($res as $data) 
        {
            $title = $db->select("SELECT titre FROM demande WHERE id_dem = ".$data, PDO::FETCH_COLUMN);
            $state = $db->select("SELECT etat FROM demande WHERE id_dem = ".$data, PDO::FETCH_COLUMN);

            //CONSTRUCTION DU TABLEAU DES DONNEES
            echo "<tr>";
            foreach(array_combine($state, $title) as $s => $t) {
                echo "<td>$s</td>";
                echo "<td>$t</td>";
            }
            echo "</tr>";
        }
    }
?>