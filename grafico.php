<?php
$conexion = mysqli_connect("localhost", "root", "", "menú");
$consulta = mysqli_query($conexion, "SELECT combo, votos FROM combos ORDER BY id ASC");

$labels = [];
$data = [];

while ($fila = mysqli_fetch_assoc($consulta)) {
    $labels[] = $fila['combo'];
    $data[] = $fila['votos'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Resultados</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<h2>Resultados de la votación</h2>
<canvas id="myChart"></canvas>

<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Votos',
            data: <?php echo json_encode($data); ?>,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>

</body>
</html>
