<?php include_once('sections/header.php'); ?>

<div class="container">
    <div class="row">

        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">
            <div class="container">
                <h3>Регистрация</h3>
                <hr>
                <form action="/register" method="post" class="form-signin">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                           <div class="form-group">
                               <label for="first_name">Имя</label>
                               <input type="text" class="form-control" name="first_name" id="first_name" value="<?= set_value('first_name'); ?>">
                           </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="last_name">Фамилия</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" value="<?= set_value('last_name'); ?>">
                            </div>
                        </div>
                        <div class="col-12">
                               <div class="form-group">
                                   <label for="email">Email</label>
                                   <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>">
                               </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="password" class="form-control" name="password" id="password" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password_confirm">Подтвердите пароль</label>
                                <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
                            </div>
                        </div>
                        <?php if (isset($validation)) :?>
                            <div class="col-12">
                                <div class="alert alert-danger">
                                    <?= $validation->listErrors(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                            <a href="/login">Уже есть аккаунт?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>



<?php include_once('sections/footer.php'); ?>