INSERT INTO TipoUsuario(nome_tipo, nivel)
VALUES ('Administrador', 1), ('Usuário', 2);

INSERT INTO TipoResiduo(nome, descricao, toxico)
VALUES
    ('Pilha', 'Pilhas usadas costumam ser a devolvidas para as lojas que as vendem ou as redes de coleta.', TRUE),
    ('Seringa', 'Colocá-los em garrafas PET identificadas e entregar nos postos de saúde.', TRUE),
    ('Óleo de Cozinha', 'Guardar o óleo usado em garrafas PET e fazer o descarte em locais de coleta.', FALSE),
    ('Bateria', 'Separar esses materiais do restante do lixo. Eles devem ser armazenados em uma embalagem seca e bem ventilada e que não receba diretamente a luz solar.', TRUE);

INSERT INTO Usuario
    (nome, email, senha, cpf_cnpj, telefone, fk_TipoUsuario_id)
VALUES
    ('server admin', 'admin@greenpath.com', '75f80b40a84eb1a08399248f37970c7c',
    '99999999999', '(99) 99999-9999', 1),
    ('Ana Cezanoski', 'juliacezanoski@gmail.com', 'bd2cd2c9555ce9e59d8ac3ca3e042653', 
    '2345678900', '41989047417', 2);

INSERT INTO Empresa 
    (nome_fantasia, avatar, cnpj, razao_social, setor, telefone, bairro, fk_Usuario_id)
VALUES
    ('Empresa 1', NULL, '12345678000134', 'Empresa1 descarte de lixo eletrônico',
    'Sustentabilidade Ambiental', '41987654321', 'Água Verde', 1),
    ('Empresa 2', NULL, '98765432000114', 'Empresa2 descarte de lixo domiciliar',
    'Sustentabilidade Ambiental', '41912345678', 'Centro', 1),
    ('Empresa 3', NULL, '59876214000127', 'Empresa3 descarte de lixo hospitalar',
    'Sustentabilidade Ambiental', '41985236741', 'Mercês', 1);

INSERT INTO LocalDescarte 
    (endereco, link, imagem, nome, referencia, 
    horario_abertura, horario_fechamento, tipo, fk_Empresa_id)
VALUES
    ('Rua XV de Novembro, 509', 'https://maps.app.goo.gl/tDTZjLNPjzfxXgk78', NULL, 'Local Pilhas 1',
    'Próximo ao posto de gasolina', '07:30', '21:30', 'Pilha', 1),
    ('Rua 7 de Setembro, 218', 'https://maps.app.goo.gl/tDTZjLNPjzfxXgk78', NULL, 'Local Oléo 1',
    'Próximo ao supermercado', '08:00', '20:00', 'Óleo de Cozinha', 2),
    ('Rua 24 de Maio, 300', 'https://maps.app.goo.gl/tDTZjLNPjzfxXgk78', NULL, 'Local Baterias 1',
    'Próximo ao restaurante', '08:30', '20:30', 'Bateria', 1),
    ('Rua 11 de Setembro, 2001', 'https://maps.app.goo.gl/tDTZjLNPjzfxXgk78', NULL, 'Local Seringa 1',
    'Próximo ao posto de saúde', '06:30', '22:00', 'Seringa', 3);