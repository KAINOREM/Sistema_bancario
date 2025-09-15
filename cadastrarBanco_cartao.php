<?php
session_start();
$hostname = "127.0.0.1";
$user = "root";
$password = "";
$database = "sistema_bancario";

$conexao = new mysqli($hostname, $user, $password, $database);

if ($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
} else {
    // Evita caracteres especiais (SQL Inject)
    $endereco = $conexao->real_escape_string($_POST['endereco']);
    $numero = $conexao->real_escape_string($_POST['numero']);
    $cliente = $conexao->real_escape_string($_POST['idCliente']);

    // Primeiro INSERT
    $sql = "INSERT INTO `sistema_bancario`.`cartao`
            (`idCliente`, `numero_cartao`, `endereco`)
            VALUES
            ('" . $cliente . "', '" . $numero . "', '" . $endereco . "')";

    if ($conexao->query($sql)) {
        // Recupera o ID do cartão recém-inserido
        $idCartao = $conexao->insert_id;
        
        // Atualiza o cliente com o ID do cartão
        $sqlUpdate = "UPDATE `sistema_bancario`.`cliente`
                     SET `idCartao` = '" . $idCartao . "'
                     WHERE `idCliente` = '" . $cliente . "'";
        
        if ($conexao->query($sqlUpdate)) {
            $conexao->close();
            header('Location: site.php');
            exit();
        } else {
            echo "Erro ao atualizar cliente: " . $conexao->error;
        }
    } else {
        echo "Erro ao inserir cartão: " . $conexao->error;
    }
}
?>