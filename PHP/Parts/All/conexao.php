<?php  
	$conexao = mysqli_connect("localhost","root","","mach_academy_db") or die("Erro ou falha de Conexão".mysqli_error());
//	if($conexao) echo('conectado com sucesso!');
	mysqli_set_charset($conexao,'utf8');				
?>

