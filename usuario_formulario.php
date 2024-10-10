<!DOCTYPE html>
<html>
    <head>
        <title>Usuário | Projeto para Web com PHP</title>
        <link rel="stylesheet" href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php include 'include/menu.php'; ?>
                </div>
                <div class="col-md-10" style="padding-top: 50px;">
                <?php
                    require_once 'include/funcoes.php';
                    require_once 'Core/conexao_mysql.php';
                    require_once 'Core/sql.php';
                    require_once 'Core/mysql.php';

                    if(isset($_SESSION['login']))
                    {
                        $id = (int) $_SESSION['login']['usuario']['id'];

                        $criterio = [
                            ['id', '=', $id]
                        ];

                        $retorno = buscar (
                            'usuario',
                            ['id', 'nome', 'email'],
                            $criterio
                        );

                        $entidade = $retorno[0];
                    }
                ?>
                <h2>Usuário</h2>
                <form method="post" action="Core/usu"
