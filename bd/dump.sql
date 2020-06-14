CREATE SEQUENCE duvidas_seq;

CREATE TABLE duvidas (
    codigo int NOT NULL DEFAULT NEXTVAL ('duvidas_seq'),
    duvida varchar(255) NOT NULL,
    usuario_que_perguntou varchar(255) not null,
    resposta varchar(255),
    usuario_que_respondeu varchar(255),
    PRIMARY KEY (codigo)
);

CREATE SEQUENCE usuarios_seq;

CREATE TABLE usuarios (
    codigo int NOT NULL DEFAULT NEXTVAL ('usuarios_seq'),
    nome varchar(255) NOT NULL,
    senha varchar(255) NOT NULL,
    PRIMARY KEY (codigo)
);


-- INSERT

INSERT INTO usuarios(nome, senha)
-- INSERINDO MULTIPLOS VALORES
VALUES ('joao_machado','123456'),('jose_americo','123456');

-- INSERINDO PERGUNTAS
INSERT INTO duvidas (duvida, usuario_que_perguntou)
VALUES ('Como ver o ip do meu computador?','jose_americo'),
('Como desinstalar o Windows?','jose_americo'),
('Como instalar o Linux Ubuntu?','joao_machado'),
('Como recuperar arquivos apagados sem querer?','joao_machado');


-- INSERINDO RESPOSTAS é um UPDATE
UPDATE duvidas 

SET      resposta = 'poe fogo no pc',
            usuario_que_respondeu = 'joao_machado'

WHERE duvida = 'Como desinstalar o Windows?';

-- LISTAR PERGUNTAS
SELECT * FROM duvidas;

