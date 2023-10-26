<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Agregar</title>
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$nombre = $_POST['nombre'];
	$id_producto = $_POST['id_producto'];
	$cantidad_productos = $_POST['cantidad_productos'];
	$ciudad = $_POST['ciudad'];
	$domicilio = $_POST['domicilio'];
	$codigo_postal = $_POST['codigo_postal'];
	$fecha_entrega = $_POST['fecha_entrega'];
	$garantia = $_POST['garantia'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($nombre) || empty($id_producto) || empty($cantidad_productos) || empty($ciudad || empty($domicilio) || empty($codigo_postal) || empty($fecha_entrega) || empty($garantia))) {
				
		if(empty($nombre)) {
			echo "<font color='red'>El campo nombre está vacío.</font><br/>";
		}
		
		if(empty($id_producto)) {
			echo "<font color='red'>El campo id_producto está vacío.</font><br/>";
		}
		
		if(empty($cantidad_productos)) {
			echo "<font color='red'>El campo cantidad_productos está vacío.</font><br/>";
		}
		
		if(empty($ciudad)) {
			echo "<font color='red'>El campo ciudad está vacío.</font><br/>";
		}

		if(empty($domicilio)) {
			echo "<font color='red'>El campo domicilio está vacío.</font><br/>";
		}

		if(empty($codigo_postal)) {
			echo "<font color='red'>El campo codigo_postal está vacío.</font><br/>";
		}

		if(empty($fecha_entrega)) {
			echo "<font color='red'>El campo fecha_entrega está vacío.</font><br/>";
		}

		if(empty($garantia)) {
			echo "<font color='red'>El campo garantia está vacío.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>volver</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO products(nombre, id_producto, cantidad_productos, ciudad, domicilio, codigo_postal, fecha_entrega, garantia, login_id) VALUES('$nombre','$id_producto','$cantidad_productos','$ciudad', '$domicilio', '$codigo_postal', '$fecha_entrega', '$garantia', '$loginId')");
		
		//display success message
		echo "<font color='green'>
		Datos agregados exitosamente.";
		echo "<br/><a href='view.php'>Ver resultados</a>";
	}
}
?>
</body>
</html>
