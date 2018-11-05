<div class="container">
    <br />
    <h4><?= $titulo ;?></h4>
    <br />
    <?php echo validation_errors(); ?>

    <?php echo form_open('categorias/criar'); ?>
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="Nome_Categoria" placeholder="Introduzir nome para a categoria">
        </div>
        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
</div>