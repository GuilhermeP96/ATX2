<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="Author" content="Guilherme Pinheiro">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<title>ATX2 Plantões - Login</title>
	</head>

	<body>
		<div id="conteudo">
			<h1>ATX2 Plantões - Login</h1>
			<div class="borda"></div>
			<p>Para ter acesso ao <strong>ATX2 Plantões</strong>, por favor, entre utilizando o formulário abaixo!</p>
			<!--<p>Ainda não é cadastrado em nosso sistema? <a href="cadastroUsuario.php">Cadastre-se</a>!</p>-->
			<form method="post" action="validaacesso.php" id="validaAcesso">
				<fieldset>
					<legend>Login</legend>
					<label for="systemUser">Usuário:</label>
					<input type="systemUser" name="systemUser" id="systemUser" required />
					<div class="clear"></div>
					<label for="senha">Senha:</label>
					<input type="password" name="senha" id="senha" required />
					<div class="clear"></div>
					<input type="submit" value="Acessar o sistema" />
				</fieldset>
			</form>
			<!--
				<p><small>Esqueceu seus dados? <a href="fsenha.php">Clique aqui!</a></small></p>
				-->
		</div>
	</body>
</html>