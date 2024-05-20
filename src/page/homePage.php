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
  <body style="background-color: #EEEEEC;">
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
                  <a class="nav-link text-light fs-5 p-3" href="#" onclick="window.location.href='login.php'">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light fs-5 p-3" href="#" onclick="window.location.href='criarConta.php'">Criar Conta</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="row g-1 mx-auto p-2">
          <div id="titulo" style="color: #535A76;" class="col-md-4 mx-auto text-center text-secondary ">
            <br>
          <h1>Conheça o Greenpath</h1>
            <p class="text-center fs-5 text-secondary"> 
            GreenPath é uma plataforma que facilita aos usuários a localização rápida e conveniente de pontos de descarte de resíduos de forma correta. Estabelecimentos podem se cadastrar na plataforma e disponibilizar informações sobre a reciclagem de diversos tipos de materiais, incentivando práticas de descarte sustentáveis.</p>
            <button type="button" onclick="window.location.href='login.php'"
            class="btn btn-light m-3 shadow-sm p-2 mb-5 rounded" style="color: #535A76;" >Login</button>
            <button type="button" onclick="window.location.href='criarConta.php'"
            class="btn btn-light m-3 shadow-sm p-2 mb-5 rounded" style="color: #535A76;" >Criar Conta</button>
          </div>
          <div class="col-md-7">
          <img src="../../resources/imgHome.png" class="img-fluid" alt="Imagem Inicio" style="max-width: 650px;">
          </div>
        </div> 
  <script type="text/javascript" src="../script/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
  