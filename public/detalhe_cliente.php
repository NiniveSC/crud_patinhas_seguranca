<?php

include "../infra/conexao.php";

$id = $_GET['id'];

$sql = "SELECT * FROM cliente WHERE id_cliente = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$cliente = $resultado->fetch_assoc();

$sql = "SELECT * FROM animal WHERE cliente_id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Detalhes do Cliente</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>

    <h1>Detalhes do Cliente</h1>

    <h2>
        <?= $cliente['nome_cliente'] ?>
    </h2>

    <h3>Animais:</h3>

    <?php while ($animal = $resultado->fetch_assoc()) { ?>

        <p>
            <?= $animal['nome_animal'] ?>
        </p>

    <?php } ?>

    <a href="../index.php">
        <button type="button">Voltar</button>
    </a>

</body>

</html>