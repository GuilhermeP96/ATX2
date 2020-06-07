<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php  
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.*/
/*session_start();
if((!isset ($_SESSION['systemUser']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['systemUser']);
	unset($_SESSION['senha']);
	header('location:index.php');
	}

$logado = $_SESSION['systemUser'];*/
?>

	<head>
		<meta name="Author" content="Guilherme Pinheiro">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<title>Sistema de usuários - ATX2 Plantões</title>
		</head>
		
		<body>
			<div id="conteudo">
				<h1>Sistema de login e senha criptografados - Cadastro de usuário</h1>
				<div class="borda"></div>
				<p>Para ter acesso ao conteúdo exclusivo, por favor, cadastre-se utilizando o formulário abaixo!</p>
				<form method="post" action="cadastraUsuario.php" id="validaAcesso">
					<fieldset>
						<legend>Cadastro de usuários</legend>
						<table width="600" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><label for="nome">Nome:</label></td>
								<td><input type="text" name="nome" id="nome" maxlength="100" required /><div class="clear"></div></td>
							</tr>
							<tr>
								<td><label for="cPF">CPF:</label></td>
								<td><input type="number" name="cPF" id="cPF" maxlength="11" required /><div class="clear"></div></td>
							</tr>
							<tr>
								<td><label for="fkidcargo">fkidCargo(Temporário):</label></td>
								<td><input type="number" name="fkidCargo" id="fkidCargo" required /><div class="clear"></div></td>
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
								<td><input type="submit" value="Efetuar cadastro" /></td>
							</tr>
							
						
						</table>
					</fieldset>
				</form>
				<p>Se você já possui cadastro, <a href="index.php">clique aqui</a> para acessar o Conteúdo Exclusivo!
				</p>
			</div>
		</body>
</html>