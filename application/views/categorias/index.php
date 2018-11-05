<div class="container">
    <br />
    <h4><?= $titulo; ?></h4>
    <br />
    <a class="btn btn-primary" href="<?php echo site_url('/categorias/criar'); ?>">Adicionar Categoria</a>
    <br /><br />
    <table class="table table-bordered">
        <?php foreach ($categorias as $categoria) : ?>
            <tr>
                <td>
                    <a href="<?php echo site_url('/categorias/dispositivos/' . $categoria['ID_Categoria']); ?>"><?php echo $categoria['Nome_Categoria']; ?></a>
                </td>
                <!--<td>
                    <a class="btn btn-warning" href="<?php echo base_url(); ?>categorias/actualizar/<?php echo $categoria['ID_Categoria']; ?>">Alterar</a>
                </td>-->
            </tr>
        <?php endforeach; ?>
    </table>
</div>