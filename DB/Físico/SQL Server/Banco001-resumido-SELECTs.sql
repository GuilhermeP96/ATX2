USE ATX2Plant�es;

SELECT 
	Setor.idSetor AS 'C�digo',
	Setor.nomeSetor AS 'Nome'
		FROM Setor;

SELECT 
	Cargo.nomeCargo AS 'Cargo',
	Setor.nomeSetor AS 'Setor'
		FROM Cargo
			INNER JOIN Setor ON Cargo.fkidSetor=Setor.idSetor;

SELECT * FROM Turno;

SELECT * FROM Pessoa;

SELECT * FROM Plant�o;

/*use master;*/



/*SELECT produto.nome AS 'Nome do produto',
 produto.descricao AS 'Descri��o',
  produto.valorunitario AS 'Valor unit�rio',
   estoque.quantidade AS 'Quantidade' FROM produto
   INNER JOIN estoque ON produto.id=estoque.fkidproduto GROUP BY
    produto.nome, produto.descricao, produto.valorunitario, estoque.quantidade;*/