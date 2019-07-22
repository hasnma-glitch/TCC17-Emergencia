<?php
class Tabpaciente{
 //atributos da classe
  private $nome_usuario;
  private $cpf;
  private $data_nascimento;
  private $sexo;
  private $id_usuario;
  private $id_convenio;
  private $logradouro; 
  private $telefone;
  //metodo GET=pegar
   public function getNome_usuario(){
     return $this->nome_usuario;
	 }
  //metodo SET(definir/configurar)
   public function setNome_usuario($nome_usuario)
   {
       $this->nome_usuario=$nome_usuario;
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
    public function getSexo(){
     return $this->sexo;
	 }
  //metodo SET(definir/configurar)
   public function setSexo($sexo)
   {
       $this->sexo=$sexo;
	   }
   public function get_Idusuario(){
     return $this->id_usuario;
	 }
  //metodo SET(definir/configurar)
   public function setId_usuario($id_usuario)
   {
       $this->id_usuario=$id_usuario;
	   }	
   public function getId_convenio(){
     return $this->id_convenio;
	 }
  //metodo SET(definir/configurar)
   public function setId_convenio($id_convenio)
   {
       $this->id_convenio=$id_convenio;
   }
   public function getLogradouro(){
     return $this->logradouro;
	 }
  //metodo SET(definir/configurar)
   public function setLogradouro($logradouro)
   {
       $this->logradouro=$logradouro;
	   }   
	    public function getTelefone(){
     return $this->telefone;
	 }
  //metodo SET(definir/configurar)
   public function setTelefone($telefone)
   {
       $this->telefone=$telefone;
	   }
	   }
?>