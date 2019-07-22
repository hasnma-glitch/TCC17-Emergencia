<?php
require_once "tabhospital.class.php";
require_once "conecta.class.php";
 
class DaoTabhospital{
	   public function wLogar($cidade){
			   $sql="select * from hospital h, cidade c, bairro b, estado e
			   where c.cidade like :cidade
			   and b.id_bairro=h.id_bairro
			   and c.id_cidade=b.id_cidade
			   and e.id_estado=c.id_estado;";
			   $stmt=Conecta::abrirConexao()->prepare($sql);
			   $stmt->bindValue(':cidade',$cidade);
			   if($stmt->execute()){
					$matriz=array();
					if($linha=$stmt->fetch(PDO::FETCH_OBJ)){
							 $vetor['hospital']=$linha->hospital;
							 $vetor['logradouro']=$linha->logradouro;
							 $vetor['numero']=$linha->numero;
							 $vetor['complemento']=$linha->complemento;
							 $vetor['id_bairro']=$linha->id_bairro;
							 $vetor['id_hospital']=$linha->id_hospital;
							 $vetor['telefone']=$linha->telefone;
							 $vetor['referencia']=$linha->referencia;
							 $vetor['latitude']=$linha->latitude;
							 $vetor['longitude']=$linha->longitude;
							 $vetor['capacidade']=$linha->capacidade;
							 $vetor['qtd_espera']=$linha->qtd_espera;
							 $vetor['qtd_internados']=$linha->qtd_internados;
							 array_push($matriz,$vetor);
					}
					return json_encode($matriz);
			   }else{
					return false;
			   }
	   }
	   
	   public function buscar($bairro, $cidade, $estado){			
			try	{
				$bairro = "%$bairro%";
				$cidade = "%$cidade%";
				
				//monta o sql que exibe a quantidade de online
				$sql = "select * from hospital
				where bairro like :bairro 
				and cidade like :cidade 
				and estado like :estado ;";

								
				//prepara a execução
				$stmt = Conecta::abrirConexao()->prepare($sql);

				//passando os valores
				$stmt->bindValue(':bairro', $bairro);
				$stmt->bindValue(':cidade', $cidade);
				$stmt->bindValue(':estado', $estado);

				//executa o sql
				$stmt->execute();
								
				//cria um array
				$resultado = array();

				//monta o array com os registros
				if($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
					$stmt->execute();
					while($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
						$u = new Tabhospital();
						$u->setBairro($linha->bairro);
						$u->setCidade($linha->cidade);
						$u->setEstado($linha->estado);
						$u->setHospital($linha->hospital);
						$u->setLogradouro($linha->logradouro);
						$u->setNumero($linha->numero);
						$u->setComplemento($linha->complemento);
						$u->setTelefone($linha->telefone);
						$u->setReferencia($linha->referencia);
						$u->setLatitude($linha->latitude);
						$u->setLongitude($linha->longitude);
						$u->setCapacidade($linha->capacidade);
						$u->setQtd_espera($linha->qtd_espera);
						$u->setQtd_internados($linha->qtd_internados);
						$resultado[] = $u;
					}
					
				}else{
						//monta o sql que exibe a quantidade de online
						$sql = "select * from hospital
						where cidade like :cidade 
						and estado like :estado ;";
						
						//prepara a execução
						$stmt = Conecta::abrirConexao()->prepare($sql);

						//passando os valores
						$stmt->bindValue(':cidade', $cidade);
						$stmt->bindValue(':estado', $estado);

						//executa o sql
						$stmt->execute();

						//monta o array com os registros
						if($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
							$stmt->execute();
							while($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
								$u = new Tabhospital();
								$u->setBairro($linha->bairro);
								$u->setCidade($linha->cidade);
								$u->setEstado($linha->estado);
								$u->setHospital($linha->hospital);
								$u->setLogradouro($linha->logradouro);
								$u->setNumero($linha->numero);
								$u->setComplemento($linha->complemento);
								$u->setTelefone($linha->telefone);
								$u->setReferencia($linha->referencia);
								$u->setLatitude($linha->latitude);
								$u->setLongitude($linha->longitude);
								$u->setCapacidade($linha->capacidade);
								$u->setQtd_espera($linha->qtd_espera);
								$u->setQtd_internados($linha->qtd_internados);
								$resultado[] = $u;
							}
						}else{
							//monta o sql que exibe a quantidade de online
							$sql = "select * from hospital
							where estado like :estado ;";
							
							//prepara a execução
							$stmt = Conecta::abrirConexao()->prepare($sql);

							//passando os valores
							$stmt->bindValue(':estado', $estado);

							//executa o sql
							$stmt->execute();

							//monta o array com os registros
							if($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
								$stmt->execute();
								while($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
									$u = new Tabhospital();
									$u->setBairro($linha->bairro);
									$u->setCidade($linha->cidade);
									$u->setEstado($linha->estado);
									$u->setHospital($linha->hospital);
									$u->setLogradouro($linha->logradouro);
									$u->setNumero($linha->numero);
									$u->setComplemento($linha->complemento);
									$u->setTelefone($linha->telefone);
									$u->setReferencia($linha->referencia);
									$u->setLatitude($linha->latitude);
									$u->setLongitude($linha->longitude);
									$u->setCapacidade($linha->capacidade);
									$u->setQtd_espera($linha->qtd_espera);
									$u->setQtd_internados($linha->qtd_internados);
									$resultado[] = $u;
								}
							}	
						}
				}						
				//retorna o array com os registros
				return $resultado;
			}
			catch( PDOExcepfunction $p) {
				echo 'Erro: ' . $p->getMessage();
				return false;
			}
			catch( Excepfunction $e) {
				echo 'Erro: ' . $e->getMessage();
				return false;
			}
		}//fim método buscar
		
