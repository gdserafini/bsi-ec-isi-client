INSERT INTO TipoUsuario(nome_tipo, nivel)
VALUES ('Administrador', 1), ('Usuário', 2);

INSERT INTO TipoResiduo(nome, descricao, toxico)
VALUES
    ('Pilha', 'Lixo eletrônico', TRUE),
    ('Seringa', 'Lixo hospitalar', TRUE),
    ('Óleo de cozinha', 'Lixo domiciliar', FALSE);

INSERT INTO Usuario
    (nome, email, senha, cpf_cnpj, telefone, fk_TipoUsuario_id)
VALUES
    ('server admin', 'admin@greenpath.com', '75f80b40a84eb1a08399248f37970c7c',
    '99999999999', '(99) 99999-9999', 1),
    ('Ana Cezanoski', 'juliacezanoski@gmail.com', 'bd2cd2c9555ce9e59d8ac3ca3e042653', 
    '2345678900', '41989047417', 2);