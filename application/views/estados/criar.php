<div class="container">
    <br />
    <h4><?= $titulo ;?></h4>
    <br />
    <?php echo validation_errors(); ?>

    <?php echo form_open('estados/criar'); ?>
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="Nome_Estado" placeholder="Introduzir nome para o estado">
        </div>
        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
</div>