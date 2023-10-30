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
$result = mysqli_query($mysqli, "SELECT * FROM proveedor WHERE id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Pagina Inicio</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="add.html">Agregar nuevos datos</a> | <a href="logout.php">Cerrar Sesion</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
		<td>Id</td>
			<td>Nombre</td>
			<td>Apellidos</td>
			<td>Telefono</td>
			<td>direccion</td>
			<td>Email</td>
			<td>Nom Negocio</td>
			<td>Productos</td>

		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['id']."</td>";
			echo "<td>".$res['nombre']."</td>";
			echo "<td>".$res['apellidos']."</td>";
			echo "<td>".$res['tel']."</td>";	
			echo "<td>".$res['direccion']."</td>";
			echo "<td>".$res['email']."</td>";
			echo "<td>".$res['nomnegocio']."</td>";
			echo "<td>".$res['tproducto']."</td>";

			echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('¿Estás seguro de que quieres eliminarlo?')\">Eliminar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
