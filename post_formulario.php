<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post | Projeto para Web com PHP</title>
    <link rel="stylesheet" href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                include 'include/topo.php';
                include 'include/valida_login.php';
                ?>
            </div>
        </div>
        <div class="row" style="min-height: 500px;">
            <div class="col-md-12">
                <?php include 'include/valida_login.php' ?>
            </div>
            <div class="col-md-10" style="padding-top: 50px;">
                <?php
                require_once 'include/funcoes.php';
                require_once 'Core/conexao_mysql.php';
                require_once 'Core/sql.php';
                require_once 'Core/mysql.php';
                foreach ($_GET as $indice => $dado)
                {
                    $$indice = limparDados($dado);
                }
                if (!empty($id))
                {
                    $id = (int)$id;
                    $criterio = [
                        ['id', '=', $id]
                    ];
                    $retorno = buscar(
                        'post',
                        ['*'],
                        $criterio
                    );
                    $entidade = $retorno[0];
                }
                ?>
                <h2>Post</h2>
                <form action="Core/post_repositorio.php" method="post">
                    <input type="hidden" name="acao" value="<?php echo empty($id) ? 'insert' : 'update' ?>">
                    <input type="hidden" name="id" value="<?php echo $entidade['id'] ?? '' ?>">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" require="required" value="<?php echo $entidade['titulo'] ?? '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="texto">Texto</label>
                        <textarea type="text" name="texto" id="texto" class="form-control" require="required" rows="5"><?php echo $entidade['texto'] ?? '' ?></textarea>
                    </div>
                    <div class="form-group"><label for="texto">Postar em</label>
                        <?php
                        $data = (!empty($entidade['data_postagem'])) ? explode(' ', $entidade['data_postagem'])[0] : '';
                        $hora = (!empty($entidade['data_postagem'])) ? explode(' ', $entidade['data_postagem'])[1] : '';
                        ?>
                        <div class="row">
                            <div class="col-md-3"><input type="date" require="required" name="data_postagem" id="data_postagem" class="form-control" value="<?php echo $data ?>"></div>
                            <div class="col-md-3"><input type="time" require="required" name="hora_postagem" id="hora_postagem" class="form-control" value="<?php echo $hora ?>"></div>
                        </div>
                    </div>
                    <div class="text-right"><button type="submit" class="btn btn-success">Salvar</button></div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php include 'include/rodape.php'; ?>
            </div>
        </div>
    </div>
    <script src="lib/bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
</body>

</html>