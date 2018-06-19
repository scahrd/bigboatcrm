    </body>
<footer>
    <nav class="navbar fixed-bottom navbar-light bg-light">
        <h6>Footer</h6>
    </nav>
</footer>

<script type="text/javascript">
    var apiURL = 'http://localhost:8080/api';
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