Create Table usuario
{
    id           int NOT NULL AUTO_INCREMET,
    nome         VARCHAR(050) NOT NULL,
    email        VARCHAR(255) NOT  NULL,
    senha        VARCHAR(060) NOT NULL,
    data_criacao datetime NOT NULL DEFAULT CURRNT_TIMESTAMP,
    ativo        tinyint NOT NULL DEFAULT '0',
    adm          tinyint NOT NULL DEFAULT '0',
    PRIMARY KEY (id)
};

Create Table post (
    id            int NOT NULL AUTO_INCREMET,
    titulo        VARCHAR(255) NOT NULL,
    texto         text NOT NULL,
    usuario_id    int NOT NULL,
    data_criacao  datetime NOT NULL DEFAULT CURRNT_TIMESTAMP,
    data_postagem datetime NOT NULL,
    PRIMARY KEY (id),
    KEY        fk_post_usuario_idx (usuario_id),
    CONSTRAINT fk_post_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id)
);