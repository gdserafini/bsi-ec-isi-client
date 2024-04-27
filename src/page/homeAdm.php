<!doctype html>
<html lang="en">
    <head>
        <title>Administrador</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style/styleIndex.css">
        <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <body>
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
                    <li><a class="dropdown-item" href="#" onclick="window.location.href='locais.php'">Locais Cadastrados</a></li>
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
        <div class="row">
          <div class="col-sm-6">
          <div class="card text-center text-bg-light rounded shadow-sm p-2 mb-5 m-3 mx-auto" style="max-width: 500px;">
              <div class="card-body">
                <h5 class="card-title">Usuários</h5>
                <p class="card-text">Ver relação e cadastrar usuários.</p>
                <a href="#" onclick="window.location.href='listarContas.php'" class="btn btn-secondary">Usuários Cadastrados</a>
                <a href="#" onclick="window.location.href='criarConta.php'" class="btn btn-secondary">Cadastrar Usúario</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
          <div class="card text-center text-bg-light rounded shadow-sm p-2 mb-5 m-3" style="max-width: 500px;">
            <div class="card-body">
                <h5 class="card-title">Locais</h5>
                <p class="card-text">Ver relação e cadastrar locais.</p>
                <a href="#" onclick="window.location.href='locais.php'" class="btn btn-secondary">Locais Cadastrados</a>
                <a href="#" onclick="window.location.href='cadLocal.php'" class="btn btn-secondary">Cadastrar Local</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card text-center text-bg-light rounded shadow-sm p-2 mb-5 m-3 mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h5 class="card-title">Empresas</h5>
                <p class="card-text">Ver relação e cadastrar empresas.</p>
                <a href="#" onclick="window.location.href='listarEmpresas.php'" class="btn btn-secondary">Empresas Cadastradas</a>
                <a href="#" onclick="window.location.href='cadEmpresa.php'" class="btn btn-secondary">Cadastrar Empresa</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
          <div class="card text-center text-bg-light rounded shadow-sm p-2 mb-5 m-3" style="max-width: 500px;">
            <div class="card-body">
                <h5 class="card-title">Resíduos</h5>
                <p class="card-text">Ver relação e cadastrar resíduos.</p>
                <a href="#" onclick="window.location.href='listarResiduos.php'" class="btn btn-secondary">Resíduos Cadastrados</a>
                <a href="#" onclick="window.location.href='cadResiduo.php'" class="btn btn-secondary">Cadastrar Resíduo</a>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript" src="../script/script.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>
</html>