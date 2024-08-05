<?php 
 $obj_mysqli = new mysqli("127.0.0.1", "root", "", "tutocrudphp");
  
if ($obj_mysqli->connect_errno)
{
    echo "ocorreu um erro na conexão com o bancop de dados.";
    exit;
}
  
  mysqli_set_charset($obj_mysqli,"utf8");
  //validando a existencia dos dados//
  
if(isset($_POST["nome"]) && isset ($_POST["email"]) && isset($_POST["cidade"]) && isset($_POST["uf"]))

{
if(empty($_POST["nome"])) 
    $erro = "campo nome obrigatório";
else 
if(empty($_POST["email"]))
    $erro = "campo e-mail obrigatório";
else
{

//vamos realizar o cadastro ou ateração dos dados enviados//
$nome    = $_POST["nome"];
$email   = $_POST["email"];
$cidade  = $_POST["cidade"];
$uf      = $_POST["uf"];

$stmt = $obj_mysqli->prepare("INSERT INTO `cliente` (`nome`,`email`,`cidade`,`uf`) VALUES (?,?,?,?)");
$stmt->bind_param('ssss', $nome, $email, $cidade, $uf);

if (!$stmt->execute())
{
 $erro = $stmt->error;
}
else
    {
    $sucesso ="dados cadastrados com sucesso!";
    }
}
}
 
if(isset($erro))
    echo '<div style="color:#F00">' .$erro.'<div/><br/><br/>';
else
if(isset($secesso))
    echo '<div style="color:#00f" >'.$sucesso.'</div><br/><br/>';

?> 


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD com PHP, de forma simples e facíl </title>
</head>
<body>
    <form action="<?=$_SERVER["php_self"]?>" method="post">
        Nome:<br/>
        <input type="text" name="nome" placeholder="qual seu nome?"><br/><br/>
        E-mail:<br/>
        <input type="email" name="email" placeholder="qual seu E-mail?"><br/><br/>
        cidade:<br/>
        <input type="text" nome="cidade" placeholder="qual sua cidade?"><br/><br/>
        UF:<br/>
        <input type="text" nome="uf" size="2" placeholder="UF"><br/><br/>
        <input type="hidden" vaule="-1" nome="id">
        <button type="submit12"> cadastrar</button>
       </form>
    <br>
    <br>
    <table width="400px" border="0" cellspacing="0">
        <tr>
            <td><strong>#</strong></td>
            <td><strong>nome</strong></td>
            <td><strong>email</strong></td>
            <td><strong>cidade</strong></td>
            <td><strong>uf</strong></td>
            <td><strong>#</strong></td>
        </tr>
<?
    $result = $obj_mysqli->query("select * from `cliente`");
    while ($aux_query =$result->fetch_assoc())
    {
        echo '<tr>';
        echo'     <tr>'.$aux_query["id"]. '</td>';
        echo'     <tr>'.$aux_query["nome"]. '</td>';
        echo'     <tr>'.$aux_query["email"]. '</td>';
        echo'     <tr>'.$aux_query["cidade"]. '</td>';
        echo'     <tr>'.$aux_query["uf"]. '</td>';
        echo'     <tr><a href ="'.$_SERVER["php_self"]. '?d='.$aux_query["id"].'">editar</a></td>';
        echo '<tr>';
    } 
    ?>
    </table>  
    <?
    $obj_msqli = new mysqli("127.0.0.1","root","", "tutocrudphp.");
if ($obj_mysqli ->connect_errno)
{
    echo "ocorreu um erri na conexão ,com o banco de dados.";
    exit;
}
 mysqli_set_charset($obj_mysqli, 'utf8'); 
 //incluimos um codigo aqui
$id = -1;
$nome = "";
$email = "";
$cidade ="";
$uf = "";

// validanddo a existencia dos dados m
if (isset($_post["nome"]) && isset($_post["email"]) && isset($_post["cidade"])
&& isset($_post["uf"]))
{
    if(empty($_post["nome"]))
    $erro = "campo nome obrigatório";
else
if(empaty($_post["email"]))
$erro = "campo e-mail obrigatorio";
 

else{

    $id    = $_POST["id"];
    $nome  = $_POST["nome"];
    $email = $_POST["email"];
    $cidade = $_POST["cidade"];
    $uf    = $_POST["uf"];

    if($id == -1)
    {
$stmt = $obj_mysqli-> prepare("INSERT INTO `cliente` (`nome` , ` email` , `cidade`, `uf`) VALUES (?,?,?,)"
    );

$stmt ->bind_param('ssss' , $nome, $email, $cidade, $uf);
if(!$stmt->execute())
{
    $error = $stmt->error;
}
else
{
    header("location:cadastro.php");
    exit;
}
    }
    else 
    if(is_numeric(id) && $sid >= 1)
    {
$stmt = $obj_mysqli->prepare("UPDATE `cliente` SET `nome`=?, `email`=?, `cidade`=?, `uf`=? WHERE id = ? ");
$stmt ->brind_param('ssss', $nome , $email, $cidade , $uf, $id);

if (!$stmt ->execute())
{
    $error = $stmt->error;
}
else
{
    header("location:cadastro.php");
    exit;
}

}
 
$error = "numero inválido";
}
}

</body>
</html>