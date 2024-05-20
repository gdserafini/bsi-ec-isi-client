<!doctype html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script type="text/javascript">
        // Verifica se a mensagem de pop-up está configurada e exibe o alerta
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
        if (isset($_SESSION['popup_message'])): ?>
            alert("<?php echo $_SESSION['popup_message']; ?>");
            <?php unset($_SESSION['popup_message']); // Remove a mensagem após exibir o pop-up ?>
        <?php endif; ?>
    </script>
</head>
<body>
<?php
if (isset($_SESSION['id_tipo_usu'])) {                         
    if ($_SESSION['id_tipo_usu'] == 1){
        $url = 'location: /bsi-ec-isi-client/src/page/homeAdm.php';             
        header($url);                                       
        exit();
    } else if ($_SESSION['id_tipo_usu'] == 2){
        $url = 'location: /bsi-ec-isi-client/src/page/homeUser.php'; 
        header($url);                                          
        exit();
    }
}
$msg = "";
$msg_header = "";
if (isset($_SESSION['nao_autenticado'])) {
    $msg = $_SESSION['mensagem'];
    $msg_header = $_SESSION['mensagem_header'];
    $style = "display:block";
} else {
    unset($_SESSION['nao_autenticado']);
    $style = "display:none";
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
                  <a class="nav-link text-light fs-5 p-3" href="#" onclick="window.location.href='login.php'">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light fs-5 p-3" href="#" onclick="window.location.href='criarConta.php'">Criar Conta</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
<div class="card mb-3 mx-auto rounded shadow-sm p-2 mb-5" style="max-width: 800px;">
    <div class="row g-0">
        <div class="col-md-4 text-center rounded-start" style="background-color: #535A76;">
            <p><br><img src="../../resources/logo-removebg.png" class="img-fluid rounded-start" alt="logo" style="max-width: 100px;"></p>
            <p class="text-center text-light fs-2 text">Não Possui uma Conta?</p>
            <p><button type="button" onclick="window.location.href='criarConta.php'" class="btn btn-light shadow-sm p-2 mb-5 rounded" style="color: #535A76;">Criar Conta</button></p>
        </div>
        <div class="col-md-8">
            <div class="card-body text-bg-light rounded-end">
                <h5 class="card-title" style="color: #535A76;">Login</h5>
                <?php if ($msg): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $msg; ?>
                    </div>
                <?php endif; ?>
                <br>
                <form action="loginDB.php" method="POST">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" required id="email" placeholder="E-mail" 
                    pattern="^[\w.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" 
                    title="Informe um email válido" class="form-control">                         
                    <br>
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" minlength="8" id="senha" placeholder="Senha" 
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}"
                    title="Deve conter ao menos um número, uma letra maiúscula, uma letra minúscula, um caracter especial, e ter de 6 a 8 caracteres" class="form-control">
                    <br>
                    <br>
                    <div>
                        <input class="btn btn-light shadow-sm p-2 mb-5 rounded" style="color: #535A76;" type="submit" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../script/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
