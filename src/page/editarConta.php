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
        <div class="header">
            <div>
                <a href="../../index.php">
                    <img src="../../resources/logoNome-removebg-preview.png" class="logoNome"/>
                </a>
            </div>
            <div class="container0">
                <td>
                    <?php
                    if ($avatar) {?>
                        <p style="text-align:center">
                            <img id="imagemSelecionada" class="rounded-circle" src="data:image/png;base64,<?= base64_encode($avatar); ?>" />
                        </p> 
                        <?php
                    } else {
                        ?>
                        <p style="text-align:center">
                            <img id="imagemSelecionada" class="rounded-circle" src="../../resources/perfilIconS.png" />
                        </p>
                        <?php
                    }
                    ?>

                    <input type="hidden" id="file" name="MAX_FILE_SIZE" value="16777215" />
                    <input type="file" id="avatar" name="avatar" accept="imagem/*" onchange="validaImagem(this);" /></label>
                    </p>
                    </td>
                </tr>
                <tr>
                </div>
                <div class="container1 p-3">
                    <h2 id="signup-title">Editar Conta</h2>
                    <form id="form" action="editarContaDB.php" method="POST">
                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">

                            <label for="nome" class="form-label"></label>
                            <input type="text" name="nome" minlength="3" id="nome" placeholder="Nome/Nome fantasia" 
                            class="form-control" title="Informe um nome válido. Minimo 3 digitos" required>                        
                            
                            <label for="email" class="form-label"></label>
                            <input type="email" name="email" id="email" placeholder="E-mail" pattern="^[\w.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" 
                            title="Informe um email válido" class="form-control" required>    
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label"></label>
                                        <select name="tipo_usuario" id="tipo_usuario" placeholder="Tipo de usuário" required>
                                            <option value=""></option>
                                        <?php
                                            foreach($optionsUser as $key => $value){
                                                echo $value;
                                            }
                                        ?>
                                        </select>
                                </div>
                                <div class="col-md-8">
                                    <label for="cpf" class="form-label"></label>
                                    <input type="text" name="cpf" maxlength="18" id="cpf" placeholder="CPF/CNPJ" 
                                    pattern="^\d{3}\.?\d{3}\.?\d{3}-?\d{2}$|^\d{2}\.?\d{3}\.?\d{3}\/?[0-9]{4}-?\d{2}$" 
                                    title="Deve estar no formato 00000000000 ou 000.000.000-00" class="form-control" required>
                                </div>
                            </div>
                            <label for="telefone" class="form-label"></label>
                            <input type="text" name="telefone" maxlength="15" id="telefone" placeholder="Telefone" class="form-control" 
                            pattern="^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$" title="Deve estar no formato 00000000000 ou (00) 00000-0000" required>
                             
                            <label for="senha"  class="form-label"></label>
                            <input type="password" name="senha" minlength="8" id="senha" 
                            placeholder="Nova senha" onchange="confirmaSenha()"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}" 
                            title="Deve conter ao menos um número, uma letra maiúscula, uma letra minúscula, um caracter especial, e ter de 6 a 8 caracteres" class="form-control" required>

                            <label for="confirmaSenha" class="form-label"></label>
                            <input type="password" name="confirmaSenha" minlength="8" id="confirmaSenha" 
                            placeholder="Confirmar nova senha" 
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}" title="Deve conter ao menos um número, uma letra maiúscula, uma letra minúscula, um caracter especial, e ter de 6 a 8 caracteres" 
                            onkeyup="confirmaSenha()"
                            class="form-control" required>

                            <div>
                                <input class="btn btn-light" type="submit" id="btnAlt" value="Alterar">
                                <input class="btn btn-light" type="button" id="btnCan" value="Cancelar" onclick="window.location.href='homeUsers.php'">
                            </div>
                    </form>
                </div>
            </div>
            </div>
            <script src="../script/script.js"></script>
        </body>
</html> 