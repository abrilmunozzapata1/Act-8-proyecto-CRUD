<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="add.html">agregar</a> | <a href="logout.php">cerrar sesion</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>nombre</td>
			<td>id producto</td>
			<td>cantidad productos</td>
			<td>ciudad</td>
			<td>domicilio</td>
			<td>codigo postal</td>
			<td>fecha entrega</td>
			<td>garantia</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['nombre']."</td>";
			echo "<td>".$res['id_producto']."</td>";
			echo "<td>".$res['cantidad_productos']."</td>";	
			echo "<td>".$res['ciudad']."</td>";	
			echo "<td>".$res['domicilio']."</td>";	
			echo "<td>".$res['codigo_postal']."</td>";
			echo "<td>".$res['fecha_entrega']."</td>";
			echo "<td>".$res['garantia']."</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('¿Estás seguro de que quieres eliminar?')\">Eliminar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
