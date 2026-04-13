CREATE DATABASE biblioteca;
USE biblioteca;

CREATE TABLE livros(
	id INT AUTO_INCREMENT PRIMARY KEY,
	nomeLivro VARCHAR(255),
	nomeAutor VARCHAR (255),
	descricao VARCHAR(255),
	numPaginas INT,
	dataPublicacao DATE,
	nomeEditora VARCHAR(255),
	custo NUMERIC,
	preco NUMERIC,
	imposto NUMERIC,
    created_at timestamp null,
    updated_at timestamp null,
    editora_id INT,
    FOREIGN KEY (editora_id) REFERENCES editora(id) ON DELETE CASCADE,
    detalhe_id INT,
    FOREIGN KEY (detalhe_id) REFERENCES detalhes(id) ON DELETE CASCADE
);


CREATE TABLE editoras(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nomeEditora VARCHAR(255),
    cnpj INT,
    paisEditora VARCHAR(255),
    cidade VARCHAR(255),
    created_at timestamp null,
    updated_at timestamp null
);


CREATE TABLE detalhes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

ALTER TABLE livros 
ADD COLUMN livro_id INT,
ADD FOREIGN KEY (livro_id) REFERENCES livros(id) ON DELETE CASCADE;

ALTER TABLE detalhes 
ADD COLUMN livro_id INT,
ADD FOREIGN KEY (livro_id) REFERENCES livros(id) ON DELETE CASCADE;

SELECT * FROM editoras;


