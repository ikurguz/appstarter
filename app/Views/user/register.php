<?= $this->extend('layouts/main') ?>


    <!-- Основное содержимое страницы -->
<?= $this->section('content') ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">

                <?php if (session()->has('success')) : ?>
                    <div class="alert alert-success my-3" role="alert">
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->has('fail')) : ?>
                    <div class="alert alert-danger my-3" role="alert">
                        <?= session()->getFlashdata('fail'); ?>
                    </div>
                <?php endif; ?>

                <?php
                $errors_data = session()->has('errors') ? session()->getFlashdata('errors') : [];
                ?>

                <h1><?= $title ?? '' ?></h1>
                <form action="<?= route_to('user.store') ?>" method="post">
                    <div class="mb-3 form-floating">
                        <input value="<?= old('name') ?>" type="text" name="name" id="name"
                               class="form-control <?= add_error_class($errors_data, 'name') ?>"
                               placeholder="Введите имя..">
                        <label for="title" class="form-label">Имя</label>
                        <?= display_errors($errors_data, 'name') ?>
                    </div>

                    <div class="mb-3 form-floating">
                        <input value="<?= old('email') ?>" type="text" name="email" id="email"
                               class="form-control <?= add_error_class($errors_data, 'email') ?>"
                               placeholder="Введите email..">
                        <label for="title" class="form-label">email</label>
                        <?= display_errors($errors_data, 'email') ?>
                    </div>

                    <div class="mb-3 form-floating">
                        <input type="password" name="password" id="password"
                               class="form-control <?= add_error_class($errors_data, 'password') ?>"
                               placeholder="Введите пароль..">
                        <label for="password" class="form-label">Пароль</label>
                        <?= display_errors($errors_data, 'password') ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg">Регистрация</button>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>