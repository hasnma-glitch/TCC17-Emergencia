<?php
				require_once "classes/daotabconvenio.class.php"; //dao

				//instancia o objeto da classe
				$dao = new DaoTabconvenio;
				
				//pega os dados 
				$dados = $dao->listar();

				//popula o select
				while($a=current($dados)) {
					echo "<option value=".$a['id_convenio'].">".$a['convenio']."</option>";
					next($dados);
				}
			?>