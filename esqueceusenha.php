<!DOCTYPE html>
<html lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Emergência</title>
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
</head>
<body> 
<!--barra de navegação-->

<!--fim da barra de navegação-->
<!--início do container principal-->
<div id="main" class="container-fluid">
<br>
 <h3 class="page-header">Logar</h3>
 <form action="esquecisenha.php" method="POST">
  <!-- area de campos do form -->
  	<div class="row">
		<div class="form-group col-md-6">
			<label for="email">E-mail:</label>
			<input type="text" class="form-control" placeholder="E-mail" name="email" minlenght=3 maxlenght=100 required>
		</div>
		<div class="form-group col-md-6">
			<label for="text">CPF:</label>
			<input type="texte" class="form-control" placeholder="CPF" name="cpf" minlenght=3 maxlenght=100 required>
		</div>
		 
	</div>
  <hr />
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Recuperar Senha</button>
      
    </div>
  </div>
</form>
</div><!--fim do container principal-->
 <script src="js/jquery.min.js"></script>
 <script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script>
 
</body>
</html>