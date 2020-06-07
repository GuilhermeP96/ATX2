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
	  
 //ATRAVÉS DO MÉTODO GET PEGAMOS O idTurno NA BARRA DO NAVEGADOR E ATRIBUIMOS O SEU VALOR PARA A VARIÁVEL idTurno 
	
 	//BUSCA NO BANCO DE DADOS AS INSFORMAÇÕES DO REGISTRO CUJO IGUAL AO DA VARIÁREL idTurno
 	$idTurno = $_GET['id'];
	$sql = "SELECT * FROM turno WHERE idTurno = $idTurno ORDER BY horaInício;";
	
	//EXECUTAR O COMANDO SQL ACIMA
	$query = mysqli_query($conecta,$sql) or die (mysqli_error($conecta));
	
	//ARRAY COM OS VALORES REFERENTES AO REGISTRO BUSCADO
	$resultado = mysqli_fetch_array($query,MYSQLI_ASSOC);
	
	//ATRIBUINDO VALORES DO VETOR NAS VARIÁVEIS
	$idTurno 			= $resultado["idTurno"];
	$nomeTurno 			= $resultado["nomeTurno"];
	$horaInício 		= $resultado["horaInício"];
	$horaIntervalo		= $resultado["horaIntervalo"];
	$tempoIntervalo		= $resultado["tempoIntervalo"];
	$horaTérmino		= $resultado["horaTérmino"];
	$horasFolga			= $resultado["horasFolga"];
	
?>
<body>
<form id="alterarTurno" name="alterarTurno" method="post" action="alterarTurno.php">
  <table width="600" border="1" cellspacing="0" cellpadding="0" align="center">
		<tr>
			<td>
				<table>
					<tr>
					  <td colspan="2">Atualização de cadastro de Turno:</td>
					</tr>
					<tr>
								<td width="112">&nbsp;</td>
								<td width="488">&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td><label for="idTurno"></label>
							  <input name="idTurno" type="hidden" id="idTurno" required="required" value="<?php print $idTurno; ?>" /></td>
							</tr>
							<tr>
								
								<td>Nome:</td>
								<td>
									<label for="nomeTurno"></label>
									<input name="nomeTurno" type="text" id="nomeTurno" maxlength="20" required="required" value="<?php print $nomeTurno; ?>"/>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Hora de início:</td>
								<td>
									<label for="horaInício"></label>
									<input name="horaInício" type="time" id="horaInício" required="required" value="<?php print $horaInício; ?>"/>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Hora de intervalo:</td>
								<td>
									<label for="horaIntervalo"></label>
									<input name="horaIntervalo" type="time" id="horaIntervalo" required="required" value="<?php print $horaIntervalo; ?>"/>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Tempo de intervalo:</td>
								<td>
									<label for="tempoIntervalo"></label>
									<input name="tempoIntervalo" type="time" id="tempoIntervalo" required="required" value="<?php print $tempoIntervalo; ?>"/>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Hora de término:</td>
								<td>
									<label for="horaTérmino"></label>
									<input name="horaTérmino" type="time" id="horaTérmino" required="required" value="<?php print $horaTérmino; ?>"/>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Horas de folga:</td>
								<td>
									<label for="horasFolga"></label>
									<input name="horasFolga" type="time" id="horasFolga" required="required" value="<?php print $horasFolga; ?>"/>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							
							<tr>
								<td>&nbsp;</td>
								<td><input type="submit" name="alterar" id="alterar" value="Alterar" /></td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						</table>
			</td>
		</tr>
  </table>
</form>
</body>
</html>