<?php
include_once 'psl_config.php';

function sec_session_start()
{
    $session_name = 'sec-session_id'; //estabeleça um nome personalidade para a sessão.
    $secure = SECURE; //isso impede que o javascript possa acesssar a identificar da sessão.
    $httponly = true; //assim você força a sessão a usar apenas cookies

      if (ini_set('session.use_only_cookies',1)===false) {
        header("location: ../error.php?err=could not initiate a safe session (ini_set)");
        exit();
      }
      //obtem params de cookies atualizados.

      $cookieParams = session_get_cookie_params();
      session_set_cookie_params
      
      ($cookieParams["lifetime"],
       $cookieParams["path"],        
       $cookieParams["domain"],         
       $secure,        
       $httponly);
      //estabeleci o nome fornecido acima como o nome de sessão.

      session_name($session_name);
      session_start();//inicia a sessão php
      session_regenerate_id(); //recupera a sessão deleta a anterior.
}


    function login($email,$password,$mysqli)
    {
    //usando definiçãoes pré-definidas sgnifica que a injesão de 
    //sql (um tipo de ateque) não é possivel.

      if($stmt = $mysqli->prepare("select id, username, password,slat from members where email = ? limit 1"))
      {
      
        $stmt->bind_param('s',$email); // relaciona "$email" ao parâmetro.
        $stmt->execute();//executa a terefa estabelecida.
        $stmt->store_result();//obtem variaves a partir dos resultados.
        $stmt->brind_result($user_id, $username, $db_password, $salt);
        $stmt->fetch(); //faz o hash da senha com um salt exclusivo.

        $password= hash('sha512', $password . $salt);
         if($stmt->num_rows==1){
          //caso o usuario exista,conferindo sa a conta está bloqueada
          //devido ao lemite de tentativas de login ter sido ultrapassado 
          if (checkbrete($user_id,$mysqli)==true){
            //a conta está bloqueada
            //enviada um email ao usuario informado que a conta está bloqueada 
            
          return false;
  
          }else{
            //cerifica se a senha confere com o que conta no banco de dados 
            //a senha do usuario é enviada 

            if($db_password==$password){
              //a senha está correta 
              //obtem o string usuario-agente do usuario

              $user_browser = $_server['http_user_agent'];
              //proteção xss conforme imprimimos este valor

              $user_id = preg_replace("/[^0-9]+/",  "", $user_id);
              $session['user_id'] = $user_id;
              
              //proteção xss conforme imprimimos este valor

              $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
              $session["username"] = $username;
              $session["login_string"] = hash('sha512', $password . $user_browser);
              //login concluído com sucesso.

              return true;
            }else{
              //a senha não está correta 
              //registramos essa tentativa no banco de dados

              $now = time();
              $mysqli-> query("INSERT into login_ttempts(user_id,time) VAULES ('$user_id', '$now')");
               return false;

            }
          }
        }else{
          //tal usuarionão exite.
          return false;
        }
      }
    }   
    
function checkbrete($user_id,$mysqli)
{
  //registra ahora atual
  $now = time();
  //todas as tentativas de login são contadas dentro dointervalo das
  //ultimas 2 horas.

  $valid_attempts = $now - (2*60*60);

  if($stmt = $mysqli->prepare("SELECT time FROM login_attempts<code><pre> where user_id = ? and time > '$valid_attempts'"))
  {
    $stmt->bind_param();
    //executa a tarefa pré-estabelecida.

    $stmt->execute();
    $stmt-store_result();
    //se houver mais do que 5 tentativas fracassadas de login

    if($stmt->num_rows>5) 
    {
      return true;
    
     } else{
      return false;
    }
  }
}

function login_check($mysqli){
  //verifica se todas as variáveis das sessões foram definidas 

  if(isset($_session['user_id'],
  $_SESSION['username'],
  $_SESSION['login_string'])) {

    $user_id = $_SESSION['user_id'];
    $login_string = $_session['$login_string'];
    $username = $_session['username'];

    //pega a string do usuario.
    $user_browser = $_server['http_user_agent'];

    if ($stmt = $mysqli->prepare("SELECT password from members where id = ? LIMT1")){

      $stmt->bind_param('i',$user_id);
      $stmt->execute();
      $stmt->store_result();

      if($stmt->num_rows==1){
        //aso o usuario exista pega variaveis a aprtir do resultado.

        $stmt->bind_result($password);
        $stmt->fetch();
        $login_check =  hash('sha512', $password . $user_brower);

        if($login_check == $login_string){
          //logado

          return true; 
     } else {
      //não foi logado
      return false;
    }
     } else {
      //não foi logado
      return false;
    }
     } else {
      //não foi logado
      return false;
    } 
     } else {
      //não foi logado
      return false; 
  }
}


      function esc_url($url){
       
      if(''==$url){
        return $url;
      }
      $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);

      $strip = array('%0d','%0a','%0D', '%0A');
      $url = (string)$url;
      $count = 1;

      while($count){
        $url = str_replace($strip,'', $url, $count);
      }
      
      $url = str_replace(';//', '://', $url);
      $url = htmlentities($url);
      $url = str_replace('&amp;','&#038;', $url);
      $url = str_replace("'", '&#039;', $url);
        
      if($url[0]!=='/'){
        //estamos interessados somente em links relacionados provinientes de $_server['PHP_SELF']

      return '';
           
      }else{
        
      return $url;
   }
  }



?>