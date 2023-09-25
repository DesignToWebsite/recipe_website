<?php
setcookie(
    'LOGGED_USER',
    'laurene.castor@exemple.com',
    [
        'expires' => time() + 365*24*3600,
        'secure' => true,
        'httponly' => true,
    ]
);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <?php
        $userAge = 19;
        $userName = "Zineb essoussi";
        $isEnabled = true;

        if ($isEnabled) {
            echo $userName . ' is ' . $userAge . ' years old';
        } elseif ($userAge < 18) {
            echo 'hello ' . $userName . ' you still under age';
        } else {
            echo "Hello, please enter you're personal information";
        }
        ?>

        <?php
        if ($isEnabled && $userAge > 18):
            ?>
        <h1>Welcome in our space</h1>
        <?php
        endif;
        ?>

        <?php
        $recipes = [

            'title' => 'Cassoulet',
            'recipe' => 'etape1: des flageolets, etape2: ...',
            'author' => 'ikram@gmail.com',
            'enabled' => true,
        ];
        foreach ($recipes as $proprety => $propretyValue) {
            echo '<li>' . $proprety . ' : ' . $propretyValue . '</li>' . PHP_EOL;
        }

        foreach ($recipes as $proprety ) {
            echo '<li>' . $proprety.'</li>' . PHP_EOL;
        }

        echo '<pre>';
        print_r($recipes);
        echo '</pre>';
        ?>


    </body>

</html>