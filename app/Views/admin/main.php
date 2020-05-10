<?php include_once('sections/header.php'); ?>

    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h3 class="display-4">Привет, <?= session()->get('first_name') ?></h3>
                        <p class="lead">Тут вы можете отредактировать контент</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php include_once('sections/footer.php'); ?>