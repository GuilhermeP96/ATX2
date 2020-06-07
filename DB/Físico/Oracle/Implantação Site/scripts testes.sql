
INSERT INTO atx2.Pessoa (idPessoa,nome, CPF,dataAtualizacao,dataCadastro, fkidCargo, observacoes, systemUser, senha, userAdmin) 
		VALUES (s_pessoa.nextval,'Guilherme', 12345678998, sysdate,sysdate,2,'testes', 'Guilherme', 'ae653e4f46c5928cc4b4b171efbcf881', 1);
desc ATX2.pessoa;
 
 pronto agora foi tudo
 select * from pessoa;
 desc ATX2.PLANTAO;

SELECT * FROM atx2.Plantao INNER JOIN Pessoa ON Plantao.fkidPessoa=Pessoa.idPessoa INNER JOIN Turno ON Plantao.fkidTurno = Turno.idTurno ORDER BY dataInicio;

select * from cargo;
alter session set current_schema = ATX2;

INSERT INTO atx2.Cargo (idCargo,fkidSetor, nomeCargo) VALUES (s_cargo.nextval,7,'Secretario');

INSERT INTO ATX2.setor VALUES (S_SETOR.nextval,'Administrativo');

select owner, object_name, object_type, status from dba_objects where owner='ATX2' order by 3;
desc ATX2.PESSOA; 

select * from atx2.setor;


exec   atx2.altera_setor('Administrativo',7);
desc atx2.turno;
COMMIT
exec atx2.cadastro_turno('CLT DIURNO',TIMESTAMP '2017-06-17 08:00:00',TIMESTAMP '2017-06-17 12:00:00',TIMESTAMP '2017-06-17 01:00:00',TIMESTAMP '2017-06-17 17:00:00',TIMESTAMP '2017-06-17 15:00:00');
exec atx2.cadastro_turno('TESTE2',    TIMESTAMP '2017-06-17 14:00:00',TIMESTAMP '2017-06-17 18:00:00',TIMESTAMP '2017-06-17 01:00:00',TIMESTAMP '2017-06-17 23:00:00',TIMESTAMP '2017-06-17 15:00:00');
SELECT * FROM ATX2.turno;
DESC ATX2.SETOR;
SELECT * FROM ATX2.Setor ORDER BY nomeSetor;
SELECT * FROM ATX2.Setor WHERE idSetor=7;




BEGIN exec atx2.cadastro_turno('TESTE2',TIMESTAMP '2017-06-17 14:00',TIMESTAMP '2017-06-17 18:00',TIMESTAMP '2017-06-17 01:00',TIMESTAMP '2017-06-17 23:00',TIMESTAMP '2017-06-17 15:00'); END;



SELECT * FROM ATX2.plantao

SELECT * FROM ATX2.Plantao INNER JOIN ATX2.Pessoa ON ATX2.Plantao.fkidPessoa=ATX2.PessoaidPessoa INNER JOIN ATX2.Turno ON ATX2.Plantao.fkidTurno = ATX2.Turno.idTurno ORDER BY dataInicio


SELECT * FROM ATX2.Pessoa ORDER BY nome

SELECT * FROM Turno ORDER BY nomeTurno

SELECT 
				    idPlantao, 
					fkidPessoa,
					fkidTurno,
					nomeTurno,
					to_char(cast(DATAINICIO as date),'DD/MM/YYYY'),
				    idPessoa, 
				    nome
				        FROM ATX2.Plantao 
							INNER JOIN ATX2.Pessoa 
								ON ATX2.Plantao.fkidPessoa=ATX2.Pessoa.idPessoa 
							INNER JOIN ATX2.Turno 
								ON ATX2.Plantao.fkidTurno = ATX2.Turno.idTurno 
									WHERE idPlantao=3
									ORDER BY dataInicio
select * from atx2.plantao