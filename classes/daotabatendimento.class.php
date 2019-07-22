<?php
require_once "tabatendimento.class.php";
require_once "conecta.class.php";
 
class DaoTabatendimento{
	
	
	
  public function wListar(){
   $sql = "SELECT * FROM paciente WHERE cpf LIKE :cpf AND data_nascimento LIKE :data_nascimento;";
				$stmt = Conecta::abrirConexao()->prepare($sql);
				$stmt->bindValue(':cpf', $cpf);
				$stmt->bindValue(':data_nascimento', $data_nascimento);
				$stmt->execute();
				
				//se existir...
				if ($linha = $stmt->fetch(PDO::FETCH_OBJ)){
					
   
   $sql="select * from atendimento;";
   $stmt=Conecta::abrirConexao()->prepare ($sql);
   $stmt->execute();
   $matriz=array();
    While($linha=$stmt->fetch(PDO::FETCH_OBJ)){
	 $vetor['id_usuario']=$linha->id_usuario;
	 $vetor['id_funcionario']=$linha->id_funcionario;
	 $vetor['id_atendimento']=$linha->id_atendimento;
	 $vetor['perfil']=$linha->perfil;
	 $vetor['hora']=$linha->hora;
	 $vetor['data']=$linha->data;
	 $vetor['sintomas']=$linha->sintomas;
	  array_push($matriz,$vetor);
	  }
	    return json_encode($matriz);
	   }
	   
  }
	   
	    public function aHospital ($hospital){
			   //saber se o usuario existe na tabela tabusuario
			  $sql="select * from atendimento a, funcionario f , hospital h 
			  where h.hospital like :hospital 
			  and a.id_funcionario=f.id_funcionario
			  and h.id_hospital= h.id_hospital;";
			  $stmt=Conecta::abrirConexao()->prepare ($sql);
			  $stmt->bindValue(':hospital',$hospital);
			  $stmt->execute();
			  $matriz=array();
			  while($linha=$stmt->fetch(PDO::FETCH_OBJ)){
					$vetor['hospital']=$linha->hospital;
					$vetor['perfil']=$linha->perfil;
	                $vetor['hora']=$linha->hora;
	                $vetor['data']=$linha->data;
					$vetor['sintomas']=$linha->sintomas;
					$vetor['funcionario']=$linha->funcionario;
					array_push($matriz,$vetor);
			  }
			  return json_encode($matriz);
	   }
	}
?>