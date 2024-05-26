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
        $sql = $this->conexao->prepare("INSERT INTO login (nome, login) VALUES (:nome, :login)");
        $sql->bindParam(':nome', $nome, PDO::PARAM_STR);
        $sql->bindParam(':login', $login, PDO::PARAM_STR);
        $sql->execute();
    }

    public function update($id, $nome, $login){
        $sql = $this->conexao->prepare("UPDATE login SET nome = :nome, login = :login WHERE id = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->bindParam(':nome', $nome, PDO::PARAM_STR);
        $sql->bindParam(':login', $login, PDO::PARAM_STR);
        $sql->execute();
    }

    public function delete($id){
        $sql = $this->conexao->prepare("DELETE FROM login WHERE id = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
    }


}