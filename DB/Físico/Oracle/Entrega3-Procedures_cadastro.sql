--------------------------
---Procedures de cadastro 
--------------------------

CREATE OR REPLACE PROCEDURE atx2.cadastro_setor (idSetor NUMBER, nomeSetor varchar2(20)) AS
   idSetor NUMBER;
   nomeSetor varchar2(20);
   BEGIN
      INSERT INTO atx2.setor (idsetor,nomeSetor) VALUES (s_setor.nextval,nomeSetor);
   END;
/

CREATE OR REPLACE PROCEDURE atx2.cadastro_cargo (fkidSetor NUMBER, nomeCargo varchar2(20)) AS
   fkidSetor NUMBER;
   nomeCargo varchar2(20);
   BEGIN
      INSERT INTO atx2.Cargo (idCargo,fkidSetor, nomeCargo) VALUES (s_cargo.nextval,fkidSetor,nomeCargo);
   END;
/

CREATE OR REPLACE PROCEDURE atx2.cadastro_pessoa (nome varchar(100), CPF decimal(11,0),fkidCargo int(10),observacoes varchar(250) DEFAULT NULL,systemUser varchar(20),senha varchar(200),userAdmin tinyint(1)) AS
	nome varchar(100);
	CPF decimal(11,0);
	fkidCargo int(10);
	observacoes varchar(250) DEFAULT NULL;
	systemUser varchar(20);
	senha varchar(200);
	userAdmin tinyint(1);	
BEGIN
	INSERT INTO atx2.Pessoa (idPessoa,nome, CPF,dataAtualizacao,dataCadastro, fkidCargo, observacoes, systemUser, senha, userAdmin) 
		VALUES (s_pessoa.nextval,nome, CPF, sysdate,sysdate,fkidCargo,observacoes, systemUser, senha, userAdmin);
END;
/


CREATE OR REPLACE PROCEDURE atx2.cadastro_turno (nomeTurno varchar2(20),horaInicio timestamp,horaIntervalo timestamp,tempoIntervalo timestamp,horaTermino timestamp,horasFolga timestamp ) AS
	nomeTurno varchar2(20);
	horaInicio timestamp;
	horaIntervalo timestamp;
	tempoIntervalo timestamp;
	horaTermino timestamp;
	horasFolga timestamp;
BEGIN
	INSERT INTO atx2.Turno (idTurno,nomeTurno, horaInicio, horaIntervalo, tempoIntervalo, horaTermino, horasFolga) 
		VALUES (s_turno.nextval,nomeTurno, horaInicio, horaIntervalo, tempoIntervalo, horaTermino,  horasFolga);
END;
/

CREATE OR REPLACE PROCEDURE atx2.cadastro_plantao (fkidPessoa number(11),fkidTurno number(11),dataInicio timestamp,codPlantao number(11) ) AS
	fkidPessoa number(11);
	fkidTurno number(11);
	dataInicio timestamp;
	codPlantao number(11);
BEGIN
	INSERT INTO Plantao (idPlantao,fkidPessoa, fkidTurno, dataInicio, codPlantao) 
		VALUES (s_plantao.nextval,fkidPessoa, fkidTurno, dataInicio, codPlantao);
END;
/
