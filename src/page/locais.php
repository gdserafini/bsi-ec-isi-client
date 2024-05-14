<!doctype html>
<html lang="en">
    <head>
        <title>Listagem de Locais</title>
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
                  <a class="nav-link text-secondary fs-5 p-3" href="#" onclick="window.location.href='homeAdm.php'">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-secondary fs-5 p-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Usuários</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" onclick="window.location.href='listarContas.php'">Usuários Cadastrados</a></li>
                    <li><a class="dropdown-item" href="#" onclick="window.location.href='listarContas.php'">Cadastrar Usuário</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-secondary fs-5 p-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Locais</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" onclick="window.location.href='listarContas.php'">Locais Cadastrados</a></li>
                    <li><a class="dropdown-item" href="#" onclick="window.location.href='listarContas.php'">Cadastrar Local</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-secondary fs-5 p-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Empresas</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" onclick="window.location.href='listarContas.php'">Empresas Cadastradas</a></li>
                    <li><a class="dropdown-item" href="#" onclick="window.location.href='listarContas.php'">Cadastrar Empresa</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-secondary fs-5 p-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Resíduos</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" onclick="window.location.href='listarContas.php'">Resíduos Cadastrados</a></li>
                    <li><a class="dropdown-item" href="#" onclick="window.location.href='listarContas.php'">Cadastrar Resíduo</a></li>
                  </ul>
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
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
      }
      ?>
<?php
            $sql = "SELECT id_local_descarte, nome, imagem, endereco, referencia, horario_abertura, horario_fechamento, tipo
            FROM LocalDescarte ORDER BY nome";
            echo "<div class='container text-bg-light rounded shadow-sm p-2 mb-5'>";
            echo "<form class='d-flex' role='search'>
              <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
              <button class='btn btn-outline-info' type='submit'>Search</button>
            </form><br>";
            if ($result = mysqli_query($conn, $sql)) {
                echo "<table class='table'>";
                echo "	<tr>";
                echo "	  <th width='5%'>Código</th>";
                echo "	  <th width='7%'>Nome</th>";
                echo "	  <th width='7%'>Imagem</th>";
                echo "	  <th width='7%'>Endereço</th>";
                echo "	  <th width='5%'>Referência</th>";
                echo "	  <th width='7%'>Abertura</th>";
                echo "	  <th width='7%'>Fechamento</th>";
                echo "	  <th width='7%'>Tipo</th>";
                echo "	  <th width='7%'>Editar</th>";
                echo "	  <th width='7%'>Excluir</th>";

                echo "	</tr>";
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cod = $row["id_local_descarte"];
                        echo "<tr>";
                        echo "<td>";
                        echo $cod;
                        echo "</td><td>";
                        echo $row["nome"];
                        if ($row['imagem']) {?>
                          <td>
                              <img id="imagemSelecionada" class="rounded-circle" src="data:image/png;base64,<?= base64_encode($row['imagem']) ?>" />
                          </td><td>
                          <?php
                      } else {
                          ?>
                          <td>
                              <img id="imagemSelecionada" class="rounded-circle" src="../../resources/ImagemS.png" />
                          </td><td>
                          <?php 
                      }
                        echo $row["endereco"];
                        echo "</td><td>";
                        echo $row["referencia"];
                        echo "</td><td>";
                        echo $row["horario_abertura"];
                        echo "</td><td>";
                        echo $row["horario_fechamento"];
                        echo "</td><td>";
                        echo $row["tipo"];
                        echo "</td><td>";
        ?>      
                        <a class="btn btn-secondary" href='editarLocal.php?id=<?php echo $cod; ?>'>Editar</a>
                        </td><td>
                        <a class="btn btn-danger" href='excluirLocal.php?id=<?php echo $cod; ?>'>Excluir</a>
                        </td>
                        </tr>
        <?php
                    }
                }
                    echo "</table>";
                    echo "</div>";
            } else {
                echo "Erro executando SELECT: " . mysqli_error($conn);
            }

            mysqli_close($conn);

        ?>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../script/script.js"></script>
</body>
</html>
