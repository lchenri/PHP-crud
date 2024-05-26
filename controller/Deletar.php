<?php
require_once "../config/Conexao.php";
require_once "../model/Login.php";

use Model\Login;

try {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $loginModel = new Login();
    $loginModel->delete($id);

    header('Location: ../index.php');
}catch (PDOException $e) {
    echo 'Erro ao deletar: ' . $e->getMessage();
}
