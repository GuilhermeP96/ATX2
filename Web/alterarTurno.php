<!-- Ligando as variáveis de cadastro com o banco-->
<?php
/*if((!isset ($_SESSION['systemUser']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['systemUser']);
	unset($_SESSION['senha']);
	unset($_SESSION['userAdmin']);
	header('location:index.php');
	}
	if ($_SESSION['userAdmin'] == 0)
	{
			header('location:index.php');
	}*/
 //PEGANDO OS VALORES DO FORMULÁRIO
	$idTurno 			= $_POST["idTurno"];
	$nomeTurno 			= $_POST["nomeTurno"];
	$horaInício 		= $_POST["horaInício"];
	$horaIntervalo		= $_POST["horaIntervalo"];
	$tempoIntervalo		= $_POST["tempoIntervalo"];
	$horaTérmino		= $_POST["horaTérmino"];
	$horasFolga			= $_POST["horasFolga"];
 //CONECTANDO COM O BANDO
 include ("conexao.php");
 
 /*
 print $nomeTurno;
 print "<br/>";

 */
 echo "Var idTurno: $idTurno </br></br>";
 //VARIÁVEL COM O COMANDO SQL
 $sql = "UPDATE Turno SET nomeTurno ='$nomeTurno', horaInício='$horaInício', horaIntervalo='$horaIntervalo', tempoIntervalo='$tempoIntervalo', horaTérmino='$horaTérmino', horasFolga='$horasFolga' WHERE idTurno = $idTurno;";
 
 echo "Código inserido: UPDATE Turno SET nomeTurno ='$nomeTurno', horaInício='$horaInício', horaIntervalo='$horaIntervalo', tempoIntervalo='$tempoIntervalo', horaTérmino='$horaTérmino', horasFolga='$horasFolga' WHERE idTurno = $idTurno;</br></br>Erro: ";
 //EXECUTANDO O COMANDO DA VARIÁVEL ACIMA
 $query = mysqli_query($conecta,$sql) or die (mysqli_error($conecta));
 
/*
 print "Dados inseridos com sucesso!";
 */
 
 //DIRECIONAMENTO
 header ("Location: indexAdmin.php?link=5");
 
?>

