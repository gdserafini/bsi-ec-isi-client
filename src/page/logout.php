<!doctype html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../style/styleLogin.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Chau+Philomene+One:ital@0;1&family=Overpass:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>
    <body> 
        <div class="header">
            <a href="../../index.php">
                <img src="../../resources/logoNome-removebg-preview.png" class="logoNome"/>
            </a>
        </div>
            <h2>Fechando a sessão ...</h2>
            <img src="../../resources/processando.gif" style="max-width:300px">
<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } 
    session_unset();
    session_destroy();
    $url = "Location: ../../index.php";
    header($url);
    exit();
?>
	</body>
</html>