<?php
class Tabhospital{
  private $hospital;
  private $logradouro;
  private $numero;
  private $complemento;
  private $id_hospital;
  private $telefone;
  private $referencia;
  private $latitude;
  private $longitude;
  private $capacidade;
  private $qtd_espera;
  private $qtd_internados;
  private $cidade;
  private $bairro;
  private $estado;
  private $cep;

   public function getHospital(){return $this->hospital;}
   public function setHospital($hospital)
   {$this->hospital=$hospital;}
   
   public function getLogradouro(){return $this->logradouro;}
   public function setLogradouro($logadouro)
   {$this->logradouro=$logadouro;}
   
   public function getNumero(){return $this->numero;}
   public function setNumero($numero)
   {$this->numero=$numero;}
    
   public function getComplemento(){return $this->complemento;}
   public function setComplemento($complemento)
   {$this->complemento=$complemento;}
   
   public function getId_hospital(){return $this->id_hospital;}
   public function setId_hospital($id_hospital)
   {$this->id_hospital=$id_hospital;}
   
   public function getTelefone(){return $this->telefone;}
   public function setTelefone($telefone)
   {$this->telefone=$telefone;}
   
   public function getReferencia(){return $this->referencia;}
   public function setReferencia($referencia)
   {$this->referencia=$referencia;} 
   
   public function getLatitude(){return $this->latitude;}
   public function setLatitude($latitude)
   {$this->latitude=$latitude;}
   
   public function getLongitude(){return $this->longitude;}
   public function setLongitude($longitude)
   {$this->longitude=$longitude;}

   public function getCapacidade(){return $this->capacidade;}
   public function setCapacidade($capacidade)
   {$this->capacidade=$capacidade;}

   public function getQtd_espera(){return $this->qtd_espera;}
   public function setQtd_espera($qtd_espera)
   {$this->qtd_espera=$qtd_espera;}

   public function getQtd_internados(){return $this->qtd_internados;}
   public function setQtd_Internados($qtd_internados)
   {$this->qtd_internados=$qtd_internados;} 

   public function getBairro(){return $this->bairro;}
   public function setBairro($bairro)
   {$this->bairro=$bairro;}   
   
   public function getCidade(){return $this->cidade;}
   public function setCidade($cidade)
   {$this->cidade=$cidade;}
   
   public function getEstado(){return $this->estado;}
   public function setEstado($estado)
   {$this->estado=$estado;}
   
   public function getCep(){return $this->cep;}
   public function setCep($cep)
   {$this->cep=$cep;}
   
   }
?>