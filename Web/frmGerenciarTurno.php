<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="Author" content="Guilherme Pinheiro">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title>ATX2 Plantões - Turnos</title>
	</head>
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
			
		include "conexao.php";
		$busca = "SELECT * FROM Turno ORDER BY nomeTurno;";
		
		//A VARIÁVEL QUERY EXECUTA O COMANDO SQL
		$query = mysqli_query($conecta,$busca) or die (mysqli_error($conecta));
		
		//VERIFICA A QUANTIDADE DE REGISTROS ENCONTRADOS COM A BUSCA, COM O COMANDO SELECT
		$linha = mysqli_num_rows($query);
		$bgcolor = null;
		//Calcular tempo total do plantão
		/*
						function calcular_tempo_trasnc($hora1,$hora2,$hora3){ 
							$separar[1]=explode(':',$hora1); 
							$separar[2]=explode(':',$hora2); 
							$separar[3]=explode(':',$hora3); 

							$total_minutos_trasncorridos[1] = ($separar[1][0]*60)+$separar[1][1]; 
							$total_minutos_trasncorridos[2] = ($separar[2][0]*60)+$separar[2][1];
							$total_minutos_trasncorridos[3] = ($separar[3][0]*60)+$separar[3][1];
							
							if ($total_minutos_trasncorridos[1] > $total_minutos_trasncorridos[3]){
								$total_minutos_trasncorridos = $total_minutos_trasncorridos[1]-$total_minutos_trasncorridos[2] - $total_minutos_trasncorridos[3];
							} else {
								$total_minutos_trasncorridos = $total_minutos_trasncorridos[1]+$total_minutos_trasncorridos[2] - $total_minutos_trasncorridos[3];
							}
							if($total_minutos_trasncorridos<=59) return($total_minutos_trasncorridos); 
							elseif($total_minutos_trasncorridos>59){ 
							$HORA_TRANSCORRIDA = round($total_minutos_trasncorridos/60); 
							if($HORA_TRANSCORRIDA<=9) $HORA_TRANSCORRIDA='0'.$HORA_TRANSCORRIDA; 
							$MINUTOS_TRANSCORRIDOS = $total_minutos_trasncorridos%60; 
							if($MINUTOS_TRANSCORRIDOS<=9) $MINUTOS_TRANSCORRIDOS='0'.$MINUTOS_TRANSCORRIDOS; 
							return ($HORA_TRANSCORRIDA.':'.$MINUTOS_TRANSCORRIDOS); 

							} 
						}*/
		//CASO O NÚMERO DE LINHAS SEJA MAIOR DE QUE 0, EXECUTA O WHILE
		if ($linha > 0)
		{
	?>
		
	<body>
		<form id="frmCadastrarTurno" name="frmCadastrarTurno" method="post" action="insertCadastrarTurno.php">
			<table border="1" cellspacing="1" cellpadding="1" align="center">
				<tr>
					<td>
						<table>
							<tr>
								<td colspan="3">Cadastro de turnos:</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td width="112">&nbsp;</td>
								<td width="488">&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Nome:</td>
								<td>
									<label for="nomeTurno"></label>
									<input name="nomeTurno" type="text" id="nomeTurno" maxlength="20" required="required" />
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Hora de início:</td>
								<td>
									<label for="horaInício"></label>
									<input name="horaInício" type="time" id="horaInício" required="required" />
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Hora de intervalo:</td>
								<td>
									<label for="horaIntervalo"></label>
									<input name="horaIntervalo" type="time" id="horaIntervalo" required="required" />
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Tempo de intervalo:</td>
								<td>
									<label for="tempoIntervalo"></label>
									<input name="tempoIntervalo" type="time" id="tempoIntervalo" required="required" />
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Hora de término:</td>
								<td>
									<label for="horaTérmino"></label>
									<input name="horaTérmino" type="time" id="horaTérmino" required="required" />
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Horas de folga:</td>
								<td>
									<label for="horasFolga"></label>
									<input name="horasFolga" type="time" id="horasFolga" required="required" />
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							
							<tr>
							  <td>&nbsp;</td>
							  <td><input type="submit" name="cadastrar" id="cadastrar" value="Cadastrar" /></td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
		</form>
		<form id="frmAlterarTurno" name="frmAlterarTurno" method="post" action="frmAlterarTurno.php">
				<tr>
				<td>		
				
				<table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td colspan="3">Gerência de turnos:</td>
					</tr>

				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  <td class="titulo" "left">Turno</td>
				  <td class="titulo">Hora de início</td>
				  <td class="titulo">Hora do intervalo</td>
				  <td class="titulo">Tempo de intervalo</td>
				  <td class="titulo">Hora de término</td>
				  <!--<td class="titulo">Hora de trabalho</td>-->
				  <td class="titulo">Horas de folga</td>
				  <td><p class="titulo">Alterar</p></td>
				  <td><p class="titulo">Excluir</p></td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
									<?PHP
									$busca = "SELECT * FROM Turno ORDER BY horaInício;";
					
					//A VARIÁVEL QUERY EXECUTA O COMANDO SQL
					$query = mysqli_query($conecta,$busca) or die (mysqli_error($conecta));
					
								//INICIO DA BUSCA NO BANCO DE DADOS
						while ($resultado = mysqli_fetch_array($query))
						{
								
								
										/*//chamamos a função e imprimimos 
										$horasTrabalho = calcular_tempo_trasnc($resultado['horaTérmino'],$resultado['tempoIntervalo'],$hora3 = $resultado['horaInício']); */
								//cores das linhas
								if ($bgcolor == "#D2D7DB")
									$bgcolor = "#FFFFFF";
								else
									$bgcolor = "#D2D7DB";
						
					?>
				<tr>
					<td id="nomeTurno" class="maiusculo" bgcolor="<?php print $bgcolor; ?>" width="150">
						<?php print $resultado['nomeTurno']; ?></td>
					<td id="horaInício" class="maiusculo" bgcolor="<?php print $bgcolor; ?>" width="50">
						<?php print $resultado['horaInício']; ?></td>
					<td id="horaIntervalo" class="maiusculo" bgcolor="<?php print $bgcolor; ?>" width="50">
						<?php print $resultado['horaIntervalo']; ?></td>
					<td id="tempoIntervalo" class="maiusculo" bgcolor="<?php print $bgcolor; ?>" width="50">
						<?php print $resultado['tempoIntervalo']; ?></td>
					<td id="horaTérmino" class="maiusculo" bgcolor="<?php print $bgcolor; ?>" width="50">
						<?php print $resultado['horaTérmino']; ?></td>
					<!--
					<td class="maiusculo" bgcolor="<?php print $bgcolor; ?>" width="50">
						<?php/* print $horasTrabalho; */?></td>
					-->
					<td class="maiusculo" bgcolor="<?php print $bgcolor; ?>" width="50">
						<?php print $resultado['horasFolga']; ?></td>
					<td align="center" bgcolor="<?php print $bgcolor; ?>"width="35">
						<a href="indexAdmin.php?link=14&id=<?php print "$resultado[idTurno]"; ?>"><img src="imgem/editar.png" /></a></td>
					<td align="center" bgcolor="<?php print $bgcolor; ?>"width="35">
						<a href="indexAdmin.php?link=13&id=<?php print "$resultado[idTurno]"; ?>"><img src="imgem/excluir.png" /></a></td>
				</tr>
				<?php
					}//FECHAMENTO DO WHILE
					}//FECHAMENTO DO IF
					//CASO A BUSCA NÃO ENCONTRE REGISTRO NO BANCO, ELE EXIBE A MENSAGEM DE ERRO ABAIXO
					else
					{
				?>
				<tr>
				 <td colspan="5">
				 <p id="erro">Não foram encontrados registros!</p>
				 </td>
				</tr>
				<?php
					}
				?>
			  </table>
							
							
			<!------------------------------------------------------------------------------------>				
							
									
						</tr>
					</td>
				</tr>	
			</table>
			</form>
	</body>
</html>