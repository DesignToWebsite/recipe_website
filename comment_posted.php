<?php session_start(); ?>
<?php
include_once("./config_mysq.php");
include_once("./user.php");
include_once("./functions.php");
?>

<?php

//get the recipe
$get_data = $_POST;
$recipe_id = $get_data['id'];
$review = $get_data['review'];
$comment = strip_tags($get_data['comment']);
$user = $_SESSION['logger_user'];
if(!isset($_POST['id']) ||
    !isset($_POST['review']) ||
    !isset($_POST['comment']) ||
    !is_numeric($_POST['review']) ||
    !is_numeric($_POST['id']))
{
    echo 'il faut remplir tous les données du formulaire';
    return;
}

if(!isset($logged_user)){
    echo('Vous devez être authentifié pour soumettre un commentaire');
    return;
}
//get user_id
$userId = $my_sql_client->prepare('SELECT * FROM partage_de_recette.users WHERE full_name =:name');
$userId->execute([
    'name' => $user,
]) or die(print_r($my_sql_client->errorInfo()));
$userId = $userId->fetch(PDO::FETCH_ASSOC);

//préparation
$insert_recipe = $my_sql_client->prepare(
    'INSERT INTO partage_de_recette.comments(user_id,recipe_id,comment,review) 
    VALUES(:user_id,:recipe_id,:comment,:review)');

//execution
$insert_recipe->execute([
   'user_id' => $userId['user_id'],
   'recipe_id' => $recipe_id,
   'comment' => $comment,
   'review' => $review,

])or die(print_r($my_sql_client->errorInfo()));



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Création de commentaire</title>
    <?php include_once("./style.php"); ?>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('./header.php'); ?>
        <h1>Commentaire ajouté avec succès !</h1>
        
        <div class="card">
            
            <div class="card-body">
                <p class="card-text"><b>Note</b> : <?php echo($review); ?> / 5</p>
                <p class="card-text"><b>Votre commentaire</b> : <?php echo ($comment); ?></p>
            </div>
        </div>
    </div>
    <?php include_once('./footer.php'); ?>
</body>
</html>
