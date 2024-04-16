<!doctype html>
<html lang="en">
  <head>
    <title>Administrador</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/styleHomeAdm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chau+Philomene+One:ital@0;1&family=Overpass:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  </head>
  <body>
      <div class="header">
        <div class="logoNome">
          <a><img src="../../resources/logoNome-removebg-preview.png" class="logoNomeIndex"/></a>
        </div>
        <div>
          <button type="submit" onclick="window.location.href='listarContas.php'" class="botaoH">Usuários</button>
          <button type="submit" onclick="window.location.href='listarLocais.php'" class="botaoH">Locais</button>          
          <a href='editarConta.php'><img src='../../resources/perfilIcon.png' alt="Perfil" class="perfilIcon"></a>
        </div>
        </div>
        
        <div class="card" id="cardUsuario" style="width: 20rem;">
            <div class="card-body">
              <h5 class="card-title">Usuários</h5>
              <p class="card-text">Relação de usuários cadastrados.</p>
              <a href="#" id="btnUsuario" class="btn btn-primary" onclick="window.location.href='listarContas.php'" >Ver usuários</a>
            </div>
        </div>
        <div class="card" id="cardLocal" style="width: 20rem;">
        <div class="card-body">
            <h5 class="card-title">Locais</h5>
            <p class="card-text">Relação de locais cadastrados.</p>
            <a href="#" id="btnLocal" class="btn btn-primary">Ver locais</a>
        </div>
        </div>
        <div class="card" id="cardEmpresa" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title">Empresas</h5>
                <p class="card-text">Relação de empresas cadastradas.</p>
                <a href="#" id="btnEmpresa" class="btn btn-primary">Ver empresas</a>
            </div>
        </div>
        <div class="card" id="cardResiduo" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title">Residuos</h5>
                <p class="card-text">Relação de residuos cadastrados.</p>
                <a href="#" id="btnResiduo" class="btn btn-primary">Ver residuos</a>
            </div>
        </div>      
      <script src="../script/script.js"></script>
  </body>
</html> 