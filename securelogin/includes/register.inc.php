<?php

include_once 'db_connect.php';
include_once 'psl-config.php';

$error_msg ="";

if(isset($_POST['username'], $_POST['email'], $_POST['p'])){
    //limpa e valida os dados passados em

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email=  filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);
    $email=  filter_var($email,FILTER_VALIDATE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        //email invalido

        $error_msg.='<p class="error"> o endereço de email digitado não é válido</p>';
            
    }
}
$password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);

if(strlen($password)!= 128){
    //a senha com hash deve ter 128 caracteres
    // caso contrario algo muito estranho esta acontecendo

    $error_msg.= '<p class="error">invalid password configutation. </p>';

}
//o nome do usuario e da senha foram conferidos no lado do cliente
//não deve haver problemas nesse passo já que ninguem ganha violando essas regras 

$prep_stmt ="SELECT id FROM members WHERE email = ? LIMIT 1";
$prep_stmt ="$mysqli->prepare($prep_stmt)";

if($stmt)
{

$stmt->bind_param('s',$email);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows ==1){
    //um usuario com esse email já existe 
    $error_msg.='<p class="error"> a user whit email address already exists.</p>';

}

}else{
    $error_msg.='<p class="error">database error</p>';
}

if (empty($error_msg)){


    $random_salt = hash ('sha512', uniqid(openssl_random_pseudo_bytes(16),true));

    $password = hash('sha512',$password. $random_salt);


if($insert_stmt = $mysqli-> prepare("INSERT INTO members(username, email, password, salt)VALUES(?,?,?,?)"))
{

        $insert_stmt->bind_param('ssss', $username,$email,$password,$random_salt);
}
if(! $insert_stmt->execute())
{
header('location: ../error.php?err=Registration failure: INSERT');

}    
        
}

header('location: ./register_success.php');
?>