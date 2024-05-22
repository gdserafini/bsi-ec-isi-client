<!DOCTYPE html>
<html lang="en">
<head>
    <title>Locais de Descarte</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                  <a class="nav-link text-light fs-5 p-3" href="#" onclick="window.location.href='homeUsers.php'">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light fs-5 p-3" href="#" onclick="window.location.href='sobre.php'">Sobre</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light fs-5 p-3" href="#" onclick="window.location.href='locaisUser.php'">Locais</a>
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
    die("<strong>Falha de conexão:</strong> " . $conn->connect_error);
}

$searchValue = '';
if (!empty($_GET['search'])) {
    $searchValue = $_GET['search'];
    $sql = "SELECT id_local_descarte, link, nome, imagem, endereco, referencia, horario_abertura, horario_fechamento, tipo, fk_Empresa_id, nome_fantasia
    FROM LocalDescarte AS LD INNER JOIN Empresa AS E ON (LD.fk_Empresa_id = E.id_empresa)
            WHERE nome LIKE '%$searchValue%' OR endereco LIKE '%$searchValue%' OR referencia LIKE '%$searchValue%' OR tipo LIKE '%$searchValue%' OR nome_fantasia LIKE '%$searchValue%' 
            ORDER BY nome";
} else {
    $sql = "SELECT id_local_descarte, link, nome, imagem, endereco, referencia, horario_abertura, horario_fechamento, tipo, fk_Empresa_id, nome_fantasia
    FROM LocalDescarte AS LD INNER JOIN Empresa AS E ON (LD.fk_Empresa_id = E.id_empresa)
    ORDER BY nome";
}
?>
<div class="container text-secondary">
    <h2>Locais de descarte</h2><br>
<div class="container text-bg-light rounded shadow-sm p-2 mb-5">
    <form class="d-flex" role="search" onsubmit='event.preventDefault(); searchData();'>
        <input class="form-control me-2" id="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
    </form><br>

    <?php
    if ($result = mysqli_query($conn, $sql)) {
        echo "<div class='row row-cols-1 row-cols-md-3 g-4'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='col'>";
            echo "  <div class='card'>";
            echo "    <img src='" . ($row['imagem'] ? "data:image/png;base64," . base64_encode($row['imagem']) : "../../resources/fotoIcon.jpg") . "' class='card-img-top' alt='...'>";
            echo "    <div class='card-body'>";
            echo "      <h5 style='color: #535A76;' class='card-title'>" . $row['nome'] . "</h5>";
            echo "       <p style='color: #535A76;' class='card-text'>" . "Endereço: " . $row['endereco'] ."<br>Empresa: " . $row['nome_fantasia'] . "<br> Referência: " .  $row['referencia'] . "<br> Horário: " . $row['horario_abertura'] . " - " . $row['horario_fechamento'] . "<br>Tipo de resíduo: " . $row['tipo'] . "</p>";
            echo "      <a class='btn btn-light' style='color: #535A76;'  href='" . $row['link'] . "' target='_blank'>Ir até o Local</a>";
            echo "    </div>";
            echo "  </div>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p>Nenhum local de descarte encontrado.</p>";
    }

    mysqli_close($conn);
    ?>
</div>
</div>

    <footer>
    <div class="footer-section">
            <h3>Este Site</h3>
            <ul>
                <li><a href="#" onclick="window.location.href='locaisUser.php'">Locais</a></li>
                <li><a href="#" onclick="window.location.href='cadLocal.php'">Cadastre Seu Local</a></li>
                <li><a href="#">Ajuda e Suporte</a></li>
                <li><a href="#">Preferências</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Outros Sites Green</h3>
            <ul>
                <li><a href="#" onclick="window.location.href='sobre.php'">Sobre a GreenPath</a></li>
                <li><a href="#">Soluções para descarte</a></li>
                <li><a href="#">Trabalhe conosco</a></li>
                <li><a href="#">GreenInsight</a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <a href="#" onclick="window.location.href='homeUsers.php'">Página Inicial</a> | 
            <a href="#">Benefícios</a> | 
            <a href="#">Termos de Serviço</a> | 
            <a href="#">Privacidade</a> | 
            <a href="#">Configuração de Cookies</a>
            <p style="margin-left: 10px;">Copyright ©2024 GreenPath Inc. Todos Direitos Reservados.</p>
        </div>
    <script type="text/javascript" src="../script/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.getElementById('search').addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                searchData();
            }
        });

        function searchData() {
            const search = document.getElementById('search').value;
            window.location.href = 'locaisUser.php?search=' + search;
        }
    </script>
</div>
</body>
</html>
