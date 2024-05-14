<!doctype html>
<html lang="en">
    <head>
        <title>Cadastrar Residuos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <body>
    <?php
    require '../database/connectDB.php';

				$conn = mysqli_connect($servername, $username, $password, $database);

				if (!$conn) {
					die("<strong> Falha de conexão: </strong>" . mysqli_connect_error());
				}

				?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-2 mb-5 rounded border-bottom border-primary-subtle">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img src="../../resources/logoNome-removebg-preview.png" alt="GreenPath" width="171" height="50">
            </a>          
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
              </ul>
            </div>
          </div>
        </nav>
        <div class="card mb-3 mx-auto rounded shadow-sm p-2 mb-5" style="max-width: 800px;">
        <div class="row g-0">
            <div class="col-md-4 text-bg-secondary text-center rounded-start">
            <p><br><img src="../../resources/logo-removebg.png" class="img-fluid rounded-start" alt="logo" style="max-width: 100px;"></p>
            <p><button type="button" onclick="window.location.href='locais.php'" class="btn btn-light text-info shadow-sm p-2 mb-5 rounded">Ver Locais</button></p>
          </div>
            <div class="col-md-8">
            <div class="card-body text-bg-light rounded-end">
                <h5 class="card-title">Cadastar Residuo</h5>
                <br>
                <form id="form" action="cadResiduoDB.php" method="POST">
                            <label for="nome" class="form-label">Tipo de Residuo</label>
                            <input type="text" name="nome" minlength="3" id="nome" placeholder="Tipo de Residuo" 
                            class="form-control" title="Informe um nome válido. Minimo 3 digitos" required>                           
                            
                            <label for="descricao" class="form-label">Descrição</label>
                            <input type="text" name="descricao" minlength="3" id="descricao" placeholder="Descrição" 
                            title="Informe uma Ddescrição válida. Minimo 3 digitos" class="form-control" required>
                            
                            <label for="toxico" class="form-label">Toxicidade </label>
                            <input type="text" name="toxico" id="toxico" placeholder="Toxicidade " class="form-control" 
                            title="Informe um valor válido." required> 
                            
                              <br>
                              <input type="button" value="Cancelar" class="btn btn-light text-info shadow-sm p-2 mb-5 rounded" onclick="window.location.href='listarResiduos.php'">
                              <input  class="btn btn-light text-info shadow-sm p-2 mb-5 rounded" type="submit" value="Cadastrar Residuo">
                            </div>
                    </form>
                </div>
            </div>
        </div>
            <script type="text/javascript" src="../script/script.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>
</html>