<?php
class Tabfuncionario{
 //atributos da classe
  private $id_funcionario;
  private $funcionario;
  private $id_hospital;
  private $id_tipo;
  private $email;
  private $senha;
  private $cpf;
  private $data_nascimento;
  //metodo GET=pegar
   public function getId_funcionario(){
     return $this->id_funcionario;
	 }
  //metodo SET(definir/configurar)
   public function setId_funcionario($id_funcionario)
   {
       $this->id_funcionario=$id_funcionario;
	   }
	   
   public function getFuncionario(){
     return $this->funcionario;
	 }
  //metodo SET(definir/configurar)
   public function setFuncionario($funcionario)
   {
       $this->funcionario=$funcionario;
	   }
	   
    public function getId_hospital(){
     return $this->id_hospital;
	 }
  //metodo SET(definir/configurar)
   public function setId_hospital($id_hospital)
   {
       $this->id_hospital=$id_hospital;
	   }
	   
    public function getId_tipo(){
     return $this->id_tipo;
	 }
  //metodo SET(definir/configurar)
   public function setId_tipo($id_tipo)
   {
       $this->id_tipo=$id_tipo;
	   }
	   
   public function getLogin(){
     return $this->login;
	 }
  //metodo SET(definir/configurar)
   public function setEmail($email)
   {
       $this->email=$email;
	   }
	   
   public function getSenha(){
     return $this->senha;
	 }
  //metodo SET(definir/configurar)
   public function setSenha($senha)
   {
       $this->senha=$senha;
	   }	
	   
	public function getCpf(){
     return $this->cpf;
	 }
  //metodo SET(definir/configurar)
   public function setCpf($cpf)
   {
       $this->cpf=$cpf;
	   }

     public function getData_nascimento(){
     return $this->data_nascimento;
   }
  //metodo SET(definir/configurar)
   public function setData_nascimento($data_nascimento)
   {
       $this->data_nascimento=$data_nascimento;
     }

}
?>