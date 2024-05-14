DROP DATABASE IF EXISTS green_path_db;

CREATE DATABASE green_path_db
DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE green_path_db;

CREATE TABLE LocalDescarte (
    id_local_descarte INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    link VARCHAR(255) NOT NULL,
    imagem MEDIUMBLOB DEFAULT NULL,
    nome VARCHAR(100) UNIQUE NOT NULL,
    referencia VARCHAR(255),
    horario_abertura TIME NOT NULL,
    horario_fechamento TIME NOT NULL,
    tipo VARCHAR(50) NOT NULL
);

CREATE TABLE Empresa (
    id_empresa INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_fantasia VARCHAR(100) NOT NULL,
    avatar MEDIUMBLOB DEFAULT NULL,
    cnpj VARCHAR(14) NOT NULL,
    razao_social VARCHAR(100)  NOT NULL,
    setor VARCHAR(50) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    fk_Usuario_id INT NOT NULL,
    UNIQUE (nome_fantasia, cnpj, razao_social, telefone),
    CONSTRAINT check_cnpj_digits CHECK(cnpj REGEXP '^[0-9]{14}$')
);

CREATE TABLE TipoResiduo (
    id_tipo_residuo INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    imagem MEDIUMBLOB DEFAULT NULL,
    nome VARCHAR(100) UNIQUE NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    toxico BOOLEAN NOT NULL
);

CREATE TABLE Usuario (
    id_usu INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(100) NOT NULL,
    avatar MEDIUMBLOB DEFAULT NULL,
    cpf_cnpj VARCHAR(14) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    fk_TipoUsuario_id INT NOT NULL,
    UNIQUE (email, cpf_cnpj),
    CONSTRAINT check_cnpj_cpf_digits CHECK(cpf_cnpj REGEXP '^[0-9]{9,14}$')
);

CREATE TABLE TipoUsuario (
    id_tipo_usu INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_tipo VARCHAR(50) UNIQUE NOT NULL,
    nivel INT NOT NULL UNIQUE,
    CONSTRAINT check_level_range CHECK(nivel >= 1 AND nivel <=3)
);

CREATE TABLE RelacLocalResiduo (
    fk_TipoResiduo_id INT,
    fk_LocalDescarte_id INT
);

CREATE TABLE RelacEmpresaLocal (
    fk_Empresa_id INT,
    fk_LocalDescarte_id INT
);

ALTER TABLE Empresa ADD CONSTRAINT FK_Empresa_2
    FOREIGN KEY (fk_Usuario_id)
    REFERENCES Usuario (id_usu) 
    ON DELETE CASCADE 
    ON UPDATE CASCADE;

ALTER TABLE Usuario ADD CONSTRAINT FK_Usuario_2
    FOREIGN KEY (fk_TipoUsuario_id)
    REFERENCES TipoUsuario (id_tipo_usu)
    ON DELETE RESTRICT
    ON UPDATE CASCADE;
 
ALTER TABLE RelacLocalResiduo ADD CONSTRAINT FK_RelacLocalResiduo_1
    FOREIGN KEY (fk_TipoResiduo_id)
    REFERENCES TipoResiduo (id_tipo_residuo)
    ON DELETE SET NULL
    ON UPDATE CASCADE;
 
ALTER TABLE RelacLocalResiduo ADD CONSTRAINT FK_RelacLocalResiduo_2
    FOREIGN KEY (fk_LocalDescarte_id)
    REFERENCES LocalDescarte (id_local_descarte)
    ON DELETE SET NULL
    ON UPDATE CASCADE;
 
ALTER TABLE RelacEmpresaLocal ADD CONSTRAINT FK_RelacEmpresaLocal_1
    FOREIGN KEY (fk_Empresa_id)
    REFERENCES Empresa (id_empresa)
    ON DELETE SET NULL
    ON UPDATE CASCADE;
 
ALTER TABLE RelacEmpresaLocal ADD CONSTRAINT FK_RelacEmpresaLocal_2
    FOREIGN KEY (fk_LocalDescarte_id)
    REFERENCES LocalDescarte (id_local_descarte)
    ON DELETE SET NULL
    ON UPDATE CASCADE;