<?php
     session_start();
     include 'conexao.php';
?>
<!DOCTYPE HTML>
<html lang="br" class="no-js">
     <head>
        <meta name="Author" content="Guilherme Pinheiro" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css"  />
		<title>ATX2 Plantões - Validação de acesso</title>
     </head>
     <body>
          <div id="conteudo">
                <h1>ATX2 Plantões - Validação de acesso</h1>
                <div class="borda"></div>
                <?php
                        $recebesystemUser = $_POST['systemUser'];
                        $filtrasystemUser = filter_var($recebesystemUser,FILTER_SANITIZE_SPECIAL_CHARS);
                        $filtrasystemUser = filter_var($filtrasystemUser, FILTER_SANITIZE_MAGIC_QUOTES);
                        $recebeSenha = $_POST['senha'];
                        $filtraSenha = filter_var($recebeSenha,FILTER_SANITIZE_SPECIAL_CHARS);
                        $filtraSenha = filter_var($filtraSenha, FILTER_SANITIZE_MAGIC_QUOTES);
                        function criptoSenha($criptoSenha){
                             return md5($criptoSenha);
                        }
                        $criptoSenha = criptoSenha($filtraSenha);
						$consultaInformacoes = mysqli_query($conecta, "SELECT * FROM Pessoa WHERE systemUser = '$filtrasystemUser' AND senha = '$criptoSenha'") or die (mysqli_error($conecta));
                        $verificaInformacoes = mysqli_num_rows($consultaInformacoes);
						/*echo "SELECT * FROM Pessoa WHERE systemUser = '$filtrasystemUser' AND senha = '$criptoSenha' e verifica = $verificaInformacoes</br></br>";*/
                        if($verificaInformacoes == 1){
                             while ($result=mysqli_fetch_array($consultaInformacoes,MYSQLI_ASSOC)){
                                  $_SESSION['systemUser']=true;
								  $_SESSION['pessoa_systemUser']=$result['systemUser'];
                                  $_SESSION['nome']=$result['nome'];
								  $_SESSION['userAdmin']=$result['userAdmin'];
                                  if ($_SESSION['userAdmin'] == 1) {
									  header("Location: indexAdmin.php?link=1");
								  } else {
									  header("Location: indexUser.php");
								  }
								  /*header("Location: conteudoExclusivo.php");*/
								  echo "Login efetuado! Solicitando acesso...";
                             }
                        } else {
                             echo "<p>Nome de Usuário ou Senha inválidos. Por favor, <a href='javascript:history.back();'>volte</a> e tente novamente!</p>";
                        }
                ?>
          </div>
     </body>
</html>