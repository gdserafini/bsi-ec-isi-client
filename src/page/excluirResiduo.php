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
    <body>
	<?php require '../database/connectDB.php'; ?>

				<?php
	
				$conn = new mysqli($servername, $username, $password, $database);

				if ($conn->connect_error) {
					die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
				}

				$id_tipo_residuo= $_GET['id'];
				
				$sql = "SELECT id_tipo_residuo, nome, classificacao, toxico FROM TipoResiduo 
				WHERE id_tipo_residuo = $id_tipo_residuo;";
				echo "<div class='container'>";  
				if ($result = $conn->query($sql)) {
					if ($result->num_rows == 1) {
						$row   = $result->fetch_assoc(); ?>

<nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-2 mb-5 rounded border-bottom border-primary-subtle">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img src="../../resources/logoNome-removebg-preview.png" alt="GreenPath" width="171" height="50">
            </a>          
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                  <a class="nav-link text-secondary fs-5 p-3" href="#" onclick="window.location.href='homeAdm.php'">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-secondary fs-5 p-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Usuários</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" onclick="window.location.href='listarContas.php'">Usuários Cadastrados</a></li>
                    <li><a class="dropdown-item" href="#" onclick="window.location.href='listarContas.php'">Cadastrar Usuário</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-secondary fs-5 p-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Locais</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" onclick="window.location.href='listarContas.php'">Locais Cadastrados</a></li>
                    <li><a class="dropdown-item" href="#" onclick="window.location.href='listarContas.php'">Cadastrar Local</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-secondary fs-5 p-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Empresas</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" onclick="window.location.href='listarContas.php'">Empresas Cadastradas</a></li>
                    <li><a class="dropdown-item" href="#" onclick="window.location.href='listarContas.php'">Cadastrar Empresa</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-secondary fs-5 p-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Resíduos</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" onclick="window.location.href='listarContas.php'">Resíduos Cadastrados</a></li>
                    <li><a class="dropdown-item" href="#" onclick="window.location.href='listarContas.php'">Cadastrar Resíduo</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-secondary fs-5 p-3" href="#" onclick="window.location.href='logout.php'">Logout</a>
                </li>
                <li class="nav-item">
                <a class="nav-link p-3" href="#" onclick="window.location.href='editarConta.php'">
                  <img src="../../resources/perfilIcon.png" alt="GreenPath" style="max-width: 35px;"></a>                 
                </li>
              </ul>
            </div>
          </div>
        </nav>
		
						<form class="container text-bg-light rounded shadow-sm p-2 mb-5" style="max-width: 800px;" action="excluirResiduoDB.php" method="post" onsubmit="return check(this.form)">
						<h2>Exclusão de <?php echo $row['nome']; ?></h2>
							<br>
							<input type="hidden" id="id_tipo_residuo" name="id_tipo_residuo" value="<?php echo $row['id_tipo_residuo']; ?>">
							<p>
							<label><b>Nome: </b> <?php echo $row['nome']; ?> </label></p>
							<p>
							<label><b>Classificação: </b><?php echo $row['classificacao']; ?></label></p>
							<p>
							<label><b>Toxicidade : </b><?php echo $row['toxico']; ?></label></p>
							<p>
								<br>
							<input type="submit" value="Excluir Residuo" class="btn btn-secondary shadow-sm p-2 mb-5" >
							<input type="button" value="Cancelar" class="btn btn-danger shadow-sm p-2 mb-5" onclick="window.location.href='listarResiduos.php'"></p>
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
