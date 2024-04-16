<!doctype html>
<html lang="en">
  <head>
    <title>Local</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/styleLocal.css">
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
          <button type="submit" onclick="window.location.href='homeUsers.php'" class="botaoH">Home</button>
          <button type="submit" onclick="window.location.href='sobre.php'" class="botaoH">Sobre</button>
          <button type="submit" onclick="window.location.href='locais.php'" class="botaoH">Locais</button>          
          <a href='editarConta.php'><img src='../../resources/perfilIcon.png' alt="Perfil" class="perfilIcon"></a>
        </div>
        
        <div class="containerLocal">
            <div><h2 id="titLocal">Descarte de Pilhas</h2>
            <h5>Rua xxxxxxxxxxx, n°YY<br>
                Localizado no Supermercado lalalala<br>
                Descarte de pilhas e baterias</h5>
                <a href="https://maps.app.goo.gl/RNBqk3EotrCasKXe7" target="_blank">Ir até o Local</a>

                <div>
                    <img src="../../resources/pilhas.jpg" alt="" class="imgPilhas">
                </div>
            </div>
        </div>
        <script src="../script/script.js"></script>
      </body>
</html> 