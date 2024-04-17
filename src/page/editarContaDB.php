<!doctype html>
<html lang="en">
    <head>
        <title>Editar Conta</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../style/styleEditarConta.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Chau+Philomene+One:ital@0;1&family=Overpass:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>
<body>
	<?php require '../database/connectDB.php'; ?>

				<div id="ch" class="container">
				<h2>Editar Conta</h2>
				</div>

				<?php
				$id_usu      = $_POST['id_usu'];
                $nome    = $_POST['nome'];   
                $email   = $_POST['email'];   
                $cpf_cnpj   = $_POST['cpf_cnpj']; 
                $telefone = $_POST['telefone'];
                $senha   = $_POST['senha'];  
                $md5Senha = md5($senha);

				$conn = new mysqli($servername, $username, $password, $database);

				if ($conn->connect_error) {
					die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
				}

				?>
				<?php
				if ($_FILES['avatar']['size'] == 0) {
					$sql = "UPDATE Usuario SET nome = '$nome', email = '$email', cpf_cnpj = '$cpf_cnpj', 
                    telefone = '$telefone', senha = '$md5Senha'
                    WHERE id_usu = $id_usu";
				} else {  
					$avatar = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
					$sql = "UPDATE Usuario SET nome = '$nome', email = '$email', cpf_cnpj = '$cpf_cnpj', 
                    telefone = '$telefone', senha = '$md5Senha', avatar = '$avatar'
                    WHERE id_usu = $id_usu";
				}
				
				echo "<div id='cf' class='container'>";
				if ($result = $conn->query($sql)){
					echo "<p>&nbsp;Registro alterado com sucesso! </p>";
				} else {
					echo "<p>&nbsp;Erro executando UPDATE: " . $conn-> error . "</p>";
				}
				echo "</div>";
				?>
				<button type="submit" id="btnOk" class="btn btn-info" onclick="window.location.href='listarContas.php'">Ok</button>
				<?php
				$conn->close();

				?>
			</div>
		</div>


</body>

</html>