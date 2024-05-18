<html>
<head>
    <title>GreenPath</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/styleHomeAdm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chau+Philomene+One:ital@0;1&family=Overpass:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  </head>

<body>

    <?php
    require '../database/connectDB.php';

    $nome = ($_POST['nome']);    
    $endereco   = ($_POST['endereco']);  
    $link   = ($_POST['link']);  
    $referencia = ($_POST['referencia']);
    $horario_abertura   = ($_POST['horario_abertura']); 
    $horario_fechamento   = ($_POST['horario_fechamento']);  
    $tipo   = ($_POST['tipo']);
    $fk_Empresa_id   = ($_POST['fk_Empresa_id']);  

    $sql = "INSERT INTO LocalDescarte (nome, endereco, link, referencia, horario_abertura, horario_fechamento, tipo, fk_Empresa_id) 
    VALUES ('$nome','$endereco', '$link', '$referencia','$horario_abertura','$horario_fechamento','$tipo', '$fk_Empresa_id')";
    
    
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
    }

    if ($result = $conn->query($sql)) {
        $msg = "Registro cadastrado com sucesso!";
    } else {
        $msg = "Erro executando INSERT: " . $conn-> error . " Tente novo cadastro.";
    }
    ?>
</body>
</html>
