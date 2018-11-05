<div class="container">
    <br />
    <h4><?= $titulo; ?></h4>
    <br />
    <table class="table table-bordered">
        <?php foreach ($edificios as $edificio) : ?>
            <tr>
                <td>
                    <a href="<?php echo site_url('/edificios/dispositivos/' . $edificio['ID_Edificio']); ?>"><?php echo $edificio['Nome_Edificio']; ?></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>