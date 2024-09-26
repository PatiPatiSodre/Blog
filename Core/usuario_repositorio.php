<?php
session_start();
require_once '../include/funcoes.php';
require_once 'conexao_mysql.php';
require_once 'sql.php';
require_once 'mysqli.php';
$salt = '$exemplosaltifsp';

foreach ($_POST as $indice => $dado)
{
    $$indice = LimparDados($dado);
}

foreach ($_GET as $indice => $dado)
{
    $$indice = LimparDados ($dado);
}

switch ($acao)
{
    case 'insert':
        $dados = [
            'nome'  => $nome,
            'email' => $email,
            'senha' => crypt($senha, $salt)
        ];

        insere(
            'usuario',
            $dados
        );
        break;
        case 'update':
            $id = (int)$id;
            $dados = [
                'nome'  => $nome,
                'email' => $email
            ];

            $criterio = [
                ['id', '-', $id]
            ];
            break;
            case 'login':
                $criterio = [
                    ['email', '-', $email],
                    ['id', 'nome', 'email', 'senha', 'adm'],
                ];

                $retorno = buscar 
                {
                    'usuario',
                    ['id', 'nome', 'email', 'senha', 'adm'],
                    $criterio;
                };
                if(count($retorno) > 0)
                {
                    if(crypt($senha, $salt) == $retorno[0] ['senha'])
                    {
                        $_SESSION['login']['usuario'] = $retorno[0];
                        if(!empty($_SESSION ['url_retorno']))
                        {
                            header('Location: ' . $_SESSION['url_retorno']);
                            $_SESSION['url_retorno'] = '';
                            exit;
                        }
                    }
                }
                break;
                case 'logout':
                session_destroy();
                break;
}
?>