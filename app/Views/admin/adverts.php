<?php include_once('sections/header.php'); ?>


    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="buttons_block mt-4 p-2 bg-white rounded">
                    <a href="/adverts/create" class="btn btn-primary btn-sm">Создать</a>
                </div>
            </div>
        </div>

        <div class="row">
            <?php if (session()->get('success')) :?>
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-12">
                <div class="content_block mt-2 pt-3 pb-3 bg-white rounded">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Мои объявления</h3>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($adverts as $advert): ?>
                                <div class="col-12 col-md-4">
                                    <div class="card">
                                        <?= img(['src' => 'uploads/'.$advert['thumbnail'], 'class' => 'card-img-top', 'alt' => $advert['title'] ]);?>
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $advert['title']; ?></h5>
                                            <p class="card-text"><?= $advert['description']; ?></p>
                                            <p class="card-text">
                                                <small class="text-muted d-block"><?= $advert['author']; ?></small>
                                                <small class="text-muted"><?= $advert['created_at']; ?></small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php include_once('sections/footer.php'); ?>