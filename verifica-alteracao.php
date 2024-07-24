<?php
include("conexao.php");
include("banco-produto.php");

if (isset($_POST['btnAlterar'])) {
    $id_produto = $_POST['id'] ?? "";
    $codigodebarra = $_POST['codigodebarra'] ?? "";
    $nome_produto = $_POST['nome'] ?? "";
    $descricao_produto = $_POST['descricao'] ?? "";
    $preco = $_POST['preco'] ?? "";
    $id_status = $_POST['id_status'] ?? null;
    $id_categoria = $_POST['id_categoria'] ?? null;

    if (alterar($conexao, $id_produto, $codigodebarra, $nome_produto, $descricao_produto, $preco, $id_status, $id_categoria)) {
        header("Location: lista-produto.php?sucesso=1");
        exit;
    } else {
        header("Location: alterar.php?id_produto=$id_produto&erro=1");
        exit;
    }
}
?>
