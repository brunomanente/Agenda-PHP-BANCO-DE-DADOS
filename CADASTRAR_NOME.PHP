<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html">
		<meta charset="utf-8">
		<title>AGENDA</title>
	</head>
	<body>					
		<?php
			@$nome = $_POST["nome"]; 
			//O @ SUPRIME A MENSAGEM DE ERRO GERADA POR $nome NÃO RECEBER VALOR ALGUM
			$_con = @mysql_connect("localhost","root","");					
			mysql_select_db("agenda",$_con);						
			$_sql = "INSERT INTO tbnome(nome) VALUES ('".$nome."')";	
			$_res = mysql_query($_sql,$_con);
			if($_res===FALSE)
				echo "Erro na consulta... " . mysql_error() . "<br/>";
			else
			{
				echo "OK";
			}						
			mysql_close($_con); //melhor fechar a conexão para manter o banco com integridade
		?>
	</body>
</html>
