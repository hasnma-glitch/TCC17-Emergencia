<?php
	require_once "conecta.class.php";
	require_once "android.class.php";

	class DaoAndroid{

	public function w_cadastrar(Android $u){		
			date_default_timezone_set('America/Sao_Paulo');
			$ip = $_SERVER['REMOTE_ADDR'] ;
			$data = date("Y-m-d"); 	
			$hora = date("H:i:s");
			try	{
				$sql = "INSERT INTO android (nome, email, senha, celular, ip, data, hora) 
						 values (:nome, :email, :senha, :celular, :ip, :data, :hora);";
				$stmt = Conecta::abrirConexao()->prepare($sql);
				$stmt->bindValue(':nome', $u->getNome());
				$stmt->bindValue(':email', $u->getEmail());
				$stmt->bindValue(':senha', sha1($u->getSenha()));
				$stmt->bindValue(':celular', $u->getCelular());
				$stmt->bindValue(':ip', $ip);
				$stmt->bindValue(':data', $data);
				$stmt->bindValue(':hora', $hora);
 
				if ($stmt->execute()){
					echo 'Cadastrado! ';
				}else{
					echo 'Erro ao cadastrar! ';			
				}
			}catch( PDOException $e) {
				echo 'Erro ao cadastrar: ' . $e->getMessage();
			}
				
		}//fim método cadastrar
	


	public function w_logar(android $u){	
			//verifica se o usuario existe	
			try	{
				$sql = "SELECT *, date_format(data, '%d/%m/%Y') as dataBR  FROM android WHERE email LIKE :email AND senha LIKE :senha;";
				$stmt = Conecta::abrirConexao()->prepare($sql);
				$stmt->bindValue(':email', $u->getEmail());
				$stmt->bindValue(':senha', sha1($u->getSenha()));
				$stmt->execute();
				
				//se existir...
				if ($linha = $stmt->fetch(PDO::FETCH_OBJ)){
					return "1";
				}else {
					return "0";
				}
			}catch( PDOException $e) {
				return "0";
			}
			
		}//fim método logar
		
		



	public function w_listar(android $u){		

			//verifica se o usuario existe	
			try	{
				$sql = "SELECT * FROM android WHERE email LIKE :email AND senha LIKE :senha;";
				$stmt = Conecta::abrirConexao()->prepare($sql);
				$stmt->bindValue(':email', $u->getEmail());
				$stmt->bindValue(':senha', sha1($u->getSenha()));
				$stmt->execute();
				
				//se existir...
				if ($linha = $stmt->fetch(PDO::FETCH_OBJ)){
					
					$sql = "SELECT * FROM android order by nome;";
					$stmt = Conecta::abrirConexao()->prepare($sql);
					$stmt->execute();
					
					//array para o json
					$matriz = array();
					
					//se existir...
					while ($linha = $stmt->fetch(PDO::FETCH_OBJ)){
						
						//cria o vetor
						$vetor['id']=$linha->id;
						$vetor['nome']=$linha->nome;
						$vetor['email']=$linha->email;

						//monta o vetor na matriz
						array_push($matriz,$vetor);
					}
					return json_encode($matriz);
				}else{
					return '[{"id":"0"}]';
				}
			}catch( PDOException $e) {
				return '[{"id":"0"}]';
			}
		}//fim método questoes



	public function w_detalhes(android $u){		
			
			//verifica se o usuario existe	
			try	{
				$sql = "SELECT * FROM android WHERE email LIKE :email AND senha LIKE :senha;";
				$stmt = Conecta::abrirConexao()->prepare($sql);
				$stmt->bindValue(':email', $u->getEmail());
				$stmt->bindValue(':senha', sha1($u->getSenha()));
				$stmt->execute();
				
				//se existir...
				if ($linha = $stmt->fetch(PDO::FETCH_OBJ)){
					
					$sql = "SELECT *, date_format(data, '%d/%m/%Y') as dataBR 
							FROM android 
							WHERE id = :id
							ORDER BY nome;";
					$stmt = Conecta::abrirConexao()->prepare($sql);
					$stmt->bindValue(':id', $u->getId());
					$stmt->execute();
					
					//array para o json
					$matriz = array();
					
					//se existir...
					while ($linha = $stmt->fetch(PDO::FETCH_OBJ)){
						
						//cria o vetor
						$vetor['id']=$linha->id;
						$vetor['nome']=$linha->nome;
						$vetor['email']=$linha->email;
						$vetor['celular']=$linha->celular;
						$vetor['data']=$linha->dataBR;

						//monta o vetor na matriz
						array_push($matriz,$vetor);
					}
					return json_encode($matriz);
				}else{
					return '[{"id":"0"}]';
				}
			}catch( PDOException $e) {
				return '[{"id":"0"}]';
			}
		}//fim método questoes




	}//fim classe
?>