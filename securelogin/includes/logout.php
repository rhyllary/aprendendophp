<?php
include_once 'includes/functions.php';

sec_session_start();

//desfaz todos os valores da sessão

$_session = array();

//obtém os parâmetros da sessão

$params = session_get_cookie_params();

//deleta o cookieem uso.

setcookie(session_name(),''
, time() -42000, 
$params['path'],
$params['domain'],
$params['secure'],
$params['httponly']);

//destrói a sessão

session_destroy();
header('location: ../index.php');
?>