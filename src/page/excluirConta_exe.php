<?php 


// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database);


$id = $_GET['id']; //Obtém a PK do médico que será excluído

// Faz Select na Base de Dados
$sql = "SELECT id_Usuario, nome, cpf, Avatar, WHERE id_Usuario = $id;";

// Verifica conexão
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Faz DELETE na Base de Dados
$sql = "DELETE FROM Usuario WHERE id_Usuario = $id";

echo "<div class='w3-responsive w3-card-4'>";
if ($result = mysqli_query($conn, $sql)) {
    echo "<p>&nbsp;Registro excluído com sucesso! </p>";
} else {
    echo "<p>&nbsp;Erro executando DELETE: " . $conn -> error. "</p>";
}
echo "</div>";
mysqli_close($conn);  //Encerra conexao com o BD





?>


