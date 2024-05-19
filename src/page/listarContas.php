<!doctype html>
<html lang="en">
<head>
    <title>Listagem de Contas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style/styleIndex.css">
    <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head> 
<body style="background-color: #EEEEEC;">
<?php require '../database/connectDB.php'; ?>
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
                  <a class="nav-link text-light fs-5 p-3" href="#" onclick="window.location.href='homeAdm.php'">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light fs-5 p-3" href="#" onclick="window.location.href='logout.php'">Logout</a>
                </li>
                <li class="nav-item d-flex align-items-center justify-content-between">
                    <a class="nav-link p-3" href="#" onclick="window.location.href='editarConta.php'">
                        <img src="../../resources/do-utilizador.png" alt="GreenPath" style="max-width: 35px;"></a>
                        <span class="navbar-text text-light">
                        <?php
                            if (session_status() === PHP_SESSION_NONE) {
                                session_start();
                              } 
                            if (isset($_SESSION['nome'])) {
                                echo "Olá, " . htmlspecialchars($_SESSION['nome']) . "!";
                            }
                        ?>
                        </span>
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

    $searchValue = '';
    if (!empty($_GET['search'])) {
        $searchValue = $_GET['search'];
        $sql = "SELECT id_usu, TU.nome_tipo, nome, email, telefone, cpf_cnpj, senha, avatar
                FROM Usuario AS U 
                INNER JOIN TipoUsuario AS TU ON U.fk_TipoUsuario_id = TU.id_tipo_usu 
                WHERE nome LIKE '%$searchValue%' OR email LIKE '%$searchValue%'
                ORDER BY nome";
    } else {
        $sql = "SELECT id_usu, TU.nome_tipo, nome, email, telefone, cpf_cnpj, senha, avatar
                FROM Usuario AS U 
                INNER JOIN TipoUsuario AS TU ON U.fk_TipoUsuario_id = TU.id_tipo_usu 
                ORDER BY nome";
    }

    echo "<div class='container text-bg-light rounded shadow-sm p-2 mb-5'>";
    echo "<form class='d-flex' role='search' onsubmit='event.preventDefault(); searchData();'>
              <input class='form-control me-2' id='search' type='search' placeholder='Search' aria-label='Search'>
              <button class='btn btn-outline-secondary' type='submit'>Search</button>
          </form><br>";

    if ($result = mysqli_query($conn, $sql)) {
        echo "<table class='table'>";
        echo "<tr>
                <th width='5%'>Código</th>
                <th width='10%'>Tipo</th>
                <th width='10%'>Nome</th>
                <th width='5%'>Avatar</th>
                <th width='10%'>E-mail</th>
                <th width='7%'>Telefone</th>
                <th width='7%'>CPF/CNPJ</th>
                <th width='7%'>Excluir</th>
              </tr>";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cod = $row["id_usu"];
                echo "<tr>";
                echo "<td>" . $cod . "</td>";
                echo "<td>" . $row["nome_tipo"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                if ($row['avatar']) {
                    echo "<td><img id='imagemSelecionada' class='rounded-circle' src='data:image/png;base64," . base64_encode($row['avatar']) . " style='max-width: 40px;' /></td>";
                } else {
                    echo "<td><img id='imagemSelecionada' class='rounded-circle' src='../../resources/do-utilizador.png' style='max-width: 40px;' /></td>";
                }
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["telefone"] . "</td>";
                echo "<td>" . $row["cpf_cnpj"] . "</td>";
                echo "<td><a class='btn btn-danger' href='excluirConta.php?id=" . $cod . "'>Excluir</a></td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "Erro executando SELECT: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../script/script.js"></script>
    <script>
        document.getElementById('search').addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                searchData();
            }
        });

        function searchData() {
            const search = document.getElementById('search').value;
            window.location.href = 'listarContas.php?search=' + search;
        }
    </script>
</body>
</html>
