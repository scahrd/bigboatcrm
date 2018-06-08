    </body>
<footer>
    <nav class="navbar fixed-bottom navbar-light bg-light">
        <h6>Footer</h6>
    </nav>
</footer>

<script type="text/javascript">
<?php 
switch ($page) {
    case 'dashboard':
?>
    var ctxVendas = document.getElementById('chartVendas').getContext('2d');
        ctxVendas.canvas.height = '55 ';
    var chartVendas = new Chart(ctxVendas, {
        type: 'line',
        data: {
            labels: ["S", "T", "Q", "Q", "S", "S", "D"],
            datasets: [{
               label: "Semana Atual",
               backgroundColor: 'rgba(99,194,222, 0.1)',
               borderColor: 'rgb(99,194,222)',
               data: [80, 10, 159, 2, 50, 20, 95], 
            },{
                label: "Semana Anterior",
                backgroundColor: 'rgba(194, 201, 206, 0.1)',
                borderColor: 'rgb(194, 201, 206)',
                data: [3, 17, 32, 22, 18, 30, 45],
            }]
        },
        options:{
            legend:{
                position:'bottom'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        stepSize: 25
                    }
                }]
            }
        }
    });

    var ctxBairros = document.getElementById('chartBairros').getContext('2d');
    ctxBairros.canvas.height = '200 ';
    var chartBairros = new Chart(ctxBairros, {
        type: 'pie',
        data: {
            labels: ["Campinas", "Kobrasol", "Praia Comprida"],
            datasets: [{
                label: "Semana Anterior",
                backgroundColor: ['rgba(255, 99, 132, 0.7)', 'rgba(40,167,69, 0.7)', 'rgba(255,193,7, 0.7)'],
                borderColor: ['rgba(255, 99, 132, 0.7)', 'rgba(40,167,69, 0.7)', 'rgba(255,193,7, 0.7)'],
                data: [3, 17, 47]
            }]
        },
        options:{
            legend:{
                position:'bottom'
            }
        }
    });

    var ctxPagamentos = document.getElementById('chartPagamentos').getContext('2d');
    ctxPagamentos.canvas.height = '200 ';
    var chartPagamentos = new Chart(ctxPagamentos, {
        type: 'pie',
        data: {
            labels: ["Crédito", "Ticket", "Dinheiro"],
            datasets: [{
                backgroundColor: ['rgba(211, 72, 54, 0.7)', 'rgba(40,167,69, 0.7)', 'rgba(170,170,170, 0.7)'],
                borderColor: ['rgba(211, 72, 54, 0.7)', 'rgba(40,167,69, 0.7)', 'rgba(170,170,170, 0.7)'],
                data: [41,35,78]
            }]
        },
        options:{
            legend:{
                position:'bottom'
            }
        }
    });

    var ctxPedidos = document.getElementById('chartPedidos').getContext('2d');
    ctxPedidos.canvas.height = '200 ';
    var chartPagamentos = new Chart(ctxPedidos, {
        type: 'pie',
        data: {
            labels: ["iFood", "WhatsApp", "App"],
            datasets: [{
                backgroundColor: ['rgba(211, 72, 54, 0.7)', 'rgba(40,167,69, 0.7)', 'rgba(99,194,222, 0.7)'],
                borderColor: ['rgba(211, 72, 54, 0.7)', 'rgba(40,167,69, 0.7)', 'rgba(99,194,222, 0.7)'],
                data: [18,35,78]
            }]
        },
        options:{
            legend:{
                position:'bottom'
            }
        }
    });

<?php
    break;

    case 'pedidos':
?>

<?php
    break;

    case 'pedidos-new':
?>
    $(document).ready(function(){
        var headers = {'ApiKey':'ad78fabc48e94ea97cbace7191e78d33'}
    });

    function getMenu(){
        $.ajax({
            dataType: "json",
            url: url,
            data: data,
            beforeSend: function (request) {
              request.setRequestHeader(headers);
            }
            success: function (data) {
                
            },
        });
    }
<?php
    break;

    case 'menu':
?>

<?php
        break;
}
?>
</script>

</html>