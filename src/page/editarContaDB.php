<!doctype html>
<html lang="en">
    <head>
        <title>Editar Conta</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style/styleIndex.css">
        <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<?php require '../database/connectDB.php'; ?>

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
				
				echo "<div class='container text-bg-light mx-auto rounded shadow-sm p-2 mb-5' style='max-width: 800px;'>";
				echo "<h2>Editar Conta</h2>";
				if ($result = $conn->query($sql)){
					echo "<p>&nbsp;Registro alterado com sucesso! </p>";
				} else {
					echo "<p>&nbsp;Erro executando UPDATE: " . $conn-> error . "</p>";
				}
				?>
				<button type="submit" class="btn btn-secondary" onclick="window.location.href='homeUsers.php'">Ok</button>
				<?php
				echo "</div>";
				$conn->close();
				?>
			</div>
		</div>


</body>
</html>