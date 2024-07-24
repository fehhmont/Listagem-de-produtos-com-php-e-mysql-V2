<?php
include_once("conexao.php");
include_once("banco-produto.php");

if (isset($_POST['btn'])) {
    $codigodebarra = $_POST['codigodebarra'] ?? "";
    $nome_produto = $_POST['nome_produto'] ?? "";
    $descricao_produto = $_POST['descricao_produto'] ?? "";
    $preco = $_POST['preco'] ?? "";
    $id_status = $_POST['id_status'] ?? null;
    $id_categoria = $_POST['id_categoria'] ?? null;

    if (codigoDeBarraExiste($conexao, $codigodebarra)) {
        header("Location: criar.php?erro=1");
        exit;
    } else {
        if (inserir($conexao, $codigodebarra, $nome_produto, $descricao_produto, $preco, $id_status, $id_categoria)) {
            header("Location: criar.php?sucesso=1");
            exit;
        } else {
            header("Location: criar.php?erro=2");
            exit;
        }
    }
}

function codigoDeBarraExiste($conexao, $codigodebarra) {
    $query = "SELECT COUNT(*) FROM tbl_produto WHERE codigodebarra = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("s", $codigodebarra);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    return $count > 0;
}
?>
