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
<body style="background-color: #EEEEEC;">
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
            <div class="col-md-4 text-light text-center rounded-start" style="background-color: #535A76;">
            <p><br><img src="../../resources/logo-removebg.png" class="img-fluid rounded-start" alt="logo" style="max-width: 100px;"></p>
            <p class="text-center fs-2 text">Já Possui uma Conta?</p>
            <p><button type="button" onclick="window.location.href='login.php'" class="btn btn-light shadow-sm p-2 mb-5 rounded" style="color: #535A76;">Login</button></p>
        </div>
            <div class="col-md-8">
            <div class="card-body text-bg-light rounded-end" style="color: #535A76;">
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
                            title="Deve estar no formato 00000000000 ou 000.000.000-00" class="form-control" required
                            oninput="mascaraCPF(this)">
                            <script>
                              function mascaraCPF(campo) {
                                  const campoOriginal = campo.value;
                                  campo.value = campo.value.replace(/\D/g, '');
                                  if (campo.value.length <= 11) {
                                      campo.value = campo.value.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
                                  } else {
                                      campo.value = campo.value.replace(/\D/g, '');
                                      campo.value = campo.value.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
                                  }
                                  campo.setAttribute('cpf_cnpj', campoOriginal);
                              }
                            </script>

                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" name="telefone" maxlength="15" id="telefone" placeholder="Telefone" class="form-control" 
                            pattern="^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$" title="Deve estar no formato 00000000000 ou (00) 00000-0000" required
                            oninput="mascaraTelefone(this)">
                            <script>
                              function mascaraTelefone(campo) {
                                  const campoOriginal = campo.value;
                                  campo.value = campo.value.replace(/\D/g, '');
                                  campo.value = campo.value.replace(/^(\d{2})(\d)/g, '($1) $2');
                                  campo.value = campo.value.replace(/(\d{5})(\d)/, '$1-$2');
                                  campo.setAttribute('telefone', campoOriginal);
                                }
                            </script>
                             
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
                            <input type="button" value="Cancelar" class="btn btn-light shadow-sm p-2 mb-5 rounded" style="color: #535A76;"onclick="window.location.href='homePage.php'">
                              <input  class="btn btn-light shadow-sm p-2 mb-5 rounded" type="submit" style="color: #535A76;" value="Criar conta" onsubmit="reverteValores(this)">
                            </div>
                    </form>
                </div>
            </div>
        </div>
            <script type="text/javascript" src="../script/script.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>
</html>