		public function w_buscar_voz($cidade){			
			try	{
			
				$cidade = "%$cidade%";
		
				
				//monta o sql que exibe a quantidade de online
				$sql = "select * from hospital
				where cidade like :cidade ;";

								
				//prepara a execução
				$stmt = Conecta::abrirConexao()->prepare($sql);

				//passando os valores
				
				$stmt->bindValue(':cidade', $cidade);
		

				//executa o sql
				$stmt->execute();
								
				//cria um array
				$matriz = array();

				//monta o array com os registros
		
					while($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
						$vetor['id_hospital']=$linha->id_hospital;
								$vetor['bairro']=$linha->bairro;
									$vetor['cidade']=$linha->cidade;
									$vetor['estado']=$linha->estado;
									$vetor['hospital']=$linha->hospital;
									$vetor['logradouro']=$linha->logradouro;
									$vetor['numero']=$linha->numero;
									$vetor['complemento']=$linha->complemento;
									$vetor['telefone']=$linha->telefone;
									$vetor['referencia']=$linha->referencia;
									$vetor['latitude']=$linha->latitude;
									$vetor['longitude']=$linha->longitude;
									$vetor['capacidade']=$linha->capacidade;
									$vetor['qtd_espera']=$linha->qtd_espera;
									$vetor['qtd_internados']=$linha->qtd_internados;
									//monta o vetor na matriz
									array_push($matriz,$vetor);
								}
								return json_encode($matriz);			
		}
		catch( PDOExcepfunction $p) {
				echo 'Erro: ' . $p->getMessage();
				return false;
			}
			catch( Excepfunction $e) {
				echo 'Erro: ' . $e->getMessage();
				return false;
			}
		}
		
		
		
		
	public function wHospital(){			
				//monta o sql que exibe a quantidade de online
				$sql = "select * from hospital;";
								
				//prepara a execução
				$stmt = Conecta::abrirConexao()->prepare($sql);
				//executa o sql
				$stmt->execute();
								
				//cria o vetor
				$matriz = array();
				while($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
						$vetor['bairro']=$linha->bairro;
						$vetor['id_hospital']=$linha->id_hospital;
						$vetor['cidade']=$linha->cidade;
						$vetor['estado']=$linha->estado;
						$vetor['hospital']=$linha->hospital;
						$vetor['logradouro']=$linha->logradouro;
						$vetor['numero']=$linha->numero;
						$vetor['complemento']=$linha->complemento;
						$vetor['telefone']=$linha->telefone;
						$vetor['referencia']=$linha->referencia;
						$vetor['logradouro']=$linha->logradouro;
						$vetor['latitude']=$linha->latitude;
						$vetor['longitude']=$linha->longitude;
						$vetor['capacidade']=$linha->capacidade;
						$vetor['qtd_espera']=$linha->qtd_espera;
						$vetor['qtd_internados']=$linha->qtd_internados;
						//monta o vetor na matriz
						array_push($matriz,$vetor);
				}
				return json_encode($matriz);		
	}
	
	
	
	
		
