<div class="container">    
    <br />
    <h4><?= $titulo; ?></h4>
    <br />
    <?php echo validation_errors(); ?>

    <?php echo form_open_multipart('dispositivos/actualizar'); ?>

    <input type="hidden" name="ID_Dispositivo" value="<?php echo $dispositivo['ID_Dispositivo']; ?>">

    <div class="form-group">
        <label>Categoria</label>
        <select class="form-control" name="ID_Categoria">
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo $categoria['ID_Categoria']; ?>"><?php echo $categoria['Nome_Categoria']; ?></option> <!-- Valor por defeito deverá ser igual ao valor presente na base de dados -->
            <?php endforeach; ?>
        </select>
        <br />
        <label>Nome do Dispositivo</label>
        <input type="text" class="form-control" name="Nome_Dispositivo" placeholder="Introduzir nome do dispositivo" value="<?php echo $dispositivo['Nome_Dispositivo']; ?>" <?php if ($this->session->userdata('Tipo') == 2): ?>disabled="true"<?php endif; ?>>
        <br />
        <label>Modelo</label>
        <input type="text" class="form-control" name="Modelo" placeholder="Introduzir modelo" value="<?php echo $dispositivo['Modelo']; ?>" <?php if ($this->session->userdata('Tipo') == 2): ?>disabled="true"<?php endif; ?>>
        <br />
        <label>Endereço IP</label>
        <input type="text" class="form-control" name="Endereco_IP" placeholder="Introduzir endereço IP" value="<?php echo $dispositivo['Endereco_IP']; ?>" <?php if ($this->session->userdata('Tipo') == 2): ?>disabled="true"<?php endif; ?>>
        <br />
        <label>Endereço MAC</label>
        <input type="text" class="form-control" name="Endereco_MAC" placeholder="Introduzir endereço MAC" value="<?php echo $dispositivo['Endereco_MAC']; ?>" <?php if ($this->session->userdata('Tipo') == 2): ?>disabled="true"<?php endif; ?>>
        <br />
        <label>Número Série</label>
        <input type="text" class="form-control" name="Numero_Serie" placeholder="Introduzir número de série" value="<?php echo $dispositivo['Numero_Serie']; ?>" <?php if ($this->session->userdata('Tipo') == 2): ?>disabled="true"<?php endif; ?>>
        <br />
        <label>Edifício</label>
        <select class="form-control" name="ID_Edificio">
            <?php foreach ($edificios as $edificio): ?>
                <option value="<?php echo $edificio['ID_Edificio']; ?>"><?php echo $edificio['Nome_Edificio']; ?></option> <!-- Valor por defeito deverá ser igual ao valor presente na base de dados -->
            <?php endforeach; ?>
        </select>
        <br />
        <label>Localização</label>
        <input type="text" class="form-control" name="Localizacao" placeholder="Introduzir localização" value="<?php echo $dispositivo['Localizacao']; ?>">
        <br />
        <table class="table table-bordered">
            <tr>
                <td>
                    <?php echo 'Localização no Mapa:<br /><a class="btn btn-warning" href="'; ?>
                    <?php echo site_url('/' . $_COOKIE['edificio_cookie']); ?>
                    <?php echo '">Alterar Localização</a>'; ?>
                </td>
                <td>
                    <label>Remover Localização no Mapa?</label>
                    <br />
                    <select name="Localizacao_Mapa">
                        <option value="1">Não</option>
                        <option value="0">Sim</option>
                    </select>
                </td>
            </tr>
        </table>
        <label>Código do Imobilizado</label>
        <input type="text" class="form-control" name="Codigo_Imobilizado" placeholder="Introduzir código do imobilizado" value="<?php echo $dispositivo['Codigo_Imobilizado']; ?>" <?php if ($this->session->userdata('Tipo') == 2): ?>disabled="true"<?php endif; ?>>
        <br />
        <label>Estado</label>
        <select class="form-control" name="ID_Estado">
            <?php foreach ($estados as $estado): ?>
                <option value="<?php echo $estado['ID_Estado']; ?>"><?php echo $estado['Nome_Estado']; ?></option> <!-- Valor por defeito deverá ser igual ao valor presente na base de dados -->
            <?php endforeach; ?>
        </select>
        <br />
        <label>Comentário</label>
        <input type="text" class="form-control" name="Comentario" placeholder="Adicionar comentário" value="<?php echo $dispositivo['Comentario']; ?>">
    </div>
    <br />
    <button type="submit" class="btn btn-warning">Guardar</button>&nbsp;&nbsp;
    <a href="<?php echo site_url('/dispositivos/' . $_COOKIE["slug_cookie"]); ?>" class="btn btn-primary">Cancelar</a>
</form>
</div>
<br />