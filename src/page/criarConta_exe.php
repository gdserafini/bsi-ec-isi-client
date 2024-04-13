<?php 

session_start(); 
require 'bd/conectaBD.php';

$conn = new mysqli($servername, $username, $password, $database);

$nome    = $conn->real_escape_string($_POST['nome']); // prepara a string recebida para ser utilizada em comando SQL
$email   = $conn->real_escape_string($_POST['email']); // prepara a string recebida para ser utilizada em comando SQL
$cpf =  $conn->real_escape_string($_POST['cpf']); // prepara a string recebida para ser utilizada em comando SQL
$telefone = $conn->real_escape_string($_POST['telefone']); // prepara a string recebida para ser utilizada em comando SQL
$senha   = $conn->real_escape_string($_POST['Senha']); // prepara a string recebida para ser utilizada em comando SQL



$sql = "INSERT INTO Usuario (fk_TipoUsuario_id ,Nome, Telefone, email, cpf, Senha) VALUES (3,'$nome','$telefone', '$cpf', '$email',md5('$senha'))"; //usuario padrao



if ($result = $conn->query($sql)) {
    $msg = "Cadastro realizado.";
    $_SESSION['nao_autenticado'] = true;
    $_SESSION['mensagem_header'] = "Cadastro";
    $_SESSION['mensagem']        = $msg;
    header('location: /homeUsers.html');
    exit();

} else {
    $msg = "Erro executando INSERT: " . $conn->error . " Tente novo cadastro.";
    $_SESSION['nao_autenticado'] = true;
    $_SESSION['mensagem_header'] = "Cadastro";
    $_SESSION['mensagem']        = $msg;
    header('location: /criarConta.html'); 

    exit();
}


$conn->close();  //Encerra conexao com o BD


?>