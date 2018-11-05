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

            // função para detectar número de cliques
            var nr_cliques = 0;
            document.onclick = function () {
                nr_cliques++;
                //document.getElementById("cliques").innerHTML = nr_cliques;
                /*if(nr_cliques & 1){ // impar
                 off();
                 } else{ // par
                 on();
                 }*/
            }

            // overlay on
            function on() {
                document.getElementById("overlay").style.display = "flex";
            }
            // overlay off
            function off() {
                document.getElementById("overlay").style.display = "none";
            }

            function setCookie(cname, cvalue, exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                var expires = "expires=" + d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }

            // obtenção das coordenadas do rato
            $(document).on("click", function (event) {
                // identificação das coordenadas
                $("#log").text("coordenada_X: " + event.pageX + ", coordenada_Y: " + event.pageY);
                var x = event.clientX;
                var y = event.clientY;
                console.log(x + " " + y);
                // definição dos cookies com as coordenadas
                setCookie("cookie_x", x, 1);
                setCookie("cookie_y", y, 1);
                /*coordenada_x = 'cookie_x';
                 coordenada_y = 'cookie_y';
                 document.cookie = coordenada_x + "=" + x;// concatenação do nome do cookie com o seu valor
                 document.cookie = coordenada_y + "=" + y;*/
            });

            window.onkeydown = function (e) {
                var code = e.keyCode ? e.keyCode : e.which;
                if (code === 13 || code === 16) { // tecla 'enter' ou 'shift'
                    window.location.replace("<?php echo site_url('/confirmar'); ?>");
                }
            }

            $("#nave1").mousedown(function (ev) {
                if (ev.which == 3)
                {
                    on();
                }
            });

            // desenho de um quadrado nas coordenadas do cursor do rato
            var cn = document.getElementById("canvas");
            var c = cn.getContext("2d");
            var mouse = {x: 0, y: 0};
            window.addEventListener('mousedown', mHandler);
            function mHandler(event) {
                mouse.x = event.clientX - 15;
                mouse.y = event.clientY - 70;
                //mouse.x = event.pageX;
                //mouse.y = event.pageY-100;
            }
            function main() {
                c.clearRect(0, 0, cn.width, cn.height);
                c.fillStyle = "red";
                c.fillRect(mouse.x, mouse.y, 25, 25);
            }
            setInterval(main, 100);

        </script>

        <div id="overlay">
            <div class="texto">Clicar no mapa para localizar dispositivo<br />Confirmar com a tecla 'Enter' ou 'Shift'</div>
            <button class="btn btn-info" onclick="off()">Localizar</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="btn btn-primary" href="<?php echo site_url('/dispositivos/' . $_COOKIE['slug_cookie']); ?>">Cancelar</a>
        </div>

        <!--<?php
        /* if(isset($_COOKIE["cookie_x"])&&isset($_COOKIE["cookie_y"])){
          echo $_COOKIE["cookie_x"];
          echo $_COOKIE["cookie_y"];
          echo $_COOKIE["slug_cookie"];
          } else{
          echo "";
          } */
        ?>-->

        <svg xmlns="http://www.w3.org/2000/svg" width="2000px" height="2000px">
                <!-- <rect x="0" y="0" width="1005" height="590"
        stroke="white" fill="none"/> -->
        <!--<a href="">
                <g transform="translate(0,-80)">
                        <rect x="600" y="300" width="25" height="25" style="stroke:green;fill:green;fill-opacity:1; " onmousedown="alert('Impressora Etiquetas\nTSC TTP-247\nIPRTBZ15\n192.168.10.231')"
                        />
                </g>
        </a>
        <a href="">
                <g transform="translate(0,-80)">
                        <rect x="300" y="300" width="25" height="25" style="stroke:green;fill:green;fill-opacity:1;" onmousedown="alert('Bastidor B\n192.168.10.234 (switch Cisco)\n192.168.10.245 (switch Nortel)')"
                        />
                </g>
        </a>
        <a href="">
                <g transform="translate(0,-80)">
                        <rect x="400" y="300" width="25" height="25" style="stroke:green;fill:green;fill-opacity:1;" />
                </g>
        </a>
        <a href="">
                <g transform="translate(0,-80)">
                        <rect x="600" y="300" width="25" height="25" style="stroke:green;fill:green;fill-opacity:1;" />
                </g>
        </a>
        <a href="">
                <g transform="translate(0,-80)">
                        <rect x="500" y="300" width="25" height="25" style="stroke:green;fill:green;fill-opacity:1;" />
                </g>
        </a>
        <a href="">
                <g transform="translate(0,-80)">
                        <rect x="600" y="400" width="25" height="25" style="stroke:green;fill:green;fill-opacity:1;" />
                </g>
        </a>

        <a href="">
                <g transform="translate(0,-80)">
                        <rect x="600" y="700" width="25" height="25" style="stroke:green;fill:green;fill-opacity:1;" />
                </g>
        </a>
        <a href="">
                <g transform="translate(0,-80)">
                        <rect x="600" y="800" width="25" height="25" style="stroke:green;fill:green;fill-opacity:1;" />
                </g>
        </a>
        <a href="">
                <g transform="translate(0,-80)">
                        <rect x="600" y="900" width="25" height="25" style="stroke:green;fill:green;fill-opacity:1;" />
                </g>
        </a>
        <a href="">
                <g transform="translate(0,-80)">
                        <rect x="600" y="100" width="25" height="25" style="stroke:green;fill:green;fill-opacity:1;" />
                </g>
        </a>
        <a href="">
                <g transform="translate(0,-80)">
                        <rect x="600" y="200" width="25" height="25" style="stroke:green;fill:green;fill-opacity:1;" />
                </g>
        </a>-->
        </svg>

    </body>

</html>
