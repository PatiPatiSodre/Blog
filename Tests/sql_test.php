<?php
    require_once '../Core/sql.php';

    $id    = 1;
    $nome  = 'Patricia';
    $emai  = 'patricia.sodre@aluno.ifsp.edu.br';
    $senha = '123foiii';
    $dados = ['nome' => $nome,'email' => $emai,'senha' => $senha];
    $entidade = 'usuario';
    $criterio = [['id', '=', $id]];
    $campos = ['id', 'nome', 'email'];

    print_r($dados);
    echo '<br>';
    print_r($campos);
    echo '<br>';
    print_r($criterio);
    echo '<br>';

    // Teste geração INSERT

    $instrucao = insert($entidade, $dados);
    echo $instrucao.'<BR>';

    // Teste geração UPDATE

    $instrucao = update($entidade, $dados, $criterio);
    echo $instrucao . '<BR>';

    // Teste geração SELECT

    $instrucao = select($entidade, $campos, $criterio);
    echo $instrucao . '<BR>';

    // Teste geração DELETE
    $instrucao = delete($entidade, $criterio);
    echo $instrucao . '<BR>';
?>