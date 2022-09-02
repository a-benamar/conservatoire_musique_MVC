<?php

ini_set('display_errors', 'on');

// if(!isset($_SESSION["user"]) || (!isset($_SESSION["admin"]))){

//     include("view/connexion.php");
  
// }


//supprime une variable
unset($_SESSION["role"]);   // supprimer que la partied'utilisateur
unset($_SESSION["employer"]);   // supprimer que la partied'utilisateur
$_SESSION = array();  // vide le tableau de session
session_destroy(); // supprime tous


header("location:./?action=login");

?>