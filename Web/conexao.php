
<?php
	$servidor = "localhost";
	$usuariodb = "ATX2Sys";
	$senhadb = "SysATX2";
	$banco = "ATX2plantoes";
	$conecta = mysqli_connect($servidor, $usuariodb, $senhadb, $banco);
	if (!$conecta) {
		$statusConexao = "Falha ao conectar com o servidor!";
		die($statusConexao . mysqli_connect_error());
	}
	else {
		$statusConexao = "Conexão efetuada com sucesso!";
		/*echo $statusConexao;*/
	}
	mysqli_query($conecta,"SET NAMES 'utf8'");
	mysqli_query($conecta,'SET character_set_connection=utf8');
	mysqli_query($conecta,'SET character_set_client=utf8');
	mysqli_query($conecta,'SET character_set_results=utf8');
?>