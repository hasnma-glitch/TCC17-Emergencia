<?php
	class Android{
	
		private $id;
		private $nome;
		private $email;
		private $celular;
		private $senha;
		private $ip;
		private $data;
		private $hora;
		private $ativo;
	
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}
	
		public function getNome(){
			return $this->nome;
		}
	
		public function setNome($nome){
			$this->nome = $nome;
		}
	
		public function getEmail(){
			return $this->email ;
		}
	
		public function setEmail($email){
			$this->email = $email;
		}
	
		public function getCelular(){
			return $this->celular;
		}
		public function setCelular($celular){
			$this->celular = $celular;
		}
	
		public function getSenha(){
			return $this->senha;
		}
	
		public function setSenha($senha){
			$this->senha = $senha;
		}
	
		public function getIP(){
			return $this->ip;
		}
	
		public function setIP($ip){
			$this->ip = $ip;
		}
	
		public function getHora(){
			return $this->hora;
		}
	
		public function setHora($hora){
			$this->hora = $hora;
		}
	
		public function getData(){
			return $this->data;
		}
	
		public function setData($data){
			$this->data = $data;
		}		
	
		public function getAtivo(){
			return $this->ativo;
		}
	
		public function setAtivo($ativo){
			$this->ativo = $ativo;
		} 
	}//fim classe
	

?>