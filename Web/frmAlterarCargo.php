<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alterar cadastros-+</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
</head>
<?php 
if((!isset ($_SESSION['systemUser']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['systemUser']);
	unset($_SESSION['senha']);
	unset($_SESSION['userAdmin']);
	header('location:index.php');
	}
	if ($_SESSION['userAdmin'] == 0)
	{
			header('location:index.php');
	}
include ("conexao.php");
	  
 //ATRAVÉS DO MÉTODO GET PEGAMOS O idCargo NA BARRA DO NAVEGADOR E ATRIBUIMOS O SEU VALOR PARA A VARIÁVEL idCargo 
	
 	//BUSCA NO BANCO DE DADOS AS INSFORMAÇÕES DO REGISTRO CUJO IGUAL AO DA VARIÁREL idCargo
 	$idCargo = $_GET['id'];
	$sql = "SELECT Cargo.idCargo, Cargo.nomeCargo, Cargo.fkidSetor, Setor.nomeSetor FROM Cargo INNER JOIN Setor ON Cargo.fkidSetor=Setor.idSetor WHERE idCargo=$idCargo;";
	
	//EXECUTAR O COMANDO SQL ACIMA
	$query = mysqli_query($conecta,$sql) or die (mysqli_error($conecta));
	
	//ARRAY COM OS VALORES REFERENTES AO REGISTRO BUSCADO
	$resultado = mysqli_fetch_array($query,MYSQLI_ASSOC);
	
	//ATRIBUINDO VALORES DO VETOR NAS VARIÁVEIS
	$idCargo 			= $resultado["idCargo"];
	$nomeCargo 			= $resultado["nomeCargo"];
	$fkidSetor			= $resultado["fkidSetor"];
	$nomeSetor			= $resultado["nomeSetor"];
	
?>
<body>
<form id="alterarCargo" name="alterarCargo" method="post" action="alterarCargo.php">
  <table width="600" border="1" cellspacing="0" cellpadding="0" align="center">
		<tr>
			<td>
				<table>
					<tr>
					  <td colspan="2">Atualização de cadastro de Cargo:</td>
					</tr>
					<tr>
					  <td>&nbsp;</td>
					  <td><label for="idCargo"></label>
					  <input name="idCargo" type="hidden" id="idCargo" required="required" value="<?php print $idCargo; ?>" /></td>
					</tr>
					<tr>
					  <td>Cargo:</td>
					  <td><label for="nomeCargo"></label>
					  <input name="nomeCargo" type="text" id="nomeCargo" maxlength="20" required="required" value="<?php print $nomeCargo; ?>" /></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
								<td><label for="fkidSetor">Setor atual:</label></td>
								<td>
									<?php $busca = "SELECT * FROM Setor WHERE idSetor=$fkidSetor ORDER BY nomeSetor;";
		
										//A VARIÁVEL QUERY EXECUTA O COMANDO SQL
										$query = mysqli_query($conecta,$busca) or die (mysqli_error($conecta));
										
										//VERIFICA A QUANTIDADE DE REGISTROS ENCONTRADOS COM A BUSCA, COM O COMANDO SELECT
										$linha = mysqli_num_rows($query);
										
										while ($resultado = mysqli_fetch_array($query)) 
										{
											$nomeSetor = $resultado["nomeSetor"];
										}
									?>
									<label for="fkidSetor"> <?php print $nomeSetor; ?></label>
								</td>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>Novo setor:</td>
									<td><select name="fkidSetor" class="textfield" id="fkidSetor">
										<?php
											$busca = "SELECT * FROM Setor ORDER BY nomeSetor;";
			
											//A VARIÁVEL QUERY EXECUTA O COMANDO SQL
											$query = mysqli_query($conecta,$busca) or die (mysqli_error($conecta));
											
											//VERIFICA A QUANTIDADE DE REGISTROS ENCONTRADOS COM A BUSCA, COM O COMANDO SELECT
											$linha = mysqli_num_rows($query);
											
											while ($resultado = mysqli_fetch_array($query)) 
											{
										?>
												<option name="fkidSetor" value="<?php print $resultado['idSetor']; ?>"><?php print $resultado['nomeSetor']; ?></option>
										<?PHP
											}
										?>
										<div class="clear"></div>
									</td>
								</tr>
							</tr>
					<tr>
					  <td>&nbsp;</td>
					  <td><input type="submit" name="alterar" id="alterar" value="Alterar" /></td>
					</tr>
				</table>
			</td>
		</tr>
  </table>
</form>
</body>
</html>