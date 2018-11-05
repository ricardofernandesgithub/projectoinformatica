<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

    <script src="<?php echo base_url(); ?>assets/jquery/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

    <title>Coficab</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <div class=navbar-header>
                <a class="navbar-brand" href="/projecto/">Coficab</a>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>mapa_geral">Localizar Dispositivos</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Categorias</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo base_url(); ?>categorias/index">Ver Categorias</a>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>categorias/criar">Criar</a>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>categorias/actualizar">Actualizar</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>