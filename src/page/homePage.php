<!doctype html>
<html lang="en">
  <head>
    <title>GreenPath</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/styleIndex.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
  </head>
  <body>
    <?php
            session_start();
            if (isset($_SESSION['id_tipo_usu'])) {
                if ($_SESSION['id_tipo_usu'] == 1){
                  $url = 'location: /bsi-ec-isi-client/src/page/homeAdm.php';	 
                  header($url);            
                    exit();
                }else if ($_SESSION['id_tipo_usu'] == 2){
                  $url = 'location: /bsi-ec-isi-client/src/page/homeUsers.php';	 
                  header($url);                                     
                    exit();
                }
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
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link text-secondary fs-5 p-3" href="#" onclick="window.location.href='login.php'">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-secondary fs-5 p-3" href="#" onclick="window.location.href='criarConta.php'">Criar Conta</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="row g-1 mx-auto p-2">
          <div id="titulo" class="col-md-4 mx-auto text-center text-secondary ">
            <h1>Conheça o Greenpath</h1>
            <p class="text-center fs-5 text-secondary"> 
              GreenPath é um aplicativo que ajuda os usuários a
              localizar pontos de descarte de lixo correto de forma
              rápida e conveniente.<br>
              Estabelecimentos podem cadastrar, e fornecer informações sobre a
              reciclagem de diferentes tipos de resíduos, promovendo práticas
              de descarte sustentáveis.</p>
            <button type="button" onclick="window.location.href='login.php'"
            class="btn btn-light text-info m-3 shadow-sm p-2 mb-5 rounded">Login</button>
            <button type="button" onclick="window.location.href='criarConta.php'"
            class="btn btn-light text-info m-3 shadow-sm p-2 mb-5 rounded">Criar Conta</button>
          </div>
          <div class="col-md-6">
            <img src="../../resources/imgInicio.jpeg" class="img-fluid" alt="Imagem Inicio">
          </div>
        </div>
        <footer>
          <div class="footer-section">
              <h3>Este Site</h3>
              <ul>
                  <li><a href="#" onclick="window.location.href='locaisIndex.php'">Locais</a></li>
                  <li><a href="#">Ajuda e Suporte</a></li>
                  <li><a href="#">Preferências</a></li>
              </ul>
          </div>
          <div class="footer-section">
              <h3>Outros Sites Green</h3>
              <ul>
                  <li><a href="#" onclick="window.location.href='sobreIndex.php'">Sobre a GreenPath</a></li>
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
  <script type="text/javascript" src="../script/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
  