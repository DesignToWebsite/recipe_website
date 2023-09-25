
<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$base = "partage_de_recette";
try
{
   $my_sql_client = new PDO
   (
   "mysql:host=localhost;bdname=partage_de_recette",
   'root',
   '',
   [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

}catch(PDOException $e){
        echo "erreur : " . $e->getMessage();
}

// echo "connected successfully";
?> 



