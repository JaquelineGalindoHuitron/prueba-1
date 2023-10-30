<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Agregar datos</title>
</head>
<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$tel = $_POST['tel'];
	$direccion = $_POST['direccion'];
	$email = $_POST['email'];
	$nomnegocio = $_POST['nomnegocio'];
	$tproducto = $_POST['tproducto'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($nombre) || empty($apellidos) || empty($tel) || empty($direccion) || empty($email) || empty($nomnegocio) || empty($tproducto)) {
				
		if(empty($nombre)) {
			echo "<font color='red'>El campo Nombre está vacío.</font><br/>";
		}
		
		if(empty($apellidos)) {
			echo "<font color='red'>El campo de Apellidos está vacío.</font><br/>";
		}
		
		if(empty($tel)) {
			echo "<font color='red'>El campo de Telefono está vacío.</font><br/>";
		}
		if(empty($direccion)) {
			echo "<font color='red'>El campo de Direccion está vacío.</font><br/>";
		}
		if(empty($email)) {
			echo "<font color='red'>El campo de Email está vacío.</font><br/>";
		}
		if(empty($nomnegocio)) {
			echo "<font color='red'>El campo de Nombre del Negocio está vacío.</font><br/>";
		}
		if(empty($tproducto)) {
			echo "<font color='red'>El campo de Tipo de Producto está vacío.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO proveedor(nombre, apellidos, tel, direccion, email, nomnegocio, tproducto, login_id) VALUES('$nombre','$apellidos','$tel','$direccion','$email','$nomnegocio','$tproducto',$loginId)");
		
		//display success message
		echo "<font color='green'>Datos agregados correctamente.";
		echo "<br/><a href='view.php'>Ver Resultados</a>";
	}
}
?>
</body>
</html>
