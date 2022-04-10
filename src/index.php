<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<!-- header section starts  -->

<header>

    <a href="index.php" class="logo"><i class="fas fa-utensils"></i>food</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="#home">Restaurante</a>
        <a href="#order">Ordenar</a>
        <a href="pedidos.php">Pedidos</a>
    </nav>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>Comida excelente</h3>
        <p></p>
        <a href="#order" class="btn">Ordenar ahora</a>
    </div>

    <div class="image">
        <img src="images/home-img.png" alt="">
    </div>

</section>

<section class="popular" id="popular">

    <h1 class="heading"> Comidas </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/p-1.jpg" alt="">
            <h3>Hamburguesas</h3><br>
            <h2>$35</h2>
            <a href="#order" class="btn">Ordenar ahora</a>
        </div>
        <div class="box">
            <img src="images/p-2.jpg" alt="">
            <h3>Pasteles</h3><br>
            <h2>$40</h2>
            <a href="#order" class="btn">Ordenar ahora</a>
        </div>
        <div class="box">
            <img src="images/g-3.jpg" alt="">
            <h3>Burritos</h3><br>
            <h2>$30</h2>
            <a href="#order" class="btn">Ordenar ahora</a>
        </div>
        <div class="box">
            <img src="images/p-4.jpg" alt="">
            <h3>Cupcakes</h3><br>
            <h2>$50</h2>
            <a href="#order" class="btn">Ordenar ahora</a>
        </div>
        <div class="box">
            <img src="images/p-5.jpg" alt="">
            <h3>Bebidas</h3><br>
            <h2>$28</h2>
            <a href="#order" class="btn">Ordenar ahora</a>
        </div>
        <div class="box">
            <img src="images/p-6.jpg" alt="">
            <h3>Paletas de hielo</h3><br>
            <h2>$18</h2>
            <a href="pedidos.php" class="btn">Ordenar ahora</a>
        </div>

    </div>

</section>

<!-- popular section ends -->

<!-- order section starts  -->

<section class="order" id="order">

    <h1 class="heading"> <span>Ordena</span> ahora </h1>

    <div class="row">
        
        <div class="image">
            <img src="images/order-img.jpg" alt="">
        </div>

        <form method="post" name="form1">

            <div class="inputBox">
                <input name="nombre" type="text" placeholder="Nombre">
                <input name="correo" type="email" placeholder="Correo electronico">
            </div>

            <div class="inputBox">
                <input name="telefono" type="number" placeholder="Numero">
                <input name="comida" type="text" placeholder="Comida">
            </div>

            <textarea placeholder="Dirección" name="direccion" id="direccion" cols="30" rows="10"></textarea>

            <input type="submit" value="Realizar pedido" name="Submit" class="btn">

        </form>

    </div>

</section>

<!-- order section ends -->

<!-- footer section  -->

<section class="footer">

    <div class="share" style="color: aliceblue;">
        <h1>Gracias por ordenar con nosotros</h1>
    </div>

</section>

<!-- scroll top button  -->
<a href="#home" class="fas fa-angle-up" id="scroll-top"></a>


</body>
</html>

<?php
// including the database connection file
include("config.php");

if(isset($_POST['Submit'])) {
	$nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
	$correo = mysqli_real_escape_string($mysqli, $_POST['correo']);
	$telefono = mysqli_real_escape_string($mysqli, $_POST['telefono']);
    $comida = mysqli_real_escape_string($mysqli, $_POST['comida']);
    $direccion = mysqli_real_escape_string($mysqli, $_POST['direccion']);

		$stmt = mysqli_prepare($mysqli, "INSERT INTO pedido(nombre,correo,telefono,comida,direccion) VALUES(?,?,?,?,?)");
		mysqli_stmt_bind_param($stmt, "sssss", $nombre, $correo, $telefono, $comida, $direccion);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_free_result($stmt);
		mysqli_stmt_close($stmt);

}

mysqli_close($mysqli);

?>
