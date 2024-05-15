<!doctype html>
<html lang="en">
    <head>
        <title>Sobre</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style/styleIndex.css">
        <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <body>
    <?php require '../database/connectDB.php'; ?>
  <nav class="navbar navbar-brand navbar-expand-lg bg-body-tertiary shadow p-2 mb-5 rounded border-bottom border-primary-subtle">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img src="../../resources/logoNome-removebg-preview.png" alt="GreenPath" style="max-width: 171px;">
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
        <?php
          $conn = new mysqli($servername, $username, $password, $database);

          if ($conn->connect_error) {
              die("<strong>Falha de conexão:</strong> " . $conn->connect_error);
          }

          $sql = "SELECT id_tipo_residuo, nome, imagem, descricao, toxico FROM TipoResiduo ORDER BY nome";
          ?>
        <div class="row g-1 mx-auto p-2">
          <div class="card ml-3 text-bg-light mx-auto rounded shadow-sm p-2 mb-5" style="max-width: 1000px; max-height: 250px;">
          <div class="card-body">
            <h5 class="card-title fs-2 text-secondary">Sobre</h5>
            <p class="card-text fs-5 text-secondary"> GreenPath é um aplicativo que ajuda os usuários a <br>
                                  localizar pontos de descarte de lixo correto de forma rápida e conveniente.<br>
                                  Estabelecimentos podem cadastrar, e fornecer informações sobre a<br>
                                  reciclagem de diferentes tipos de resíduos, promovendo práticasde descarte sustentáveis.</p>
          </div>
        </div>
        </div>
        <div class="container text-secondary">
            <h2>Descarte apropriado para cada tipo de resíduo</h2><br>
            <?php
    if ($result = mysqli_query($conn, $sql)) {
        echo "<div class='row row-cols-1 row-cols-md-3 g-4'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='col'>";
            echo "  <div class='card'>";
            echo "    <img src='" . ($row['imagem'] ? "data:image/png;base64," . base64_encode($row['imagem']) : "../../resources/ImagemS.png") . "' class='card-img-top' alt='...'>";
            echo "    <div class='card-body'>";
            echo "      <h5 class='card-title'>Descarte de " . $row['nome'] . "</h5>";
            echo "      <p class='card-text'>" . $row['descricao'] . "</p>";
            echo "      <a class='btn btn-secondary' href='locaisUser.php'>Ver Locais</a>";
            echo "    </div>";
            echo "  </div>";
            echo "</div>";
        }
        echo "</div>";
    }
    ?>
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
        <script type="text/javascript" src="../script/script.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>
</html> 