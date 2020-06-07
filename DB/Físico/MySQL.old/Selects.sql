/*Exemplo de SELECTs (Não completo)*/

USE ATX2Plantoes; /*Apenas para testes direto no MySQL*/

SELECT 
	Setor.idSetor AS 'Código',
	Setor.nomeSetor AS 'Nome'
		FROM Setor ORDER BY idSetor;
SELECT 
	Cargo.nomeCargo AS 'Cargo',
	Setor.nomeSetor AS 'Setor'
		FROM Cargo
			INNER JOIN Setor ON Cargo.fkidSetor=Setor.idSetor;

SELECT * FROM Turno;

/*UPDATE Pessoa SET userAdmin = 1 WHERE idPessoa=5;*/

SELECT * FROM Pessoa;

SELECT * FROM Plantao;

SELECT * FROM Pessoa 
	INNER JOIN Cargo ON Pessoa.fkidCargo=Cargo.idCargo 
	INNER JOIN Setor ON Cargo.fkidSetor = Setor.idSetor ORDER BY nome;
    
SELECT * FROM Plantao 
				INNER JOIN Pessoa ON Plantao.fkidPessoa=Pessoa.idPessoa 
				INNER JOIN Turno ON Plantao.fkidTurno = Turno.idTurno 
					WHERE idPlantao=2 
					ORDER BY dataInício;
                    
SELECT * FROM Plantao 
	INNER JOIN Pessoa ON Plantao.fkidPessoa=Pessoa.idPessoa 
    INNER JOIN Turno ON Plantao.fkidTurno = Turno.idTurno 
		WHERE systemUser='Guilherme' 
			ORDER BY dataInício;
        
SELECT  
	FROM Cargo 
		JOIN Pessoa ON Cargo.idCargo = Pessoa.fkidCargo 
			ORDER BY nomeCargo;
/* Exemplo de INNER JOIN e máscara de datas, não adaptado para o banco ainda

SELECT
  detalhesproblema AS 'Detalhes',
  DATE_FORMAT(ordemservico.systemdate, '%d/%m/%Y às %H:%i:%s') AS 'Data de abertura',
  DATE_FORMAT(ordemok.systemdate, '%d/%m/%Y às %H:%i:%s') AS 'Data de resolução',
  usuario.nome AS 'Fechada por'
    FROM ordemservico
      INNER JOIN ordemok 
       ON ordemok.fkidordemservico=ordemservico.idordemservico
      INNER JOIN usuario
       ON usuario.idusuario=ordemok.fkidusuario; */