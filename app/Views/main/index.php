<?= $this->extend('layouts/main') ?>


<!-- Основное содержимое страницы -->
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-12"><h1><?= $title; ?></h1></div>
    </div>
</div>

<?= $this->endSection() ?>