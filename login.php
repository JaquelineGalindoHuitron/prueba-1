<?php session_start(); ?>
<html>
<head>
	<title>Iniciar Sesion</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$nomusuario = mysqli_real_escape_string($mysqli, $_POST['username']);
	$contrasena = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($nomusuario == "" || $contrasena == "") {
		echo "El campo nombre o contraseña está vacío.";
		echo "<br/>";
		echo "<a href='login.php'>Volver</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM login WHERE nomusuario='$nomusuario' AND contrasena=md5('$contrasena')")
					or die("No se pudo ejecutar la consulta de selección.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['nomusuario'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['nombre'] = $row['nombre'];
			$_SESSION['id'] = $row['id'];
		} else {
			echo "Nombe de usuario o contraseña no válidos.";
			echo "<br/>";
			echo "<a href='login.php'>Volver</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p><font size="+2">Inicio de Sesion</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nombre Usuario</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Enviar"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
