<?php
	if((!isset ($_SESSION['systemUser']) == true) and (!isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['systemUser']);
		unset($_SESSION['senha']);
		header('location:index.php');
		}

	$logado = $_SESSION['systemUser'];
	include "conexao.php";
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta name="Author" content="Guilherme Pinheiro">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<title>ATX2 Plantões - Cadastro de usuários</title>
	</head>
		 <body>
			<div id="conteudo">
			 <h1>ATX2 Plantões - Cadastro de usuários.</h1>
			 <div class="borda"></div>
			 <?php
				$recebenome = $_POST['nome'];
				$filtranome = filter_var($recebenome,FILTER_SANITIZE_SPECIAL_CHARS);
				$filtranome = filter_var($filtranome, FILTER_SANITIZE_MAGIC_QUOTES);
				
				$recebecPF = $_POST['cPF'];
				$filtracPF = filter_var($recebecPF,FILTER_SANITIZE_SPECIAL_CHARS);
				$filtracPF = filter_var($filtracPF, FILTER_SANITIZE_MAGIC_QUOTES);
				
				$recebefkidCargo = $_POST['fkidCargo'];
				$filtrafkidCargo = filter_var($recebefkidCargo,FILTER_SANITIZE_SPECIAL_CHARS);
				$filtrafkidCargo = filter_var($filtrafkidCargo, FILTER_SANITIZE_MAGIC_QUOTES);
				
				$recebeobservacoes = $_POST['observacoes'];
				$filtraobservacoes = filter_var($recebeobservacoes,FILTER_SANITIZE_SPECIAL_CHARS);
				$filtraobservacoes = filter_var($filtraobservacoes, FILTER_SANITIZE_MAGIC_QUOTES);
				
				$recebesystemUser = $_POST['systemUser'];
				$filtrasystemUser = filter_var($recebesystemUser,FILTER_SANITIZE_SPECIAL_CHARS);
				$filtrasystemUser = filter_var($filtrasystemUser, FILTER_SANITIZE_MAGIC_QUOTES);
				
				$recebeSenha = $_POST['senha'];
				$filtraSenha = filter_var($recebeSenha,FILTER_SANITIZE_SPECIAL_CHARS);
				$filtraSenha = filter_var($filtraSenha, FILTER_SANITIZE_MAGIC_QUOTES);
				
				$recebeuserAdmin = $_POST['userAdmin'];
				$filtrauserAdmin = filter_var($recebeuserAdmin,FILTER_SANITIZE_SPECIAL_CHARS);
				$filtrauserAdmin = filter_var($filtrauserAdmin, FILTER_SANITIZE_MAGIC_QUOTES);

				function criptoSenha($criptoSenha){
					return md5($criptoSenha);
				}
				
				$criptoSenha = criptoSenha($filtraSenha);
				
				$insert = "INSERT INTO Pessoa (nome, cPF, fkidCargo, observacoes, systemUser, senha, userAdmin) VALUES ('$filtranome', $filtracPF, $filtrafkidCargo,'$filtraobservacoes', '$filtrasystemUser', '$criptoSenha', $filtrauserAdmin);";
				
				/*echo "'$filtranome', '$filtracPF', '$filtrafkidCargo', '$filtraobservacoes', '$filtrasystemUser', '$criptoSenha', '$filtrauserAdmin'<br/><br/>";*/
				
				$consultaBanco = mysqli_query($conecta, "SELECT * FROM Pessoa WHERE systemUser = '$recebesystemUser';") or die (mysql_error());
				
				echo "consulta OK<br/><br/>";
				
				$verificaBanco = mysqli_num_rows($consultaBanco);
				/*$verificaBanco = mysqli_query($conecta, "SELECT * FROM Pessoa WHERE systemUser = '$recebesystemUser';") or die (mysql_error());*/
				
				echo "Verifica banco = $verificaBanco <br/><br/>";
				
				if($verificaBanco > 0){
					echo "<p>Prezado(a) <strong>$filtranome</strong>, o nome usuário informado (<strong><em>$recebesystemUser</em></strong>) já consta em nossa base de dados!</p>";
					echo "<p><a href='javascript:history.back();'>Volte</a> para a página anterior e informe um novo endereço! Obrigado!</p>";
				 return false;
				}
				else {
					/*echo "Estou no else antes da Query, era para ter Cadastro efetuado logo abaixo...( INSERT INTO Pessoa (nome, cPF, fkidCargo, observacoes, systemUser, senha, userAdmin) VALUES ('$filtranome', $filtracPF, $filtrafkidCargo,'$filtraobservacoes', '$filtrasystemUser', '$criptoSenha', $filtrauserAdmin);<br/><br/>";*/
					
					mysqli_query ($conecta, $insert) or die (mysqli_error($conecta));
					/*$insereDados = mysqli_query($conecta, "INSERT INTO Pessoa
	(
		nome,
		cPF,
		fkidCargo,
		observacoes,
		systemUser,
		senha,
		userAdmin
	)
	VALUES
		(
			'Camila C. G. Souza',
			12345678998,
			1,
			'Tem o comportamento similar ao Mestre dos Magos, aproveitar sua presença ao máximo para tirar dúvidas',
			'Cah',
			'fa44f45cbe3cf2a44f43301d3702e15d',
			0
		);") or die (mysql_error());*/

					echo "<p>Seu cadastro foi efetuado com sucesso!</p>";
				}
				/*echo "Passou do if ... verifica = $verificaBanco";*/
			 ?>
			</div>
		 </body>
</html>