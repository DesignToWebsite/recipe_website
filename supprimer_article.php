<?php session_start(); ?>

<?php

include_once("./config_mysq.php");
include_once("./user.php");
include_once("./variables.php");

$postData = $_GET;
echo $postData['id'];
if( 
    !isset($postData['id']))
{
	echo('Il manque des informations pour permettre l\'édition du formulaire.');
    return;
}

$id = $postData['id'];



$delete_recipe = $my_sql_client->prepare('DELETE FROM partage_de_recette.recipes WHERE id_recipe = :id');

$delete_recipe->execute([
    'id' => $id,
]) or die(print_r($my_sql_client->errorInfo()));


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

        <h1> Supprimer la recettes?</h1>

        <button type="submit">
            <a class="link-danger" href="./main.php">
                La suppression est définitive
            </a>
        </button>
        
        
        <br>
        <?php include_once("./footer.php"); ?>
    </div>

</body>

</html>

