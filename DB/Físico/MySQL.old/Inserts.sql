/*Exemplos de INSERTs*/

USE ATX2plantoes; /*Apenas para teste de cadastro direto no MySQL*/

INSERT INTO Setor
	(
		nomeSetor
	)
	VALUES
		(
			'Administrativo'
		);

INSERT INTO Cargo
	(
		fkidsetor,
		nomeCargo
	)
	VALUES
		(
			1,
			'Secretária'
		);

INSERT INTO Turno
	(
		nomeTurno,
		horaInício,
		horaIntervalo,
		tempoIntervalo,
		horaTérmino,
		horasFolga
	)
	VALUES
		(
			'CLT diurno',
			'08:00:00',
			'12:00:00',
			'01:00:00',
			'17:00:00',
			'15:00:00'
		);

DELETE FROM Pessoa WHERE systemUser = 'Cah';
INSERT INTO Pessoa
	(
		nome,
		cPF,
		fkidCargo,
		observacoes,
		systemUser,
		senha,
		userAdmin
	)
	VALUES
		(
			'Camila C. G. Souza',
			12345678998,
			1,
			'Tem o comportamento similar ao Mestre dos Magos, aproveitar sua presença ao máximo para tirar dúvidas',
			'Cah',
			'fa44f45cbe3cf2a44f43301d3702e15d',
			1
		);

INSERT INTO Plantao
	(
		fkidPessoa,
		fkidTurno,
		dataInício,
		codPlantao
	)
	VALUES
		(
			1,
			2,
			'2016/11/30',
			1
		);