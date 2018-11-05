<div class="container">
    <br />
    <h4><?= $titulo; ?></h4>
    <br />
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Modelo</th>
            <th scope="col">Endereço IP</th>
            <th scope="col">Endereço MAC</th>
            <th scope="col">Número Série</th>
            <th scope="col">Localização</th>
            <th scope="col">Código Imobilizado</th>
            <th scope="col">Operações</th>
        </tr>
    </thead>
    <tbody>
        <?php $contador = 0; ?>
        <?php foreach ($resultados as $resultado) : ?>
            <tr>
                <td><?php echo $resultado['Nome_Dispositivo']; ?></td>
                <td><?php echo $resultado['Modelo']; ?></td>
                <td><?php echo $resultado['Endereco_IP']; ?></td>
                <td><?php echo $resultado['Endereco_MAC']; ?></td>
                <td><?php echo $resultado['Numero_Serie']; ?></td>
                <td><?php echo $resultado['Localizacao']; ?></td>
                <td><?php echo $resultado['Codigo_Imobilizado']; ?></td>
                <td><a class="btn btn-info" href="<?php echo site_url('/dispositivos/' . $resultado['URL_Slug']); ?>">Ver Detalhes</a></td>
            </tr>
            <?php $contador++; ?>         
        <?php endforeach; ?>

    </tbody>
</table>
<?php
if ($contador == 0) {
    echo "<br />"
    . "<div class='container'>"
    . "<h4>Nenhum resultado encontrado.</h4>"
    . "</div>";
}
?>