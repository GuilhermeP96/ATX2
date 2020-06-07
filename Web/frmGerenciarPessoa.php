<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="Author" content="Guilherme Pinheiro">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title>ATX2 Plantões - Pessoas</title>
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
		$busca = "SELECT * FROM Pessoa INNER JOIN Cargo ON Pessoa.fkidCargo=Cargo.idCargo INNER JOIN Setor ON Cargo.fkidSetor = Setor.idSetor ORDER BY nome;";
		
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
		<form id="frmCadastrarPessoa" name="frmCadastrarPessoa" method="post" action="insertCadastrarPessoa.php">
			<table border="1" cellspacing="1" cellpadding="1" align="center">
				<tr>
					<td>
						<table>
							<tr>
								<td colspan="3">Cadastro de pessoas:</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td><label for="nome">Nome:</label></td>
								<td><input type="text" name="nome" id="nome" maxlength="100" required /><div class="clear"></div></td>
							</tr>
							<tr>
								<td><label for="cPF">CPF:</label></td>
								<td><input type="number" name="cPF" id="cPF" maxlength="11" required /><div class="clear"></div></td>
							</tr>
							<tr>
							<td><label for="fkidCargo">Cargo:</label></td>
								<td><select name="fkidCargo" class="textfield" id="fkidCargo">
									<?php
										$busca = "SELECT idCargo, nomeCargo, nomeSetor FROM Cargo JOIN Setor ON Cargo.fkidsetor = Setor.idSetor ORDER BY nomeCargo;";
		
										//A VARIÁVEL QUERY EXECUTA O COMANDO SQL
										$query = mysqli_query($conecta,$busca) or die (mysqli_error($conecta));
										
										//VERIFICA A QUANTIDADE DE REGISTROS ENCONTRADOS COM A BUSCA, COM O COMANDO SELECT
										$linha = mysqli_num_rows($query);
										$bgcolor = null;
										while ($resultado = mysqli_fetch_array($query)) 
										{
									?>
											<option name="fkidCargo" value="<?php print $resultado['idCargo']; ?>"><?php print $resultado['nomeCargo']. " - " .$resultado['nomeSetor'];?></option>
									<?PHP
										}
									?>
									<div class="clear"></div>
								</td>
							</tr>
							<tr>
								<td><label for="observacoes">Observações:</label></td>
								<td><input type="text" name="observacoes" id="observacoes" maxlength="250" required /><div class="clear"></div></td>
							</tr>
							<tr>
								<td><label for="systemUser">Usuário:</label></td>
								<td><input type="text" name="systemUser" id="systemUser" maxlength="20" required /><div class="clear"></div></td>
							</tr>
							<tr>
								<td><label for="senha">Senha:</label></td>
								<td><input type="password" name="senha" id="senha" maxlength="30" required /><div class="clear"></div></td>
							</tr>
							<tr>
								<td><label for="userAdmin">Administrador:</label></td>
								<td><select name="userAdmin" class="textfield" id="userAdmin">
									<option value="0">Não</option>
									<option value="1">Sim</option>
									<div class="clear"></div>
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><input type="submit" value="Cadastrar" /></td>
							</tr>
						</table>
					</td>
				</tr>
		</form>
		<form id="frmAlterarPessoa" name="frmAlterarPessoa" method="post" action="frmAlterarPessoa.php">
				<tr>
				<td>				
				<table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td colspan="3">Gerência de pessoas:</td>
					</tr>

    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="titulo">Nome</td>
      <td class="titulo">CPF</td>
      <td class="titulo">Cargo</td>
      <td class="titulo">Observações</td>
      <td class="titulo">Usuário</td>
      <td class="titulo">Admin</td>
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
						$busca = "SELECT * FROM Pessoa INNER JOIN Cargo ON Pessoa.fkidCargo=Cargo.idCargo INNER JOIN Setor ON Cargo.fkidSetor = Setor.idSetor ORDER BY nome;";
		
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
		<td class="maiusculo" bgcolor="<?php print $bgcolor; ?>" width="100"><?php print $resultado['nome']; ?></td>
		<td class="maiusculo" bgcolor="<?php print $bgcolor; ?>" width="100"><?php print $resultado['cPF']; ?></td>
		<td class="maiusculo" bgcolor="<?php print $bgcolor; ?>" width="100"><?php print $resultado['nomeCargo']; ?></td>
		<td class="maiusculo" bgcolor="<?php print $bgcolor; ?>" width="400"><?php print $resultado['observacoes']; ?></td>
		
		<td class="maiusculo" bgcolor="<?php print $bgcolor; ?>" width="100"><?php print $resultado['systemUser']; ?></td>
		<td class="maiusculo" bgcolor="<?php print $bgcolor; ?>" width="50">
			<?php if ($resultado['userAdmin'] == 0){
				print "Não";
			} else{
				print "Sim";
			}
			?></td>
		<!-- ABAIXO CRIAMOS O LINK PARA ALTERAR A PESSOA PASSANDO O VALOR DO ID PARA A BARRA DO NAVEGADOR -->
		<td align="center" bgcolor="<?php print $bgcolor; ?>"width="35"><a href="indexAdmin.php?link=16&id=<?php print "$resultado[idPessoa]"; ?>"><img src="imgem/editar.png" /></a></td>
		<td align="center" bgcolor="<?php print $bgcolor; ?>"width="35"><a href="indexAdmin.php?link=17&id=<?php print "$resultado[idPessoa]"; ?>"><img src="imgem/excluir.png" /></a></td>
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