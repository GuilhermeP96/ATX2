<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php  
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.*/
session_start();
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
?>
	<head>
		<meta name="Author" content="Guilherme Pinheiro">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title>ATX2 Plantões</title>
	</head>
	
	<body>

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td height="100">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td class="logo">ATX2</span></td>
					</tr>
					<tr>
						<td class="logo2">Consulta e gerência de Plantões - Bem vindo(a) <?php echo $_SESSION['nome']; ?> - Painel do Administrador</td>
						<td class="logo2"><a href="logout.php">Clique aqui</a> para sair do sistema</p></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
		
		
			<td id="menulow">
				<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr id="menu">
						<td id="link" width="130"><a href="indexAdmin.php?link=1" class="menu">Home</a></td>
						<td id="link" width="130"><a href="indexAdmin.php?link=2" class="menu">Setores</a></td>
						<td id="link" width="130"><a href="indexAdmin.php?link=3" class="menu">Cargos</a></td>
						<td id="link" width="130"><a href="indexAdmin.php?link=4" class="menu">Pessoas</a></td>
						<td id="link" width="130"><a href="indexAdmin.php?link=5" class="menu">Turnos</a></td>
						<td id="link" width="130"><a href="indexAdmin.php?link=10" class="menu">Plantões</a></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		
		<tr>
			<td>
				<table width="900" border="6" bordercolor="#305A84" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td valign="top" id="conteudolow">
							<?php
								
								
								$link = $_GET["link"];
								$pag[1] = "home.php";
								$pag[2] = "frmGerenciarSetor.php";
								$pag[3] = "frmGerenciarCargo.php";
								$pag[4] = "frmGerenciarPessoa.php";
								$pag[5] = "frmGerenciarTurno.php";
								$pag[6] = "cadastrado.php";
								$pag[7] = "frmalterarSetor.php";
								$pag[8] = "alterarSetor.php";
								$pag[9] = "frmAlterarCargo.php";
								$pag[10] = "cadastrado.php";
								$pag[11] = "frmExcluirSetor.php";
								$pag[12] = "excluido.php";
								$pag[13] = "frmExcluirTurno.php";
								$pag[14] = "frmAlterarTurno.php";
								$pag[15] = "frmExcluirCargo.php";
								$pag[16] = "frmAlterarPessoa.php";
								$pag[17] = "frmExcluirPessoa.php";
								$pag[18] = "frmGerenciarPlantoes.php";
								$pag[19] = "frmAlterarPlantoes.php";
								$pag[20] = "frmExcluirPlantoes.php";
								if (!empty($link))
								{
									if (file_exists($pag[$link]))
									{
										include $pag[$link];	
									}
									else
									{
										print "<p id='erro'>A página não pode ser encontrada!</p>";	
									}
								}
								else
								{
									$link = 1;
									if (file_exists($pag[$link]))
									{
										include $pag[$link];	
									}
									else
									{
										print "<p id='erro'>A página não pode ser encontrada!</p>";	
									}
									/*print "<p id='erro'>Erro interno. Contate o administrador do sistema!</p>";*/ 
								}

							?>
						</td>
					</tr>
				</table>
			</td>

		</tr>
		
		<tr>
			<td id="footer">© 2016 ATX2 Softwares. Todos os direitos reservados.</td>
		</tr>
	</table>
	</body>
</html>