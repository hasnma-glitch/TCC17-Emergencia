<?php
	require_once "tabtipo.class.php";
	require_once "conecta.class.php";
	
	class DaoTabtipo {
		public function wlistar(){
			$sql="select * from tipo order by tipo;";
			$stmt= Conecta::abrirConexao()->prepare ($sql);
			$stmt->execute();
			$matriz=array();
			while ($linha=$stmt->fetch(PDO::FETCH_OBJ)){
				$vetor['tipo']=$linha->tipo;
				array_push ($matriz, $vetor);
			}
			return json_encode ($matriz); //gera o json
		}
	}
?>