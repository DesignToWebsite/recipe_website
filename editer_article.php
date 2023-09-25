<?php session_start(); ?>

<?php
include_once("./config_mysq.php");
include_once("./user.php");
include_once("./variables.php");
include_once("./functions.php");


$get_data = $_GET;

if (!isset($get_data['id']) && is_numeric($get_data)) 
{
    echo ('Il faut un identifiant de recette pour le modifier.');
    return;
}

$retriece_recipe_statement = $my_sql_client->prepare(
    'SELECT * FROM partage_de_recette.recipes WHERE id_recipe = :id ');

$retriece_recipe_statement->execute([
    'id' => $get_data['id'],
])or die(print_r($my_sql_client->errorInfo()));

$recipe = $retriece_recipe_statement->fetch(PDO::FETCH_ASSOC);

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
        <h1>
            Mettre à jour <?php echo ($recipe['title']); ?>
        </h1>

        <form action="./article_update.php" method="POST">
            <div class="mb-3 visually-hidden">
                <label for="id" class="form-label">Identifiant de la recette</label>
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo ($get_data['id']); ?>">
            </div>
            <div>
                <label for="titre">
                    titre de la recette
                </label>
                <input type="text" id="title" name="title" value=<?php echo ($recipe['title']); ?>>
                <div class="email-help">
                    <p>
                        Choisissez un titre percutant!
                    </p>
                </div>
            </div>
            <div>
                <label for="recipe">
                    Description de la recette
                </label>
                <textarea name="recipe" id="recipe" cols="30" rows="10" placeholder="Seulement du contenu vous appartenat ou libre de droits">
        <?php echo strip_tags($recipe['recipe']); ?>
        </textarea>
            </div>
            <button type="submit">Envoyer</button>
        </form>

        <?php include_once("./footer.php"); ?>
    </div>

</body>

</html>