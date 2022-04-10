<?php
// including the database connection file
include_once("config.php");

// fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM pedido ORDER BY id DESC");
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
<div class="container">
	<div class="jumbotron">
      <h1 class="display-4">Pedidos</h1>
    </div>	
	<a href="index.php#order" class="btn btn-primary">Agregar otro pedido</a><br/><br/>
	<table width='80%' border=0 class="table">

	<tr bgcolor='#CCCCCC'>
		<td><h2>Nombre</h2></td>
		<td><h2>Número</h2></td>
		<td><h2>Dirección</h2></td>
		<td><h2>Comida</h2></td>
		<td><h2></h2></td>
	</tr>

	<?php
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>\n";
		echo "<td><h2>".$res['nombre']."</h2></td>\n";
		echo "<td><h2>".$res['telefono']."</h2></td>\n";
		echo "<td><h2>".$res['direccion']."</h2></td>\n";
		echo "<td><h2>".$res['comida']."</h2></td>\n";
		echo "<td><h2><a href=\"edit.php?id=$res[id]\">Editar</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('¿Quieres borrar este pedido?')\">Delete</a></h2></td>\n";
		echo "</tr>\n";
	}

	mysqli_close($mysqli);
	?>
	</table>
</div>
<section class="footer">

    <div class="share" style="color: aliceblue;">
        <h1>Gracias por ordenar con nosotros</h1>
    </div>

</section>

</body>
</html>

