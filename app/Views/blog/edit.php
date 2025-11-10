<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1><?= $title ?></h1>
            <?= form_open(route_to('blog_update', $post['id']), ['method' => 'post']) ?>
            <div class="mb-3">
                <?= form_label('Название', 'title', ['class' => 'form-label']) ?>
                <?= form_input([
                    'name' => 'title',
                    'class' => 'form-control',
                    'id' => 'title',
                    'value' => $post['title'],
                ]) ?>
            </div>

            <div class="mb-3">
                <?= form_label('Анонс', 'excerpt', ['class' => 'form-label']) ?>
                <?= form_textarea([
                    'name' => 'excerpt',
                    'class' => 'form-control',
                    'id' => 'excerpt',
                    'value' => $post['excerpt'],
                    'rows' => '3',
                ]) ?>
            </div>

            <div class="mb-3">
                <?= form_label('Текст', 'content', ['class' => 'form-label']) ?>
                <?
                $data_input_content = [
                    'name' => 'content',
                    'rows' => '5',
                    'class' => 'form-control',
                    'id' => 'content',
                    'value' => $post['content'],
                ]
                ?>
                <?= form_textarea($data_input_content) ?>
            </div>

            <?= form_button([
                'class' => 'btn btn-primary',
                'type' => 'submit',
                'content' => 'Изменить'
            ]) ?>

            <?= form_close() ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>