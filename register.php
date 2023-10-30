<html>
<head>
	<title>Registrarse</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$name = $_POST['nombre'];
	$email = $_POST['email'];
	$user = $_POST['nomusuario'];
	$pass = $_POST['contrasena'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "Todos los campos deben estar llenos. Uno o varios campos están vacíos.";
		echo "<br/>";
		echo "<a href='register.php'>Go back</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login(nombre, email, nomusuario, contrasena) VALUES('$name', '$email', '$user', md5('$pass'))")
			or die("Error de Registro, Vuelve a Intentarlo.");
			
		echo "Registro Exitoso";
		echo "<br/>";
		echo "<a href='login.php'>Iniciar Sesion</a>";
	}
} else {
?>
	<p><font size="+2">Registro</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="15%">Nombre Completo</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>			
			<tr> 
				<td>Nombre de Usuario</td>
				<td><input type="text" name="nomusuario"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="contrasena"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Registrarse"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
