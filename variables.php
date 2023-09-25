<?php
include_once("./config_mysq.php");
// Récupération des variables à l'aide du client MySQL
$usersStatement = $my_sql_client->prepare('SELECT * FROM partage_de_recette.users');
$usersStatement->execute();
$users = $usersStatement->fetchAll();



?>