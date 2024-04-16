<!doctype html>
<html lang="en">
  <head>
    <title>Pesquisar Locais</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/styleLocais.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chau+Philomene+One:ital@0;1&family=Overpass:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  </head>
  <body>
      <div class="header">
        <div class="logoNome">
          <a href="../../index.html"><img src="../../resources/logoNome-removebg-preview.png" class="logoNomeIndex"/></a>
        </div>
        <div>
            <button type="submit" onclick="window.location.href='login.php'" class="botaoH">Login</button>
            <button type="submit" onclick="window.location.href='criarConta.php'" class="botaoH">Criar Conta</button>          
          </div>
        <div class="containerLocais">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Locais" aria-label="Search">
                <button class="btn btn-outline-info" type="submit">Pesquisar</button>
              </form>
              <div class="resultadoLocais">
                <h5>Resultados</h5>
                <br>
                <button type="button" class="btn">ExemploA - Rua XXX, Descarte de Y</button>
                <br>
                <button type="button" class="btn">ExemploB - Rua YYY, Descarte de X</button>
              </div>
          </div>
          <script src="../script/script.js"></script>
        </body>
</html>