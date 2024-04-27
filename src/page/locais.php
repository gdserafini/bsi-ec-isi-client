<!doctype html>
<html lang="en">
    <head>
        <title>Listagem de Locais</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style/styleIndex.css">
        <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <body>
    <?php require '../database/connectDB.php'; ?>
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
        <div class="container text-bg-light rounded shadow-sm p-2 mb-5">
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-info" type="submit">Search</button>
        </form>

        </div>
          <script type="text/javascript" src="../script/script.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>
</html>