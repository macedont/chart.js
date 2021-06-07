<?php
include 'conexao/conexao.php';

if (!empty($pdo)) {
    $sql = $pdo->query("SELECT * FROM lucros")->fetchAll();
}
//preparando valores
$mes = '';
$ano_2018 = '';
$ano_2019 = '';

foreach ($sql as $value){
     $mes = $mes . '"' . $value['mes'] . '"'.',';
     $ano_2018 = $ano_2018 . '"' . $value['ano_2018'] . '"'. ',';
     $ano_2019 = $ano_2019 . '"' . $value['ano_2019'] . '"' . ',';

     $mes = trim($mes);
     $ano_2018 = trim($ano_2018);
     $ano_2019 = trim($ano_2019);
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js"></script>
</head>
<body>

<div class="container" style="background-color: ghostwhite">
    <canvas style="padding: 20px" id="myChart"></canvas>

</div>

<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        data: {
            labels: [<?php echo $mes ?>],
            datasets:
            [{
                type: "bar",
                label: '2018',
                data: [<?php echo $ano_2018; ?>],
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132)',
                borderWidth: 3
            },
            {
                type: "bar",
                label: '2019',
                data: [<?php echo $ano_2019; ?>],
                backgroundColor: 'rgba(0, 255, 255, 0.5)',
                borderColor: 'rgba(0, 255, 255)',
                borderWidth: 3
            },
            {
                type: 'line',
                label: 'Meta 2018',
                data: [120, 260, 360, 490, 530],
                backgroundColor: 'transparent',
                borderColor: 'rgba(255, 255, 0)',
                borderWidth: 3,
                // tension: false
            },
                {
                    type: 'line',
                    label: 'Meta 2019',
                    data: [150, 290, 330, 530, 570],
                    backgroundColor: 'transparent',
                    borderColor: 'rgb(113,110,110)',
                    borderWidth: 3,
                    // tension: false
                }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: false,
                },
                x: {
                    autoskip: true,
                    maxTicketsLimit: 20
                }
            },
            tooltips: {
                mode: 'index'
            }
            //indexAxis: 'y'  - grafico fica na horizontal
        }
    });
</script>
</body>
</html>