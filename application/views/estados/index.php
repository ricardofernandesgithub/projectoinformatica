<div class="container">
    <br />
    <h4><?= $titulo; ?></h4>
    <br />
    <a class="btn btn-primary" href="<?php echo site_url('/estados/criar'); ?>">Adicionar Estado</a>
    <br /><br />
    <table class="table table-bordered">
        <?php foreach ($estados as $estado) : ?>
            <tr>
                <td>
                    <a href="<?php echo site_url('/estados/dispositivos/' . $estado['ID_Estado']); ?>"><?php echo $estado['Nome_Estado']; ?></a>
                </td>
                <!--<td>
                    <a class="btn btn-warning" href="<?php echo base_url(); ?>estados/actualizar/<?php echo $estado['ID_Estado']; ?>">Alterar</a>
                </td>-->
            </tr>
        <?php endforeach; ?>
    </table>
</div>