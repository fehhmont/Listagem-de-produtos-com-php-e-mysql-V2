# Listagem-de-produtos-com-php-e-mysql-V2

O sistema utiliza um banco de dados para armazenar informações sobre produtos e categorias. Aqui estão as tabelas principais e suas funções:

tbl_produto: Armazena informações sobre os produtos.

Campos:
id_produto: Identificador único do produto (chave primária).
codigodebarra: Código de barras do produto.
nome_produto: Nome do produto.
descricao_produto: Descrição do produto.
preco: Preço do produto.
data_cadastro: Data em que o produto foi cadastrado.
id_status: Referência ao status do produto.
id_categoira: Referência à categoria do produto.
tbl_categoria: Armazena informações sobre categorias.

Campos:
id_categoria: Identificador único da categoria (chave primária).
nome_descricao: Nome e descrição da categoria.
2. Arquivos PHP
a. conexao.php
Este arquivo é responsável pela conexão com o banco de dados. Ele define a variável $conexao que é usada para executar consultas SQL no banco de dados.

b. banco-produto.php
Este arquivo contém funções para interagir com o banco de dados:

inserir($conexao, $codigodebarra, $nome_produto, $descricao_produto, $preco, $id_status, $id_categoira): Insere um novo produto na tabela tbl_produto.
listarProdutos($conexao, $id_categoria = null): Recupera a lista de produtos. Se um id_categoria for fornecido, retorna apenas os produtos dessa categoria.
excluir($conexao, $id_produto): Remove um produto da tabela tbl_produto com base no id_produto.
alterar($conexao, $id_produto, $codigodebarra, $nome_produto, $descricao_produto, $preco): Atualiza as informações de um produto específico.
buscarProduto($conexao, $id_produto): Recupera detalhes de um produto com base no id_produto.
contarProdutos($conexao): Conta o número total de produtos na tabela tbl_produto.
listarCategorias($conexao): Recupera todas as categorias da tabela tbl_categoria.
c. lista-produto.php
Este arquivo exibe uma lista de produtos e permite filtrar os produtos por categoria. Funciona da seguinte forma:

Recuperação de Dados:

Conecta ao banco de dados.
Recupera o número total de produtos.
Recupera todas as categorias.
Verifica se um filtro de categoria foi aplicado (passado através da URL).
Recupera a lista de produtos, aplicando o filtro se necessário.
Exibição dos Produtos:

Exibe um menu com botões para cadastrar novos produtos e listar produtos.
Mostra um contador com o total de produtos.
Mostra uma tabela com produtos e categorias, com botões para alterar e excluir produtos.
Dropdown de Categorias:

Um dropdown é exibido na tabela para selecionar uma categoria. Ao clicar em uma categoria no dropdown, a página é atualizada para mostrar apenas os produtos dessa categoria.
d. alterar-produto.php
Este arquivo exibe um formulário para alterar as informações de um produto específico. Recupera os detalhes do produto e permite ao usuário atualizar as informações.

3. Funcionamento do Sistema
Cadastro de Produtos:

Um usuário pode adicionar um novo produto através de um formulário (geralmente disponível em criar.php).
Listagem e Filtragem:

Na página lista-produto.php, os produtos são listados em uma tabela. A listagem pode ser filtrada por categoria usando o dropdown. O filtro é aplicado através de um parâmetro de URL (id_categoria), que altera a consulta ao banco de dados.
Alteração de Produtos:

O usuário pode alterar as informações de um produto clicando no botão "Alterar" ao lado do produto na lista. Isso redireciona para alterar-produto.php, onde um formulário exibe os detalhes atuais do produto, permitindo modificações.
Exclusão de Produtos:

Produtos podem ser excluídos clicando no botão "Excluir" ao lado do produto. Isso redireciona para um script que remove o produto da tabela tbl_produto.
Integração com o Frontend:

O sistema usa Bootstrap para a interface do usuário, incluindo estilos e componentes de layout como tabelas, botões e dropdowns.
Com esse fluxo, o sistema permite gerenciar produtos e categorias de forma interativa e eficiente.
