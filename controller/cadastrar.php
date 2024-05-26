<?php
include_once "../config/conexao.php";

try {
    $nome = filter_var($_POST['nome']);
    $login = filter_var($_POST['login']);

    //prepara
    $update = $conectar->prepare("INSERT INTO login (nome, login) VALUES (:nome, :login)");

    //filtra e evita sqlInjection
    $update->bindParam(':nome', $nome);
    $update->bindParam(':login', $login);
    $update->execute();

    header("Location: ../index.php");

}catch (PDOException $e){
    echo 'Erro: ' . $e->getMessage();
}