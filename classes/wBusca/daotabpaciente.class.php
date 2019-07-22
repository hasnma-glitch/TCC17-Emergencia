<?php
require_once "tabpaciente.class.php";
require_once "conecta.class.php";

class DaoTabpaciente extends Conecta{


	public function pacienteLogar($cpf, $nasc){

		$nasc = implode("-",array_reverse(explode("/",$nasc)));

		$sql="select * from paciente f
				 where f.cpf like :cpf 
				 and f.data_nascimento like :nasc;";
		$stmt=Conecta::abrirConexao()->prepare ($sql);
		$stmt->bindValue(':cpf',$cpf);
		$stmt->bindValue(':nasc',$nasc);
		$stmt->execute();
		if ($linha = $stmt->fetch(PDO::FETCH_OBJ)){
			$_SESSION['session_id']=session_id();
			$_SESSION['paciente']= $linha->id_usuario;
			return true;
		}else {
			return false;
		}
	}

 

	   // serve para saber se o usuario existe na tabela tabusuario ou não
	    public function wLogar($cpf,$data_nascimento){

			//verifica se o usuario existe	
			try	{
				$sql = "SELECT * FROM paciente WHERE cpf LIKE :cpf AND data_nascimento LIKE :data_nascimento;";
				$stmt = Conecta::abrirConexao()->prepare($sql);
				$stmt->bindValue(':cpf', $cpf);
				$stmt->bindValue(':data_nascimento', $data_nascimento);
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
		
		


	   public function cadastrar(Tabpaciente $u){		
			try	{
				$sql = "INSERT INTO paciente (nome_usuario, cpf, data_nascimento, sexo, telefone, logradouro, id_convenio, bairro, cidade, uf, cep) 
						 values (:nome_usuario, :cpf, :data_nascimento, :sexo, :telefone, :logradouro, :id_convenio, :bairro, :cidade, :uf, :cep);";
				$stmt = Conecta::abrirConexao()->prepare($sql);
				$stmt->bindValue(':nome_usuario', $u->getNome_usuario());
				$stmt->bindValue(':cpf', $u->getCpf());
				$stmt->bindValue(':data_nascimento', $u->getData_nascimento());
				$stmt->bindValue(':sexo', $u->getSexo());
				$stmt->bindValue(':telefone', $u->getTelefone());
				$stmt->bindValue(':logradouro', $u->getLogradouro());
				$stmt->bindValue(':id_convenio', $u->getId_convenio());
				$stmt->bindValue(':bairro', $u->getBairro());
				$stmt->bindValue(':cidade', $u->getCidade());
				$stmt->bindValue(':uf', $u->getUf());
				$stmt->bindValue(':cep', $u->getCep());
				$stmt->execute();
				return true;
			}catch( PDOExcepfunction $e) {
				echo 'Erro ao cadastrar: ' . $e->getMessage();
				return false;
			}		
		}//fim método cadastrar


		public function alterar(Tabpaciente $u){		
			try	{
				$sql = "UPDATE tabpaciente SET nome_usuario=:nome_usuario, cpf=:cpf, data_nascimento=:data_nascimento, sexo=:sexo, telefone=:telefone, logradouro=:logradouro, id_convenio=:id_convenio, bairro=:bairro, cidade=:cidade, uf=:uf, cep=:cep WHERE id_usuario=:id_usuario;";
				$stmt = Conecta::abrirConexao()->prepare($sql);
				$stmt->bindValue(':id_usuario', $u->getId_usuario());
				$stmt->bindValue(':nome_usuario', $u->getNome_usuario());
				$stmt->bindValue(':cpf', $u->getCpf());
				$stmt->bindValue(':data_nascimento', $u->getData_nascimento());
				$stmt->bindValue(':sexo', $u->getSexo());
				$stmt->bindValue(':telefone', $u->getTelefone());
				$stmt->bindValue(':logradouro', $u->getLogradouro());
				$stmt->bindValue(':id_convenio', $u->getId_convenio());
				$stmt->bindValue(':bairro', $u->getBairro());
				$stmt->bindValue(':cidade', $u->getCidade());
				$stmt->bindValue(':uf', $u->getUf());
				$stmt->bindValue(':cep', $u->getCep());
				$stmt->execute();
				return true;
			}catch( PDOExcepfunction $e) {
				echo 'Erro ao alterar: ' . $e->getMessage();
				return false;
			}		
		}//fim método alterar

}
?>
