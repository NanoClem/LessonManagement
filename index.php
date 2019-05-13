<!DOCTYPE HTML>

<html>

  <head>
    <title></title>
    <meta content="info">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="lesson_style.css" />
  </head>
  
  <body>
  
  <div id="fond">
  
    <div id="titre">
      <span>Gestion des demandes d'intervention</span>
    </div>
  
    <div id="menu">
      <ul id="lemenu">
      <?php  
      $encours = array(" "," "," "," "," ");

      if( !isset($_GET["page"]) ) { 
        $page=0;
      }else{
        $page=$_GET["page"];
      }
      $encours[$page] = "encours";
       
      echo "<li><a href=\"?page=0\" class=\"btn_menu $encours[0]\">Accueil</a></li>\n";
      echo "<li><a href=\"?page=1\" class=\"btn_menu $encours[1]\">Demandes</a></li>\n";
      echo "<li><a href=\"?page=2\" class=\"btn_menu $encours[2]\">Etat</a></li> \n";
      ?> 
      </ul>
    </div>
  
    <div id="contenu">
    <?php
      if( file_exists("page_".$page.".inc.php") ){ 
        include("page_".$page.".inc.php");
      }
    ?>
    </div>
  
    <div id="pied">
      <span>Polytech Annecy-Chambéry</span>
    </div>
 
  </div>
  
  </body>
</html>  
  
  
  
