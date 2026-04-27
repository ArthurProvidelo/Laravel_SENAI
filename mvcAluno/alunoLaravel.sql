CREATE DATABASE alunoLaravel;
USE alunoLaravel;

CREATE TABLE alunos(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    created_at timestamp null,
    updated_at timestamp null
);

ALTER TABLE alunos
ADD COLUMN turma_id INT,
ADD FOREIGN KEY (turma_id) REFERENCES turmas(id) ON DELETE CASCADE;

CREATE TABLE turmas(
	id INT AUTO_INCREMENT PRIMARY KEY,
    numSala INT,
    serie INT,
	created_at timestamp null,
    updated_at timestamp null
);

CREATE TABLE informacoes(
	id INT AUTO_INCREMENT PRIMARY KEY,
    telefone INT NULL,
    data_nascimento DATE NULL,
    endereco VARCHAR(255) null,
    idade INT null,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

ALTER TABLE informacoes
ADD COLUMN info_id INT NULL,
ADD CONSTRAINT fk_aluno_detalhe
FOREIGN KEY (info_id)
REFERENCES alunos(id)
ON DELETE SET NULL;

SELECT * FROM alunos;
SELECT * FROM turmas;
SELECT * FROM informacoes;

SELECT id, numSala AS Sala, serie AS Série FROM turmas;