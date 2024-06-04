<?php

include_once 'incluedes/db_connect.php';
include_once 'incluedes/functions.php';

sec_session_start();

  if(login_check($mysqli)==true){
    $logged ='in';

  }else{
    $logged ='out';
  }


  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>secure login: log in</title>
<link rel="stylesheet" href="styles/main.css"/>
<script type="text/javaScript" scr="js/sha512.js"></script>
<script type="text/javaScript" scr="js/forms.js"></script>



</head>
<body>

<form action="includes/process_login.php" method="post" name="login_form">

email: <input type="text" name="email"/>
password: <input type="password" name="password" id="password"/>

<input type="botton" value="login" onclick="formhash(this.form,this.form.password);"/>
</form> 

<p>If you don't have a login,please<a href="register.php">register</a></p>
<P>if you are done,please<a href="includes/logout.php">log out</a>.</P>
<p>you are currently logged<?php echo $logged ?>.</p>
</body>
</html>

<?php
if($isset($_GET['error'])){

    echo '<P class="error">erro ao fazer o login!</p>';
}
?>

