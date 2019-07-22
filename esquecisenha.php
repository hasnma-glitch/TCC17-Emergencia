<?php
	//inicia a sessão
	session_cache_expire(15);
	session_name(sha1('emergencia'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));
	session_start();

	//chama os arquivos 
 	require_once "../classes/tabfuncionario.class.php"; 
 	require_once "../classes/daotabfuncionario.class.php"; 
	
	//pega os dados do formulário
	$email = $_POST["email"];
	$cpf = $_POST["cpf"];

	//instancia objeto da classe
	$dao = new DaoTabfuncionario();
	
	//envia o objeto do model para o método da classe dao
	if ($dao->esquecisenha($email,$cpf)){			
		//redireciona para a área restrita
		echo "Sua senha foi alterada com sucesso";
	}else{
		echo "<div>Sua senha foi alterada com sucesso</div>";	
	}

?>