<?php
class tabatendimento{
 private $id_usuario;
 private $id_funcionario;
 private $id_atendimento;
 private $perfil;
 private $hora;
 private $data;
 private $sintomas;
  
    public function getId_usuario(){
    return $this->id_usuario;}
	public function setId_usuario($id_usuario){
    $this->id_usuario=$id_usuario;}
  
    public function getId_funcionario(){
    return $this->id_funcionario;}
    public function setId_funcionario($id_funcionario){
    $this->id_funcionario=$id_funcionario;}
	
    public function getId_atendimento(){
    return $this->id_atendimento;}
    public function setId_atendimento($id_atendimento){
    $this->id_atendimento=$id_atendimento;}
  
    public function getPerfil(){
    return $this->perfil;}
    public function setPerfil($perfil){
    $this->perfil=$perfil;}
  
    public function getHora(){
    return $this->hora;}
    public function setHora($hora){
    $this->hora=$hora;}
	
	public function getData(){
    return $this->data;}
    public function setData($data){
    $this->data=$data;}
	
	public function getSintomas(){
    return $this->sintomas;}
    public function setSintomas($sintomas){
    $this->perfil=$sintomas;}
	}
?>