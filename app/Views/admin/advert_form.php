<?php include_once('sections/header.php'); ?>


    <div class="container">
        <div class="row">

            <div class="col-12 mt-5 pt-3 pb-3 bg-white form-wrapper">
                <div class="container">

                    <form action="/adverts/create" method="post" class="form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label">Заголовок</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Заголовок объявления">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="thumbnail" class="col-sm-2 col-form-label">Изображение</label>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="description" class="col-sm-2 col-form-label">Описание</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" aria-label="With textarea" name="description" id="description"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="author" class="col-sm-2 col-form-label">Автор</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" name="author" id="staticEmail" value="<?= $author; ?>">
                                        <input type="hidden" readonly name="user_id" id="user_id" value="<?= $user_id; ?>">
                                    </div>
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
                        <div class="row mt-5">
                            <div class="col-12 col-sm-12 text-right">
                                <button type="submit" class="btn btn-primary">Опубликовать</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>


<?php include_once('sections/footer.php'); ?>