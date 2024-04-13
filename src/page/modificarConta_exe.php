<?php
	
			$id      = $_POST['Id_usuario'];  
			$nome    = $_POST['Nome'];
			$cpf     = $_POST['cpf'];
			$telefone  = $_POST['telefone'];		

		
			$conn = new mysqli($servername, $username, $password, $database);

			// Verifica conexão
			if ($conn->connect_error) {
				die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
			}
			?>
			
			<?php
		
			// Faz Update na Base de Dados
			if ($_FILES['Imagem']['size'] == 0) { // Não recebeu uma imagem binária
				$sql = "UPDATE Usuario SET nome = '$nome', cpf = '$cpf', telefone = '$telefone' WHERE id_usuario = $id";
			}else{
				$imagem = addslashes(file_get_contents($_FILES['Imagem']['tmp_name'])); // Prepara para salvar em BD
				$sql = "UPDATE Usuario SET nome = '$nome', cpf = '$cpf', telefone = '$telefone' WHERE id_usuario = $id";
			}

			echo "<div class='w3-responsive w3-card-4'>";
			if ($result = $conn->query($sql)) {
				echo "<p>&nbsp;Registro alterado com sucesso! </p>";
			} else {
				echo "<p style='text-align:center'>Erro executando UPDATE: " . $conn-> error . "</p>";
			}
			echo "</div>";
			$conn->close(); //Encerra conexao com o BD

?>
