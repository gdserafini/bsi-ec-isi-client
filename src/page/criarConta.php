<!doctype html>
<html lang="en">
    <head>
        <title>Criar Conta</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style/styleIndex.css">
        <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
    <body>
    <?php
    session_start();
    require '../database/connectDB.php';

				$conn = mysqli_connect($servername, $username, $password, $database);

				if (!$conn) {
					die("<strong> Falha de conexão: </strong>" . mysqli_connect_error());
				}
				$sqlTU = "SELECT id_tipo_usu, nome_tipo FROM TipoUsuario";
				
				$optionsUser = array();
				
				if ($result = mysqli_query($conn, $sqlTU)) {
					while ($row = mysqli_fetch_assoc($result)) {
                       array_push($optionsUser, "\t\t\t<option value='". $row["id_tipo_usu"]."'>".$row["nome_tipo"]."</option>\n");
					}
				}

				?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-2 mb-5 rounded border-bottom border-primary-subtle">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img src="../../resources/logoNome-removebg-preview.png" alt="GreenPath" width="171" height="50">
            </a>          
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
              </ul>
            </div>
          </div>
        </nav>
        <div class="card mb-3 mx-auto rounded shadow-sm p-2 mb-5" style="max-width: 800px;">
        <div class="row g-0">
            <div class="col-md-4 text-bg-secondary text-center rounded-start">
            <p><br><img src="../../resources/logo-removebg.png" class="img-fluid rounded-start" alt="logo" style="max-width: 100px;"></p>
            <p class="text-center fs-2 text">Já Possui uma Conta?</p>
            <p><button type="button" onclick="window.location.href='login.php'" class="btn btn-light text-info shadow-sm p-2 mb-5 rounded">Login</button></p>
        </div>
            <div class="col-md-8">
            <div class="card-body text-bg-light rounded-end">
                <h5 class="card-title">Criar Conta</h5>
                <br>
                <form id="form" action="criarContaDB.php" method="POST">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" minlength="3" id="nome" placeholder="Nome" 
                            class="form-control" title="Informe um nome válido. Minimo 3 digitos" required>                        
                            
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" id="email" placeholder="E-mail" pattern="^[\w.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" 
                            title="Informe um email válido" class="form-control" required>    
                            
                            <label for="cpf_cnpj" class="form-label">CPF/CNPJ</label>
                            <input type="text" name="cpf_cnpj" maxlength="18" id="cpf_cnpj" placeholder="CPF/CNPJ" 
                            pattern="^\d{3}\.?\d{3}\.?\d{3}-?\d{2}$|^\d{2}\.?\d{3}\.?\d{3}\/?[0-9]{4}-?\d{2}$" 
                            title="Deve estar no formato 00000000000 ou 000.000.000-00" class="form-control" required>
                            
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" name="telefone" maxlength="15" id="telefone" placeholder="Telefone" class="form-control" 
                            pattern="^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$" title="Deve estar no formato 00000000000 ou (00) 00000-0000" required>
                             
                            <label for="senha" class="form-label">Senha</label>
                            <div class="input-group">
                                <input type="password" name="senha" minlength="8" id="senha" placeholder="Senha" class="form-control" required>
                                <i class="fa fa-eye-slash toggle-password" onclick="togglePasswordVisibility('senha')"></i>
                            </div>

                            <label for="confirmaSenha" class="form-label">Confirmar senha</label>
                            <div class="input-group">
                                <input type="password" name="confirmaSenha" minlength="8" id="confirmaSenha" placeholder="Confirmar senha" class="form-control" required>
                                <i class="fa fa-eye-slash toggle-password" onclick="togglePasswordVisibility('confirmaSenha')"></i>
                            </div>

                            <br><label for="type" class="form-label"></label>
                            <input type="checkbox" name="use-term" id="use-term" checked required>  Aceito os termos de uso 
                            <div>
                            <br>  
                            <input type="button" value="Cancelar" class="btn btn-light text-info shadow-sm p-2 mb-5 rounded" onclick="window.location.href='homePage.php'">
                                <input  class="btn btn-light text-info shadow-sm p-2 mb-5 rounded" type="submit" value="Criar conta">
                            </div>
                    </form>
                </div>
            </div>
        </div>
            <script type="text/javascript" src="../script/script.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>
</html>