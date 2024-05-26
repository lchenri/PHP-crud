<?php

include_once "../pdo/conexao.php";

$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$consulta = $conectar->query("SELECT * FROM login where id = '$id'");
$row = $consulta->fetch(PDO::FETCH_ASSOC);

?>

<form action="../controller/editar.php" method="post">
    <span>Nome</span>
    <input type="text" name="nome" id="nome" value="<?php echo $row['nome']?>">
    <span>Login</span>
    <input type="text" name="login" id="login" value="<?php echo $row['login']?>">
    <input type="hidden" name="id" value="<?php echo $row['id']?>">
    <input type="submit" value="Editar">
</form>