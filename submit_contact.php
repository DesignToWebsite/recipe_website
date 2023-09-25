
<?php session_start(); ?>
<?php
include_once("./config_mysq.php");

$email = $_POST['email'];
$message = $_POST['message'];

//préparation
$insert = $my_sql_client->prepare(
    'INSERT INTO partage_de_recette.contact_me(email, message) 
    VALUES(:email, :message)');

//execution
$insert->execute([
   'email' => $email,
   'message' => $message,
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
    <div class="container">
        
        <?php
        include_once("./variables.php");
        include_once("./functions.php");
        ?>
        
        <?php include_once("./header.php") ?>

        <?php 
        if( !isset($_POST['email']) || 
            !isset($_POST['message']) ||
            !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ||
            empty($_POST['message'])
        )
        {
            echo '<p><b>Il faut un email et un message pour soumettre le formulaire</b><p>';
            include_once("./footer.php");
            return;
        }
          
        ?>
        

        <div class="container submit_contact">
            <h1>Message bien reçu! </h1>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Rappel de vos informations</h5>
                    <p class="card-text">
                        <b>Email</b> :
                        <?php echo $_POST['email']; ?>
                    </p>
                    <p class="card-text">
                        <b>Message</b> :
                        <?php echo strip_tags($_POST['message']); ?>
                    </p>
                </div>
            </div>
        </div>
        
        <?php include_once("./footer.php") ?>
    </div>


</body>

</html>