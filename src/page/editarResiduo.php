<!doctype html>
<html lang="en">
    <head> 
        <title>Editar Residuo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #EEEEEC;">
	<?php require '../database/connectDB.php'; ?>
  <nav class="navbar navbar-expand-lg shadow p-2 mb-5" style="background-color: #535A76;">
          <div class="container-fluid" style="background-color: #535A76;">
            <a class="navbar-brand" href="../../index.php">
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
                <li class="nav-item d-flex align-items-center justify-content-between">
                    <a class="nav-link p-3" href="#" onclick="window.location.href='editarConta.php'">
                        <img src="../../resources/do-utilizador.png" alt="GreenPath" style="max-width: 35px;"></a>
                        <span class="navbar-text text-light">
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
                            if (isset($_SESSION['nome'])) {
                                echo "Olá, " . htmlspecialchars($_SESSION['nome']) . "!";
                            }
                        ?>
                        </span>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    <?php
    $id_tipo_residuo = $_GET['id'];


				$conn = mysqli_connect($servername, $username, $password, $database);

				if (!$conn) {
					die("<strong> Falha de conexão: </strong>" . mysqli_connect_error());
				}

        $sql = "SELECT id_tipo_residuo, nome, imagem, descricao, toxico
                FROM TipoResiduo WHERE id_tipo_residuo = $id_tipo_residuo";

        echo "<div class='container'>";
            if ($result = mysqli_query($conn, $sql)) {
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_assoc($result); 
                    $id_tipo_residuo  = $row['id_tipo_residuo'];
                    $nome = $row['nome'];
                    $imagem = $row['imagem'];
                    $descricao = $row['descricao'];
                    $toxico = $row['toxico'];
                    
				?>
        <div class="card mb-3 mx-auto rounded shadow-sm p-2 mb-5" style="max-width: 800px;">
        <div class="row g-0">
            <div class="col-md-4 text-center rounded-start" style="background-color: #535A76;">
            <p><br><img src="../../resources/logo-removebg.png" class="img-fluid rounded-start" alt="logo" style="max-width: 100px;"></p>
            <p class="text-center text-light fs-2 text">Já Possui um Resíduo Cadastrado?</p>
            <p><button type="button" style="color: #535A76;" onclick="window.location.href='listarResiduos.php'" class="btn btn-light shadow-sm p-2 mb-5 rounded">Ver Resíduos</button></p>
        </div>
            <div class="col-md-8">
            <div class="card-body text-bg-light rounded-end">
                <form id="form" action="editarResiduoDB.php" method="POST" enctype="multipart/form-data">
                <h2 id="signup-title" style="color: #535A76;">Editar <?php echo $nome; ?></h2>
                <input type="hidden" id="id_tipo_residuo" name="id_tipo_residuo" value="<?php echo $id_tipo_residuo; ?>">
                <label for="nome" class="form-label">Tipo de Residuo</label>
                            <input type="text" name="nome" minlength="3" id="nome" placeholder="Tipo de Residuo" 
                            class="form-control" title="Informe um nome válido. Minimo 3 digitos" value="<?php echo $nome; ?>" required>                           
                            
                            <label for="descricao" class="form-label">Descrição</label>
                            <input type="text" name="descricao" minlength="3" id="descricao" placeholder="Descrição" 
                            title="Informe uma descriçao válida. Minimo 3 digitos" class="form-control" value="<?php echo $descricao; ?>" required>
                            
                            <label for="toxico" class="form-label">Toxicidade </label>
                            <input type="text" name="toxico" id="toxico" placeholder="Toxicidade " class="form-control" 
                            title="Informe um valor válido." value="<?php echo $toxico; ?>" required> 
                              <br>
                            <div class="mb-3">
                    <td>
                            <?php
                            if ($imagem) {?>
                                <p style="text-align:center">
                                    <img id="imagemSelecionada" class="rounded-circle" style="max-width: 40px;" src="data:image/png;base64,<?= base64_encode($imagem) ; ?>" />
                                </p> 
                                <?php
                            } else {
                                ?>
                                <p style="text-align:center">
                                    <img id="imagemSelecionada" class="rounded-circle" src="../../resources/fotoIcon.jpg" style="max-width: 40px;" />
                                </p>
                                <?php
                            }
                            ?>
                            <p>
							<label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />
                            <input type="file" id="imagem" name="imagem" onchange="validaImagem(this);" /></label>
                            </p>
                        </td>
                            <div>
                              <br>
                              <input style="color:#535A76" type="button" value="Cancelar" class="btn btn-light shadow-sm p-2 mb-5 rounded" onclick="window.location.href='listarResiduos.php'">
                              <input style="color:#535A76" class="btn btn-light shadow-sm p-2 mb-5 rounded" type="submit" value="Editar Resíduo">
                            </div>
                    <?php
        } else {
            ?>
            <div class="container">
                <h2>Conta inexistente</h2>
                </div>
						<br>
					<?php
					}
				} else {
					echo "<p style='text-align:center'>Erro executando UPDATE: " . $conn-> error . "</p>";
				}
				echo "</div>";
				$conn->close();
				?>
        </form>
</div>
</p>
</div>
            <script type="text/javascript" src="../script/script.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>
</html>