	 public function w_busca($bairro, $cidade, $estado){			
			try	{
				$bairro = "%$bairro%";
				$cidade = "%$cidade%";
				$estado = "%$estado%";
				
				//monta o sql que exibe a quantidade de online
				$sql = "select * from hospital
				where bairro like :bairro 
				and cidade like :cidade 
				and estado like :estado ;";

								
				//prepara a execução
				$stmt = Conecta::abrirConexao()->prepare($sql);

				//passando os valores
				$stmt->bindValue(':bairro', $bairro);
				$stmt->bindValue(':cidade', $cidade);
				$stmt->bindValue(':estado', $estado);

				//executa o sql
				$stmt->execute();
								
				//cria um array
				$matriz = array();

				//monta o array com os registros
				if($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
					$stmt->execute();
					while($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
						$vetor['id_hospital']=$linha->id_hospital;
								$vetor['bairro']=$linha->bairro;
									$vetor['cidade']=$linha->cidade;
									$vetor['estado']=$linha->estado;
									$vetor['hospital']=$linha->hospital;
									$vetor['logradouro']=$linha->logradouro;
									$vetor['numero']=$linha->numero;
									$vetor['complemento']=$linha->complemento;
									$vetor['telefone']=$linha->telefone;
									$vetor['referencia']=$linha->referencia;
									$vetor['latitude']=$linha->latitude;
									$vetor['longitude']=$linha->longitude;
									$vetor['capacidade']=$linha->capacidade;
									$vetor['qtd_espera']=$linha->qtd_espera;
									$vetor['qtd_internados']=$linha->qtd_internados;
									

									//monta o vetor na matriz
									array_push($matriz,$vetor);
								}
								return json_encode($matriz);
					
					
				}else{
						//monta o sql que exibe a quantidade de online
						$sql = "select * from hospital
						where cidade like :cidade 
						and estado like :estado ;";
						
						//prepara a execução
						$stmt = Conecta::abrirConexao()->prepare($sql);

						//passando os valores
						$stmt->bindValue(':cidade', $cidade);
						$stmt->bindValue(':estado', $estado);

						//executa o sql
						$stmt->execute();

						//monta o array com os registros
						if($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
							$stmt->execute();
							while($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
								$vetor['id_hospital']=$linha->id_hospital;
									$vetor['bairro']=$linha->bairro;
									$vetor['cidade']=$linha->cidade;
									$vetor['estado']=$linha->estado;
									$vetor['hospital']=$linha->hospital;
									$vetor['logradouro']=$linha->logradouro;
									$vetor['numero']=$linha->numero;
									$vetor['complemento']=$linha->complemento;
									$vetor['telefone']=$linha->telefone;
									$vetor['referencia']=$linha->referencia;
									$vetor['latitude']=$linha->latitude;
									$vetor['longitude']=$linha->longitude;
									$vetor['capacidade']=$linha->capacidade;
									$vetor['qtd_espera']=$linha->qtd_espera;
									$vetor['qtd_internados']=$linha->qtd_internados;
									

									//monta o vetor na matriz
									array_push($matriz,$vetor);
								}
								return json_encode($matriz);
							
						}else{
							//monta o sql que exibe a quantidade de online
							$sql = "select * from hospital
							where estado like :estado ;";
							
							//prepara a execução
							$stmt = Conecta::abrirConexao()->prepare($sql);

							//passando os valores
							$stmt->bindValue(':estado', $estado);

							//executa o sql
							$stmt->execute();

							//monta o array com os registros
							if($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
								$stmt->execute();
								while($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
									
								$vetor['id_hospital']=$linha->id_hospital;
									$vetor['bairro']=$linha->bairro;
									$vetor['cidade']=$linha->cidade;
									$vetor['estado']=$linha->estado;
									$vetor['hospital']=$linha->hospital;
									$vetor['logradouro']=$linha->logradouro;
									$vetor['numero']=$linha->numero;
									$vetor['complemento']=$linha->complemento;
									$vetor['telefone']=$linha->telefone;
									$vetor['referencia']=$linha->referencia;
									$vetor['latitude']=$linha->latitude;
									$vetor['longitude']=$linha->longitude;
									$vetor['capacidade']=$linha->capacidade;
									$vetor['qtd_espera']=$linha->qtd_espera;
									$vetor['qtd_internados']=$linha->qtd_internados;
									

									//monta o vetor na matriz
									array_push($matriz,$vetor);
								}
								return json_encode($matriz);
							}	
						}
				}						
				//retorna o array com os registros
				return $resultado;
			}
			catch( PDOExcepfunction $p) {
				echo 'Erro: ' . $p->getMessage();
				return false;
			}
			catch( Excepfunction $e) {
				echo 'Erro: ' . $e->getMessage();
				return false;
			}
		}
	
}
?>