<!doctype html>
<html lang="en">
    <head>
        <title>Editar Empresa</title>
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
    $id_local_descarte = $_GET['id'];


				$conn = mysqli_connect($servername, $username, $password, $database);

				if (!$conn) {
					die("<strong> Falha de conexão: </strong>" . mysqli_connect_error());
				}

        $sql = "SELECT id_local_descarte, endereco, nome, link, imagem, referencia, horario_abertura, horario_fechamento, tipo
                FROM LocalDescarte WHERE id_local_descarte = $id_local_descarte";

        echo "<div class='container'>";
            if ($result = mysqli_query($conn, $sql)) {
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_assoc($result); 
                    $id_local_descarte  = $row['id_local_descarte'];
                    $nome = $row['nome'];
                    $link = $row['link'];
                    $imagem = $row['imagem'];
                    $endereco = $row['endereco'];
                    $referencia = $row['referencia'];
                    $horario_abertura = $row['horario_abertura'];
                    $horario_fechamento = $row['horario_fechamento'];
                    $tipo = $row['tipo'];
				?>
        <div class="card mb-3 mx-auto rounded shadow-sm p-2 mb-5" style="max-width: 800px;">
        <div class="row g-0">
            <div class="col-md-4 text-center rounded-start" style="background-color: #535A76;">
            <p><br><img src="../../resources/logo-removebg.png" class="img-fluid rounded-start" alt="logo" style="max-width: 100px;"></p>
            <p class="text-center fs-2 text text-light">Já Possui um Local Cadastrado?</p>
            <p><button type="button" onclick="window.location.href='locais.php'" style="color: #535A76;" class="btn btn-light shadow-sm p-2 mb-5 rounded">Ver Locais</button></p>
        </div>
            <div class="col-md-8">
            <div class="card-body text-bg-light rounded-end">
                <form id="form" action="editarLocalDB.php" method="POST" enctype="multipart/form-data">
                <h2 id="signup-title" style="color: #535A76;">Editar <?php echo $nome; ?></h2>
                <input type="hidden" id="id_local_descarte" name="id_local_descarte" value="<?php echo $id_local_descarte; ?>">
                <label for="nome" class="form-label">Nome do Local</label>
                            <input type="text" name="nome" minlength="3" id="nome" placeholder="Nome da Local" 
                            class="form-control" title="Informe um nome válido. Minimo 3 digitos" value="<?php echo $nome; ?>" required>                           
                            
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" name="endereco" minlength="3" id="endereco" placeholder="Endereço" 
                            title="Informe um endereço válido. Minimo 3 digitos" class="form-control" value="<?php echo $endereco; ?>" required>
                            
                            
                            <label for="link" class="form-label">Link do Mapa</label>
                            <input type="text" name="link" minlength="3" id="link" placeholder="Link do Mapa" class="form-control" 
                            title="Informe um link válido. Minimo 3 digitos" value="<?php echo $link; ?>" required> 

                            <label for="referencia" class="form-label">Referência</label>
                            <input type="text" name="referencia" minlength="3" id="referencia" placeholder="Referência" class="form-control" 
                            title="Informe uma referência válido. Minimo 3 digitos" value="<?php echo $referencia; ?>" required> 
                            
                            <div class="row">
                                <div class="col">
                                <label for="horario_abertura" class="form-label">Horário de Abertura</label>
                            <input type="time" name="horario_abertura" id="horario_abertura" placeholder="horario_abertura"  
                            class="form-control" title="Informe um horário válido." value="<?php echo $horario_abertura; ?>" required>                                 </div>
                                <div class="col">
                                <label for="horario_fechamento" class="form-label">Horário de Fechamento</label>
                            <input type="time" name="horario_fechamento" minlength="5" id="horario_fechamento" placeholder="horario_fechamento" 
                            class="form-control" title="Informe um horário válido." value="<?php echo $horario_fechamento; ?>" required>                                 </div>
                            </div>
                            <label for="tipo" class="form-label">Tipo</label>
                            <input type="text" name="tipo" minlength="3" id="tipo" placeholder="Tipo" 
                            class="form-control" title="Informe um tipo válido. Minimo 3 digitos" value="<?php echo $tipo; ?>" required>
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
                                    <img id="imagemSelecionada" class="rounded-circle" src="../../resources/fotoIcon.jpg" style="max-width: 40px;"  />
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
                              <input type="button" value="Cancelar" style="color: #535A76;" class="btn btn-light shadow-sm p-2 mb-5 rounded" onclick="window.location.href='locais.php'">
                              <input  class="btn btn-light shadow-sm p-2 mb-5 rounded" style="color: #535A76;" type="submit" value="Editar Local">
                            </div>
                    <?php
        } else {
            ?>
            <div class="container">
                <h2>Local inexistente</h2>
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
</div>
</p>
</div>
            <script type="text/javascript" src="../script/script.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>
</html>
