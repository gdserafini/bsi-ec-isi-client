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

    $email = $conn->real_escape_string($_POST['email']); 
    $senha   = $conn->real_escape_string($_POST['senha']); 
    

    $sql = "SELECT id_usu, nome, id_tipo_usu 
    FROM Usuario as U, TipoUsuario as TU 
    WHERE U.fk_TipoUsuario_id = TU.id_tipo_usu 
    AND email = '$email' AND senha = md5('$senha')";

    if ($result = $conn->query($sql)) {
        if ($result->num_rows == 1) { // se usuario existe
            $row = $result->fetch_assoc();
            $_SESSION ['email']       = $email;
            $_SESSION ['id_tipo_usu'] = $row['id_tipo_usu'];
            $_SESSION ['id_usu']  = $row['id_usu'];
            $_SESSION ['nome']        = $row['nome'];
            unset($_SESSION['nao_autenticado']);       
            if( $_SESSION ['id_tipo_usu'] == 1){           // tipo usuario
                $conn->close(); 
                header('location: /bsi-ec-isi-client/src/page/homeAdm.php'); 
                exit();
            }else {  
                $conn->close();                                
                header('location: /bsi-ec-isi-client/src/page/homeUsers.php');  
                exit();
            }

        }else{
            $_SESSION['nao_autenticado'] = true;
            $_SESSION['mensagem_header'] = "email";                   
            $_SESSION['mensagem']        = "Senha ou e-mail incorreto.";     
   
            $conn->close(); 
            header('location: /bsi-ec-isi-client/src/page/login.php'); 
            
            exit();
        }
    }
 
?>
	</body>
</html>

