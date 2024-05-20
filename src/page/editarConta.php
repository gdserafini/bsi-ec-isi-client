<!doctype html>
<html lang="en">
    <head>
        <title>Editar Conta</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #EEEEEC;">
    <?php require '../database/connectDB.php'; ?>    <nav class="navbar navbar-expand-lg shadow p-2 mb-5" style="background-color: #535A76;">
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
    if (isset($_SESSION['id_usu'])){ 
    $id_usu = $_SESSION['id_usu'];

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("<strong> Falha de conexão: </strong>" . mysqli_connect_error());
    }

    $sql = "SELECT id_usu, fk_TipoUsuario_id, nome, email, telefone, cpf_cnpj, senha, avatar
            FROM Usuario WHERE id_usu = $id_usu";

    echo "<div class='container'>";
    if ($result = mysqli_query($conn, $sql)) {
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result); 
            $id_usu  = $row['id_usu'];
            $nome = $row['nome'];
            $email = $row['email'];
            $id_tipo_usu = $row['fk_TipoUsuario_id'];
            $cpf_cnpj = $row['cpf_cnpj'];
            $telefone = $row['telefone'];
            $senha = $row['senha'];
            $avatar = $row['avatar'];

            ?>
        <div class="card mb-3 mx-auto rounded shadow-sm p-2 mb-5" style="max-width: 800px;">
        <div class="row g-0">
            <div class="col-md-4 text-center rounded-start" style="background-color: #535A76;">
            <p><br><img src="../../resources/logo-removebg.png" class="img-fluid rounded-start" alt="logo" style="max-width: 100px;"></p>
            <p class="text-center text-light fs-2 text">Deseja Sair?</p>
            <p><button type="button" style="color: #535A76;" onclick="window.location.href='logout.php'" class="btn btn-light shadow-sm p-2 mb-5 rounded">Logout</button></p>
        </div>
            <div class="col-md-8">
            <div class="card-body text-bg-light rounded-end">
                    <form id="form" action="editarContaDB.php" method="POST" enctype="multipart/form-data">                    
                    <h2 id="signup-title" style="color: #535A76;">Editar Conta de <?php echo $nome; ?></h2>
                    <input type="hidden" id="id_usu" name="id_usu" value="<?php echo $id_usu; ?>">

                    <label for="nome" class="form-label"></label>
                    <input type="text" name="nome" minlength="3" id="nome" placeholder="Nome/Nome fantasia" 
                    class="form-control" title="Informe um nome válido. Minimo 3 digitos" value="<?php echo $nome; ?>"required>                        

                    <label for="email" class="form-label"></label>
                    <input type="email" name="email" id="email" placeholder="E-mail" pattern="^[\w.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" 
                    title="Informe um email válido" class="form-control" value="<?php echo $email; ?>"required>    
                    
                    <label for="cpf_cnpj" class="form-label"></label>
                    <input type="text" name="cpf_cnpj" maxlength="18" id="cpf_cnpj" placeholder="CPF/CNPJ" 
                    pattern="^\d{3}\.?\d{3}\.?\d{3}-?\d{2}$|^\d{2}\.?\d{3}\.?\d{3}\/?[0-9]{4}-?\d{2}$" 
                    title="Deve estar no formato 00000000000 ou 000.000.000-00" class="form-control" value="<?php echo $cpf_cnpj; ?>"required>
                    
                    <label for="telefone" class="form-label"></label>
                    <input type="text" name="telefone" maxlength="15" id="telefone" placeholder="Telefone" class="form-control" 
                    pattern="^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$" title="Deve estar no formato 00000000000 ou (00) 00000-0000" value="<?php echo $telefone; ?>"required>

                    <label for="senha"  class="form-label"></label>
                    <input type="password" name="senha" minlength="8" id="senha" 
                    placeholder="Nova senha" onchange="confirmaSenha()"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}" 
                    title="Deve conter ao menos um número, uma letra maiúscula, uma letra minúscula, um caracter especial, e 8 caracteres" class="form-control" required>

                    <label for="confirmaSenha" class="form-label"></label>
                    <input type="password" name="confirmaSenha" minlength="8" id="confirmaSenha" 
                    placeholder="Confirmar nova senha" 
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}" title="Deve conter ao menos um número, uma letra maiúscula, uma letra minúscula, um caracter especial, e  8 caracteres" 
                    onkeyup="confirmaSenha()"
                    class="form-control" required>
<br>
                    <div class="mb-3">
                    <td>
                            <?php
                            if ($avatar) {?>
                                <p style="text-align:center">
                                    <img id="imagemSelecionada" class="rounded-circle" style="max-width: 40px;" src="data:image/png;base64,<?= base64_encode($avatar) ; ?>" />
                                </p> 
                                <?php
                            } else {
                                ?>
                                <p style="text-align:center">
                                    <img id="imagemSelecionada" class="rounded-circle" src="../../resources/do-utilizador.png" style="max-width: 40px;" />
                                </p>
                                <?php
                            }
                            ?>
                            <p>
							<label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />
                            <input type="file" id="avatar" name="avatar" onchange="validaImagem(this);" /></label>
                            </p>
                        </td>

                    <div>
                    <input class="btn btn-light shadow-sm p-2 mb-5 rounded" type="submit" style="color: #535A76;" value="Alterar">
                    <input class="btn btn-light shadow-sm p-2 mb-5 rounded" type="button" style="color: #535A76;" value="Cancelar" onclick="window.location.href='homeUsers.php'">
                    </div>
                </form>
            <?php
        } else {
            ?>
            <div class="container">
                <h2>Conta inexistente</h2>
                </div>
						<br>
					<?php
					}
				} else {
					echo "<p style='text-align:center'>Erro executando UPDATE: " . $conn-> error . "</p>";
				}
				echo "</div>";
				$conn->close();
        }
				?>
</div>
</p>
</div>
<script type="text/javascript" src="../script/script.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>
</html>
