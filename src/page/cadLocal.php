<!doctype html>
<html lang="en">
    <head>
        <title>Cadastrar Local</title>
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
                  <a class="nav-link text-light fs-5 p-3" href="../../index.php">Home</a>
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
        $conn = mysqli_connect($servername, $username, $password, $database);

				if (!$conn) {
					die("<strong> Falha de conexão: </strong>" . mysqli_connect_error());
				}

				?>
        <div class="card mb-3 mx-auto rounded shadow-sm p-2 mb-5" style="max-width: 800px;">
        <div class="row g-0">
            <div class="col-md-4 text-center rounded-start" style="background-color: #535A76;">
            <p><br><img src="../../resources/logo-removebg.png" class="img-fluid rounded-start" alt="logo" style="max-width: 100px;"></p>
            <p class="text-center text-light fs-2 text">Já Possui um Local Cadastrado?</p>
            <p><button type="button" onclick="window.location.href='locais.php'" class="btn btn-light shadow-sm p-2 mb-5 rounded" style="color: #535A76;">Ver Locais</button></p>
          </div>
            <div class="col-md-8">
            <div class="card-body text-bg-light rounded-end" style="color: #535A76;">
                <h5 class="card-title" style="color: #535A76;">Cadastar Local</h5>
                <br>
                <form id="form" action="cadLocalDB.php" method="POST">
                            <label for="nome" class="form-label">Nome do Local</label>
                            <input type="text" name="nome" minlength="3" id="nome" placeholder="Nome da Local" 
                            class="form-control" title="Informe um nome válido. Minimo 3 digitos" required>                           
                            
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" name="endereco" minlength="3" id="endereco" placeholder="Endereço" 
                            title="Informe um endereço válido. Minimo 3 digitos" class="form-control" required>

                            <label for="fk_Empresa_id" class="form-label">Empresa</label>
                            <input type="text" name="fk_Empresa_id" minlength="3" id="fk_Empresa_id" placeholder="Empresa" 
                            title="Informe uma empresa valida. Minimo 3 digitos" class="form-control" required>
                            
                            <label for="link" class="form-label">Link do Mapa</label>
                            <input type="text" name="link" minlength="3" id="link" placeholder="Link do Mapa" class="form-control" 
                            title="Informe um link válido. Minimo 3 digitos" required> 

                            <label for="referencia" class="form-label">Referência</label>
                            <input type="text" name="referencia" minlength="3" id="referencia" placeholder="Referência" class="form-control" 
                            title="Informe uma referência válida. Minimo 3 digitos" required> 
                            
                            <div class="row">
                                <div class="col">
                                <label for="horario_abertura" class="form-label">Horário de Abertura</label>
                            <input type="time" name="horario_abertura" id="horario_abertura" placeholder="horario_abertura"  
                            class="form-control" title="Informe um horário válido." required>                                 </div>
                                <div class="col">
                                <label for="horario_fechamento" class="form-label">Horário de Fechamento</label>
                            <input type="time" name="horario_fechamento" minlength="5" id="horario_fechamento" placeholder="horario_fechamento" 
                            class="form-control" title="Informe um horário válido." required>                                 </div>
                            </div>
                            <label for="tipo" class="form-label">Tipo</label>
                            <input type="text" name="tipo" minlength="3" id="tipo" placeholder="Tipo" 
                            class="form-control" title="Informe um tipo válido. Minimo 3 digitos" required>
                            <br>  
                            <div>
                              <br>
                              <input type="button" value="Cancelar" class="btn btn-light shadow-sm p-2 mb-5 rounded" style="color: #535A76;" onclick="window.location.href='homeAdm.php'">
                              <input  class="btn btn-light shadow-sm p-2 mb-5 rounded" type="submit" style="color: #535A76;" value="Cadastrar Local">
                            </div>
                    </form>
                </div>
            </div>
        </div>
            <script type="text/javascript" src="../script/script.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>
</html>