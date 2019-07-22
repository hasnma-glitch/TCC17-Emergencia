<?php
	
	require_once "conecta.class.php";
	require_once "tabbusca.class.php";

	class DaoTabbusca{
		public function w_busca(busca $u){				
			try	{
				
				//monta o sql que exibe a quantidade de online
				$sql = "SELECT h.hospital,b.bairro,c.cidade,e.estado from hospital h 
				join bairro b ON b.id_bairro=h.id_bairro 
				join cidade c ON c.id_cidade=b.id_cidade 
				join estado e ON e.id_estado=c.id_estado 
				where b.bairro like :bairro or c.cidade like :cidade or e.estado like :estado;";

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
				while($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
					$u = new Tabbusca();
					$u->setBairro($linha->bairro);
					$u->setCidade($linha->cidade);
					$u->setEstado($linha->estado);
					$resultado[] = $u;
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
				return false;}
	}}
?>