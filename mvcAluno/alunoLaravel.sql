CREATE DATABASE alunoLaravel;
USE alunoLaravel;

CREATE TABLE alunos(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    created_at timestamp null,
    update_at timestamp null
);

SELECT * FROM alunos;