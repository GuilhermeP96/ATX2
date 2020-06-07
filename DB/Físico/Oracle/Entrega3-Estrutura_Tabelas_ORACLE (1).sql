--- ---------------
--- Criando OWNER
---- --------------

CREATE USER ATX2 IDENTIFIED BY SysATX2;

grant create session to ATX2;
grant resource to ATX2;
grant dba to ATX2;


--
-- Table structure for table setor
--


CREATE TABLE ATX2.setor (
idSetor number(10)  NOT NULL PRIMARY KEY,
nomeSetor varchar2(20) NOT NULL,
CONSTRAINT  uk_nomeSetor UNIQUE (nomeSetor)
) ;

CREATE SEQUENCE ATX2.s_setor
START WITH     1
INCREMENT BY   1;

--
-- Table structure for table cargo
--


CREATE TABLE ATX2.cargo (
idCargo number(10)  NOT NULL PRIMARY KEY,
fkidSetor number(10)  NOT NULL,
nomeCargo varchar2(20) NOT NULL,
CONSTRAINT Setor_FKIndex1  FOREIGN KEY(fkidSetor) REFERENCES ATX2.setor (idSetor)
);


CREATE SEQUENCE ATX2.s_cargo
START WITH     1
INCREMENT BY   1;

--
-- Table structure for table pessoa
--

CREATE TABLE ATX2.pessoa (
idPessoa number(10)  NOT NULL PRIMARY KEY,
nome varchar2(100) NOT NULL,
cPF decimal(11,0) NOT NULL,
dataAtualizacao TIMESTAMP DEFAULT SYSDATE,
dataCadastro TIMESTAMP DEFAULT SYSDATE,
fkidCargo number(10)  NOT NULL,
observacoes varchar2(250) DEFAULT NULL,
systemUser varchar2(20) NOT NULL,
senha varchar2(200) NOT NULL,
userAdmin number(1) DEFAULT NULL,
CONSTRAINT uk_cPF UNIQUE (cPF),
CONSTRAINT uk_systemUser UNIQUE (systemUser),
CONSTRAINT  Cargo_FKIndex1  FOREIGN KEY (fkidCargo) REFERENCES ATX2.cargo (idCargo)
);

CREATE SEQUENCE ATX2.s_pessoa
START WITH     1
INCREMENT BY   1;

--
-- Table structure for table turno
--

CREATE TABLE ATX2.turno (
  idTurno number(10)  NOT NULL PRIMARY KEY,
  nomeTurno varchar2(20) DEFAULT NULL,
  horaInicio timestamp NOT NULL,
  horaIntervalo timestamp NOT NULL,
  tempoIntervalo timestamp NOT NULL,
  horaTermino timestamp NOT NULL,
  horasFolga timestamp NOT NULL,
  CONSTRAINT uk_nomeTurno UNIQUE (nomeTurno)
);


CREATE SEQUENCE ATX2.s_turno
START WITH     1
INCREMENT BY   1;

--
-- Table structure for table plantao
--

CREATE TABLE ATX2.plantao (
  idPlantao number(10)  NOT NULL PRIMARY KEY,
  fkidPessoa number(11) NOT NULL,
  fkidTurno number(11) NOT NULL,
  dataInicio timestamp DEFAULT SYSDATE,
  codPlantao number(11) NOT NULL,
  CONSTRAINT  Pessoa_FKIndex1  FOREIGN KEY (fkidPessoa) REFERENCES ATX2.pessoa (idPessoa),
  CONSTRAINT  Turno_FKIndex2  FOREIGN KEY (fkidTurno) REFERENCES ATX2.turno (idTurno)
);


CREATE SEQUENCE ATX2.s_plantao
START WITH     1
INCREMENT BY   1;

