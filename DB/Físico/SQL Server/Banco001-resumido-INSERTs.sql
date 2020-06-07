USE ATX2Plant�es;


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
			'Secret�ria'
		);

INSERT INTO Turno
	(
		nomeTurno,
		horaIn�cio,
		horaIntervalo,
		tempoIntervalo,
		horaT�rmino,
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
		observa��es,
		systemUser,
		senha,
		userAdmin
	)
	VALUES
		(
			'Camila C. G. Souza',
			12345678998,
			1,
			'Tem o comportamento simular ao Mestre dos Magos, aproveitar sua presen�a ao m�ximo para tirar d�vidas',
			'Cah',
			'200996',
			0
		)

INSERT INTO Plant�o
	(
		fkidPessoa,
		fkidTurno,
		dataIn�cio,
		codPlant�o
	)
	VALUES
		(
			1,
			1,
			'28/11/2016',
			1
		);


/*USE master;*/