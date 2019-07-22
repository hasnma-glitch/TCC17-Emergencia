<?php
	class Conecta{
	//variável que armazena a conexão
	public static $connect;

	//método
	public static function abrirConexao(){
		//se não existir ainda...
		if(!isset(self::$connect)){
			self::$connect= new PDO ('mysql:host=localhost; dbname=app_emergencia','root','',
				array (PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES utf8'));
			self::$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	return self::$connect; //retorna a conexão
	} //fim do método
	} //fim da classe
?>

