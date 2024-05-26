<?php

require_once('../config/Conexao.php');
require_once('../model/Login.php');

use Model\Login;

try {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_UNSAFE_RAW);
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_EMAIL);


    $loginModel = new Login();
    $loginModel->create($nome, $login);

    header('Location: ../index.php');
}catch (PDOException $e){
    echo 'Erro no cadastro : ' . $e->getMessage();
}
