<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Nave 1</title>

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
              crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

        <script src="<?php echo base_url(); ?>assets/jquery/jquery-3.3.1.min.js"></script>

        <style>

            body {
                background-image: url("<?php echo base_url(); ?>assets/plantas/sfd.png");
                background-repeat: no-repeat;
                overflow: scroll;
            }

            label {
                position: absolute;
                width: 20px;
                margin-left: -10px;
                left: 50%;
                top: 200px;
            }

            label svg {
                width: 20px;
                height: 20px;
            }	

        </style>

    </head>

    <body>

        <svg xmlns="http://www.w3.org/2000/svg" width="2000px" height="2000px">
        <?php foreach ($dispositivos as $dispositivo) : ?>
            <?php if ($dispositivo['Localizacao_Mapa'] == 1 && $dispositivo['URL_Slug'] == $_COOKIE['slug_cookie']): ?>
                <circle cx="<?php echo $dispositivo['Coordenada_X']; ?>" cy="<?php echo $dispositivo['Coordenada_Y']; ?>" r="15" stroke="green" stroke-width="4" fill="red" />
            <?php endif; ?>
        <?php endforeach; ?>
        </svg>
sadgfh
    </body>

</html>