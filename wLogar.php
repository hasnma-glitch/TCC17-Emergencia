<?php
	require_once "classes/daotabpaciente.class.php";


	$data_nascimento =  addslashes($_POST['data_nascimento']);
	$cpf =  addslashes($_POST['cpf']);

		
		
	//instancia objeto
	$dao = new DaoTabpaciente;
	

	//envia o objeto da classe MODEL para o método da classe DAO
   	echo $dao->wLogar($cpf,$data_nascimento);  		

	
	
?>