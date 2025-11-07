<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1><?= $title ?></h1>
            <form action="<?= route_to('blog_update', $post['id'])?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" name="title" class="form-control" id="title" value="<?= $post['title']?>">
            </div>

            <div class="mb-3">
                <label for="excerpt" class="form-label">Анонс</label>
                <textarea name="excerpt" id="excerpt" class="form-control"  rows="3"><?= $post['excerpt']?></textarea>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Текст</label>
                <textarea name="content" id="content" class="form-control"  rows="5"><?= $post['content']?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>