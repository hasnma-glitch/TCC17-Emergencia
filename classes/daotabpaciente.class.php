<?php
require_once "tabpaciente.class.php";
require_once "conecta.class.php";

class DaoTabpaciente extends Conecta{


 

	   // serve para saber se o usuario existe na tabela tabusuario ou não
	    public function pLogar($email,$senha){
				   $sql="select * from paciente where email like :email and senha like :senha;";
				   $stmt=Conecta::abrirConexao()->prepare ($sql);
				   $stmt->bindValue(':email',$email);
				   $stmt->bindValue(':senha',$senha);
				   $stmt->execute();
				   $matriz=array();
					if($linha=$stmt->fetch(PDO::FETCH_OBJ)){
								 $vetor['nome_usuario']=$linha->nome_usuario;
								 $vetor['cpf']=$linha->cpf;
								 $vetor['data_nascimento']=$linha->data_nascimento;
								 $vetor['sexo']=$linha->sexo;
								 $vetor['contato']=$linha->contato;
								 $vetor['id_usuario']=$linha->id_usuario;
								 $vetor['id_convenio']=$linha->id_convenio;
								 $vetor['email']=$linha->email;
								  array_push($matriz,$vetor);
					}
					return json_encode($matriz);

	   }
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
         public function wCadastrar($u){		
			date_default_timezone_set('America/Sao_Paulo');
			$ip = $_SERVER['REMOTE_ADDR'] ;
			$data = date("Y-m-d"); 	
			$hora = date("H:i:s");
			try	{
				$sql = "INSERT INTO paciente (nome_usuario,cpf,data_nascimento,sexo,telefone,logradouro,id_convenio) 
						 values (:nome_usuario, :cpf, :data_nascimento, :sexo, :telefone, :logradouro, :id_convenio);";
				$stmt = Conecta::abrirConexao()->prepare($sql);
				$stmt->bindValue(':nome_usuario', $u->getNome_usuario());
				$stmt->bindValue(':cpf', $u->getCpf());
				$stmt->bindValue(':data_nascimento',$u->getData_nascimento());
				$stmt->bindValue(':sexo', $u->getSexo());
				$stmt->bindValue(':telefone', $u->getTelefone());
				$stmt->bindValue(':logradouro', $u->getLogradouro());
				$stmt->bindValue(':id_convenio', $u->getId_convenio());
 
				if ($stmt->execute()){
					echo 'Cadastrado! ';
				}else{
					echo 'Erro ao cadastrar! ';			
				}
			}catch( PDOException $e) {
				echo 'Erro ao cadastrar: ' . $e->getMessage();
			}
				
		}//fim método cadastrar
	   public function cadastrar($post){		
			try	{

				$nome_usuario= $post["nome_usuario"];
				$data_nascimento= $post["data_nascimento"];
				$sexo= $post["sexo"];
				$cpf = $post["cpf"];
				$logradouro = $post["logradouro"];
				$telefone = $post["telefone"];
				$id_convenio = $post["id_convenio"];

				$sql = "INSERT INTO paciente (nome_usuario,cpf,data_nascimento,sexo,telefone,logradouro,id_convenio) 
						 values (:nome_usuario, :cpf, :data_nascimento, :sexo, :telefone, :logradouro, :id_convenio);";
				$stmt = Conecta::abrirConexao()->prepare($sql);
				$stmt->bindValue(':nome_usuario', $nome_usuario);
				$stmt->bindValue(':cpf', $cpf);
				$stmt->bindValue(':data_nascimento', $data_nascimento);
				$stmt->bindValue(':sexo', $sexo);
				$stmt->bindValue(':telefone', $telefone);
				$stmt->bindValue(':logradouro', $logradouro);
				$stmt->bindValue(':id_convenio', $id_convenio);
				$stmt->execute();
				return true;
			}catch( PDOExcepfunction $e) {
				echo 'Erro ao cadastrar: ' . $e->getMessage();
				return false;
			}		
		}//fim método cadastrar
}
?>
