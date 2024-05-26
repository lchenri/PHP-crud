<?php

namespace Config;

use PDO;
use PDOException;

class Conexao {
    private static $conectar = null;

    private function _construct()
    {

    }

    public static function getConexao(){
        if(self::$conectar === null){
            try {
                self::$conectar = new PDO("mysql:host=localhost;port=3306;dbname=pdo", "root", "");
                self::$conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e){
                die('Falha ao conectar ao BD'. $e->getMessage());
            }

        }
        return self::$conectar;
    }
}


/*(try{

    // Conectando com o BD
    $conectar = new PDO("mysql:host=localhost;port=3306;dbname=pdo", "root", "");

} catch (PDOException $e) {

    echo 'falha ao conectar ao banco de dados: ' . $e->getMessage();
}*/
