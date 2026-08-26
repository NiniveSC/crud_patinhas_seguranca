<?php

include "../infra/conexao.php";

if (isset($_POST['cadastrar'])) {

    $nome = $_POST['nome'];

    $sql = "INSERT INTO cliente (nome_cliente) VALUES (?)";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param("s", $nome);

    $stmt->execute();

    header("Location: ../index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cliente</title>
</head>

<body>

    <h1>Cadastrar Cliente</h1>

    <form method="POST">

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <br><br>

        <button type="submit" name="cadastrar">
            Cadastrar
        </button>

    </form>

</body>

</html>