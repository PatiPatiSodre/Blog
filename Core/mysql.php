<?php
                //Function INSERE
function insere(string $entidade, array $dados) : bool
{
    $retorno = false;

    foreach ($dados as $campo => $dado)
    {
        $coringa[$campo] = '?';
        $tipo[] = gettype($dado) [0];
        $$campo = $dado; 
    }

    $instrucao = insert($entidade, $coringa);

    $conexao = 'conecta' ();

    $stmt = mysqli_prepare($conexao, $instrucao);

    eval('mysqli_stml_bind_param($stmt, \'' . implode('',$tipo) . '\',$' . implode(', $', array_keys($dados)) . ');');

    mysqli_stmt_execute($stmt);

    $retorno = (boolean) mysqli_stmt_affected_rows($stmt);

    $_SESSION['errors'] = mysqli_stmt_error_list($stmt);

    mysqli_stmt_close($stmt);

    'desconecta'($conexao);

    return $retorno;
}
?>