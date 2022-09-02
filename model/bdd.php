<?php

function etablirCnx()
{
    $urlSGBD  = "localhost"; 
    $nomBDD   = "projetziqmu";
    $loginBDD = "root";
    $mdpBDD   = "";
    $dsn      = "mysql:host=$urlSGBD; dbname=$nomBDD"; // data source name

    try {
        $connex = new PDO("$dsn", "$loginBDD", "$mdpBDD", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $error) {
        echo "Problème de connexion! <br>
        Merçi de contacter l'administrateur <br>";
        echo $error->getMessage();
    }

    return $connex;
}
?>
