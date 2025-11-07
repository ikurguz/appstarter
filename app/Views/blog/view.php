<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-12">

            <?= view_cell('\App\Libraries\Post::getOnePost', ['post' => $post]) ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

