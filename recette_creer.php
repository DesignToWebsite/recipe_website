<?php
session_start();

include_once("./config_mysq.php");
include_once("./variables.php");
include_once("./user.php");


if(!isset($_POST['titre']) ||
    !isset($_POST['desc']))
{
    echo 'il faut un titre et une recette';
    return;
}
$title = $_POST['titre'];
$recipe = $_POST['desc'];
 
//préparation
$insert_recipe = $my_sql_client->prepare('INSERT INTO partage_de_recette.recipes(title,recipe, author,is_enabled) VALUES(:title, :recipe, :author, :is_enabled)');

//execution
$insert_recipe->execute([
    'title' => $title,
    'recipe' => $recipe,
    'author' => $logged_user['email'],
    'is_enabled' => true,
])or die(print_r($my_sql_client->errorInfo()));

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
        include_once("./variables.php");
        include_once("./functions.php");
        ?>

        <?php include_once("./header.php"); ?>

        <h1> Recette ajoutée avec succés!</h1>
        <div class="card">
        <h2>
            <?php echo $title; ?>
        </h2>
        <p>
            <?php echo $recipe; ?>
        </p>
        <i>
            <?php echo $logged_user['email']; ?>
        </i>
        </div>
        <?php include_once("./footer.php"); ?>
    </div>

</body>

</html>

<!-- <?php session_destroy(); ?> -->