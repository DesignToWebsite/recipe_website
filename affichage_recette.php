
<?php
include_once("./config_mysq.php");
include_once("./login.php");
?>

<?php
//on récupére tous le contenu de la table
$sql_query = 'SELECT * FROM partage_de_recette.recipes WHERE is_enabled = :is_enabled';
$recipes_statement = $my_sql_client->prepare($sql_query);
$recipes_statement->execute([
    'is_enabled' => true,
    ]
)or die(print_r($my_sql_client->errorInfo()));
$recipes = $recipes_statement->fetchAll();
?>


<div class="content">
    <h1>Affichage des recettes</h1>
    <?php
    foreach ($recipes as $recipe): ?>
        <h2>
            <a href="./read_recipe.php?id=<?php echo $recipe['id_recipe']; ?>">
            <?php echo $recipe['title']; ?>
            </a> 
        </h2>
        <p>
            <?php echo $recipe['recipe']; ?>
        </p>
        <i>
            <?php echo display_author($recipe['author'], $users); ?>
        </i>
        <br>
        <?php if(isset($logged_user) && $recipe['author'] == $logged_user['email']): ?>
        <!-- <form action="./main.php" method="post"> -->
            <button class="btn btn-primary">
            <a class="link-dark" href="./editer_article.php?id=<?php echo($recipe['id_recipe'])?>">
                Editer l'article
            </a>
        </button>
            <button class="btn btn-danger" >
            <a class="link-dark" href="./supprimer_article.php?id=<?php echo($recipe['id_recipe'])?>">
                Supprimer l'article
            </a>
        
        <!-- </form> -->
            
        </button>
        
        
        <?php endif;?>
    <?php endforeach; ?>
</div>