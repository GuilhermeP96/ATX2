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
 $nomeTurno 	= $_POST["nomeTurno"];
 $horaInício 	= $_POST["horaInício"];
 $horaIntervalo	= $_POST["horaIntervalo"];
 $tempoIntervalo= $_POST["tempoIntervalo"];
 $horaTérmino	= $_POST["horaTérmino"];
 $horasFolga	= $_POST["horasFolga"];

 //CONECTANDO COM O BANDO
 include ("conexao.php");
 
 /*
 print $nomeCargo;
 print "<br/>";

 */
 
 //VARIÁVEL COM O COMANDO SQL
 $sql = "INSERT INTO Turno (nomeTurno, horaInício, horaIntervalo, tempoIntervalo, horaTérmino, horasFolga) VALUES ('$nomeTurno', '$horaInício', '$horaIntervalo', '$tempoIntervalo', '$horaTérmino', '$horasFolga');";
 echo "INSERT INTO Turno (nomeTurno, horaInício, horaIntervalo, tempoIntervalo, horaTérmino, horasFolga) VALUES ('$nomeTurno', '$horaInício', '$horaIntervalo', '$tempoIntervalo', '$horaTérmino', '$horasFolga');</br>";
 
 //EXECUTANDO O COMANDO DA VARIÁVEL ACIMA
 $query = mysqli_query($conecta,$sql) or die (mysqli_error($conecta));
/*
 print "Dados inseridos com sucesso!";
 */
 
 //DIRECIONAMENTO
 header ("Location: indexAdmin.php?link=5");
 
?>

