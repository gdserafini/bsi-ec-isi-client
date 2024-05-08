<!doctype html>
<html lang="en">
    <head>
        <title>Cadastrar Empresa</title>
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
            <p class="text-center fs-2 text">Já Possui uma Empresa Cadastrada?</p>
            <p><button type="button" onclick="window.location.href='listarEmpresas.php'" class="btn btn-light text-info shadow-sm p-2 mb-5 rounded">Ver Empresa</button></p>
            <p class="text-center fs-5 text">ou</p><br>
            <p><button type="button" onclick="window.location.href='cadLocal.php'" class="btn btn-light text-info shadow-sm p-2 mb-5 rounded">Cadastrar Local</button></p>
          </div>
            <div class="col-md-8">
            <div class="card-body text-bg-light rounded-end">
                <h5 class="card-title">Cadastar Empresa</h5>
                <br>
                <form id="form" action="cadEmpresaDB.php" method="POST">
                            <label for="nome_fantasia" class="form-label">Nome da Empresa</label>
                            <input type="text" name="nome_fantasia" minlength="3" id="nome_fantasia" placeholder="Nome da Empresa" 
                            class="form-control" title="Informe um nome válido. Minimo 3 digitos" required>                           
                            
                            <label for="cnpj" class="form-label">CNPJ</label>
                            <input type="text" name="cnpj" maxlength="18" id="cnpj" placeholder="CNPJ" 
                            pattern="^\d{3}\.?\d{3}\.?\d{3}-?\d{2}$|^\d{2}\.?\d{3}\.?\d{3}\/?[0-9]{4}-?\d{2}$" 
                            title="Deve estar no formato 00000000000000 ou 00.000.000/0000-00" class="form-control" required>
                            
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" name="telefone" maxlength="15" id="telefone" placeholder="Telefone" class="form-control" 
                            pattern="^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$" title="Deve estar no formato 00000000000 ou (00) 00000-0000" required> 

                            <label for="razao_social" class="form-label">Razão Social</label>
                            <input type="text" name="razao_social" minlength="5" id="razao_social" placeholder="Razão Social" class="form-control" 
                            class="form-control" title="Informe um nome válido. Minimo 5 digitos" required> 
                            
                            <label for="setor" class="form-label">Setor</label>
                            <input type="text" name="setor" minlength="3" id="setor" placeholder="Setor" class="form-control" 
                            class="form-control" title="Informe um setor válido. Minimo 3 digitos" required>

                            <label for="bairro" class="form-label">Bairro</label>
                            <input type="text" name="bairro" minlength="5" id="bairro" placeholder="Bairro" class="form-control" 
                            class="form-control" title="Informe um bairro válido. Minimo 5 digitos" required>
                            <br>  
                            <div>
                              <br>
                              <input type="button" value="Cancelar" class="btn btn-light text-info shadow-sm p-2 mb-5 rounded" onclick="window.location.href='homeUsers.php'">
                              <input  class="btn btn-light text-info shadow-sm p-2 mb-5 rounded" type="submit" value="Cadastrar Empresa">
                            </div>
                    </form>
                </div>
            </div>
        </div>
            <script type="text/javascript" src="../script/script.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>
</html>