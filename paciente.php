<?php
	require_once "classes/conecta.class.php";

	//inicia a sessão
	session_cache_expire(1);
	session_name(sha1('emergencia'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));
	session_start();

	$id = $_SESSION['paciente'];

	$sql="select * from atendimento a, paciente p, funcionario f 
			 where a.id_usuario = p.id_usuario AND a.id_funcionario = f.id_funcionario
			 AND a.id_usuario =".$id;
	$stmt=Conecta::abrirConexao()->prepare ($sql);
	$stmt->execute();

?>
<!doctype html>
<html lang="pt" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Emergencia</title>
	<link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" href="css/icon.css">
	<style>
		html,
		body {
			height: 100%;
		}
		
		html {
			display: table;
			margin: auto;
		}
		
		body {
			display: table-cell;
			vertical-align: middle;
		}
	</style>
</head>

<body class="blue">
&nbsp;
<div class="row">
	<div class="col s12 z-depth-5 card-panel">
		<div class="row">
			<div class="input-field col s12 center">
				<h3>Atendimentos</h3>
			</div>
		</div>
		<div class="row margin">
			<div class="col s12">
				<?php
					echo "           
           <table class='highlight centered' id='pacientes'>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Funcionario</th>
                        <th>Sintomas</th>
                        <th>Hora</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>";

					while ($a = $stmt->fetch(PDO::FETCH_ASSOC)) {

						echo "
                <tr>
                    <td>" . $a['nome_usuario'] . "</td>
                    <td>" . $a['funcionario'] . "</td>
                    <td>" . $a['sintomas'] . "</td>
                     <td>" . $a['hora'] . "</td>
                      <td>" . $a['data'] . "</td>
                </tr>
            ";
					}
					echo "</tbody></table>";

				?>
			</div>

		</div>
	</div>
</div>
<div class="fixed-action-btn">
	<a class="btn-floating btn-large red" onclick="window.history.back();">
		<i class="large material-icons">arrow_back</i>
	</a>
</div>
<script type="application/javascript" src="js/jquery.min.js"></script>
<script type="application/javascript" src="js/materialize.min.js"></script>
</body>
</html>