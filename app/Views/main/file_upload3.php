<?= $this->extend('layouts/main') ?>


    <!-- Основное содержимое страницы -->
<?= $this->section('content') ?>
    <div class="container">
        <div class="row">
            <div class="col-12">

                <?php
                d(session()->getFlashdata('file'));
                ?>

                <?php if (session()->has('success')) : ?>
                    <div class="alert alert-success my-3" role="alert">
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <?php
                $errors_data = session()->has('errors') ? session()->getFlashdata('errors') : [];
                //                  d($errors_data);
                //                $errors_data = $errors ? $errors->getErrors() : [];
                //                echo $errors ? $errors->listErrors('my_list') : '';

                ?>
                <?php if (session()->has('files')) : ?>
                    <p>test</p>
                    <img src='uploads/<?= session()->getFlashdata('file') ?>' alt=''>
                <?php endif; ?>

                <?php if (!empty($errors_data)) : ?>
                    <div class="alert alert-danger my-3" role="alert">
                        <?php foreach ($errors_data as $error) : ?>
                            <ul>
                                <li><?= esc($error) ?></li>
                            </ul>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <h1><?= $page_title ?? '' ?></h1>
                <form action="<?= route_to('main.file_upload3') ?>" enctype="multipart/form-data" method="post">

                    <div class="mb-3">
                        <label for="userfile" class="form-label">Пример ввода файла по умолчанию</label>
                        <input class="form-control <?= add_error_class($errors_data, 'userfile') ?>"  type="file"
                               name="userfile" id="userfile">
                        <?= display_errors($errors_data, 'userfile') ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>