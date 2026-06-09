CREATE DATABASE stelltech;
USE stelltech;

CREATE TABLE produtos(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nome VARCHAR(255),
    tipo_materia VARCHAR(255),
    data_fabricacao DATE,
    quantidade INT,
    preco INT,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);