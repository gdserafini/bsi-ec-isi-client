<!doctype html>
<html lang="en">
  <head>
    <title>GreenPath</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
    <link rel="stylesheet" href="../style/styleIndex.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chau+Philomene+One:ital@0;1&family=Overpass:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php
            session_start();
            if (isset($_SESSION['nome_tipo_user'])) {
                if ($_SESSION['nome_tipo_user'] == 'Administrador'){
                    $url = 'location: homeAdm.php';	             
                    header($url);            
                    exit();
                }else if ($_SESSION['nome_tipo_user'] == 'Usuário'){
                    $url = 'location: homeUser.php';	 
                    header($url);                                     
                    exit();
                }
            }
        ?>
      <div class="header">
        <div class="logoNome">
          <a href="/"><img src="../../resources/logoNome-removebg-preview.png" class="logoNomeIndex"/></a>
        </div>
        <div>
          <button type="submit" onclick="window.location.href='login.php'" class="botaoH">Login</button>
          <button type="submit" onclick="window.location.href='criarConta.php'" class="botaoH">Criar Conta</button>          
        </div>
      </div>
      <div>
        <h2 class="titulo">Conheça o<br>GreenPath</h2>
        <img src="../../resources/imgInicio.jpeg" class="imgInicio"/>
      </div>
        <div>
          <button type="submit" onclick="window.location.href='sobreIndex.php'" class="botao">Sobre</button>
          <button type="submit" onclick="window.location.href='locaisIndex.php'" class="botao">Locais</button>
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
  <script src="./src/script/script.js"></script>
</body>
</html>
  