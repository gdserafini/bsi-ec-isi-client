<!doctype html>
<html lang="en">
    <head>
        <title>Excluir Conta</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style/styleIndex.css">
        <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<?php require '../database/connectDB.php'; ?>

	<?php
		$id_empresa = $_POST['id_empresa'];		

		$conn = new mysqli($servername, $username, $password, $database);

		if ($conn->connect_error) {
			die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
		}

		$sql = "DELETE FROM Empresa WHERE id_empresa = $id_empresa";

		echo "<div class='container text-bg-light mx-auto rounded shadow-sm p-2 mb-5' style='max-width: 800px;'>";
		echo "<h2>Exclusão de Empresa</h2>";
		if ($result = $conn->query($sql)) {
			echo "<p>&nbsp;Registro excluído com sucesso! </p>";
		} else {
			echo "<p>&nbsp;Erro executando DELETE: " .  $conn->connect_error . "</p>";
		}?>
		<button type="submit" class="btn btn-secondary" onclick="window.location.href='listarEmpresas.php'" class="c">Ok</button>
        <?php
		echo "</div>";
		$conn->close();

		?>
  	</div>
	</div>

</body>
</html>
