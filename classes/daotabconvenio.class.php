<?php
	require_once "tabconvenio.class.php";
	require_once "conecta.class.php";
	
	class DaoTabconvenio {
		public function wlistar(){
			$sql="select * from convenio order by convenio;";
			$stmt= Conecta::abrirConexao()->prepare ($sql);
			$stmt->execute();
			$matriz=array();
			while ($linha=$stmt->fetch(PDO::FETCH_OBJ)){
				$vetor['convenio']=$linha->convenio;
				array_push ($matriz, $vetor);
			}
			return json_encode ($matriz); //gera o json
		}

		public function listar(){		
			try	{
				//monta o sql que exibe a quantidade de online
				$sql = "select * from convenio;";

				//prepara a execução
				$stmt = Conecta::abrirConexao()->prepare($sql);
				
				//executa o sql
				$stmt->execute();
								
				//cria um array
				$matriz = array();
				// return $stmt->fetch(PDO::FETCH_OBJ);	
				
				//monta o array com os registros
				while($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
					
					$vetor["id_convenio"]=$linha->id_convenio;
					$vetor["convenio"]=$linha->convenio;
					// echo $linha->convenio;
					array_push ($matriz,$vetor);
				}
				//echo $matriz;
				//retorna o array com os registros
				return $matriz;
			}catch( PDOException $p) {
				echo 'Erro: ' . $p->getMessage();
				}		
			
		}
	}