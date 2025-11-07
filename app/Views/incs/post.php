<div class="card" style="width: 18rem;">
  <img src="https://lipsum.app/640x480/" class="card-img-top" >
  <div class="card-body">
    <h5 class="card-title"><?= $post['title'] ?></h5>
    <p class="card-text"> <?= $post['excerpt'] ?></p>
    <a href="<?= base_url("/blog/{$post['id']}")?>" class="btn btn-primary">Подробнее</a>
  </div>
</div>
