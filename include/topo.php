<?php
    session_start();
?>


<div class="card">
    <div class="card-header">
        <h1> Projeto Blogem PHP + MySQL IFSP =  PATRÍCIA</h1>
</div>


<?php if(isset($_SESSION['login'])) : ?>
    <div class="card-body text-right">
        Olá <?php echo $_SESSION['login']['usuario']['nome']?>!
        <a  href="Core/usuario_repositorio.php?acao=logout"
            class="btn-link btn-sm" role="button">Sair</a>
    </div>
    <?php endif ?>
</div>