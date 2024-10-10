<!DOCTYPE html>
<?php
    require_once 'include/funcoes.php';
    require_once '..Core/conexao_mysql.php';
    require_once 'Core/sql.php';
    require_once 'Core/mysql.php';

    foreach ($_GET as $indice => $dado)
    {
        $$indice = LimparDados($dado);
    }

    $posts = buscar(
        'post',
        [
            'titulo',
            'data_postagem',
            'testo',
            '(select nome
                from usuario
                where usuario.id = post.usuario_id) as nome'
        ],
    )
?>