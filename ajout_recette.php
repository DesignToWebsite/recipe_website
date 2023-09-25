<?php session_start(); ?>

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

        <h1> Ajouter une recette </h1>

<form action="./recette_creer.php" method="post">
    <div>
        <label for="titre">
            titre de la recette
        </label>
        <input type="text" id="titre" name="titre" >
        <div class="email-help">
            <p>
                Choisissez un titre percutant!
            </p> 
        </div>
    </div>
    <div>
        <label for="desc">
            Description de la recette
        </label>
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Seulement du contenu vous appartenat ou libre de droits"></textarea>
    </div>
    <button type="submit">Envoyer</button>
</form>
   
        <?php include_once("./footer.php"); ?>
    </div>

</body>

</html>

