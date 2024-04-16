<!doctype html>
<html lang="en">
    <head>
        <title>Excluir Conta</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../style/styleExcluirConta.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Chau+Philomene+One:ital@0;1&family=Overpass:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>
	<?php require '../database/connectDB.php'; ?>

				<?php
	
				$conn = new mysqli($servername, $username, $password, $database);

				if ($conn->connect_error) {
					die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
				}

				$id=$_GET['id'];
				
				$sql = "SELECT id, nome, email, telefone, cpf, senha FROM Usuario 
				WHERE id = $id;";
				echo "<div class='container'>";  
				if ($result = $conn->query($sql)) {
					if ($result->num_rows == 1) {
						$row   = $result->fetch_assoc(); ?>

						<div class="header">
							<div class="logoNome">
							  <a href="../../index.html"><img src="../../resources/logoNome-removebg-preview.png" class="logoNomeIndex"/></a>
							</div>
							<div>
							<button onclick="window.location.href='homeUsers.php'" class="botaoH">Home</button>
							<button onclick="window.location.href='sobre.php'" class="botaoH">Sobre</button>
							<button onclick="window.location.href='locais.php'" class="botaoH">Locais</button>
							<a href='editarConta.php'><img src='../../resources/perfilIcon.png' alt="Perfil" class="perfilIcon"></a>
							</div>
						  </div>
						<div id="ch" class="container">
							<h2>Exclusão de [<?php echo $row['nome']; ?>]</h2>
						</div>
						<form id="cf" class="container" action="excluirContaDB.php" method="post" onsubmit="return check(this.form)">
							<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
							<p>
							<label><b>Nome: </b> <?php echo $row['nome']; ?> </label></p>
							<p>
							<label><b>E-mail: </b><?php echo $row['email']; ?></label></p>
							<p>
							<label><b>Telefone: </b><?php echo $row['telefone']; ?></label></p>
							<p>
							<label><b>CPF: </b><?php echo $row['cpf']; ?></label></p>
							<p>
							<label><b>Senha: </b><?php echo $row['senha']; ?></label></p>
							<p id="btns">
							<input type="submit" value="Excluir Conta" class="btn btn-info" >
							<input type="button" value="Cancelar" class="btn btn-danger" onclick="window.location.href='homeUsers.php'"></p>
						</form>
			<?php 
					}else{?>
						<div class="container">
						<h2>Tentativa de exclusão inexistente</h2>
						</div>
						<br>
					<?php }
				}else {
					echo "<p style='text-align:center'>Erro executando DELETE: " . $conn-> error . "</p>";
				}
				echo "</div>";
				$conn->close();

			?>
			</div>
		</p>
	</div>
</body>
</html>
