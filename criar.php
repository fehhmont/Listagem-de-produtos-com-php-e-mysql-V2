<?php
include_once("conexao.php");

// Busca as categorias do banco de dados
$query_categoria = "SELECT id_categoria, nome_descricao FROM tbl_categoria";
$result_categoria = $conexao->query($query_categoria);

// Busca os status do banco de dados
$query_status = "SELECT id_status, descricao_status FROM tbl_status";
$result_status = $conexao->query($query_status);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <title>Cadastro de Produtos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Cadastro de Produtos</h1>

        <?php if (isset($_GET['erro'])): ?>
            <div class="alert alert-danger">
                <?php
                if ($_GET['erro'] == 1) {
                    echo "Código de barra já existe!";
                } elseif ($_GET['erro'] == 2) {
                    echo "Erro ao cadastrar o produto.";
                }
                ?>
            </div>
        <?php elseif (isset($_GET['sucesso'])): ?>
            <div class="alert alert-success">
                Produto cadastrado com sucesso!
            </div>
        <?php endif; ?>
        
        <form id="produto" method="post" action="processodeenvio.php">
            <div class="form-group">
                <label for="codigoDeBarra">Código de Barra</label>
                <input type="text" class="form-control" id="codigoDeBarra" name="codigodebarra" maxlength="100" placeholder="Digite o código">
            </div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome_produto" maxlength="100" placeholder="Digite o nome">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao_produto" placeholder="Digite a descrição">
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" id="preco" name="preco" maxlength="13" placeholder="EX: R$99,99">
            </div>
            <div class="form-group">
                <label for="id_status">Status</label>
                <select class="form-control" id="id_status" name="id_status">
                    <?php while($row = $result_status->fetch_assoc()): ?>
                        <option value="<?php echo $row['id_status']; ?>"><?php echo $row['descricao_status']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_categoria">Categoria</label>
                <select class="form-control" id="id_categoria" name="id_categoria">
                    <?php while($row = $result_categoria->fetch_assoc()): ?>
                        <option value="<?php echo $row['id_categoria']; ?>"><?php echo $row['nome_descricao']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" id="button" name="btn">Enviar</button>
        </form>
        <a href="lista-produto.php" class="btn btn-secondary mt-3">Listar Produtos</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
