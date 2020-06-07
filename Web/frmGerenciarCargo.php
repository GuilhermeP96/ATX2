<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="Author" content="Guilherme Pinheiro">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title>ATX2 Plantões - Cargos</title>
	</head>
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
			
		include "conexao.php";
		$busca = "SELECT * FROM Cargo INNER JOIN Setor ON Cargo.fkidSetor=Setor.idSetor ORDER BY nomeCargo;";
		
		//A VARIÁVEL QUERY EXECUTA O COMANDO SQL
		$query = mysqli_query($conecta,$busca) or die (mysqli_error($conecta));
		
		//VERIFICA A QUANTIDADE DE REGISTROS ENCONTRADOS COM A BUSCA, COM O COMANDO SELECT
		$linha = mysqli_num_rows($query);
		$bgcolor = null;
		//CASO O NÚMERO DE LINHAS SEJA MAIOR DE QUE 0, EXECUTA O WHILE
		if ($linha > 0)
		{
	?>
		
	<body>
		<form id="frmCadastrarCargo" name="frmCadastrarCargo" method="post" action="insertCadastrarCargo.php">
			<table border="1" cellspacing="1" cellpadding="1" align="center">
				<tr>
					<td>
						<table>
							<tr>
								<td colspan="3">Cadastro de cargos:</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td width="112">&nbsp;</td>
								<td width="488">&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Nome:</td>
								<td>
									<label for="nomeCargo"></label>
									<input name="nomeCargo" type="text" id="nomeCargo" maxlength="20" required="required" />
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td><label for="fkidSetor">Setor:</label></td>
								<td><select name="fkidSetor" class="textfield" id="fkidSetor">
									<?php
										$busca = "SELECT * FROM Setor ORDER BY nomeSetor;";
		
										//A VARIÁVEL QUERY EXECUTA O COMANDO SQL
										$query = mysqli_query($conecta,$busca) or die (mysqli_error($conecta));
										
										//VERIFICA A QUANTIDADE DE REGISTROS ENCONTRADOS COM A BUSCA, COM O COMANDO SELECT
										$linha = mysqli_num_rows($query);
										$bgcolor = null;
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
							
							<tr>
							  <td>&nbsp;</td>
							  <td><input type="submit" name="cadastrar" id="cadastrar" value="Cadastrar" /></td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
		</form>
		<form id="frmAtualizarCargo" name="frmAlterarCargo" method="frmAlterarCargo" action="frmalterarCargo.php">
				<tr>
				<td>
<!------------------------------------------------------------------------------------>				
				
				<table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td colspan="3">Gerência de cargos:</td>
					</tr>

    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="titulo">Cargo</td>
      <td class="titulo">Setor</td>
      <td><p class="titulo">Alterar</p></td>
      <td><p class="titulo">Excluir</p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
						<?PHP
						$busca = "SELECT * FROM Cargo INNER JOIN Setor ON Cargo.fkidSetor=Setor.idSetor;";
		
		//A VARIÁVEL QUERY EXECUTA O COMANDO SQL
		$query = mysqli_query($conecta,$busca) or die (mysqli_error($conecta));
		
					//INICIO DA BUSCA NO BANCO DE DADOS
			while ($resultado = mysqli_fetch_array($query))
			{
					//cores das linhas
					if ($bgcolor == "#D2D7DB")
						$bgcolor = "#FFFFFF";
					else
						$bgcolor = "#D2D7DB";
			
		?>
    <tr>
		<td class="maiusculo" bgcolor="<?php print $bgcolor; ?>" width="200"><?php print $resultado['nomeCargo']; ?></td>
		<td class="maiusculo" bgcolor="<?php print $bgcolor; ?>" width="200"><?php print $resultado['nomeSetor']; ?></td>
		<!-- ABAIXO CRIAMOS O LINK PARA ALTERAR A PESSOA PASSANDO O VALOR DO ID PARA A BARRA DO NAVEGADOR -->
		<td align="center" bgcolor="<?php print $bgcolor; ?>"width="35"><a href="indexAdmin.php?link=9&id=<?php print "$resultado[idCargo]"; ?>"><img src="imgem/editar.png" /></a></td>
		<td align="center" bgcolor="<?php print $bgcolor; ?>"width="35"><a href="indexAdmin.php?link=15&id=<?php print "$resultado[idCargo]"; ?>"><img src="imgem/excluir.png" /></a></td>
    </tr>
    <?php
		}//FECHAMENTO DO WHILE
		}//FECHAMENTO DO IF
		//CASO A BUSCA NÃO ENCONTRE REGISTRO NO BANCO, ELE EXIBE A MENSAGEM DE ERRO ABAIXO
		else
		{
	?>
    <tr>
     <td colspan="5">
     <p id="erro">Não foram encontrados registros!</p>
     </td>
    </tr>
    <?php
		}
	?>
  </table>
				
				
<!------------------------------------------------------------------------------------>				
				
						
						</tr>
					</td>
				</tr>	
			</table>
			</form>
	</body>
</html>