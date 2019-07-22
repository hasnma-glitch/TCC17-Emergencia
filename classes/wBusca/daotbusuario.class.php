<?php
	require_once "conecta.class.php";
	require_once "tbusuario.class.php";

	class DaoTbUsuario{
	
	public function cadastrar(TbUsuario $u){		
			try	{
				$sql = "INSERT INTO tbusuario (nome, email, senha, idtipo) 
						 values (:nome, :email, :senha, :idtipo);";
				$stmt = Conecta::abrirConexao()->prepare($sql);
				$stmt->bindValue(':nome', $u->getNome());
				$stmt->bindValue(':email', $u->getEmail());
				$stmt->bindValue(':senha', $u->getSenha());
				$stmt->bindValue(':idtipo', $u->getidtipo());
				$stmt->execute();
				return true;
			}catch( PDOExcepfunction $e) {
				echo 'Erro ao cadastrar: ' . $e->getMessage();
				return false;
			}		
		}//fim método cadastrar
	
	
		public function logar(TbUsuario $u){		
			try	{
				$sql = "SELECT * FROM tbusuario WHERE email LIKE :email AND senha LIKE :senha;";
				$stmt = Conecta::abrirConexao()->prepare($sql);
				$stmt->bindValue(':email', $u->getEmail());
				$stmt->bindValue(':senha', $u->getSenha());
				$stmt->execute();
				if ($linha = $stmt->fetch(PDO::FETCH_OBJ)){
					$_SESSION['session_id']=session_id();					
					$_SESSION['nome']= $linha->nome;					
					$_SESSION['foto']= $linha->foto;					
					date_default_timezone_set('America/Sao_Paulo');
					$ip = $_SERVER['REMOTE_ADDR'] ;
					$data = date("Y-m-d"); 	
					$hora = date("H:i:s");					
					return true;
				}else {
					return false;
				}
			}catch( PDOException $e) {
				echo 'Erro ao logar: ' . $e->getMessage();
				return false;
			}
				
		}//fim método logar
		
		
				
		public function listar(){		
			try	{
				//monta o sql que exibe a quantidade de online
				$sql = "select * from tbusuario u, tbtipo t
							where u.idtipo=t.idtipo; ;";

				//prepara a execução
				$stmt = Conecta::abrirConexao()->prepare($sql);
				
				//executa o sql
				$stmt->execute();
								
				//cria um array
				$resultado = array();

				//monta o array com os registros
				while($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
					$u = new tbusuario();
					$u->setIdUsuario($linha->idusuario);
					$u->setNome($linha->nome);
					$u->setEmail($linha->email);
					$u->setSenha($linha->senha);
					$u->setFoto($linha->foto);
					$u->setData($linha->data);
					$u->setHora($linha->hora);
					$u->setIp($linha->ip);
					$u->setIdTipo($linha->idtipo);
					$u->setAtivo($linha->ativo);
					$u->setTipo($linha->tipo);
					$resultado[] = $u;
				}
				
				//retorna o array com os registros
				return $resultado;
			}catch( PDOException $p) {
				echo 'Erro: ' . $p->getMessage();
				return false;
			}catch( Excepfunction $e) {
				echo 'Erro: ' . $e->getMessage();
				return false;
			}	
		}//fim método listar






		
		
		public function buscar($nome){			
			try	{
				$nome = "%$nome%";
				
				//monta o sql que exibe a quantidade de online
				$sql = "select * from tbusuario u, tbtipo t
							where u.idtipo=t.idtipo 
							AND nome like :nome;";

				//prepara a execução2
				$stmt = Conecta::abrirConexao()->prepare($sql);

				//passando os valores
				$stmt->bindValue(':nome', $nome);

				//executa o sql
				$stmt->execute();
								
				//cria um array
				$resultado = array();

				//monta o array com os registros
				while($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
					$u = new tbusuario();
					$u->setIdUsuario($linha->idusuario);
					$u->setNome($linha->nome);
					$u->setEmail($linha->email);
					$u->setSenha($linha->senha);
					$u->setFoto($linha->foto);
					$u->setData($linha->data);
					$u->setHora($linha->hora);
					$u->setIp($linha->ip);
					$u->setIdTipo($linha->idtipo);
					$u->setAtivo($linha->ativo);
					$u->setTipo($linha->tipo);
					$resultado[] = $u;
				}			
				//retorna o array com os registros
				return $resultado;
			}catch( PDOException $p) {
				echo 'Erro: ' . $p->getMessage();
				return false;
			}catch( Excepfunction $e) {
				echo 'Erro: ' . $e->getMessage();
				return false;
			}
		}//fim método buscar
	
	
	
	
		public function lista($idusuario){			
			try	{
				//monta o sql que exibe a quantidade de online
				$sql = "select * from tbusuario u, tbtipo t
							where u.idtipo=t.idtipo 
							AND idusuario = :idusuario;";

				//prepara a execução
				$stmt = Conecta::abrirConexao()->prepare($sql);

				//passando os valores
				$stmt->bindValue(':idusuario', $idusuario);

				//executa o sql
				$stmt->execute();
								
				//cria um array
				$resultado = array();

				//monta o array com os registros
				while($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
					$u = new tbusuario();
					$u->setIdUsuario($linha->idusuario);
					$u->setNome($linha->nome);
					$u->setEmail($linha->email);
					$u->setSenha($linha->senha);
					$u->setFoto($linha->foto);
					$u->setData($linha->data);
					$u->setHora($linha->hora);
					$u->setIp($linha->ip);
					$u->setIdTipo($linha->idtipo);
					$u->setAtivo($linha->ativo);
					$u->setTipo($linha->tipo);
					$resultado[] = $u;
				}			
				//retorna o array com os registros
				return $resultado;
			}catch( PDOException $p) {
				echo 'Erro: ' . $p->getMessage();
				return false;
			}catch( Exception $e) {
				echo 'Erro: ' . $e->getMessage();
				return false;
			}
		}//fim método lista



		public function deletar(TbUsuario $u){			
			try	{
				//constrói a consulta seleção na linguagem de banco
				$sql = "DELETE tbusuario WHERE idusuario=:idusuario;";
					
				//prepara a execução
				$stmt = Conecta::abrirConexao()->prepare($sql);

				//passa valores para o sql
				$stmt->bindValue(':idusuario', $u->idusuario);

				//executa o sql
				$stmt->execute();
								
				return true;
			}catch( PDOException $p) {
				echo 'Erro: ' . $p->getMessage();
				return false;
			}catch( Exception $e) {
				echo 'Erro: ' . $e->getMessage();
				return false;
			}
		}//fim método buscar
	
	
	
	
		public function alterar(TbUsuario $u){		
			try	{
				$sql = "UPDATE tbusuario SET nome=:nome, email=:email, idtipo=:idtipo WHERE idusuario=:idusuario;";
				$stmt = Conecta::abrirConexao()->prepare($sql);
				$stmt->bindValue(':idusuario', $u->getIdusuario());
				$stmt->bindValue(':nome', $u->getNome());
				$stmt->bindValue(':email', $u->getEmail());
				$stmt->bindValue(':idtipo', $u->getidtipo());
				$stmt->execute();
				return true;
			}catch( PDOException $e) {
				echo 'Erro ao alterar: ' . $e->getMessage();
				return false;
			}		
		}//fim método alterar


		
	}//fim classe
?>