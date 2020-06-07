/*Criacao do banco, usamos só uma vez essa linha:*/

CREATE SCHEMA `ATX2Plantoes` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

/*Criacao do usuário e atribuindo seus privilégios ao banco:*/
FLUSH PRIVILEGES;
CREATE USER IF NOT EXISTS 'ATX2Sys'@'%' IDENTIFIED BY 'SysATX2';

GRANT DELETE ON ATX2plantoes.* TO 'ATX2Sys'@'%';
GRANT INSERT ON ATX2plantoes.* TO 'ATX2Sys'@'%';
GRANT SELECT ON ATX2plantoes.* TO 'ATX2Sys'@'%';
GRANT UPDATE ON ATX2plantoes.* TO 'ATX2Sys'@'%';
GRANT EXECUTE ON ATX2plantoes.* TO 'ATX2Sys'@'%';
GRANT SHOW VIEW ON ATX2plantoes.* TO 'ATX2Sys'@'%';

FLUSH PRIVILEGES;

/*Selecionando o banco:*/
USE ATX2plantoes;

/*Criando as entidades:*/
CREATE TABLE Setor (
  idSetor INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nomeSetor NVARCHAR(20) NOT NULL UNIQUE,
PRIMARY KEY(idSetor));


CREATE TABLE Cargo (
  idCargo INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  fkidSetor INTEGER UNSIGNED  NOT NULL  ,
  nomeCargo NVARCHAR(20) NOT NULL,
PRIMARY KEY(idCargo)  ,
INDEX Setor_FKIndex1(fkidSetor),
  FOREIGN KEY(fkidSetor)
    REFERENCES Setor(idSetor)
      ON DELETE CASCADE
      ON UPDATE CASCADE);

CREATE TABLE Pessoa (
  idPessoa INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  nome NVARCHAR(100) NOT NULL,
  cPF DECIMAL(11,0) NOT NULL UNIQUE,
  dataAtualizacao DATETIME DEFAULT CURRENT_TIMESTAMP,
  dataCadastro DATETIME DEFAULT CURRENT_TIMESTAMP,
  fkidCargo INTEGER UNSIGNED  NOT NULL  ,
  observacoes NVARCHAR(250) NULL,
  systemUser NVARCHAR(20) NOT NULL UNIQUE,
  senha NVARCHAR(200) NOT NULL,
  userAdmin BOOLEAN,
PRIMARY KEY(idPessoa),
INDEX Cargo_FKIndex1(fkidCargo),
  FOREIGN KEY(fkidCargo)
    REFERENCES Cargo(idCargo)
      ON DELETE CASCADE
      ON UPDATE CASCADE);
      
CREATE TABLE Turno (
  idTurno INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  nomeTurno NVARCHAR(20)  NULL UNIQUE ,
  horaInício TIME NOT NULL,
  horaIntervalo TIME NOT NULL,
  tempoIntervalo TIME NOT NULL,
  horaTérmino TIME NOT NULL,
  horasFolga TIME NOT NULL,
  PRIMARY KEY(idTurno));

CREATE TABLE Plantao (
  idPlantao INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  fkidPessoa INTEGER NOT NULL,
  fkidTurno INTEGER NOT NULL,
  dataInício TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  codPlantao INTEGER NOT NULL,
  PRIMARY KEY(idPlantao),
  INDEX Pessoa_FKIndex1(fkidPessoa),
  FOREIGN KEY(fkidPessoa)
    REFERENCES Pessoa(idPessoa)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  INDEX Turno_FKIndex2(fkidTurno),
  FOREIGN KEY(fkidTurno)
    REFERENCES Turno(idTurno)
      ON DELETE CASCADE
      ON UPDATE CASCADE);
