<?php
include_once "../pdo/conexao.php";

try {
    $nome = filter_var($_POST['nome']);
    $login = filter_var($_POST['login']);

    //prepara
    $create = $conectar->prepare("INSERT INTO login (nome, login) VALUES (:nome, :login)");

    //filtra e evita sqlInjection
    $create->bindParam(':nome', $nome);
    $create->bindParam(':login', $login);
    $create->execute();

    header("Location: ../index.php");

}catch (PDOException $e){
    echo 'Erro: ' . $e->getMessage();
}