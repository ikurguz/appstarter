<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1><?= $title ?></h1>
            <div class="row">
                <?php foreach ($posts as $post): ?>
                    <?= view_cell('\App\Libraries\Post::getPost', ['post' => $post]) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>