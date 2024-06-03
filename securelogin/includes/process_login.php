<?php
include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start();//nossa segurança personalizada para iniciar uma sessão php.

if (isset($_POST['email'], $_post['p'])) {
     $email = $_POST['email'];
     $password = $_POST['p'];

     if(login($email,$password,$mysqli)==true){
        //login com sucesso 

        header('location: ../protected_page.php');
     }else{
        //falha no login
        header('localioon: ../index.php?error=1');
}
}else{
    //as variaveis POST corretas não foram enviadas para esta pagina.

    echo 'invalid resquest';
}

?>