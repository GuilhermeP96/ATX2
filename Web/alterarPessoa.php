<!-- Ligando as variáveis de cadastro com o banco-->
<?php
	include "conexao.php";
				$idPessoa 	= $_POST['idPessoa'];
				
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
					
				if ($recebeSenha == "••••••••"){
					
					$consultaBanco = mysqli_query($conecta, "SELECT * FROM Pessoa WHERE systemUser = '$recebesystemUser';") or die (mysql_error());
					while ($resultado = mysqli_fetch_array($consultaBanco)) 
										{
					$criptoSenha = $resultado['senha'];
										}
					$insert = "UPDATE Pessoa SET nome = '$filtranome', cPF = $filtracPF, fkidCargo = $filtrafkidCargo, observacoes = '$filtraobservacoes', systemUser = '$filtrasystemUser', senha = '$criptoSenha', userAdmin = $filtrauserAdmin WHERE idPessoa = $idPessoa;";
				} else{
				
					
					
					$criptoSenha = criptoSenha($filtraSenha);
					
					$insert = "UPDATE Pessoa SET nome = '$filtranome', cPF = $filtracPF, fkidCargo = $filtrafkidCargo, observacoes = '$filtraobservacoes', systemUser = '$filtrasystemUser', senha = '$criptoSenha', userAdmin = $filtrauserAdmin WHERE idPessoa = $idPessoa;";
				}
				/*echo "'$filtranome', '$filtracPF', '$filtrafkidCargo', '$filtraobservacoes', '$filtrasystemUser', '$criptoSenha', '$filtrauserAdmin'<br/><br/>";*/
				
				$consultaBanco = mysqli_query($conecta, "SELECT * FROM Pessoa WHERE systemUser = '$recebesystemUser';") or die (mysql_error());
				
				echo "consulta OK<br/><br/>";
				
				$verificaBanco = mysqli_num_rows($consultaBanco);
				/*$verificaBanco = mysqli_query($conecta, "SELECT * FROM Pessoa WHERE systemUser = '$recebesystemUser';") or die (mysql_error());*/
				
				echo "Verifica banco = $verificaBanco <br/><br/>";
				
				
					mysqli_query ($conecta, $insert) or die (mysqli_error($conecta));
				
						
					header ("Location: indexAdmin.php?link=4");
					echo "<p>Seu cadastro foi efetuado com sucesso!</p>";
				
				/*echo "Passou do if ... verifica = $verificaBanco";*/
			 ?>

