<!doctype html>
<html lang="en">
    <head>
        <title>Home</title>
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
                  <a class="nav-link text-secondary fs-5 p-3" href="#" onclick="window.location.href='homeUsers.php'">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-secondary fs-5 p-3" href="#" onclick="window.location.href='sobre.php'">Sobre</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-secondary fs-5 p-3" href="#" onclick="window.location.href='locaisUser.php'">Locais</a>
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
        <div class="row g-1 mx-auto p-2">
        <div id="titulo" class="col-md-4 p-4 text-center text-secondary ">
            <h1>Bem-vindo ao Greenpath</h1><br>
            <button type="button" onclick="window.location.href='cadEmpresa.php'"
            class="btn btn-light text-info m-3 shadow-sm p-2 mb-5 rounded">Cadastrar Empresa</button>
            <button type="button" onclick="window.location.href='logout.php'"
            class="btn btn-light text-info m-3 shadow-sm p-2 mb-5 rounded">Logout</button>
          </div>
          <div class="col-md-6 mx-auto">
            <img src="../../resources/imgInicio.jpeg" class="img-fluid" alt="Imagem Inicio" style="max-width: 600px;">
          </div>
        </div>
        <br>
        <div class="container-fluid text-bg-secondary">
          <br>
          <h1 class="text-center">Sobre</h1>
          <h5 class="text-center"> GreenPath é um aplicativo que ajuda os usuários a <br>
                                  localizar pontos de descarte de lixo correto de forma<br>
                                  rápida e conveniente.<br>
                                  Estabelecimentos podem cadastrar, e fornecer informações sobre a<br>
                                  reciclagem de diferentes tipos de resíduos, promovendo práticas<br>
                                  de descarte sustentáveis.</h5>
                             <button type="button" onclick="window.location.href='sobre.php'"
                            class="btn btn-light text-info shadow-sm p-2 mb-5 rounded">Saiba Mais</button>
        </div>
        <br>
        <div class="card text-center text-info mx-auto rounded shadow-sm p-2 mb-5" style="max-width: 500px;">
          <div class="card-header">
          </div>
          <div class="card-body">
            <h5 class="card-title">Locais Cadastrados</h5>
            <p class="card-text">Veja os melhores lugares para descartar resíduos corretamente.</p>
            <button type="button" onclick="window.location.href='locaisUser.php'"
            class="btn btn-light text-info rounded">Ver Locais</button>
          </div>
          <div class="card-footer text-body-secondary">
          </div>
        </div>
        </div>
        <footer>
          <div class="footer-section">
              <h3>Este Site</h3>
              <ul>
                  <li><a href="#">Locais</a></li>
                  <li><a href="#">Cadastre Seu Local</a></li>
                  <li><a href="#">Ajuda e Suporte</a></li>
                  <li><a href="#">Preferências</a></li>
              </ul>
          </div>
          <div class="footer-section">
              <h3>Outros Sites Green</h3>
              <ul>
                  <li><a href="#">Sobre a GreenPath</a></li>
                  <li><a href="#">Soluções para descarte</a></li>
                  <li><a href="#">Trabalhe conosco</a></li>
                  <li><a href="#">GreenInsight</a></li>
              </ul>
          </div>
          <div class="footer-bottom">
              <a href="#">Página Inicial</a> | 
              <a href="#">Benefícios</a> | 
              <a href="#">Termos de Serviço</a> | 
              <a href="#">Privacidade</a> | 
              <a href="#">Configuração de Cookies</a>
              <p style="margin-left: 10px;">Copyright ©2024 GreenPath Inc. Todos Direitos Reservados.</p>
          </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../script/script.js"></script>
</body>
</html>
