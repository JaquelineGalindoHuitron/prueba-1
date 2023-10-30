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
	
	$name = $_POST['name'];
	$qty = $_POST['qty'];
	$price = $_POST['price'];	
	
	// checking empty fields
	if(empty($name) || empty($qty) || empty($price)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($qty)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE products SET name='$name', qty='$qty', price='$price' WHERE id=$id");
		
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
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$tel = $_POST['tel'];
	$direccion = $_POST['direccion'];
	$email = $_POST['email'];
	$nomnegocio = $_POST['nomnegocio'];
	$tproducto = $_POST['tproducto'];
	$loginId = $_SESSION['id'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nombre</td>
				<td><input type="text" name="nombre" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Apellidos</td>
				<td><input type="text" name="apellidos" value="<?php echo $qty;?>"></td>
			</tr>
			<tr> 
				<td>Telefono</td>
				<td><input type="text" name="tel" value="<?php echo $price;?>"></td>
			</tr>
			<tr> 
				<td>Direccion</td>
				<td><input type="text" name="tel" value="<?php echo $price;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $price;?>"></td>
			</tr>
			<tr> 
				<td>Nombre Negocio</td>
				<td><input type="text" name="nomnegocio" value="<?php echo $price;?>"></td>
			</tr>
			<tr> 
				<td>Producto</td>
				<td><input type="text" name="tprodcuto" value="<?php echo $price;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Actualizar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
