<?php
	class TbUsuario{
		private $idusuario;
		private $nome;
		private $email;
		private $senha;
		private $foto;
		private $data;
		private $hora;
		private $ip;
		private $idtipo;
		private $tipo;
		private $ativo;
	
		public function getIdusuario(){
			return $this->idusuario;
		}
		public function setIdusuario($idusuario){
			$this->idusuario = $idusuario;
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
	
		public function getSenha(){
			return $this->senha;
		}
		public function setSenha($senha){
			$this->senha = $senha;
		}
	
		public function getFoto(){
			return $this->foto;
		}
	
		public function setFoto($foto){
			$this->foto = $foto;
		}
	
		public function getIp(){
			return $this->ip;
		}
	
		public function setIp($ip){
			$this->ip = $ip;
		}
	
		public function getAtivo(){
			return $this->ativo;
		}
	
		public function setAtivo($ativo){
			$this->ativo = $ativo;
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
		
		public function getIdtipo(){
			return $this->idtipo;
		}
	
		public function setIdtipo($idtipo){
			$this->idtipo = $idtipo;
		}
		
		public function getTipo(){
			return $this->tipo;
		}
	
		public function setTipo($tipo){
			$this->tipo = $tipo;
		}
	}//fim classe
?>