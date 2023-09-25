 <?php session_start(); ?>
<?php
include_once("./config_mysq.php");
include_once("./user.php");
include_once("./functions.php");
include_once("./variables.php");
?>

<?php 

$getData = $_GET;
if (!isset($getData['id']) && is_numeric($getData['id']))
{
	echo('La recette n\'existe pas');
    return;
}	

$recipeId = $getData['id'];

//select all the data in recipes and comments table
$retrieveRecipeWithCommentsStatement = $my_sql_client->prepare(
    'SELECT * , 
    DATE_FORMAT(c.created_at, "%d/%m/%Y") as comment_date
    FROM partage_de_recette.comments c, partage_de_recette.recipes r 
    WHERE r.id_recipe = :id AND r.id_recipe = c.recipe_id;'
    );

$retrieveRecipeWithCommentsStatement->execute([
    'id' => $recipeId,
])or die(print_r($my_sql_client->errorInfo()));

$recipeWithComments = $retrieveRecipeWithCommentsStatement->fetchAll(PDO::FETCH_ASSOC);
$averageRatingStatment = $my_sql_client->prepare(
    'SELECT ROUND(AVG(c.review),1) as rating 
    FROM partage_de_recette.recipes r , partage_de_recette.comments c 
    WHERE r.id_recipe = c.recipe_id AND r.id_recipe = :id;'
    );
$averageRatingStatment->execute([
    'id' => $recipeId,
])or die(print_r($my_sql_client->errorInfo()));
$averageRating = $averageRatingStatment->fetch(PDO::FETCH_ASSOC);

$count_comment = $my_sql_client->prepare(
    'SELECT count(comment) as count
    FROM partage_de_recette.comments c, partage_de_recette.recipes r 
    WHERE r.id_recipe = :id AND r.id_recipe = c.recipe_id;'
);
$count_comment->execute([
    'id' => $recipeId,
]) or die(print_r($my_sql_client->errorInfo()));
$count_comment = $count_comment->FETCH(PDO::FETCH_ASSOC);
$count_comment = $count_comment['count'];

if ($count_comment > 0) {
    $recipe = [
        'id_recipe' => $recipeWithComments[0]['id_recipe'],
        'title' => $recipeWithComments[0]['title'],
        'recipe' => $recipeWithComments[0]['recipe'],
        'author' => $recipeWithComments[0]['author'],
        'comments' => [],
        'rating' => $averageRating['rating'],
    ];

    foreach ($recipeWithComments as $comment) {
        if (!is_null($comment['comment_id'])) {
            $recipe['comments'][] = [
                'comment_id' => $comment['comment_id'],
                'comment' => $comment['comment'],
                'user_id' => (int) $comment['user_id'],
                'created_at' => $comment['comment_date'],
            ];
        }
    }
}else
{
    $recipe = $my_sql_client->prepare(
        'SELECT *
        FROM partage_de_recette.recipes r 
        WHERE r.id_recipe = :id;'
        );
    $recipe->execute([
        'id' => $recipeId,
    ])or die(print_r($my_sql_client->errorInfo()));
    $recipe = $recipe->FETCH(PDO::FETCH_ASSOC);
}   

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Affichage des recettes</title>
    <?php include_once("./style.php"); ?>
</head>

<body>
<div class="container">
    <?php include_once("./header.php") ?>
    <h1>Affichage des recettes</h1>

    <h1><?php echo($recipe['title']); ?></h1>
        <div class="row">
            <article class="col">
                <?php echo($recipe['recipe']); ?>
            </article>
            <aside class="col">
                <p><i>Contribuée par <?php echo($recipe['author']); ?></i></p>
                <p><b>Evaluée par la communauté à 
                    <?php 
                    if($count_comment>0) 
                        echo($recipe['rating']);
                    else
                        echo '0';
                     ?> 
                / 5</b></p>
            </aside>
        </div>

      <?php if($count_comment > 0): ?>
        <h2>Commentaires</h2>
        <div class="row">
            <?php foreach($recipe['comments'] as $comment): ?>
                <div class="card m-3 comment">
                    <p><?php echo($comment['created_at']); ?></p>
                    <p><?php echo($comment['comment']); ?></p>
                    <i>(<?php echo(display_user($comment['user_id'], $users)); ?>)</i>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <hr />

                    
    <form action="./comment_posted.php" method="post">
        <div class="mb-3 visually-hidden">
            <input class="form-control" type="text" name="id" value="<?php echo($recipeId); ?>" />
        </div>
        <div>
            <label for="review">Evaluez la recette</label>
            <input type="number" class="form-control" id="review" name="review" min="0" max="5" step="1" />
        </div>
        <div>
            <label for="comment">Postez un commentaire</label>
            <textarea class="form-control" placeholder="Soyez respectueux/se, nous sommes humain(e)s." id="comment" name="comment"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>

    <?php include_once("./footer.php"); ?>
    </div>

</body>

</html> 