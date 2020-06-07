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
 $idPessoa = $_POST["idPessoa"];
 //CONECTANDO COM O BANDO
 include ("conexao.php");
 
 /*
 print $nomePessoa;
 print "<br/>";

 */
 
 //VARIÁVEL COM O COMANDO SQL
 $sql = "DELETE FROM Pessoa WHERE idPessoa = $idPessoa;";
 echo "DELETE FROM Pessoa WHERE idPessoa = $idPessoa;";;
 //EXECUTANDO O COMANDO DA VARIÁVEL ACIMA
 $query = mysqli_query($conecta,$sql) or die (mysqli_error($conecta));
 
/*
 print "Dados inseridos com sucesso!";
 */
 
 //DIRECIONAMENTO
 header ("Location: indexAdmin.php?link=4");
 
?>

