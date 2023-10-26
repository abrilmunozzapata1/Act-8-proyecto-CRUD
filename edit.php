<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$nombre = $_POST['nombre'];
	$id_producto = $_POST['id_producto'];
	$cantidad_productos = $_POST['cantidad_productos'];	
	$ciudad = $_POST['ciudad'];	
	$domicilio = $_POST['domicilio'];	
	$codigo_postal = $_POST['codigo_postal'];	
	$fecha_entrega = $_POST['fecha_entrega'];	
	$garantia = $_POST['garantia'];	
	
	// checking empty fields
	if(empty($nombre) || empty($id_producto) || empty($cantidad_productos) || empty($ciudad) || empty($domicilio) || empty($codigo_postal) || empty($fecha_entrega) || empty($garantia)) {
				
		if(empty($nombre)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($id_producto)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($cantidad_productos)) {
			echo "<font color='red'>correo field is empty.</font><br/>";
		}	

		if(empty($ciudad)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if(empty($domicilio)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if(empty($codigo_postal)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if(empty($fecha_entrega)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if(empty($garantia)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
				
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE products SET nombre='$nombre', id_producto='$id_producto', cantidad_productos='$cantidad_productos', ciudad='$ciudad', domicilio='$domicilio', codigo_postal='$codigo_postal', fecha_entrega='$fecha_entrega', garantia='$garantia'   WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$nombre = $res['nombre'];
	$id_producto = $res['id_producto'];
	$cantidad_productos = $res['cantidad_productos'];
	$ciudad = $res['ciudad'];
	$domicilio = $res['domicilio'];
	$codigo_postal = $res['codigo_postal'];
	$fecha_entrega = $res['fecha_entrega'];
	$garantia = $res['garantia'];
}
?>
<html>
<head>	
	<title>editar</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="view.php">Ver</a> | <a href="logout.php">cerrar sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>nombre</td>
				<td><input type="text" name="nombre" value="<?php echo $nombre;?>"></td>
			</tr>
			<tr> 
				<td>id producto</td>
				<td><input type="text" name="id_producto" value="<?php echo $id_producto;?>"></td>
			</tr>
			<tr> 
				<td>cantidad productos</td>
				<td><input type="text" name="cantidad_productos" value="<?php echo $cantidad_productos;?>"></td>
			</tr>
			<tr> 
				<td>ciudad</td>
				<td><input type="text" name="ciudad" value="<?php echo $ciudad;?>"></td>
			</tr>
			<tr> 
				<td>domicilio</td>
				<td><input type="text" name="domicilio" value="<?php echo $domicilio;?>"></td>
			</tr>
			<tr> 
				<td>codigo postal</td>
				<td><input type="text" name="codigo_postal" value="<?php echo $codigo_postal;?>"></td>
			</tr>
			<tr> 
				<td>fecha entrega</td>
				<td><input type="text" name="fecha_entrega" value="<?php echo $fecha_entrega;?>"></td>
			</tr>
			<tr> 
				<td>garantia</td>
				<td><input type="text" name="garantia" value="<?php echo $garantia;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="actualizar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
