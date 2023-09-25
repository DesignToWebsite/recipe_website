<?php session_start(); ?>

<?php

include_once("./config_mysq.php");
include_once("./user.php");
include_once("./variables.php");

$postData = $_POST;

if( 
    !isset($postData['id']) ||
    !isset($postData['title']) ||
    !isset($postData['recipe'])
    )
{
	echo('Il manque des informations pour permettre l\'édition du formulaire.');
    return;
}

$id = $postData['id'];
$title = $postData['title'];
$recipe = $postData['recipe'];


$insert_recipe_statement = $my_sql_client->prepare('UPDATE partage_de_recette.recipes SET title = :title, recipe = :recipe WHERE id_recipe = :id');

$insert_recipe_statement->execute([
    'title' => $title,
    'recipe' => $recipe,
    'id' => $id,
]) or die(print_r($my_sql_client->errorInfo())) ;


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

        <?php include_once("./header.php"); ?>

        <h1> Recette modifiée avec succès !</h1>
        
        <h2>
            <?php echo $title; ?>
        </h2>
        <p>
            <?php echo $recipe; ?>
        </p>
        <i>
            <?php echo $logged_user['email']; ?>
        </i>
        <br>
        <?php include_once("./footer.php"); ?>
    </div>

</body>

</html>

