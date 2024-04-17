<!doctype html>
<html lang="en">
  <head>
    <title>Excluir Conta</title>
    <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/styleExcluirConta.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chau+Philomene+One:ital@0;1&family=Overpass:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  </head>

<?php require '../database/connectDB.php'; ?>

<div id="ch" class="container">
	<h2>Exclusão de Usuário</h2>
	</div>

	<?php
		$id_usu = $_POST['id_usu'];		

		$conn = new mysqli($servername, $username, $password, $database);

		if ($conn->connect_error) {
			die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
		}

		$sql = "DELETE FROM Usuario WHERE id_usu = $id_usu";

		echo "<div id='cf' class='container'>";
		if ($result = $conn->query($sql)) {
			echo "<p>&nbsp;Registro excluído com sucesso! </p>";
		} else {
			echo "<p>&nbsp;Erro executando DELETE: " .  $conn->connect_error . "</p>";
		}?>
		<button type="submit" class="btn btn-info" onclick="window.location.href='listarContas.php'" class="c">Ok</button>
        <?php
		echo "</div>";
		$conn->close();

		?>
  	</div>
	</div>

</body>
</html>
