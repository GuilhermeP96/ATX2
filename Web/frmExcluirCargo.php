<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>excluir cadastros-+</title>
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
	  
 //ATRAVÉS DO MÉTODO GET PEGAMOS O idCargo NA BARRA DO NAVEGADOR E ATRIBUIMOS O SEU VALOR PARA A VARIÁVEL idCargo 
	
 	//BUSCA NO BANCO DE DADOS AS INSFORMAÇÕES DO REGISTRO CUJO IGUAL AO DA VARIÁREL idCargo
 	$idCargo = $_GET['id'];
	$sql = "SELECT * FROM Cargo WHERE idCargo=$idCargo;";
	
	//EXECUTAR O COMANDO SQL ACIMA
	$query = mysqli_query($conecta,$sql) or die (mysqli_error($conecta));
	
	//ARRAY COM OS VALORES REFERENTES AO REGISTRO BUSCADO
	$resultado = mysqli_fetch_array($query,MYSQLI_ASSOC);
	
	//ATRIBUINDO VALORES DO VETOR NAS VARIÁVEIS
	$idCargo 			= $resultado["idCargo"];
	$nomeCargo 			= $resultado["nomeCargo"];
	
?>
<body>
<form id="excluirsetor" name="excluirsetor" method="post" action="excluirCargo.php">
  <table width="600" border="1" cellspacing="0" cellpadding="0" align="center">
    <tr>
		<td>
			<table>
				<tr>
				  <td colspan="2">Excluir cadastro de Cargo:</td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td><label for="idCargo"></label>
				  <input name="idCargo" type="hidden" id="idCargo" required="required" value="<?php print $idCargo; ?>" /></td>
				</tr>
				<tr>
				  <td>Deseja excluir o Cargo <b><?php print $nomeCargo; ?></b>?</td>
				  
				</tr>
				
				<tr>
				  <td><input type="submit" name="excluir" id="excluir" value="Excluir" /></td>
				</tr>
			</table>
		</td>
	</tr>
  </table>
</form>
</body>
</html>