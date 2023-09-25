<?php session_start(); ?>
<!-- validation du formulaire  -->

<?php
if( isset($_POST['email']) && isset($_POST['password']) )
{
    foreach( $users as $user)
    {
        if($user['email'] == $_POST['email'] &&
            $user['password'] == $_POST['password']
        )
        {
            $logged_user= [
                'email' =>$user['email'],
            ];
            /**
             * Cookie qui expire dans un an
             */
            setcookie(
                'LOGGED_USER',
                $logged_user['email'],
                [
                    'expires' => time() + 365*24*3600,
                    'secure' => true,
                    'httponly' => true,
                ]
            );
            $_SESSION['logger_user'] = $user['full_name'];
        }
        else
        {
            $error_message = sprintf('les informations envoyées sont incorrectes : (%s,%s)', $_POST['email'], $_POST['password']);
        }
        
    }
}
?>

<?php if(!isset($_SESSION['logger_user'])): ?>
    <div class="content">
        <form action="./main.php" method="post">
        
        <?php if(isset($error_message)):  ?>
            <div class="alert alert-danger">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <div class="email">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" >
            </div>
            <div class="password">
                <label for="email">password</label>
                <input type="password" id="password" name="password" >
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
<?php else: ?>
    <div class="alert alert-success" >
        Bonjour <?php echo $_SESSION['logger_user']; ?>
        et bienvenue sur le site 
    </div>
    
<?php endif; ?>