<div class="container">

    <div class="d-flex justify-content-center align-items-center container ">
        <div class="row ">
            <?php echo form_open('utilizadores/login'); ?>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <h4 class="text-center"><?php echo $titulo; ?></h4>
            <br/>
            <div class="form-group">
                <input type="text" name="Username" class="form-control" placeholder="Introduzir Username" required autofocus>
            </div>
            <div class="form-group">
                <input type="password" name="Password" class="form-control" placeholder="Introduzir Password" required autofocus>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            </form>
        </div>
    </div><?php echo form_close(); ?>

</div>