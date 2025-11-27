<?php
$conexion = mysqli_connect("localhost", "root", "", "menú");

$combo = (int) $_POST['combo'];

mysqli_query($conexion, "UPDATE combos SET votos = votos + 1 WHERE id = $combo");

header("Location: grafico.php");
?>
