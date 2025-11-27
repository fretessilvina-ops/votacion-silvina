<?php
$conexion = mysqli_connect("localhost", "root", "", "menú");
$consulta = mysqli_query($conexion, "SELECT id, combo FROM combos ORDER BY id ASC");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Votación de Combos</title>
</head>
<body>

<h2>Elegí tu combo favorito</h2>

<form action="votar.php" method="POST">
    <select name="combo" required>
        <option value="">Seleccioná un combo</option>
        <?php while($fila = mysqli_fetch_assoc($consulta)): ?>
            <option value="<?php echo $fila['id']; ?>">
                <?php echo $fila['combo']; ?>
            </option>
        <?php endwhile; ?>
    </select>

    <br><br>
    <button type="submit">Votar</button>
</form>

<br>
<a href="grafico.php">Ver gráfico de resultados</a>

</body>
</html>
