CREATE DATABASE produtosLaravel;
USE produtosLaravel;

CREATE TABLE produtos(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    preco INT,
    quantidade INT,    
    created_at timestamp null,
    update_at timestamp null
);