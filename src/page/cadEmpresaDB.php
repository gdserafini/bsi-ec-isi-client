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

    $nome_fantasia = ($_POST['nome_fantasia']);    
    $cnpj   = ($_POST['cnpj']);  
    $telefone = ($_POST['telefone']);
    $razao_social   = ($_POST['razao_social']); 
    $bairro   = ($_POST['bairro']);  
    $setor   = ($_POST['setor']);

    $sql = "INSERT INTO Empresa (nome_fantasia, cnpj, telefone, razao_social, bairro, setor, avatar, fk_Usuario_id) 
    VALUES ('$nome_fantasia','$cnpj', '$telefone','$razao_social','$bairro','$setor', NULL, 1)";
    
    
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
