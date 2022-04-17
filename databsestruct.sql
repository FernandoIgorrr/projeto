CREATE DATABASE projeto;
USE projeto;

CREATE TABLE Tipo_Bolsista(
	codigo 		TINYINT,
    descricao	VARCHAR(20),
    
	PRIMARY KEY (codigo)
);

CREATE TABLE Tipo_Usuario(
	codigo 		TINYINT,
    descricao	VARCHAR(20),
    
	PRIMARY KEY (codigo)
);

CREATE TABLE Tipo_Patrimonio(
	codigo		TINYINT,
    descricao	VARCHAR(30),
    
	PRIMARY KEY (codigo)
);

CREATE TABLE Bolsista(
	matricula 	VARCHAR(12) NOT NULL,
    nome		VARCHAR(100) NOT NULL,
    tipo		TINYINT,
	
    PRIMARY KEY (matricula),
	FOREIGN KEY (tipo) REFERENCES Tipo_Bolsista(codigo)
);

CREATE TABLE Usuario(
	id			VARCHAR(12),
    senha		VARCHAR(40) NOT NULL,
    tipo		TINYINT,
    
	PRIMARY KEY (id),
    FOREIGN KEY (tipo) REFERENCES Tipo_Usuario(codigo)
);

ALTER TABLE Usuario AUTO_INCREMENT=13550;

CREATE TABLE Patrimonio(
    tombamento	VARCHAR(12),
    descricao	VARCHAR(50),
    estado		VARCHAR(30),
    tipo		TINYINT,
    localidade	TINYINT,
    
    PRIMARY KEY (tombamento),
    FOREIGN KEY (tipo) REFERENCES Tipo_Patrimonio (codigo)
);

CREATE TABLE Complexo(
	codigo		TINYINT,
    nome		VARCHAR(15),
    
	PRIMARY KEY (codigo)
);

CREATE TABLE Predio(
	codigo		TINYINT NOT NULL,
    nome		VARCHAR(15) NOT NULL,
    complexo	TINYINT NOT NULL,
    
	PRIMARY KEY (codigo),
    FOREIGN KEY (complexo)	REFERENCES Complexo(codigo) 
);

CREATE TABLE Andar(
	codigo 					TINYINT NOT NULL,
    nome					VARCHAR(15) NOT NULL,
    predio					TINYINT NOT NULL,
    
	PRIMARY KEY (codigo),
    FOREIGN KEY (Predio)	REFERENCES Predio(codigo) 
);

CREATE TABLE Comodo(
	codigo				TINYINT NOT NULL,
    nome				VARCHAR(15) NOT NULL,
    Andar				TINYINT NOT NULL,
    
	PRIMARY KEY (codigo),
	FOREIGN KEY (Andar)	REFERENCES Andar(codigo) 
);

CREATE TABLE Apartamento(
	codigo				TINYINT NOT NULL,
    nome				VARCHAR(15) NOT NULL,
    Andar				TINYINT NOT NULL,
    
    PRIMARY KEY (codigo),
	FOREIGN KEY (Andar)	REFERENCES Andar(codigo) 
);


INSERT INTO Tipo_Bolsista VALUES 
(1,"Residência"),
(2,"Informática");

INSERT INTO Tipo_Usuario VALUES 
(1,"Master"),
(2,"Chefe"),
(3,"Comum");

INSERT INTO Tipo_Patrimonio VALUES 
(1,"Comum"),
(2,"Eletrônico Cozinha"),
(3,"Computador"),
(4,"Monitor"),
(5,"Estabilizador");

/*		INSERTS FOR TESTS		*/

INSERT INTO `bolsista` (`matricula`, `nome`, `tipo`) VALUES
('20180146005', 'Fernando',2),
('20190146005', 'mendes kk', 2),
('20140146005', 'azuril', 1),
('20150146005', 'aids urbaNA', 1),
('2030146005', 'testest', 1),
('20000146005', 'rogerim', 2);

INSERT INTO `usuario` (`matricula`, `senha`, `tipo`) VALUES
(NULL, 'qwe123',1),
('20180146005','123123123',2);


SELECT * FROM Usuario;
SELECT * FROM Bolsista ORDER BY matricula DESC