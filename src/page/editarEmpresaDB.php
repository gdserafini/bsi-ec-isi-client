<!DOCTYPE html>
<html lang="en">
<head>
    <title>Editar Conta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style/styleIndex.css">
    <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php require '../database/connectDB.php'; ?>

<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_empresa      = $_POST['id_empresa'];
    $nome_fantasia   = $_POST['nome_fantasia'];   
    $setor           = $_POST['setor'];   
    $cnpj            = $_POST['cnpj']; 
    $telefone        = $_POST['telefone'];
    $bairro          = $_POST['bairro'];
    $razao_social    = $_POST['razao_social'];

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("<strong>Falha de conexão:</strong> " . $conn->connect_error);
    }

    if ($_FILES['avatar']['size'] == 0) {
        $sql = "UPDATE Empresa SET nome_fantasia = '$nome_fantasia', setor = '$setor', cnpj = '$cnpj', 
        telefone = '$telefone', bairro = '$bairro', razao_social = '$razao_social'
        WHERE id_empresa = $id_empresa";
    } else {
        $avatar = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
        $sql = "UPDATE Empresa SET nome_fantasia = '$nome_fantasia', setor = '$setor', cnpj = '$cnpj', 
        telefone = '$telefone', bairro = '$bairro', razao_social = '$razao_social', avatar = '$avatar'
        WHERE id_empresa = $id_empresa";
    }
    
    echo "<div class='container text-bg-light mx-auto rounded shadow-sm p-2 mb-5' style='max-width: 800px;'>";
    echo "<h2>Editar Empresa</h2>";
    if ($conn->query($sql) === TRUE) {
        echo "<p>&nbsp;Registro alterado com sucesso! </p>";
    } else {
        echo "<p>&nbsp;Erro executando UPDATE: " . $conn->error . "</p>";
    }
    echo "<button type='button' class='btn btn-secondary' onclick=\"window.location.href='listarEmpresas.php'\">Ok</button>";
    echo "</div>";

    $conn->close();
}
?>
</body>
</html>
