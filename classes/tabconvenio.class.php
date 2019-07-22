<?php
	class Tabconvenio {
		//atributos da classe
		private $idconvenio;
		private $convenio;
		
		//metodo get
		public function getIdconvenio(){
			return $this -> idconvenio;
		}
		
		//metodo set
		public function setIdconvenio($idconvenio){
			$this -> idconvenio=$idconvenio;
		}

} //fim de classe
?>