
<?php 
include_once("./config_mysq.php");
// Si le cookie est présent
if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) {
    $logged_user = [
        'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
    ];
}
//  else {
//     throw new Exception('Il faut être authentifié pour ajouter des recettes');
// }

?>