<?= $this->extend('layouts/main') ?>


    <!-- Основное содержимое страницы -->
<?= $this->section('content') ?>
    <div class="container">
        <div class="row">
            <div class="col-12">

                <?php if (session()->has('success')) : ?>
                    <div class="alert alert-success my-3" role="alert">
                        <?=session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <?php
                $errors_data = session()->has('errors') ? session()->getFlashdata('errors') : '';
                d($errors_data);
//                $errors_data = $errors ? $errors->getErrors() : [];
//                echo $errors ? $errors->listErrors('my_list') : '';
                ?>

                <?php if (session()->has('file')) :?>
                    <img src='uploads/<?= session()->getFlashdata('file')?>' alt=''>
                <?php endif; ?>

                <h1><?= $page_title ?? '' ?></h1>
                <form action="<?= route_to('main.file_upload') ?>" enctype="multipart/form-data" method="post">

                    <div class="mb-3">
                        <label for="userfile" class="form-label">Пример ввода файла по умолчанию</label>
                        <input class="form-control" type="file" name="userfile" id="userfile">
                    </div>

                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>