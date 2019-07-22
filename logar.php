<?php
	//inicia a sessão
	session_cache_expire(15);
	session_name(sha1('emergencia'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));
	session_start();

	//chama os arquivos
 	require_once "classes/daotabfuncionario.class.php";

	//pega os dados do formulário
	$cpf = $_POST["cpf"];
	$nasc = $_POST["data_nascimento"];

	//instancia objeto da classe
	$dao = new DaoTabfuncionario();

	//envia o objeto do model para o método da classe dao
	if ($dao->pacienteLogar($cpf,$nasc)){
		//redireciona para a área restrita
		header ('Location:paciente.php');
	}else{
		echo "<div><font color=red>Login e/ou senha incorretos</font></div>";
	}

?>
