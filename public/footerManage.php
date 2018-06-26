    </body>
<footer>
</footer>

<script type="text/javascript">
    var apiURL = 'http://localhost:8080/api';
    var apiToken = 'ad78fabc48e94ea97cbace7191e78d3';
<?php 
switch ($page) {
    case 'dashboard':
        include_once('./assets/js/dashboard.js');
    break;

    case 'pedidos':
    break;

    case 'pedidos-new':
        include_once('./assets/js/pedidos-new.js');
    break;

    case 'menu':
        break;
}
?>
</script>

</html>