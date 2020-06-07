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
	  
 //ATRAVÉS DO MÉTODO GET PEGAMOS O idPessoa NA BARRA DO NAVEGADOR E ATRIBUIMOS O SEU VALOR PARA A VARIÁVEL idPessoa 
	
 	//BUSCA NO BANCO DE DADOS AS INSFORMAÇÕES DO REGISTRO CUJO IGUAL AO DA VARIÁREL idPessoa
 	$idPessoa = $_GET['id'];
	$sql = "SELECT * FROM Pessoa INNER JOIN Cargo ON Pessoa.fkidCargo=Cargo.idCargo INNER JOIN Setor ON Cargo.fkidSetor = Setor.idSetor WHERE idPessoa=$idPessoa ORDER BY nome;";
	
	//EXECUTAR O COMANDO SQL ACIMA
	$query = mysqli_query($conecta,$sql) or die (mysqli_error($conecta));
	
	//ARRAY COM OS VALORES REFERENTES AO REGISTRO BUSCADO
	$resultado = mysqli_fetch_array($query,MYSQLI_ASSOC);
	
	//ATRIBUINDO VALORES DO VETOR NAS VARIÁVEIS
	$nome 				= $resultado["nome"];
	$cPF				= $resultado["cPF"];
	$fkidCargo			= $resultado["fkidCargo"];
	$observacoes		= $resultado["observacoes"];
	$systemUser			= $resultado["systemUser"];
	$userAdmin			= $resultado["userAdmin"];
	
?>
<body>
<form id="alterarPessoa" name="alterarPessoa" method="post" action="alterarPessoa.php">
			<table border="1" cellspacing="1" cellpadding="1" align="center">
				<tr>
					<td>
						<table>
							<tr>
								<td colspan="3">Alterar pessoa:</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td><label for="idPessoa"></label>
							  <input name="idPessoa" type="hidden" id="idPessoa" required="required" value="<?php print $idPessoa; ?>" /></td>
							</tr>
							<tr>
								<td><label for="nome">Nome:</label></td>
								<td><input type="text" name="nome" id="nome" maxlength="100" required 
								value="<?php print $nome; ?>"/><div class="clear"></div></td>
							</tr>
							<tr>
								<td><label for="cPF">CPF:</label></td>
								<td><input type="number" name="cPF" id="cPF" maxlength="11" required 
								value="<?php print $cPF; ?>"/><div class="clear"></div></td>
							</tr>
							<tr>
								<td><label for="fkidCargo">Cargo atual:</label></td>
								<td>
									<?php 
										$busca = "SELECT * FROM Cargo WHERE idCargo=$fkidCargo ORDER BY nomeCargo;";
		
										//A VARIÁVEL QUERY EXECUTA O COMANDO SQL
										$query = mysqli_query($conecta,$busca) or die (mysqli_error($conecta));
										
										//VERIFICA A QUANTIDADE DE REGISTROS ENCONTRADOS COM A BUSCA, COM O COMANDO SELECT
										$linha = mysqli_num_rows($query);
										
										while ($resultado = mysqli_fetch_array($query)) 
										{
											$nomeCargo = $resultado["nomeCargo"];
										}
									?>
									<label for="fkidCargo"> <?php print $nomeCargo; ?></label>
								</td>
							<tr>
							<td><label for="fkidCargo">Cargo:</label></td>
								<td><select name="fkidCargo" class="textfield" id="fkidCargo">
									<?php
										$busca = "SELECT idCargo, nomeCargo, nomeSetor FROM Cargo INNER JOIN Setor ON Cargo.fkidsetor = Setor.idSetor ORDER BY nomeCargo;";
		
										//A VARIÁVEL QUERY EXECUTA O COMANDO SQL
										$query = mysqli_query($conecta,$busca) or die (mysqli_error($conecta));
										
										//VERIFICA A QUANTIDADE DE REGISTROS ENCONTRADOS COM A BUSCA, COM O COMANDO SELECT
										$linha = mysqli_num_rows($query);
										$bgcolor = null;
										while ($resultado = mysqli_fetch_array($query)) 
										{
									?>
											<option value="<?php print $resultado['idCargo']; ?>"><?php print $resultado['nomeCargo']. " - " .$resultado['nomeSetor'];?></option>
									<?PHP
										}
									?>
									<div class="clear"></div>
								</td>
							</tr>
							<tr>
								<td><label for="observacoes">Observações:</label></td>
								<td><input type="text" name="observacoes" id="observacoes" maxlength="250" required value="<?php print $observacoes; ?>"/><div class="clear"></div></td>
							</tr>
							<tr>
								<td><label for="systemUser">Usuário:</label></td>
								<td><input type="text" name="systemUser" id="systemUser" maxlength="20" required 
								value="<?php print $systemUser; ?>"/><div class="clear"></div></td>
							</tr>
							
							
							
							<tr>
								<td><label for="userAdminAtual">Administrador:</label></td>
								<td class="maiusculo" bgcolor="<?php print $bgcolor; ?>" width="50">
									<?php if ($userAdmin == 0){
										print "Não";
									} else{
										print "Sim";
									}
									
									?>
								</td>
							</tr>
							<tr>
								<td><label for="userAdmin">Tipo de acesso:</label></td>
								
							
								<td><select name="userAdmin" class="textfield" id="userAdmin">
									<option value="0">Padrão</option>
									<option value="1">Administrador</option>
									<div class="clear"></div>
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td><label for="senha">Senha:</label></td>
								<td><input type="password" name="senha" id="senha" maxlength="20" required 
								value="••••••••" div class="clear"></div></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><input type="submit" value="Alterar" /></td>
							</tr>
						</table>
					</td>
				</tr>
</form>
</body>
</html>