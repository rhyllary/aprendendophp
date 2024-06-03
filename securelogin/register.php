<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
< lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>secure login: registration form</title>
    <script type="text/javascript" src="js/sha512.js"></script>
    <script type="text/javascript" src="js/forms.js"></script>

    <link rel="stylesheet" href="styles/main.css"/>
</head>
<ul>
   <h1>register with us</h1> 
 <?php
 if (!empty($error_msg)){
    echo $error_msg;
 }
 ?> 
 <ul>
    <li>os nomes de usuários devem conter apenas digítos,letras maiúsculos e minúsculas e underlines("_")</li>
    <li> email devem seguir um formato valído para email.</li>
    <li>as senhas devem ter no mínomo 6 caracter</li>
    <li> as senhas devem conter:</li></ul><p>
 </ul> 
 <ul>
 <li>pelo menos uma letra maiúscula(A...Z)</li>
 <li>pelo menos uma letra minúscula(a...z)</li></p>
 <li>pelo menos um numero(0...9)</li>
</ul>
</ul>
</li>
<li>sua senha deve conferir exatamente</li>
</ul>

<form action="<?php echo esc_url($_SERVER['php_self']);?>"

method="post"

name="registration_form">

username:<input type="text"

name="username"

id="username "/><br>

email:<input type="text" name="email" id="email"/><br>

password: <input type="password" name="confirmpwp" id="confirmpwp"/><br>

confirm password: <input type="password" name="confirmpwp" id="confirmpwp"/><br>

<input type="button" value="register" onclick="return regformhash(this.form, this.form.username, this.form.email, this.form.password, this.form.confirmpwp);"/>

</form>
<P>return to the <a href="index.php"> login page</a>.</P>

</body>
</html>
