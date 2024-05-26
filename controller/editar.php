<?php
include_once "../pdo/conexao.php";

try {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_var($_POST['nome']);
    $login = filter_var($_POST['login']);

    //prepara
    $update = $conectar->prepare("UPDATE login SET nome = :nome, login = :login WHERE id = :id");

    //filtra e evita sqlInjection
    $update->bindParam(':id', $id);
    $update->bindParam(':nome', $nome);
    $update->bindParam(':login', $login);
    $update->execute();

    header("Location: ../index.php");

}catch (PDOException $e){
    echo 'Erro: ' . $e->getMessage();
}