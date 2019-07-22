<?php
	require_once "classes/daotabhospital.class.php";


	//instancia objeto
	$dao = new DaoTabhospital;
	
			
	//envia o objeto da classe MODEL para o método da classe DAO
   	echo $dao->wHospital();  		
?>