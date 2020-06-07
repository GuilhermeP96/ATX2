USE ATX2Plantões;


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
			'00:08:00',
			'00:12:00',
			'00:01:00',
			'00:17:00',
			'00:15:00'
		);


INSERT INTO Pessoa
	(
		nome,
		cPF,
		fkidCargo,
		observações,
		systemUser,
		senha,
		userAdmin
	)
	VALUES
		(
			'Camila C. G. Souza',
			12345678998,
			1,
			'Tem o comportamento simular ao Mestre dos Magos, aproveitar sua presença ao máximo para tirar dúvidas',
			'Cah',
			'200996',
			0
		)

INSERT INTO Plantão
	(
		fkidPessoa,
		fkidTurno,
		dataInício,
		codPlantão
	)
	VALUES
		(
			1,
			1,
			'28/11/2016',
			1
		);


/*USE master;*/