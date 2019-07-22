<?php
	require_once "classes/conecta.class.php";
	require_once "classes/daotabhospital.class.php";

	$cidade =  addslashes($_POST['cidade']);
	$dao = new DaoTabhospital;
			
   	echo $dao->w_buscar_voz($cidade);	
	
	
?>