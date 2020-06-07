<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="Author" content="Guilherme Pinheiro">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title>ATX2 Plantões</title>
	</head>
<?php
 include ("conexaoatx2.php");
?>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="900" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="139">Digite o nome:</td>
      <td width="213"><label for="buscar"></label>
      <input name="pesquisar" type="text" id="pesquisar" size="30" maxlength="50" /></td>
      <td width="81"><input type="submit" name="buscar" id="buscar" value="Buscar" /></td>
      <td width="159">&nbsp;</td>
      <td width="120">&nbsp;</td>
      <td width="188">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Nome</td>
      <td>Sobrenome</td>
      <td>Sexo</td>
      <td>Data de Nascimento</td>
      <td>CPF</td>
      <td>E-mail</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    <?php
	 	//PEGA O VALOR DO CAMPO DA PESQUISA
		$pesquisar = $_POST["pesquisar"];
		
		//A VARIÁVEL sql RECEBE O COMANDO SQL
		$sql = "SELECT * FROM Pessoa WHERE nome='$pesquisar'";
		
		//RECEBE SQL
		$query = mysql_query($sql) or die (mysql_error());
	 
	?>
    
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>