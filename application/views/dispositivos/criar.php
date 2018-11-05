<div class="container">    
    <br />
    <h4><?= $titulo; ?></h4>

    <?php echo validation_errors(); ?>

    <?php echo form_open_multipart('dispositivos/criar'); ?>
    <div class="form-group">
        <label>Categoria</label>
        <select class="form-control" name="ID_Categoria">
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo $categoria['ID_Categoria']; ?>"><?php echo $categoria['Nome_Categoria']; ?></option>
            <?php endforeach; ?>
        </select>
        <br />
        <label>Nome do Dispositivo</label>
        <input type="text" class="form-control" name="Nome_Dispositivo" placeholder="Introduzir nome do dispositivo">
        <br />
        <label>Modelo</label>
        <input type="text" class="form-control" name="Modelo" placeholder="Introduzir modelo">
        <br />
        <label>Endereço IP</label>
        <input type="text" class="form-control" name="Endereco_IP" placeholder="Introduzir endereço IP">
        <br />
        <label>Endereço MAC</label>
        <input type="text" class="form-control" name="Endereco_MAC" placeholder="Introduzir endereço MAC">
        <br />
        <label>Número Série</label>
        <input type="text" class="form-control" name="Numero_Serie" placeholder="Introduzir número de série">
        <br />
        <label>Edifício</label>
        <select class="form-control" name="ID_Edificio">
            <?php foreach ($edificios as $edificio): ?>
                <option value="<?php echo $edificio['ID_Edificio']; ?>"><?php echo $edificio['Nome_Edificio']; ?></option>
            <?php endforeach; ?>
        </select>
        <br />
        <label>Localização</label>
        <input type="text" class="form-control" name="Localizacao" placeholder="Introduzir localização">
        <br />
        <label>Código do Imobilizado</label>
        <input type="text" class="form-control" name="Codigo_Imobilizado" placeholder="Introduzir código do imobilizado">
        <br />
        <label>Estado</label>
        <select class="form-control" name="ID_Estado">
            <?php foreach ($estados as $estado): ?>
                <option value="<?php echo $estado['ID_Estado']; ?>"><?php echo $estado['Nome_Estado']; ?></option>
            <?php endforeach; ?>
        </select>
        <br />
        <label>Comentário</label>
        <input type="text" class="form-control" name="Comentario" placeholder="Adicionar comentário">
        <br />
        <div class="form-group">
            <label>Fotografia</label>
            <input type="file" name="userfile" size="20">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>
<br />
</div>