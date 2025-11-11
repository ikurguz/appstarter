<?= $this->extend('layouts/main') ?>


    <!-- Основное содержимое страницы -->
<?= $this->section('content') ?>
    <div class="container">
        <div class="row">
            <div class="col-12">

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

                <?php if (session()->has('file')) : ?>
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
                <form action="<?= route_to('main.file_upload2') ?>" enctype="multipart/form-data" method="post">

                    <div class="mb-3">
                        <label for="userfile" class="form-label">Пример ввода файла по умолчанию</label>
                        <input class="form-control <?= add_error_class($errors_data, 'userfile') ?>"  type="file"
                               name="userfile" id="userfile">
                        <?= display_errors($errors_data, 'userfile') ?>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Имя</label>
                        <input value="<?= old('name') ?>" type="text" name="name" id="name"
                               class="form-control <?= add_error_class($errors_data, 'name') ?>"
                               placeholder="Введите имя..">
                        <?= display_errors($errors_data, 'name') ?>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">email</label>
                        <input value="<?= old('email') ?>" type="text" name="email" id="email"
                               class="form-control <?= add_error_class($errors_data, 'email') ?>"
                               placeholder="Введите email..">
                        <?= display_errors($errors_data, 'email') ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>