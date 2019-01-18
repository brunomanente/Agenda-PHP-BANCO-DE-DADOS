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
			@$nome=$_POST["nome"];
			$_con = @mysql_connect("localhost","root","");
			mysql_select_db("agenda",$_con);
			//listagem
			if($nome==NULL)		
				$_sql = "select * FROM tbnome";
			else
				$_sql = "select * FROM tbnome WHERE nome like '". mysql_real_escape_string($nome)."%'";

			$_res = mysql_query($_sql,$_con);
			if($_res===FALSE)
				echo "Erro na consulta... " . mysql_error() . "<br/>";
			else
			{
				$_nr = mysql_num_rows($_res);
				echo "A consulta retornou " . (int) $_nr. " registros<br/><br/><br/><br/>";
				if($_nr>0)
				{
					echo "<table border=1>";
					echo "<caption>NOMES.</caption>";	
					while($_row = mysql_fetch_assoc($_res))
					{
						echo "<tr>";
						echo '<td>'.$_row['id'].'</td>';
						echo '<td>'.$_row['nome'].'</td>';						
						echo "</tr>";	
					}
					echo "</table>";
				}
			}						
			mysql_close($_con); //melhor fechar a conexão para manter o banco com integridade
		?>
	</body>
</html>
