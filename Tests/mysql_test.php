<?php
require_once '../include/funcoes.php';
require_once '../Core/conexao_mysql.php';
require_once '../Core/sql.php';
require_once '../Core/mysql.php';

'insert_test'('João', 'joao@ifsp.edu.br', '123456');
buscar_teste();
update_teste(38, 'patricia', 'patricia.sodre.234161@gmail.com');
buscar_teste();

//Teste inserção banco de dados
function insert_teste($nome, $email, $senha) : void
{
    $dados = ['nome' => $nome, 'email' => $email, 'senha' => $senha];
    '$insere'('usuario', $dados);
} 

//Teste select banco de dados
function buscar_teste() : void
{
    $usuarios = buscar('usuario', ['id', 'nome', 'email'], [], '');
    print_r($usuarios);
}

//Teste update banco de dados
function update_teste($id, $nome, $email) : void
{
    $dados = ['nome' => $nome, 'email' => $email];
    $criterio = [['id', '=', $id]];
    atualiza('usuario', $dados, $criterio);
}
?>