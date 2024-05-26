<?php
include_once "config/conexao.php";

try {
    $consulta = $conectar->query("SELECT * FROM login");

    echo '<a href="view/formCadastro.php">Novo cadastro</a><br><br>
          <h1>Listagem de usuários</h1>';

    echo '<table border="1">
          <tr>
            <td>Nome</td>
            <td>Login</td>
            <td>Ações</td>
          </tr>';

    // Percorre BD e retorna os resultados
    while($row = $consulta->fetch(PDO::FETCH_ASSOC)){
        echo "
          <tr>
            <td>$row[nome]</td>
            <td>$row[login]</td>
            <td><a href='view/formEditar.php?id=$row[id]'>Editar</a> - <a href='controller/deletar.php?idsssw=$row[id]'>Excluir</a></td>
          </tr>
        ";
    }

    echo '</table>';

    echo $consulta->rowCount() . " total de registros";


}catch (PDOException $e ){
    echo "Erro ao consultar" . $e->getMessage();
}

?>