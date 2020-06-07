<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
						<td class="logo2">Consulta de Plantões</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td id="menulow">
				<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr id="menu">
						<td id="link" width="130"><a href="index.php?link=1" class="menu">Home</a></td>
						<td id="link" width="130"><a href="index.php?link=2" class="menu">Cadastrar Setor</a></td>
						<td id="link" width="130"><a href="index.php?link=3" class="menu">Buscar</a></td>
						<td id="link" width="130"><a href="index.php?link=4" class="menu">Alterar</a></td>
						<td id="link" width="130"><a href="index.php?link=5" class="menu">Excluir</a></td>
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
								$pag[2] = "frmCadastrarSetor.php";
								$pag[3] = "buscar.php";
								$pag[4] = "alterar.php";
								$pag[5] = "excluir.php";
								$pag[6] = "cadastrado.php";
							 	
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
									print "<p id='erro'>Erro interno. Contate o administrador do sistema!</p>"; 
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