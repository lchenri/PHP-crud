<?php
require_once "config/Conexao.php";
require_once "model/Login.php";


use Model\Login;

try{
    $loginModel = new Login();
    $dados = $loginModel->getAll();

    echo '<a href="view/formCadastro.php">Novo cadastro</a><br><br>
          <h1>Listagem de usuários</h1>';

    echo '<table border="1">
          <tr>
            <td>Nome</td>
            <td>Login</td>
            <td>Ações</td>
          </tr>';

    foreach($dados as $row){
        echo "
          <tr>
            <td>" . htmlspecialchars($row['nome']) . "</td>
            <td>" . htmlspecialchars($row['login']) . "</td>
            <td>
              <a href='../view/formEditar.php?id=" . $row['id'] . "'>Editar</a> - <a href='../controller/Deletar.php?id=" . $row['id'] . "'>Excluir</a>
            </td>
          </tr>
        ";
    }

    echo '</table>';
    echo  "Total de registros: " . count($dados);
}catch (pdoException $e){
    echo "Erro ao consultar: " . $e->getMessage();
}

?>