<?php
include_once("./config_mysq.php");
include_once("./user.php");
include_once("./variables.php");
include_once("./functions.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Affichage des recettes</title>
    <?php include_once("./style.php"); ?>
</head>

<body>
    <div class="container recettes">
        <?php 
        include_once("./header.php"); ?>

        <?php include_once("./login.php");?>


        <?php
        if (isset($_SESSION['logger_user'])) {
            include_once("./affichage_recette.php");
        }
        ?>

   
        <?php include_once("./footer.php"); ?>
    </div>

</body>

</html>

