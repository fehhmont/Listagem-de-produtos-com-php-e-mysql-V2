<?php
include("conexao.php");
include("banco-produto.php");

$totalProdutos = contarProdutos($conexao);
$categorias = listarCategorias($conexao);

$id_categoria = isset($_GET['id_categoria']) ? $_GET['id_categoria'] : null;
$produtos = listarProdutos($conexao, $id_categoria);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <!-- Inclui o CSS do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de produtos</h1>
        <h2 class="mb-3">Menu</h2>
        <div class="mb-4">
            <a href="criar.php" class="btn btn-primary mr-2">Cadastrar outro produto</a>
            <a href="lista-produto.php" class="btn btn-secondary">Listar Produtos</a>
        </div>

        <div class="alert alert-info">
            <strong>Total de produtos no banco de dados: </strong> <?php echo $totalProdutos; ?>
        </div>

        <!-- Formulário de filtro por categoria -->
        <form method="get" action="lista-produto.php" class="mb-4">
            <div class="form-group">
                <label for="id_categoria">Filtrar por Categoria:</label>
                <select class="form-control" id="id_categoria" name="id_categoria">
                    <option value="">Todas as Categorias</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?php echo $categoria['id_categoria']; ?>" <?php echo $categoria['id_categoria'] == $id_categoria ? 'selected' : ''; ?>>
                            <?php echo $categoria['nome_descricao']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Alterar</th>
                    <th>Excluir</th>
                    <th>ID</th>
                    <th>Código de Barras</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><a href="alterar-produto.php?id_produto=<?php echo $produto['id_produto']; ?>" class="btn btn-warning btn-sm">Alterar</a></td>
                        <td><a href="excluir-produto.php?id_produto=<?php echo $produto['id_produto']; ?>" class="btn btn-danger btn-sm">Excluir</a></td>
                        <td><?php echo $produto['id_produto']; ?></td>
                        <td><?php echo $produto['codigodebarra']; ?></td>
                        <td><?php echo $produto['nome_produto']; ?></td>
                        <td><?php echo $produto['descricao_produto']; ?></td>
                        <td><?php echo $produto['preco']; ?></td>
                        <td><?php echo $produto['categoria']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Inclui o JS do Bootstrap e dependências -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
