<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>secure login: proctected page</title>
    <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
<?php if (login_ckeck($mydqli)==true);?>
<p>welcome <?php echo htmlentities($_session['username']);?>!</p>
<p> está é uma pagina protegida para servir de exemplo. Para acessá-lá,os usuarios devem ter feito o login.Em dado momento, também verificar o pael que o usúario está 
    desepenhando para que possamos determinar o tipo de usúario que está autórizado a acessar a página</p>
<p> return to <a href="index.php">login</a></p>
<?php else : ?>
    <P>
        <span class="error">você não tem autorização para acessar está página.</span>
        please <a href="index.php">login</a>
    </P>
<?php endif; ?>

</body>
</html>