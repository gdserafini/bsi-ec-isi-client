<!doctype html>
<html lang="en">
  <head>
    <title>Listagem de Contas</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/styleListarContas.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chau+Philomene+One:ital@0;1&family=Overpass:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  </head>
<body>
<?php require '../database/connectDB.php'; ?>

  <div class="header">
    <div class="logoNome">
      <a><img src="../../resources/logoNome-removebg-preview.png" class="logoNomeIndex"/></a>
    </div>
    <div>
      <button type="submit" onclick="window.location.href='listarContas.php'" class="botaoH">Usuários</button>
      <button type="submit" onclick="window.location.href='locais.php'" class="botaoH">Locais</button>          
      <a href='editarConta.php'><img src='../../resources/perfilIcon.png' alt="Perfil" class="perfilIcon"></a>
    </div>
    </div>
    <?php

      $conn = new mysqli($servername, $username, $password, $database);

      if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
      }
      ?>

      <div id="titLC" class="container">
			  <h2>Listagem de Contas</h2>
			</div>
<?php
            $sql = "SELECT U.id, nome_tipo, nome, email, telefone, cpf_cnpj, senha, avatar
            FROM Usuario AS U INNER JOIN TipoUsuario AS TU ON (U.fk_TipoUsuario_id = TU.id) 
            ORDER BY nome";
            echo "<div id='ctable' class='container'>";
            if ($result = mysqli_query($conn, $sql)) {
                echo "<table class='table'>";
                echo "	<tr>";
                echo "	  <th width='10%'>Código</th>";
                echo "	  <th width='10%'>Tipo</th>";
                echo "	  <th width='10%'>Nome</th>";
                echo "	  <th width='10%'>Avatar</th>";
                echo "	  <th width='10%'>E-mail</th>";
                echo "	  <th width='10%'>Telefone</th>";
                echo "	  <th width='10%'>CPF/CNPJ</th>";
                echo "	  <th width='10%'>Senha</th>";
                echo "	  <th width='10%'>Editar</th>";
                echo "	  <th width='10%'>Excluir</th>";
                echo "	</tr>";
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cod = $row["id"];
                        echo "<tr>";
                        echo "<td>";
                        echo $cod;
                        echo "</td><td>";
                        echo $row["nome_tipo"];
                        echo "</td><td>";
                        echo $row["nome"];
                        if ($row['avatar']) {?>
                            <td>
                                <img id="imagemSelecionada" class="rounded-circle" src="data:image/png;base64,<?= base64_encode($row['avatar']) ?>" />
                            </td><td>
                            <?php
                        } else {
                            ?>
                            <td>
                                <img id="imagemSelecionada" class="rounded-circle" src="../../resources/perfilIcon.png" />
                            </td><td>
                            <?php
                        }
                        echo $row["email"];
                        echo "</td><td>";
                        echo $row["telefone"];
                        echo "</td><td>";
                        echo $row["cpf_cnpj"];
                        echo "</td><td>";
                        echo $senhaMd5;
                        echo "</td><td>";
        ?>              <td>       
                        <button onclick="window.location.href='editarConta.php'">Editar</button>
                        </td><td>
                        <button onclick="window.location.href='excluirConta.php?id=<?php echo $cod; ?>'">Excluir</button>
                        </td>
                        </tr>
        <?php
                    }
                }
                    echo "</table>";
                    echo "</div>";
            } else {
                echo "Erro executando SELECT: " . mysqli_error($conn);
            }

            mysqli_close($conn);

        ?>
    </div>
</div>
<script type="text/javascript" src="../script/script.js"></script>
</body>
</html>