 <table class="table table-striped" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
					<th>Hospital</th>
                 </tr>
            </thead>
            <tbody>
				 <?php
				require_once "classes/daotabhospital.php"; //dao

				//instancia o objeto da classe
				$dao = new DaoTabhospital;
				
				//pega os dados 
				$dados = $dao->buscar($bairro, $cidade, $estado, $hospital);

				//popula os campos
				foreach($dados as $dado) {
				?>
                <tr>
                    <td><?php echo $dado->getBairro();?></td>
                    <td><?php echo $dado->getCidade();?></td>
                    <td><?php echo $dado->getEstado();?></td>
					<td><?php echo $dado->getHospital();?></td>
                    </td>
                </tr>
				<?php } ?>
            </tbody>
         </table>