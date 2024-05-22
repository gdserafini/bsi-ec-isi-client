<!doctype html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style/styleIndex.css">
    <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #EEEEEC;">
<?php require '../database/connectDB.php';
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
}

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
?>
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
<div class="row g-1 mx-auto p-2">
    <div id="titulo" style="color: #535A76;" class="col-md-4 mx-auto text-center text-secondary">
        <br>
        <h1>Bem-vindo ao Greenpath</h1>
        <p class="text-center fs-5 text-secondary"> 
        GreenPath é uma plataforma que facilita aos usuários a localização rápida e conveniente de pontos de descarte de resíduos de forma correta. Estabelecimentos podem se cadastrar na plataforma e disponibilizar informações sobre a reciclagem de diversos tipos de materiais, incentivando práticas de descarte sustentáveis.</p>
        <button type="button" onclick="window.location.href='sobre.php'"
        class="btn btn-light m-3 shadow-sm p-2 mb-5 rounded" style="color: #535A76;">Saiba mais</button>
    </div>
    <div class="col-md-7">
        <img src="../../resources/imgHome.png" class="img-fluid" alt="Imagem Inicio" style="max-width: 650px;">
    </div>
</div>
<br><br>
<div class="container-fluid text-bg-secondary mx-auto text-center">
    <br>
    <h2>Veja os melhores lugares!</h2>
    <div class="row g-1 p-2">
        <div class="col-md-5 p-4 text-center">
            <img src="../../resources/mapa.png" class="img-fluid border border-light" alt="mapa" style="max-width: 350px;">
        </div>
        <div class="col-md-5 mx-auto">
            <br><br><br>
            <h5>Com o GreenPath, você tem acesso a uma ampla rede de locais disponíveis para o descarte correto de resíduos. Nossas empresas parceiras cadastram seus pontos de coleta na plataforma, oferecendo uma variedade de opções para você escolher o que mais se adequa às suas necessidades e conveniências. Assim, você pode selecionar o local mais próximo, ou o que melhor se encaixa em sua rota diária, garantindo um descarte sustentável e responsável.</h5>
            <br>
            <button type="button" onclick="window.location.href='locaisUser.php'"
            class="btn btn-light shadow-sm p-2 mb-5 rounded" style="color: #535A76;">Ver Locais</button>
        </div>
    </div>
    <br>
</div>
<br><br>
<?php
$searchValue = '';
if (!empty($_GET['search'])) {
    $searchValue = $_GET['search'];
    $sql = "SELECT id_empresa, nome_fantasia, avatar, bairro 
        FROM Empresa WHERE nome_fantasia LIKE '%$searchValue%' OR bairro LIKE '%$searchValue%'
        ORDER BY nome_fantasia";
} else {
    $sql = "SELECT id_empresa, nome_fantasia, avatar, bairro
    FROM Empresa ORDER BY nome_fantasia";
}
?>
<div class="container text-bg-light text-center rounded shadow-sm p-2 mb-5">
    <h2 style="color: #535A76;">Empresas</h2><br>
    <form class="d-flex" role="search" onsubmit='event.preventDefault(); searchData();'>
        <input class="form-control me-2" id="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
    </form><br>
    <?php
    if ($result = mysqli_query($conn, $sql)) {
        echo "<div class='row row-cols-1 row-cols-md-4 g-6'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='col'>";
            echo "  <div class='card'>";
            echo "    <img src='" . ($row['avatar'] ? "data:image/png;base64," . base64_encode($row['avatar']) : "../../resources/fotoIcon.jpg") . "' class='card-img-top' alt='...'>";
            echo "    <div class='card-body'>";
            echo "      <h5 style='color: #535A76;' class='card-title'>" . htmlspecialchars($row['nome_fantasia']) . "</h5>";
            echo "      <p style='color: #535A76;' class='card-text'>" . htmlspecialchars($row['bairro']) . "</p>";
            echo "      <a class='btn btn-light' style='color: #535A76;' href='locaisUser.php?id=" . htmlspecialchars($row['id_empresa']) . "'>Ver locais</a>";
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
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
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
            window.location.href = 'homeUsers.php?search=' + search;
        }
    </script>
</body>
</html>
