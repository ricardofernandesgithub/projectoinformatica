<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.3.1.min.js"></script>
<script>
    $(document).ready(function () {
        $("button").click(function () {
            $("img").slideToggle();
        });
    });
</script>

<div class="container">
    <br />
    <h4>Detalhes do Dispositivo: <?php echo $titulo ?></h4>
    <br />
    <ul class="list-group">
        <li class="list-group-item">
            <strong>Fotografia: </strong><button class="btn btn-info">Mostrar / Ocultar</button><img style="display: none;" class="post-thumb" src="<?php echo site_url(); ?>assets/fotografias/<?php echo $dispositivo['Fotografia']; ?>">
        </li>
        <li class="list-group-item">
            <strong>ID: </strong><?php echo $dispositivo['ID_Dispositivo']; ?>
        </li>
        <li class="list-group-item"><strong>Categoria: </strong>
            <?php foreach ($categorias as $categoria): ?>
                <?php if ($categoria['ID_Categoria'] == $dispositivo['ID_Categoria']): ?>
                    <?php echo $categoria['Nome_Categoria']; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </li>
        <li class="list-group-item"><strong>Nome: </strong><?php echo $dispositivo['Nome_Dispositivo']; ?></li>
        <li class="list-group-item"><strong>Modelo: </strong><?php echo $dispositivo['Modelo']; ?></li>
        <li class="list-group-item"><strong>Endereço IP: </strong><?php echo $dispositivo['Endereco_IP']; ?></li>
        <li class="list-group-item"><strong>Endereço MAC: </strong><?php echo $dispositivo['Endereco_MAC']; ?></li>
        <li class="list-group-item"><strong>Número Série: </strong><?php echo $dispositivo['Numero_Serie']; ?></li>
        <li class="list-group-item"><strong>Edifício: </strong>
            <?php foreach ($edificios as $edificio): ?>
                <?php if ($edificio['ID_Edificio'] == $dispositivo['ID_Edificio']): ?>
                    <?php
                    $valor3 = $edificio['Nome_Edificio'];
                    setcookie("edificio_cookie", $valor3, time() + (86400 * 30), "/");
                    echo $_COOKIE["edificio_cookie"];
                    ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </li>
        <li class="list-group-item"><strong>Localização: </strong><?php echo $dispositivo['Localizacao']; ?></li>
        <li class="list-group-item">
            <?php if ($dispositivo['Localizacao_Mapa'] == 0): ?>
                <?php echo '<strong>Localização no Mapa: </strong><a class="btn btn-warning" href="'; ?>
                <?php echo site_url('/' . $_COOKIE["edificio_cookie"]); ?>
                <?php echo '">Adicionar Localização</a>'; ?>
            <?php else: ?>
                <?php echo '<strong>Localização no Mapa: </strong><a class="btn btn-info" href="'; ?>
                <?php echo site_url('/dispositivos/ver_dispositivo_no_mapa/' . $dispositivo['URL_Slug']); ?>
                <?php echo '">Ver Localização</a>'; ?>
            <?php endif; ?>            
        </li>
        <li class="list-group-item"><strong>Código Imobilizado: </strong><?php echo $dispositivo['Codigo_Imobilizado']; ?></li>
        <li class="list-group-item"><strong>Estado: </strong>
            <?php foreach ($estados as $estado): ?>
                <?php if ($estado['ID_Estado'] == $dispositivo['ID_Estado']): ?>
                    <?php echo $estado['Nome_Estado']; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </li>
        <li class="list-group-item"><strong>Comentário: </strong><?php echo $dispositivo['Comentario']; ?></li>
        <li class="list-group-item"><strong>Data de Registo: </strong><?php echo $dispositivo['Adicionado_Em']; ?></li>
    </ul>
    <br />
    <a class="btn btn-warning" href="<?php echo base_url(); ?>dispositivos/alterar/<?php echo $dispositivo['URL_Slug']; ?>">Alterar</a>
    <!--<?php echo form_open('dispositivos/remover/' . $dispositivo['ID_Dispositivo']); ?>
    <input type="submit" value="Remover" class="btn btn-danger">
    </form>-->
    <br />
    <br />
</div>

<?php
$valor = $dispositivo['URL_Slug'];
setcookie("slug_cookie", $valor, time() + (86400 * 30), "/"); // validade: 1 dia
//echo $_COOKIE["slug_cookie"];

$valor2 = $dispositivo['ID_Dispositivo'];
setcookie("id_dispositivo_cookie", $valor2, time() + (86400 * 30), "/");
?>
