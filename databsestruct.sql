CREATE DATABASE projeto;

USE projeto;

CREATE TABLE Tipo_Bolsista(
	tipo 		tinyint PRIMARY KEY,
    descricao	varchar(20)
);

CREATE TABLE Bolsista(
	matricula 	varchar(12) NOT NULL,
    nome		varchar(100) NOT NULL ,
    senha		varchar(12) NOT NULL ,
    tipo		tinyint,
	
    PRIMARY KEY (matricula),
	FOREIGN KEY (tipo) REFERENCES Tipo_Bolsista(tipo)
);

CREATE TABLE Patrimonio(
	
    tombamento	varchar(12),
    descricao	varchar(50),
    estado		varchar(30)

);

CREATE TABLE Residencia(
	codigo	tinyint,
    nome	varchar(15)
);

INSERT INTO Tipo_Bolsista VALUES (1,"manager");
INSERT INTO Tipo_Bolsista VALUES (2,"informatica");

INSERT INTO `bolsista` (`matricula`, `nome`, `senha`, `tipo`) VALUES
('20180146005', 'Fernando', '12345', 2),
('20190146005', 'mendes kk', '12345', 2);

