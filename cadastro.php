<?php
	//inicia a sessão
	session_cache_expire(15);
	session_name(sha1('emergencia'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));
	session_start();

	//chama os arquivos  
 	require_once "classes/daotabpaciente.class.php"; 

		$dao = new DaoTabpaciente;

		if ($dao->cadastrar($_POST)){
			echo 'Cadastrado com Exito! ';
		}else{
			echo 'Erro ao cadastro! ';
		}
	
	
?>