<?php
include "conexao.php";
if($conexao){
    echo "conexão ok";
}else {
    echo "erro de conexão";
}