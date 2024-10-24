<?php
session_start();
require_once '../include/valida_login.php';
require_once '../include/funcoes.php';
require_once 'conexao_mysql.php';               // inclui os arquivos
require_once 'sql.php';
require_once 'mysql.php';

foreach($_POST as $indice => $dado)
{
    $$indice = LimparDados($dado);
}
                        
foreach($_GET as $indice => $dado)
{
    $$indice = LimparDados($dado);
}

$id = (int)$id;

switch($acao)
{
    case 'insert':
        $dados = [
            'titulo'        => $titulo,
            'texto'         => $texto,
            'data_postagem' => "data_postagem $hora_postagem",
            'usuario_id'    => $_SESSION['login'] ['usuario'] ['id']
        ];
        insere(
            'post',
            $dados
        );
        break;

        case 'update':
            $dados = [
                'titulo'        => $titulo,
                'texto'         => $texto,
                'data_postagem' => "$data_postagem $hora_postagem",
                'usuario_id'    => $_SESSION['login'] ['usuario'] ['id']
            ];

            $criterio = [
                ['id', '=', $id]
            ];

            atualiza(
                'post',
                $dados,
                $criterio
            );

            break;
            
        case 'delete':
            $criterio = [
                ['id', '=', $id]
            ];

            deleta(
                'post',
                $criterio
            );

            break;
}
    // volta  para a pagina index
header('Location: ../index.php');
?>