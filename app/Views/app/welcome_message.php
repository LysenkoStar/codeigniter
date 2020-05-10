<?php include_once('sections/header.php'); ?>


    <div class="container">
        <div class="row mt-3 bg-white rounded text-center">
            <div class="col-12">
                <h3>Все объявления</h3>
            </div>
        </div>
        <div class="row bg-white mt-5 rounded">
            <?php foreach ($adverts as $advert): ?>
                <div class="col-12 col-md-4 p-2">
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

        <div class="row bg-white mt-3 rounded text-center p-2">
            <div class="col-12">
                <?= $pager->links('p', 'bootstrap'); ?>
            </div>
        </div>
    </div>


<?php include_once('sections/footer.php'); ?>