<?php
    $cdnURL = 'http://localhost:5000';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>BigBoat Sushi</title>
        <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link href="<?=$cdnURL?>/css/style.css" rel="stylesheet"></link>
        <link href="<?=$cdnURL?>/css/bootstrap.min.css" rel="stylesheet"></link>
        <script src="<?=$cdnURL?>/js/jquery.js"></script>
        <script src="<?=$cdnURL?>/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=$cdnURL?>/js/chart.min.js"></script>
    </head>
        <header>
            <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
                <a class="navbar-brand" href="#"><img src="<?=$cdnURL?>/logo/logo_third.png" style="height: 45px;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/dashboard"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="/menu"><i class="fas fa-utensils"></i></i>&nbsp;Cardápio</a>
                        </li>
                    </ul>


                    <ul class="navbar-nav dropleft">
                        <li class="nav-item dropdown">
                            <a style="font-size: 20px;" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-bell"></i>
                            </a>
                            <div class="dropdown-menu">
                                <!-- function get notifications | fazer função com jquery pra puxar da API -->
                                <button class="dropdown-item" type="button">Action</button>
                            </div>
                        </li>
                    </ul>
                    &nbsp;
                    <ul class="navbar-nav dropleft">
                            <li class="nav-item dropdown">
                                <a style="font-size: 33px;" class="nav-link dropdown-toggle" id="navDropDownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle"></i></a>
                                <div class="dropdown-menu" aria-labelledby="navDropDownLink">
                                    <a class="dropdown-item" href="#"><i class="fas fa-cog"></i>&nbsp;Configurações</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-user"></i>&nbsp;Usuários</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/signout" style="color: red;">Logout</a>
                                </div>
                            </li>
                        </ul>
                </div>
            </nav>
        </header>
    <body>