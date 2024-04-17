INSERT INTO TipoUsuario(id_nome_tipo, nome_tipo, nivel)
VALUES
    (1, 'Administrador', 1), 
    (2, 'Usuário', 2);;

INSERT INTO TipoResiduo(nome, classificacao, toxico)
VALUES
    ('Pilha', 'Lixo eletrônico', TRUE),
    ('Seringa', 'Lixo hospitalar', TRUE),
    ('Óleo de cozinha', 'Lixo domiciliar', FALSE);

INSERT INTO Usuario
    (nome, email, senha, cpf_cnpj, telefone, fk_TipoUsuario_id)
VALUES
('server admin', 'admin@greenpath.com', '236a295f77b1b860b7450b2670f7c318',
    '99999999999', '(99) 99999-9999', 1);