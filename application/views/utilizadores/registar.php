<div class="container">    
    <br />
    <h4><?= $titulo; ?></h4>
    <br />
    <?php echo validation_errors(); ?>

    <?php echo form_open_multipart('utilizadores/registar'); ?>
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="Username" placeholder="Username">
        <br />
        <label>Nome</label>
        <input type="text" class="form-control" name="Nome" placeholder="Nome">
        <br />
        <label>Email</label>
        <input type="email" class="form-control" name="Email" placeholder="Email">
        <br />
        <label>Password</label>
        <input type="password" class="form-control" name="Password" placeholder="Password">
        <br />
        <label>Confirmar Password</label>
        <input type="password" class="form-control" name="Password2" placeholder="Confirmar Password">
        <br />
        <label>Tipo de Utilizador</label>
        <br />
        <select class="form-group" name="Tipo">
            <option value="1">Administrador</option>
            <option value="2" selected="selected">Produção</option>
            <option value="3">Outros Departamentos</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Registar</button>
</form>
<br />
</div>