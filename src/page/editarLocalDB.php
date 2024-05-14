<!DOCTYPE html>
<html lang="en">
<head>
    <title>Editar Local</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style/styleIndex.css">
    <link rel="icon" type="image/x-icon" href="../../resources/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php require '../database/connectDB.php'; ?>

<?php
$id_local_descarte = $_POST['id_local_descarte'];
$endereco = $_POST['endereco'];
$nome = $_POST['nome'];
$link = $_POST['link'];
$referencia = $_POST['referencia'];
$horario_abertura = $_POST['horario_abertura'];
$horario_fechamento = $_POST['horario_fechamento'];
$tipo = $_POST['tipo'];

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("<strong>Falha de conexão:</strong> " . $conn->connect_error);
}

if ($_FILES['imagem']['size'] == 0) {
    $sql = "UPDATE LocalDescarte SET nome = '$nome', link = '$link', endereco = '$endereco', referencia = '$referencia', 
    horario_abertura = '$horario_abertura', horario_fechamento = '$horario_fechamento', tipo = '$tipo'
    WHERE id_local_descarte = $id_local_descarte";
} else {
    $imagem = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));
    $sql = "UPDATE LocalDescarte SET nome = '$nome', link = '$link', endereco = '$endereco', referencia = '$referencia', 
    horario_abertura = '$horario_abertura', horario_fechamento = '$horario_fechamento', tipo = '$tipo', imagem = '$imagem'
    WHERE id_local_descarte = $id_local_descarte";
}

echo "<div class='container text-bg-light mx-auto rounded shadow-sm p-2 mb-5' style='max-width: 800px;'>";
echo "<h2>Local editado!</h2>";
if ($conn->query($sql)) {
    echo "<p>&nbsp;Registro alterado com sucesso!</p>";
} else {
    echo "<p>&nbsp;Erro executando UPDATE: " . $conn->error . "</p>";
}
?>
<button type="button" class="btn btn-secondary" onclick="window.location.href='locais.php'">Ok</button>
<?php
echo "</div>";
$conn->close();
?>
</body>
</html>
