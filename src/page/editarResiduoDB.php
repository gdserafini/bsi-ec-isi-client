<!doctype html>
<html lang="en">
    <head>
        <title>Editar Residuo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style/styleIndex.css">
        <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<?php require '../database/connectDB.php'; ?>

				<?php
				$id_tipo_residuo      = $_POST['id_tipo_residuo'];
                $nome   = $_POST['nome'];   
                $classificacao   = $_POST['classificacao'];   
                $toxico   = $_POST['toxico']; 


				$conn = new mysqli($servername, $username, $password, $database);

				if ($conn->connect_error) {
					die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
				}

				?>
				<?php
					$sql = "UPDATE TipoResiduo SET nome = '$nome', classificacao = '$classificacao', toxico = '$toxico'
                    WHERE id_tipo_residuo = $id_tipo_residuo";
				
				
				echo "<div class='container text-bg-light mx-auto rounded shadow-sm p-2 mb-5' style='max-width: 800px;'>";
				echo "<h2>Editar Residuo</h2>";
				if ($result = $conn->query($sql)){
					echo "<p>&nbsp;Registro alterado com sucesso! </p>";
				} else {
					echo "<p>&nbsp;Erro executando UPDATE: " . $conn-> error . "</p>";
				}
				?>
				<button type="submit" class="btn btn-secondary" onclick="window.location.href='listarResiduos.php'">Ok</button>
				<?php
				echo "</div>";
				$conn->close();
				?>
			</div>
		</div>


</body>
</html>