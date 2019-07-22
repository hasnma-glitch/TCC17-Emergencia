<?php
	require_once "classes/daotabhospital.class.php";


	$cidade =  addslashes($_POST['cidade']);
	$estado =  addslashes($_POST['estado']);

		
	//instancia objeto
	$dao = new DaoTabhospital;
	
			
	//envia o objeto da classe MODEL para o método da classe DAO
   	echo $dao->w_busca('',$cidade,$estado);  		
?>