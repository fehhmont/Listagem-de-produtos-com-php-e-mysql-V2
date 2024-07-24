<?php
function inserir($conexao, $codigodebarra, $nome_produto, $descricao_produto, $preco, $id_status, $id_categoria) {
    $sql = "INSERT INTO tbl_produto (codigodebarra, nome_produto, descricao_produto, preco, data_cadastro, id_status, id_categoria) VALUES (?, ?, ?, ?, NOW(), ?, ?)";
    $stmt = $conexao->prepare($sql);
    if ($stmt === false) {
        return false;
    }
    $stmt->bind_param("ssssii", $codigodebarra, $nome_produto, $descricao_produto, $preco, $id_status, $id_categoria);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function listarCategorias($conexao) {
    $categorias = array();
    $sql = "SELECT id_categoria, nome_descricao FROM tbl_categoria";
    $resultado = mysqli_query($conexao, $sql);

    while ($categoria = mysqli_fetch_assoc($resultado)) {
        array_push($categorias, $categoria);
    }
    return $categorias;
}

function listarStatus($conexao) {
    $status = array();
    $sql = "SELECT id_status, descricao_status FROM tbl_status";
    $resultado = mysqli_query($conexao, $sql);

    while ($st = mysqli_fetch_assoc($resultado)) {
        array_push($status, $st);
    }
    return $status;
}

function listarProdutos($conexao, $id_categoria = null) {
    $produtos = array();
    $sql = "SELECT 
                produto.id_produto,
                produto.codigodebarra,
                produto.nome_produto,
                produto.descricao_produto,
                produto.preco,
                categoria.nome_descricao as categoria
            FROM tbl_produto as produto
            INNER JOIN tbl_categoria AS categoria ON categoria.id_categoria = produto.id_categoria";

    if ($id_categoria) {
        $sql .= " WHERE produto.id_categoria = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id_categoria);
        $stmt->execute();
        $resultado = $stmt->get_result();
    } else {
        $resultado = mysqli_query($conexao, $sql);
    }
    
    while ($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }
    return $produtos;
}

function excluir($conexao, $id_produto) {
    $sql = "DELETE FROM tbl_produto WHERE id_produto = $id_produto";
    return mysqli_query($conexao, $sql);
}

function alterar($conexao, $id_produto, $codigodebarra, $nome_produto, $descricao_produto, $preco, $id_status, $id_categoria) {
    $codigodebarra = mysqli_real_escape_string($conexao, $codigodebarra);
    $nome_produto = mysqli_real_escape_string($conexao, $nome_produto);
    $descricao_produto = mysqli_real_escape_string($conexao, $descricao_produto);
    $preco = mysqli_real_escape_string($conexao, $preco);
    $preco = number_format((float)$preco, 2, '.', '');

    $sql = "UPDATE tbl_produto SET codigodebarra='$codigodebarra', nome_produto='$nome_produto', descricao_produto='$descricao_produto', preco='$preco', id_status='$id_status', id_categoria='$id_categoria' WHERE id_produto=$id_produto";
    return mysqli_query($conexao, $sql);
}

function buscarProduto($conexao, $id_produto) {
    $sql = "SELECT * FROM tbl_produto WHERE id_produto = $id_produto";
    $resultado = mysqli_query($conexao, $sql);
    return mysqli_fetch_assoc($resultado);
}

function contarProdutos($conexao) {
    $query = "SELECT COUNT(*) as total FROM tbl_produto";
    $resultado = $conexao->query($query);
    
    if ($resultado) {
        $linha = $resultado->fetch_assoc();
        return $linha['total'];
    } else {
        return 0;
    }
}
?>
