<div class="container">
    <br />
    <h4>Lista de dispositivos com o estado: <strong><?= $titulo; ?></strong></h4>
    <br />
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Estado</th>
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
        <?php foreach ($dispositivos as $dispositivo) : ?>
            <tr>
                <td><?php echo $dispositivo['Nome_Estado']; ?></td>
                <td><?php echo $dispositivo['Nome_Dispositivo']; ?></td>
                <td><?php echo $dispositivo['Modelo']; ?></td>
                <td><?php echo $dispositivo['Endereco_IP']; ?></td>
                <td><?php echo $dispositivo['Endereco_MAC']; ?></td>
                <td><?php echo $dispositivo['Numero_Serie']; ?></td>
                <td><?php echo $dispositivo['Localizacao']; ?></td>
                <td><?php echo $dispositivo['Codigo_Imobilizado']; ?></td>
                <td><a class="btn btn-info" href="<?php echo site_url('/dispositivos/' . $dispositivo['URL_Slug']); ?>">Ver Detalhes</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>