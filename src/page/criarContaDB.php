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
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
        $s_name = session_name();
        $offset = 600;
        $dateFormat = "d/m/Y h:i:s";
        $timeNDate = gmdate($dateFormat, time()-$offset);
        if(isset($_SESSION['LAST_ACTIVITY']) && 
            (time() - $_SESSION['LAST_ACTIVITY'] > $offset)){
                header("Location: logout.php");
        }
        $_SESSION['LAST_ACTIVITY'] = time(); 
      } 
    require '../database/connectDB.php';

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
    }

    $nome    = $conn->real_escape_string($_POST['nome']);   
    $email   = $conn->real_escape_string($_POST['email']);  
    $cpf_cnpj   = $conn->real_escape_string(preg_replace('/\D/', '', $_POST['cpf_cnpj']));  
    $telefone = $conn->real_escape_string(preg_replace('/\D/', '', $_POST['telefone']));
    $senha   = $conn->real_escape_string($_POST['senha']);  
	$md5Senha = md5($senha);

    $sql = "INSERT INTO Usuario (nome, email, cpf_cnpj, telefone, senha, avatar, fk_TipoUsuario_id) 
    VALUES ('$nome','$email','$cpf_cnpj', '$telefone','$md5Senha', NULL, 2)";

    if ($result = $conn->query($sql)) {
        $msg = "Registro cadastrado com sucesso! Você já pode realizar login.";
    } else {
        $msg = "Erro executando INSERT: " . $conn-> error . " Tente novo cadastro.";
    }

    $_SESSION['nao_autenticado'] = true;
    $_SESSION['mensagem_header'] = "Cadastro";
    $_SESSION['mensagem']        = $msg;
    $conn->close();
    header('location: ../../index.php'); 
    ?>
</body>
</html>
