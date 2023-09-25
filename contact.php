<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Affichage des recettes</title>
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <?php include_once("./style.php"); ?>
</head>

<body>
    <div class="container recettes">

        <?php
        include_once("./variables.php");
        include_once("./functions.php");
        ?>


        <?php include_once("./header.php") ?>
        <div class="content contact">
            <h1>contactez nous</h1>
            <form action="submit_contact.php" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="email">
                        Email
                    </label>
                    <input type="email" id="email" name="email" >
                    <div class="email-help">
                        <p>
                            Nous ne revendrons pas votre email.
                        </p> 
                    </div>
                </div>
                <div>
                    <label for="message">
                        Votre message
                    </label>
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Exprimez vous "></textarea>
                </div>
                <button type="submit">
                    Envoyer
                </button>
            </form>
        </div>

        <?php include_once("./footer.php") ?>
    </div>


</body>

</html>