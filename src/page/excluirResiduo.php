<!doctype html>
<html lang="en">
    <head>
        <title>Excluir Residuo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style/styleIndex.css">
        <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #EEEEEC;">
	<?php require '../database/connectDB.php'; ?>
  <nav class="navbar navbar-expand-lg shadow p-2 mb-5" style="background-color: #535A76;">
          <div class="container-fluid" style="background-color: #535A76;">
            <a class="navbar-brand" href="#">
              <img src="../../resources/GreenPath.png" alt="GreenPath" width="200" height="59">
            </a>          
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                  <a class="nav-link text-light fs-5 p-3" href="#" onclick="window.location.href='homeAdm.php'">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light fs-5 p-3" href="#" onclick="window.location.href='logout.php'">Logout</a>
                </li>
                <li class="nav-item">
                <a class="nav-link p-3" href="#" onclick="window.location.href='editarConta.php?id=<?php echo $cod; ?>'">
                  <img src="../../resources/do-utilizador.png" alt="GreenPath" style="max-width: 35px;"></a>                 
                </li>
              </ul>
            </div>
          </div>
        </nav>

				<?php
	
				$conn = new mysqli($servername, $username, $password, $database);

				if ($conn->connect_error) {
					die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
				}

				$id_tipo_residuo= $_GET['id'];
				
				$sql = "SELECT id_tipo_residuo, nome, descricao, imagem, toxico FROM TipoResiduo 
				WHERE id_tipo_residuo = $id_tipo_residuo;";
				echo "<div class='container'>";  
				if ($result = $conn->query($sql)) {
					if ($result->num_rows == 1) {
						$row   = $result->fetch_assoc(); ?>
		
						<form class="container text-bg-light rounded shadow-sm p-2 mb-5" style="max-width: 800px;" action="excluirResiduoDB.php" method="post" onsubmit="return check(this.form)">
						<h2 style="color: #535A76">Exclusão de <?php echo $row['nome']; ?></h2>
							<br>
							<input type="hidden" id="id_tipo_residuo" name="id_tipo_residuo" value="<?php echo $row['id_tipo_residuo']; ?>">
							<p>
							<label><b>Nome: </b> <?php echo $row['nome']; ?> </label></p>
							<p>
							<label><b>Descrição: </b><?php echo $row['descricao']; ?></label></p>
							<p>
							<label><b>Toxicidade : </b><?php echo $row['toxico']; ?></label></p>
							<p>
								<br>
							<input type="submit" value="Excluir Resíduo" class="btn btn-danger shadow-sm p-2 mb-5" >
							<input type="button" value="Cancelar" class="btn btn-light shadow-sm p-2 mb-5" style="color: #535A76" onclick="window.location.href='listarResiduos.php'"></p>
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
