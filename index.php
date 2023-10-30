<?php session_start(); ?>
<html>
<head>
	<title>Pagina de Inicio</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		<h1>Bienvenid@ a mi pagina!</h1>
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Bienvenid@ <?php echo $_SESSION['nombre'] ?> ! <br><br><a href='logout.php'>Cerrar Sesion</a><br/>
		<br/>
		<a href='view.php'>Ver y agregar Productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Debe iniciar sesión para ver esta página.<br/><br/>";
		echo "<a href='login.php'>Login</a> | <a href='register.php'>Registrar</a>";
	}
	?>
	<div id="footer">
		Created by <a href="http://blog.chapagain.com.np" title="Mukesh Chapagain">Mukesh Chapagain</a>
	</div>
</body>
</html>
