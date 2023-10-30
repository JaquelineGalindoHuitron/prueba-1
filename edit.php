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
	$apellidos = $_POST['apellidos'];
	$tel = $_POST['tel'];
	$direccion = $_POST['direccion'];
	$email = $_POST['email'];
	$nomnegocio = $_POST['nomnegocio'];
	$tproducto= $_POST['tproducto'];	
	
	// checking empty fields
	if(empty($nombre) || empty($apellidos) || empty($tel) || empty($direccion) || empty($email) || empty($nomnegocio) || empty($tproducto)) {
				
		if(empty($nombre)) {
			echo "<font color='red'>El campo de Nombre del comic está vacío.</font><br/>";
		}
		
		if(empty($apellidos)) {
			echo "<font color='red'>El campo Apellidos está vacío.</font><br/>";
		}
		
		if(empty($tel)) {
			echo "<font color='red'>El campo Telefono está vacío.</font><br/>";
		}

		if(empty($direccion)) {
			echo "<font color='red'>El campo Direccion está vacío.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>El campo Email está vacío.</font><br/>";
		}

		if(empty($nomnegocio)) {
			echo "<font color='red'>El campo Nombre del Negocio está vacío.</font><br/>";
		}

		if(empty($tproducto)) {
			echo "<font color='red'>El campo Tipo de Producto está vacío.</font><br/>";
		}
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE proveedor SET nombre='$nombre', apellidos='$apellidos', tel='$tel', direccion='$direccion', email='$email', nomnegocio='$nomnegocio', tproducto='$tproducto' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM proveedor WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$nombre = $res['nombre'];
	$apellidos = $res['apellidos'];
	$tel = $res['tel'];
	$direccion = $res['direccion'];
	$email = $res['email'];
	$nomnegocio = $res['nomnegocio'];
	$tproducto= $res['tproducto'];
}
?>
<html>
<head>	
	<title>Editar datos</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="view.php">ver Resultados</a> | <a href="logout.php">Cerrar Sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
		<tr> 
				<td>Nombre</td>
				<td><input type="text" name="nombre" value="<?php echo $nombre;?>"></td>
			</tr>
			<tr> 
				<td>Apellidos</td>
				<td><input type="text" name="apellidos" value="<?php echo $apellidos;?>"></td>
			</tr>
			<tr> 
				<td>Telefono</td>
				<td><input type="text" name="tel" value="<?php echo $tel;?>"></td>
			</tr>
			<tr> 
				<td>Direccion</td>
				<td><input type="text" name="direccion" value="<?php echo $direccion;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr> 
				<td>Nombre de Negocio</td>
				<td><input type="text" name="nomnegocio" value="<?php echo $nomnegocio;?>"></td>
			</tr>
			<tr> 
				<td>Tipo de Producto</td>
				<td><input type="text" name="tproducto" value="<?php echo $tproducto;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Editar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
