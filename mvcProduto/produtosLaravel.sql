CREATE DATABASE produtosLaravel1;
USE produtosLaravel1;


CREATE TABLE produtos(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    preco INT,
    quantidade INT,    
    created_at timestamp null,
    updated_at timestamp null
);

CREATE TABLE setor(
	id INT AUTO_INCREMENT PRIMARY KEY,
	nomeSetor VARCHAR(255),
    numCorredor INT,
    created_at timestamp null,
    updated_at timestamp null
);

CREATE TABLE detalhes_produto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255),
    tamanho VARCHAR(50),
    peso DECIMAL(10,2),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    produto_id INT,
    FOREIGN KEY (produto_id) REFERENCES produtos(id) ON DELETE CASCADE
);

drop table detalhes_produto;

select * from produtos;
select * from setores;

ALTER TABLE produtos
ADD COLUMN setor_id INT,
ADD FOREIGN KEY (setor_id) REFERENCES setor(id) ON DELETE CASCADE;


-- COMANDO APENAS PARA QUNADO FOR USAR O LOGIN
ALTER TABLE users
ADD COLUMN tipo VARCHAR(255) NOT NULL DEFAULT 'usuario';

select * from users;

