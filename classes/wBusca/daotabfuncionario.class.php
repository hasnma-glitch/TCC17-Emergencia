<?php
require_once "tabfuncionario.class.php";
require_once "tabatendimento.class.php";
require_once "tabpaciente.class.php";
require_once "conecta.class.php";
 
class DaoTabfuncionario{

	public function wLogar($email,$senha){
	   //conexão com um select
	   $sql="select * from funcionario f, hospital h 
			 where f.email like :email 
			 and f.senha like :senha;
			 and f.id_hospital = h.id_hospital";
	   $stmt=Conecta::abrirConexao()->prepare ($sql);
	   $stmt->bindValue(':email',$email);
	   $stmt->bindValue(':senha',$senha);
	   $stmt->execute();
	   $matriz=array();
		if($linha=$stmt->fetch(PDO::FETCH_OBJ)){
			 $vetor['funcionario']=$linha->funcionario;
			 $vetor['id_funcionario']=$linha->id_funcionario;
			 $vetor['id_tipo']=$linha->id_tipo;
			 $vetor['hospital']=$linha->hospital;
			  array_push($matriz,$vetor);
		}
		return json_encode($matriz);
	}
	   
    public function logar($email,$senha){
		   $sql="select * from funcionario f
				 where f.email like :email 
				 and f.senha like :senha;";
		   $stmt=Conecta::abrirConexao()->prepare ($sql);
		   $stmt->bindValue(':email',$email);
		   $stmt->bindValue(':senha',$senha);
		   $stmt->execute();
			if ($linha = $stmt->fetch(PDO::FETCH_OBJ)){
				$_SESSION['session_id']=session_id();					
				$_SESSION['funcionario']= $linha->funcionario;										
				date_default_timezone_set('America/Sao_Paulo');
				$ip = $_SERVER['REMOTE_ADDR'] ;
				$data = date("Y-m-d"); 	
				$hora = date("H:i:s");					
				return true;
			}else {
				return false;
			}
	}


	
	public function esquecisenha($email,$cpf){		
			
			$sql = "SELECT * FROM funcionario WHERE cpf=:cpf AND email=:email;";
			$stmt = Conecta::abrirConexao()->prepare($sql);
			$stmt->bindValue(':email', $email);
			$stmt->bindValue(':cpf', $cpf);
			$stmt->execute();
			if ($linha = $stmt->fetch(PDO::FETCH_OBJ)){			
					
				$novasenha= rand (100000000,999999999);	
					
			
				$sql = "UPDATE funcionario SET senha=:novasenha where email=:email AND cpf=:cpf ;";
				$stmt = Conecta::abrirConexao()->prepare($sql);
				$stmt->bindValue(':novasenha', $novasenha);
				$stmt->bindValue(':cpf', $cpf);
				$stmt->bindValue(':email', $email);
				$stmt->execute();
						
						
		
				$email_remetente = "tccemergencia2@gmail.com"; 
				$email_assunto = "Sua nova senha";
				$email_conteudo =  "Caro funcionario, sua nova senha do emergengia e $novasenha ";
				$email_conteudo .=  "$email";
				$headers = "MIME-Version: 1.1\n";
				$headers .= "Content-type: text/html; charset=utf-8\n";
				$headers .= "From: $email_remetente\n"; 
				$headers .= "Return-Path: $email_remetente\n"; 
				$headers .= "Reply-To: $email_remetente\n";
					
				/*if (mail($email_remetente, $email_assunto, nl2br($email_conteudo), $headers, "-f$email_remetente")){
					return true;
				}else{
					return false;
				}
				*/
			}else {
				return false;
			}
		
			
			//fim método alterar
	}
	
	
		

}