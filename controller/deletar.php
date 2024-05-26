<?php
include_once "../pdo/conexao.php";

try {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //prepara
    $delete = $conectar->prepare("DELETE FROM login WHERE id = :id");
    //filtra e evita sqlInjection
    $delete->bindParam(':id', $id);

    $delete->execute();

    header("Location: ../index.php");

}catch (PDOException $e){
    echo 'Erro: ' . $e->getMessage();
}