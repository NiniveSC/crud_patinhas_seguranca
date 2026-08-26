<?php

include "../infra/conexao.php";

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $raca = $_POST['raca'];
    $tipo = $_POST['tipo'];
    $cliente = $_POST['cliente'];

    $sql = "INSERT INTO animal (nome_animal, tipo_animal, raca_animal, idade_animal, cliente_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssssi", $nome, $tipo, $raca, $idade, $cliente);
    if ($stmt->execute());

    header('Location: ../index.php');
    exit();
}

    $sql = "SELECT id_cliente, nome_cliente FROM cliente ORDER BY nome_cliente";
    $resultado = $conexao->query($sql);

    ?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Cadastrar Animal</title>
    </head>

    <body>
        <h1>Cadastrar Animal</h1>
        <form method="POST">
            <label>Nome:</label>
            <input type="text" name="nome" required>

            <br><br>

            <label>Tipo:</label>
            <input type="text" name="tipo" required>

            <br><br>

            <label>Raça:</label>
            <input type="text" name="raca" required>

            <br><br>

            <label>Data de nascimento:</label>
            <input type="date" name="idade" required>

            <br><br>

             <label>Cliente:</label>
        <select name="cliente" required>

            <option value="">Selecione o cliente</option>

            <?php while ($cliente = $resultado->fetch_assoc()) { ?>

                <option value="<?= $cliente['id_cliente'] ?>">
                    <?= $cliente['nome_cliente'] ?>
                </option>

            <?php } ?>

        </select>

        <br><br>

        <button type="submit" name="cadastrar">
            Cadastrar
        </button>

    </form>

</body>

</html>