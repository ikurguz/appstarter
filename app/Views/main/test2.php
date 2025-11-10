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
//                Эти строки уже не нужны т.к. это уже другой объект, и валидация проводится в модели
//                $errors_data = $errors ? $errors->getErrors() : [];
//                echo $errors ? $errors->listErrors('my_list') : '';
                ?>

                <h1><?= $title ?? '' ?></h1>
                <form action="<?= route_to('main.test2') ?>" method="post">
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