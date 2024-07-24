<?php
include("conexao.php");
include("banco-produto.php");

$id=$_GET['id_produto'];
if (excluir($conexao,$id)) {
    header('Location:lista-produto.php');
    die();
}
?>