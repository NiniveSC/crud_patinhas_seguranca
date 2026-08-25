<?php

include "../infra/conexao.php";
$cliente = mysqli_query($conexao, "
    SELECT cliente.*, cliente.nome_cliente
    FROM cliente
    JOIN cliente ON cliente.id_cliente = cliente.id_cliente
");
$cliente = mysqli_query($conexao, "SELECT * FROM cliente");
?>
