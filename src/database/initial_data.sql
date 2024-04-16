INSERT INTO TipoUsuario(nome_tipo, nivel)
VALUES
    ('USER', 1), ('ADMIN', 2);;

INSERT INTO TipoResiduo(nome, classificacao, toxico)
VALUES
    ('Pilha', 'Lixo eletrônico', TRUE),
    ('Seringa', 'Lixo hospitalar', TRUE),
    ('Óleo de cozinha', 'Lixo domiciliar', FALSE);

INSERT INTO Usuario
    (nome, email, senha, cpf_cnpj, telefone, fk_TipoUsuario_id)
VALUES
    ('server admin', 'admin@greenpath.com', 'admin',
    '99999999999', '(99) 99999-9999', 2);