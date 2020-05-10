<?php include_once('sections/header.php'); ?>

<div class="container">
    <div class="row">

        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">
            <div class="container">
                <h3>Вход</h3>
                <hr>
                <?php if (session()->get('success')) :?>
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">
                            <?= session()->get('success'); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <form action="/login" method="post" class="form-signin">
                   <div class="form-group">
                       <label for="email">Email</label>
                       <input type="email" class="form-control" name="email" id="email" value="<?php set_value('email'); ?>">
                   </div>
                   <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" class="form-control" name="password" id="password" value="">
                   </div>
                    <?php if (isset($validation)) :?>
                        <div class="col-12">
                            <div class="alert alert-danger">
                                <?= $validation->listErrors(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Войти</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                            <a href="/register">Еще нет аккаунта?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>



<?php include_once('sections/footer.php'); ?>