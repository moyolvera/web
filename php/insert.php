<?php
	function conexion(){
	  try{
	    $pdo = new \PDO('mysql:host=localhost;dbname=esiima;charset=utf8',
	        'root',
	        'mysql',
	        array(
	            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
	            \PDO::ATTR_PERSISTENT => false,
	            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone = 'America/Mexico_City' ",
	            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8' "
	        )
	    );
	    return $pdo;
	  }catch(\PDOException $ex){
	    return print($ex->getMessage());
	  }
	}
	if(isset($_GET['nombre'])){		

		$pdo = conexion();

try{
		$handle = $pdo->prepare("INSERT INTO Alumnos(idAlumno,Nombre,Carrera) VALUES (?,?,?)");
		$handle->execute(array(
			$_GET['idalumno'],$_GET['nombre'],$_GET['carrera']
		));
		echo "INSERTADA";

}catch(PDOException $e){
	echo "STATUS: ".$e->getMessage();
}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejemplo de Bootstrap</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<form method="get">
					<div class="form-group">
						<label for="idalumno" > ID: </label>
						<input type="text" name="idalumno" class="form-control" id="idalumno" required>
					</div>
					<div class="form-group">
						<label for="nombre"> Nombre: </label>
						<input type="text" name="nombre" class="form-control" id="nombre" required>
					</div>
					<div class="form-group">
						<label for="nombre"> Carrera: </label>
						<input type="text" name="carrera" class="form-control" id="carrera" required>
					</div>
					<button type="submit" class="btn btn-primary">Agregar</button>
				</form>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
