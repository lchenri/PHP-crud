<?php

require_once "../config/Conexao.php";
require_once "../model/Login.php";

use Model\Login;

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$loginModel = new Login();
$row = $loginModel->getById($id);
?>

<form action="../controller/Editar.php" method="post">
    <span>Nome</span>
    <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($row['nome']);?>" required>
    <span>Login</span>
    <input type="text" name="login" id="login" value="<?php echo htmlspecialchars($row['login']);?>" required>
    <input type="hidden" name="id" value="<?php echo $row['id']?>">
    <input type="submit" value="Editar">
</form>