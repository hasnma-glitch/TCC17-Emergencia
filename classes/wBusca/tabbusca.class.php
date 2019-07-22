<?php
	class Busca{
	
		private $bairro;
		private $cidade;
		private $estado;

		
		public function getBairro(){
			return $this->bairro;
		}public function setBairro($bairro){
			$this->bairro = $bairro;}
			
		public function getCidade(){
			return $this->cidade;
		}public function setCidade($cidade){
			$this->cidade = $cidade;}
			
		public function getEstado(){
			return $this->estado;
		}public function setEstado($estado){
			$this->estado = $estado;}
	}//fim classe
	

?>