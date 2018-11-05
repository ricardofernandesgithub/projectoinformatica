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
                    <a class="navbar-brand" href="#">Coficab</a>
                </div>
                <?php if ($this->session->userdata('dentro') && ($this->session->userdata('Tipo') != 2)) : ?>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Administrar</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo base_url(); ?>utilizadores/registar">Registar Utilizador</a>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>categorias/criar">Adicionar Categoria</a>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>estados/criar">Adicionar Estado</a>
                            </div>
                        </li>
                    </ul>
                <?php endif; ?>
                <?php if ($this->session->userdata('dentro')) : ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>mapa_geral">Mapas</a>
                        </li>
                    </ul>
                <?php endif; ?>
                <ul class="navbar-nav">
                    <?php if ($this->session->userdata('dentro')) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Dispositivos</a>
                            <div class="dropdown-menu">
                                <?php if (($this->session->userdata('Tipo') != 2)) : ?>
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>dispositivos/criar">Adicionar Dispositivo</a>
                                <?php endif; ?>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>dispositivos/index">Ver Dispositivos</a>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>categorias/index">Ver Categorias</a>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>estados/index">Ver Estados</a>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>edificios/index">Ver Edificios</a>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php if ($this->session->userdata('dentro')) : ?>
                    <?php echo form_open('dispositivos/pesquisar'); ?>
                    <div class="form-inline my-2 my-lg-0">
                        <input type="search" class="form-control mr-sm-2" name="Termo_Pesquisa" placeholder="Pesquisar">
                        <button type="submit" class="btn btn-default">Pesquisar</button>
                    </div>
                    </form>
                <?php endif; ?>
                <ul class="navbar-nav">
                    <?php if (!$this->session->userdata('dentro')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>utilizadores/login">Entrar</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('dentro')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>utilizadores/logout">Sair</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>

        <!-- Mensagens 'flash'. Disponíveis com a biblioteca 'session' -->
        <div class="container">
            <?php if ($this->session->flashdata('utilizador_registado')): ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('utilizador_registado') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('dispositivo_adicionado')): ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('dispositivo_adicionado') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('dispositvo_alterado')): ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('dispositvo_alterado') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('categoria_criada')): ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('categoria_criada') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('estado_criado')): ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('estado_criado') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('login_falhou')): ?>
                <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('login_falhou') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('utilizador_efectuou_login')): ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('utilizador_efectuou_login') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('utilizador_efectuou_logout')): ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('utilizador_efectuou_logout') . '</p>'; ?>
            <?php endif; ?>

        </div>