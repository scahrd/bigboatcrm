<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>BigBoat Sushi</title>
        <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet"></link>
        <script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="./assets/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <style>
            body {
                padding: 95px 0px 60px 0px;
                background-color: #e9eaea;
                width: 100%;
                color: #08353c !important;
                font-size: 18px;
                font-family: 'Lato' !important;
                font-weight: 300 !important;
            }

            h1 {
                font-weight: 200;
                font-size: 30px;
            }

            h1,h2,h3,h4,h5,h6{
                font-weight: 400 !important;
            }

            .nav-item {
                font-size: 15px;
            }   

            .canvas {
                border: 1px solid lightgrey;
                border-radius: 2px;
                background-color: white;
                padding: 15px;
            }

            .border2{
                border-radius: 2px !important;
            }
            
            .dropleft .dropdown-toggle::before {
              content: none !important;
              border-top: none !important;
              border-right: none !important;
              border-bottom: none !important;
            }

            .dropdown-item{
                color:#444;
            }

        </style>
    </head>
        <header>
            <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
                <a class="navbar-brand" href="#"><img src="./assets/logo/logo_third.png" style="height: 45px;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>


                    <ul class="navbar-nav dropleft">
                        <li class="nav-item dropdown">
                            <a style="font-size: 20px;" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-bell"></i>
                            </a>
                            <div class="dropdown-menu">
                                <button class="dropdown-item" type="button">Action</button>
                                <button class="dropdown-item" type="button">Another action</button>
                                <button class="dropdown-item" type="button">Something else here</button>
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