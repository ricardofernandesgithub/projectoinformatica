<div class="container">
    <br />
    <h4><?= $titulo ;?></h4>

    <?php echo validation_errors(); ?>

    <?php echo form_open('categorias/actualizar'); ?>
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="ID_Categoria" placeholder="Introduzir nome para a categoria" value="<?php echo $registo->Nome_Categoria; ?>">
        </div>
        <button type="submit" class="btn btn-default">Criar</button>
    </form>
</div>