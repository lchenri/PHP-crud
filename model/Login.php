<?php

namespace Model;

use Config\Conexao;
use PDO;

class Login{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getAll(){
        $sql = $this->conexao->query("SELECT * FROM login");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id){
        $sql = $this->conexao->prepare("SELECT * FROM login WHERE id = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nome, $login){
        $sql = $this->conexao->prepare()
    }


}