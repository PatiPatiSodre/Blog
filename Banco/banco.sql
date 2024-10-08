Drop DataBase IF EXISTS BLOG;

Create DataBase BLOG;

Use BLOG;

Create Table usuario
(
    id           int NOT NULL AUTO_INCREMENT,
    nome         VARCHAR(50) NOT NULL,
    email        VARCHAR(255) NOT  NULL,
    senha        CHAR(60) NOT NULL,
    data_criacao datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ativo        tinyint NOT NULL DEFAULT '0',
    adm          tinyint NOt NULL DEFAULT '0',
    PRIMARY KEY (id)
);

Create Table post (
    id            int NOT NULL AUTO_INCREMENT,
    titulo        VARCHAR(255) NOT NULL,
    texto         text NOT NULL,
    usuario_id    int NOT NULL,
    data_criacao  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    data_postagem datetime NOT NULL,
    PRIMARY KEY (id),
    KEY        fk_post_usuario_idx (usuario_id),
    CONSTRAINT fk_post_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id)
);