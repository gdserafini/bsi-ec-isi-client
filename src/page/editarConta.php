<!doctype html>
<html lang="en">
<head>
    <title>Editar Conta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/styleEditarConta.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chau+Philomene+One:ital@0;1&family=Overpass:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
<?php 

require '../database/connectDB.php';
		

    $id_usu = $_GET['id'];

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("<strong> Falha de conexão: </strong>" . mysqli_connect_error());
    }

    $sql = "SELECT id_usu, fk_TipoUsuario_id, nome, email, telefone, cpf_cnpj, senha, avatar
            FROM Usuario WHERE id_usu = $id_usu";

    echo "<div class='container'>";
    if ($result = $conn->query($sql)) {
        if ($result->num_rows == 1) {
            $row        = $result->fetch_assoc(); 
            $id_usu  = $row['id_usu'];
            $nome = $row['nome'];
            $email = $row['email'];
            $id_tipo_usu = $row['fk_TipoUsuario_id'];
            $cpf_cnpj = $row['cpf_cnpj'];
            $telefone = $row['telefone'];
            $senha = $row['senha'];
            $avatar = $row['avatar'];

            ?>
            <div class="header">
                <div>
                    <a href="../../index.php">
                        <img src="../../resources/logoNome-removebg-preview.png" class="logoNome"/>
                    </a>
                </div>
                <div class="container0">
                    <form id="form" action="editarContaDB.php" method="POST">                    
                        <h2 id="signup-title">Editar Conta <?php echo $nome; ?></h2>
                        <img src="../../resources/logo-removebg.png" class="logo"/>
                </div>
                <div class="container1 p-3">
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
                                    <img id="imagemSelecionada" class="rounded-circle" src="data:image/png;base64,<?= base64_encode($avatar) ; ?>" />
                                </p> 
                                <?php
                            } else {
                                ?>
                                <p style="text-align:center">
                                    <img id="imagemSelecionada" class="rounded-circle" src="../../resources/perfilIconListar.png" />
                                </p>
                                <?php
                            }
                            ?>
                            <p>
							<label>
                            <input type="hidden" id="file" name="MAX_FILE_SIZE" value="16777215" />
                            <input type="file" id="avatar" name="avatar" accept="imagem/*" onchange="validaImagem(this);" /></label>
                            </p>
                        </td>

                    <div>
                        <input class="btn btn-light" type="submit" id="btnAlt" value="Alterar">
                        <input class="btn btn-light" type="button" id="btnCan" value="Cancelar" onclick="window.location.href='listarContas.php'">
                        <input class="btn btn-light" type="button" id="btnLogout" value="Logout" onclick="window.location.href='logout.php'">
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

				?>
</div>
</p>
</div>
<script type="text/javascript" src="../script/script.js"></script>
</body>
</html>

