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

            #overlay {
                display: flex;
                justify-content: center;
                align-items: center;
                position: fixed;
                /*display: none;*/
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0,0,0,0.75);
                z-index: 2;
                cursor: pointer;
            }

            .texto{
                position: absolute;
                top: 30%;
                left: 55%;
                font-size: 20pt;
                color: white;
                transform: translate(-50%,-50%);
                -ms-transform: translate(-50%,-50%);
            }

            #ocultar{
                display: none;
            }		
        </style>

    </head>

    <body id="nave1">

        <div id="log"></div>

        <canvas id="canvas" width="2000" height="2000"></canvas>



        <!--Número de cliques:<span id='cliques'>0</span>-->
        <script>

            // previne o aparecimento do 'contextmenu' quando o botão direito do rato é pressionado
            $(document).on('contextmenu', function (event) {
                event.preventDefault();
            });

            // função para ocultar botão 'Confirmar' quando a página é carregada pela primeira vez
            $(document).ready(function () {
                $("#overlay").click(function () {
                    $("#ocultar").css('display', 'block');
                });
            });

            // overlay on
            function on() {
                document.getElementById("overlay").style.display = "flex";
            }
            // overlay off
            function off() {
                document.getElementById("overlay").style.display = "none";
            }

            function retroceder() {
			    window.location.replace("<?php echo site_url('/nave1'); ?>");
			}

        </script>

        <div id="overlay">
            <button class="btn btn-info" onclick="retroceder()">Retroceder</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo form_open('/dispositivos/confirmar/' . $_COOKIE['id_dispositivo_cookie']); ?>
            <input type="submit" value="Confirmar" class="btn btn-warning">
            </form>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    	<a class="btn btn-primary" href="<?php echo site_url('/dispositivos/'.$_COOKIE['slug_cookie']); ?>">Cancelar</a>
        </div>

    </body>

</html>
