<?php

  /**
   * Fichier de configuration de base de donnee
   * 
   * WARNING : 
   * Le mdp ne doit pas etre defini de cette maniere.
   * Mieux vaut creer un nouveau user sur le SGBD 
   * avec le couple id/passwd de son compte sur le site.
   * Les droits de cet user seront la consultation et l'ajout/suppression sur des tables bien definies
   */

  if( !defined('DB_HOST') )         : define('DB_HOST', 'localhost');           endif;
  if( !defined('DB_PORT') )         : define('DB_PORT', '3306');                endif;
  if( !defined('DB_DATABASE') )     : define('DB_DATABASE', 'lesson_database'); endif;
  if( !defined('DB_USERNAME') )     : define('DB_USERNAME', 'root');            endif;
  if( !defined('DB_PASSWORD') )     : define('DB_PASSWORD', 'root');            endif;
 ?>
