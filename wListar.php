<?php
	require_once "classes/conecta.class.php";
	require_once "classes/tabatendimento.class.php";
	require_once "classes/daotabatendimento.class.php";

	$data_nascimento =  addslashes($_POST['data_nascimento']);
	$cpf =  addslashes($_POST['cpf']);

	$dao = new DaoTabatendimento;
	
	//envia o objeto da classe MODEL para o método da classe DAO
   	echo $dao->wListar($cpf,$data_nascimento);  	
//echo $cpf." ".$data_nascimento; 		
?>