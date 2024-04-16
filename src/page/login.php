<!doctype html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../style/styleLogin.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Chau+Philomene+One:ital@0;1&family=Overpass:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>
    <body>
    <?php
        $msg        = "";
        $msg_header = "";
        if(isset($_SESSION['nao_autenticado'])){ 
            $msg        = $_SESSION['mensagem'];
            $msg_header = $_SESSION['mensagem_header'];
            $style      = "display:block";
        }else{
            unset($_SESSION['nao_autenticado']);
        }
        session_destroy(); 
        ?>
        <div class="header">
            <a href="../../index.html">
                <img src="../../resources/logoNome-removebg-preview.png" class="logoNome"/>
            </a>
            <div class="container0">
                <img src="../../resources/logo-removebg.png" class="logo"/>
                <div class="jpuc">
                    <h3>Não Possui uma Conta?</h3>
                    <button class="jpuc-btn" onclick="window.location.href='criarConta.php'">Criar Conta</button>
                </div>
                <div class="container1 p-3">
                    <h2 id="signup-title">Login</h2>
                    <div class="oauthImages">
                        <img src="../../resources/github_logo.png" alt="">
                        <img src="../../resources/google_logo.png" alt="">
                        <img src="../../resources/linkedin_logo.webp" alt="">
                    </div>
                    <form action="loginDB.php" method="POST">
                        Ou entre com seu e-mail:
                            <label for="nome" class="form-label"></label>
                            <input type="text" minlength="3" name="nome" id="nome" placeholder="Nome/Nome fantasia" 
                            class="form-control" title="Informe um nome válido. Minimo 3 digitos">                       
                            
                            <label for="email" class="form-label"></label>
                            <input type="email" name="email" required id="email" placeholder="E-mail" 
                            pattern="^[\w.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" 
                            title="Informe um email válido" class="form-control">                         
                             
                            <label for="senha" class="form-label"></label>
                            <input type="password" name="senha" minlength="8" id="senha" placeholder="Senha" 
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}"
                            title="Deve conter ao menos um número, uma letra maiúscula, uma letra minúscula, um caracter especial, e ter de 6 a 8 caracteres" class="form-control">
                            <br>
                            <br>
                            <div>
                                <input class="btn btn-light" type="submit" id="btndiv" value="Login">
                            </div>
                    </form>
                </div>
            </div>
            </div>
            <script src="../script/script.js"></script>
        </body>
</html>