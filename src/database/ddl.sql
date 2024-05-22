-- Drop the database if it exists
DROP DATABASE IF EXISTS green_path_db;

-- Create the database
CREATE DATABASE green_path_db DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

-- Use the created database
USE green_path_db;

-- Create table for waste disposal locations
CREATE TABLE LocalDescarte (
    id_local_descarte INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    link VARCHAR(255) NOT NULL,
    imagem MEDIUMBLOB DEFAULT NULL,
    nome VARCHAR(100) NOT NULL,
    referencia VARCHAR(255) NOT NULL,
    horario_abertura TIME NOT NULL,
    horario_fechamento TIME NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    fk_Empresa_id INT NOT NULL
);

-- Create table for companies providing waste disposal services
CREATE TABLE Empresa (
    id_empresa INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_fantasia VARCHAR(50) UNIQUE NOT NULL,
    avatar MEDIUMBLOB DEFAULT NULL,
    cnpj VARCHAR(50) UNIQUE NOT NULL,
    razao_social VARCHAR(255) NOT NULL,
    setor VARCHAR(255) NOT NULL,
    telefone VARCHAR(50) UNIQUE NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    fk_Usuario_id INT NOT NULL,
    UNIQUE (nome_fantasia, cnpj, telefone),
    CONSTRAINT check_cnpj_digits CHECK(cnpj REGEXP '^[0-9]{14}$')
);

-- Create table for types of waste
CREATE TABLE TipoResiduo (
    id_tipo_residuo INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(50) NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    toxico BOOLEAN NOT NULL,
    imagem MEDIUMBLOB DEFAULT NULL
);

-- Create table for users
CREATE TABLE Usuario (
    id_usu INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(100) NOT NULL,
    avatar MEDIUMBLOB DEFAULT NULL,
    cpf_cnpj VARCHAR(14) UNIQUE NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    fk_TipoUsuario_id INT NOT NULL,
    UNIQUE (email, cpf_cnpj),
    CONSTRAINT check_cnpj_cpf_digits CHECK(cpf_cnpj REGEXP '^[0-9]{9,14}$')
);

-- Create table for user types
CREATE TABLE TipoUsuario (
    id_tipo_usu INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_tipo VARCHAR(50) UNIQUE NOT NULL,
    nivel INT NOT NULL UNIQUE,
    CONSTRAINT check_level_range CHECK(nivel >= 1 AND nivel <=3)
);

-- Create table to establish a many-to-many relationship between waste types and disposal locations
CREATE TABLE TipoResiduo_LocalDescarte (
    fk_TipoResiduo_id INT,
    fk_LocalDescarte_id INT,
    PRIMARY KEY (fk_TipoResiduo_id, fk_LocalDescarte_id)
);

-- Add foreign key constraints
ALTER TABLE LocalDescarte ADD CONSTRAINT FK_LocalDescarte_Empresa 
FOREIGN KEY (fk_Empresa_id) 
REFERENCES Empresa(id_empresa) 
ON DELETE CASCADE;

ALTER TABLE Empresa ADD CONSTRAINT FK_Empresa_Usuario 
FOREIGN KEY (fk_Usuario_id) 
REFERENCES Usuario(id_usu) 
ON DELETE CASCADE;

ALTER TABLE Usuario ADD CONSTRAINT FK_Usuario_TipoUsuario 
FOREIGN KEY (fk_TipoUsuario_id) 
REFERENCES TipoUsuario(id_tipo_usu) 
ON DELETE CASCADE;

ALTER TABLE TipoResiduo_LocalDescarte 
ADD CONSTRAINT FK_TipoResiduo_LocalDescarte_TipoResiduo 
FOREIGN KEY (fk_TipoResiduo_id) 
REFERENCES TipoResiduo(id_tipo_residuo) 
ON DELETE CASCADE;

ALTER TABLE TipoResiduo_LocalDescarte 
ADD CONSTRAINT FK_TipoResiduo_LocalDescarte_LocalDescarte 
FOREIGN KEY (fk_LocalDescarte_id) 
REFERENCES LocalDescarte(id_local_descarte) 
ON DELETE CASCADE;
