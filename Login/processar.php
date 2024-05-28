<!DOCTYPE html>
<?php
  $conexao = mysqli_connect("127.0.0.1", "root", "");
  mysqli_select_db($conexao,"tutocrudphp");

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
</head>
<body>
    <?php
    $nome = $_POST["nome"];
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    $inserir = "INSERT INTO usuarios (id, nome, usuario, senha) VALUES (NULL, '$nome', '$user', '$pass');";
    mysqli_query($conexao, $inserir) or die (mysqli_error($conexao)); //se o query falhar retorna a execução, interrompendo a execução do script
    echo "Você foi cadatrado com sucesso. clique <a href='login.html'>aqui</a> para fazer o log-in.";
    ?>
</body>
</html>