<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update'])) {
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
	$correo = mysqli_real_escape_string($mysqli, $_POST['correo']);
	$telefono = mysqli_real_escape_string($mysqli, $_POST['telefono']);
    $comida = mysqli_real_escape_string($mysqli, $_POST['comida']);
    $direccion = mysqli_real_escape_string($mysqli, $_POST['direccion']);

	
		// updating the table
		$stmt = mysqli_prepare($mysqli, "UPDATE pedido SET nombre=?,correo=?,telefono=?, comida=?, direccion=? WHERE id=?");
		mysqli_stmt_bind_param($stmt, "sssssi", $nombre, $correo, $telefono, $comida, $direccion, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_free_result($stmt);
		mysqli_stmt_close($stmt);

		// redirectig to the display page. In our case, it is index.php
		header("Location: pedidos.php");
}
?>

<?php
// getting id from url
$id = $_GET['id'];

// selecting data associated with this particular id
$stmt = mysqli_prepare($mysqli, "SELECT nombre, correo, telefono, comida, direccion FROM pedido WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $nombre, $correo, $telefono, $comida, $direccion);
mysqli_stmt_fetch($stmt);
mysqli_stmt_free_result($stmt);
mysqli_stmt_close($stmt);
mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<!-- header section starts  -->

<header>

    <a href="index.php" class="logo"><i class="fas fa-utensils"></i>food</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="index.php#home">Restaurante</a>
        <a href="index.php#order">Ordenar</a>
        <a href="pedidos.php">Pedidos</a>
    </nav>

</header>
<div class = "container">
	<div class="jumbotron">
		<h1 class="display-4">Editar pedidos</h1>
	</div>

	<a href="pedidos.php" class="btn btn-primary">Restaurante</a>
	<br/><br/>

	<form name="form1" method="post" action="edit.php">

		<div class="form-group">
			<h2><label for="name">Nombre</label></h2>
			<input type="text" class="btn form-control" name="nombre" value="<?php echo $nombre;?>">
		</div>

		<div class="form-group">
			<h2><label for="name">Correo electronico</label></h2>
			<input type="text" class="btn form-control" name="correo" value="<?php echo $correo;?>">
		</div>

		<div class="inputbox form-group">
			<h2><label for="name">Telefono</label></h2>
			<input type="text" class="btn form-control" name="telefono" value="<?php echo $telefono;?>">
		</div>

		<div class="form-group">
			<h2><label for="name">Comida</label></h2>
			<input type="text" class="btn form-control" name="comida" value="<?php echo $comida;?>">
		</div>

		<div class="form-group">
			<h2><label for="name">Dirección</label></h2>
			<input type="text" class="btn form-control" name="direccion" value="<?php echo $direccion;?>">
		</div>

		<div class="form-group">
			<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
			<input type="submit" name="update" value="Actualizar" class="btn form-control" >
		</div>

	</form>
</div>
<section class="footer">

    <div class="share" style="color: aliceblue;">
        <h1>Gracias por ordenar con nosotros</h1>
    </div>

</section>


</body>
</html>
