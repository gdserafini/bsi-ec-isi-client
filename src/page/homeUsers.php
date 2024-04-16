<!doctype html>
<html lang="en">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/styleHomeUsers.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chau+Philomene+One:ital@0;1&family=Overpass:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  </head>
  <body> 
  <?php
            session_start();
            if (isset($_SESSION['nome_tipo_user'])) {
                if ($_SESSION['nome_tipo_user'] == 'Administrador'){
                    $url = 'location: src/homeAdm.php';	             
                    header($url);            
                    exit();
                }else if ($_SESSION['nome_tipo_user'] == 'Usuário'){
                    $url = 'location: /src/homeUser.php';	 
                    header($url);                                     
                    exit();
                }
            }
        ?>
      <div class="header">
          <div class="logoNome">
            <a href="../../index.html"><img src="../../resources/logoNome-removebg-preview.png" class="logoNomeIndex"/></a>
          </div>
          <div>
          <button onclick="window.location.href='homeUsers.php'" class="botaoH">Home</button>
          <button onclick="window.location.href='sobre.php'" class="botaoH">Sobre</button>
          <button onclick="window.location.href='locais.php'" class="botaoH">Locais</button>
          <a href='editarConta.php'><img src='../../resources/perfilIcon.png' alt="Perfil" class="perfilIcon"></a>

          <img src="../../resources/perfilIcon.png" alt="Perfil" class="perfilIcon">
          </div>
        </div>
      <div>
        <h2 class="titulo">Bem-vindo ao<br>GreenPath</h2>
        <img src="../../resources/imgInicio.jpeg" class="imgInicio"/>
      </div>
        <div>
          <button type="submit" onclick="window.location.href='sobre.php'" class="botao">Sobre</button>
          <button type="submit" onclick="window.location.href='locais.php'" class="botao">Locais</button>
          <button type="submit" onclick="window.location.href='editarConta.php'" class="botao">Minha Conta</button>
        </div>
        <br>
        <div class="sobreHome">
          <h1 id="titSobre">Sobre</h1>
          <h5 id="txtSobre"> GreenPath é um aplicativo que ajuda <br>
                            os usuários a localizar pontos de <br>
                            descarte de lixo correto de forma<br>
                            rápida e conveniente.<br>
                            Estabelecimentos podem cadastrar, <br>
                            e fornecer informações sobre a <br>
                            reciclagem de diferentes tipos de<br>
                             resíduos, promovendo práticas <br>
                             de descarte sustentáveis.</h5> <br>
                <button type="button" onclick="irParaSobre()" class="btnHomeSobre">Saiba Mais</button>
        </div>
        <div class="locaisHome">
          <div class="containerLocais">
            <h1>Locais</h1>
              <button type="button" onclick="window.location.href='locais.php'" class="btnHomeLocais">Veja os locais disponíveis</button>
          </div>
          <br>
          <br>
          <br>
          <br>
          <br>
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
  <script src="../script/script.js"></script>
</body>
</html>
