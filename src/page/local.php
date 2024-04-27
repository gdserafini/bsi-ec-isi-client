<!doctype html>
<html lang="en">
    <head>
        <title>Locais de Descarte</title>
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
        
        <div class="card mb-3 mx-auto rounded shadow-sm p-2 mb-5" style="max-width: 800px;">
          <div class="row g-0">
            <div class="col-md-4 rounded-start">
              <img src="../../resources/pilhas.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body text-bg-light rounded-end">
                <h5 class="card-title">Descarte de Pilhas</h5>
                <p class="card-text">Rua xxxxxxxxxxx, n°YY<br>
                Localizado no Supermercado lalalala<br>
                Descarte de pilhas e baterias</p>
                <a href="https://maps.app.goo.gl/RNBqk3EotrCasKXe7" target="_blank">Ir até o Local</a>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript" src="../script/script.js"></script>
      </body>
</html> 