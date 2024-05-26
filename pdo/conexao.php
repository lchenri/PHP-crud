<?php

try{

    // Conectando com o BD
    $conectar = new PDO("mysql:host=localhost;port=3306;dbname=pdo", "root", "");

} catch (PDOException $e) {

    echo 'falha ao conectar ao banco de dados: ' . $e->getMessage();
}
