<html>
    <head>
        <title>Página inicial | Projeto para Web com PHP</title>
        <link rel="stylesheet" href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Topo //-->
                    <?php
                        include 'include/topo.php';
                    ?>
                </div>
            </div>
            <div class="row" style="min-height: 500px;">
                <div class="col-md-12">
                    <!-- Menu //-->
                <?php
                    include 'include/menu.php';
                ?>
            </div>
            <div class="col-md-10" style="padding-top: 50px;">
                <!-- Conteúdo //-->
            <h2>Página Inicial</h2>
            <?php
                include 'include/busca.php';
            ?>

                <?php
                    require_once 'include/funcoes.php';
                    require_once 'Core/conexao_mysql.php';
                    require_once 'Core/sql.php';
                    require_once 'Core/mysql.php';


                    foreach ($_GET  as  $indice =>  $dado)
                    {
                        $$indice = LimparDados($dado);
                    }


                    $data_atual = date('Y-m-d H:i:s');


                    $criterio = [
                        ['data_postagem', '<=', $data_atual]
                    ];


                    if(!empty($busca))
                    {
                        $criterio[] = [
                            'AND',
                            'texto',
                            'like',
                            "%{busca}%"
                        ];
                    }


                    $posts = buscar (
                        'post',
                        [
                            'titulo',
                            'data_postagem',
                            'id',
                            '(select nome  
                                from usuario
                                where usuario.id = post.usuario_id) as nome'
                        ],
                        $criterio,
                        'data_postagem DESC'
                    );
                ?>

            <div>
                <div class="list-group">
                    <?php
                    foreach($post as $post):
                        $data = date_create($post['data_postagem']);
                        $data = date_format($data, 'd/m/y H:i:s');
                    ?>
                    <a class="list-group-item list-group-item-action"
                    href="post_detalhe.php?post=<?php echo $post['id']?>">
                    <strong><?php echo $post['titulo']?></strong>
                    [<?php echo $post['nome']?>]
                    <span class="badge badge-dark"><?php echo $data?></span>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Rodapé //-->
            <?php
                include 'include/rodape.php';
            ?>
        </div>
    </div>
</div>
<script src="lib/bootstrap-4.2.1-dist/js/boostrastrap.min.js"></script>
</body>
</html>