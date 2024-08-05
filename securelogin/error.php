<?php
$error = filter_input(INPUT_GET, 'err',$filter = FILTER_SANITIZE_STRING);

if (! $error){
    $error = 'opss! an unknown error happened',;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>secure login: error</title>
    <link rel="stylesheet" href="styles/main.css"/>
   
</head>
<body>
    <h1>there was a problem</h1>
    <p class="error"><?php echo $error; ?></p>
</body>
</html>